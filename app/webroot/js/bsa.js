var bsaApp = angular.module('diabeteSavior', ['ngRoute', 'ngCookies']);
bsaApp.controller('bsaCalculatorsController', ['$scope','$cookies', '$cookieStore', bsaCalculatorsController]);


function bsaCalculatorsController($scope, $cookies, $cookieStore) {
  

  $scope.unitType = null;
  $scope.unitFormat = null;

  setPlaceholders = function() {
    $('#txtWeight').attr('placeholder', $scope.unitFormat.weightFormat);
    $('#txtHeight').attr('placeholder', $scope.unitFormat.heightFormat);
  }

  init = function() {
    // Retrieving a cookie
    if($cookies.unitType == '') {
      $cookies.unitType = 'imperial';
    }
    $scope.unitType = $cookies.unitType;
    $scope.unitFormat = $scope.unit[$scope.unitType];    
    setPlaceholders();
  }
  init();

  $scope.enterInput = function(ev) {
    tgt = ev.target;
    setTimeout(function() { 
      tgt.setSelectionRange(0, tgt.value.length);
    },10);
  }

  $scope.unitTypeClass = function(type) {
    return type === $scope.unitType ? 'btn-primary' : '';
  }

  $scope.setUnitType = function(type) {
    if($scope.unitType === type) {
      return false;
    }
    $scope.unitType = type;
    $cookies.unitType = type;
    $scope.unitFormat = unit[type];    
    setPlaceholders();
    if(type == 'imperial') {
      newW = kgToLb($('#txtWeight').val());
      newH = mToFt($('#txtHeight').val());
    } else {
      newW = lbToKg($('#txtWeight').val());
      newH = ftToM($('#txtHeight').val());
    }
    $('#txtWeight').val(newW);
    $('#txtHeight').val(newH);
    return false;
  }

  $scope.heightKeyDown = function(ev) {
    // Only allow numbers, ., ', " in this field.
    // Keydown trigger before change, thus the value still old.
    value = ev.target.value;

    if($scope.unitType == 'imperial') {
      // . ' "
      if(value.indexOf('"') >  -1) {
        if(ev.keyCode == 8 || ev.keyCode == 46 || ev.keyCode == 9) {
          // Only allow to delete string.
          return true;
        }
        ev.preventDefault();
        return false;
      }
      if(value.indexOf("'") > -1 && (ev.keyCode == 222 && !ev.shiftKey)) {
        // Not allow "'" key
        ev.preventDefault();
        return false;
      }
      allowedKeys = [190, 222, 16];
    } else {
      allowedKeys = [190];
    }

    if(value.indexOf('.') >  -1 && ev.keyCode == 190) {
      // Not allow '.' key
      ev.preventDefault();
      return false;
    } 
    // arrow keys: 37 - 40, ctrl 17, cmd 91, backspace 8, del 46, c 67, v 86, x 88, tab 9
    actionKeys = [67, 86, 88, 82, 65];
    modKeys = [37, 38, 39, 40, 17, 91, 8, 46, 9];
    ctrlDown = ev.ctrlKey || ev.metaKey // Mac support
    allowedKeys = allowedKeys.concat(modKeys);
    //console.log('keycode: ' + ev.keyCode);
    
    if(ev.keyCode >= 48 && ev.keyCode <= 57) {
      // is a digit.
      return true;
    } else if($.inArray(ev.keyCode, allowedKeys) > -1){
      // is allowd keys: . ' "
      return true;
    } else if(ctrlDown && $.inArray(ev.keyCode, actionKeys) > -1) {
      return true;
    } else {
      ev.preventDefault();
      return false;
    }
  }

  $scope.formulaClass = function(formula) {
    return formula === $scope.race ? "btn-selected" : undefined;
  };
  
  $scope.submit = function() {
    return false;
  }

  $scope.setFormula = function(formula) {
    $scope.formula = formula;
  }

  function getH() {
    var h = 0;
    if($scope.unitType == 'imperial') {
      h = ftToM($("input[name=txtHeight]").val());
    } else {
      h = parseFloat($("input[name=txtHeight]").val());
    }
    return h;
  }

  function getW() {
    var w = 0;
    if($scope.unitType == 'imperial') {
      w = lbToKg($("input[name=txtWeight]").val());
    } else {
      w = parseFloat($("input[name=txtWeight]").val());
    }
    return w;
  }

  $scope.bsa_mosteller = function() {
    var h = getH();
    var w = getW();
    var bsa = Math.sqrt((w * h) / 3600);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_dubois = function() {
    var h = getH();
    var w = getW();
    var bsa = 0.007184*Math.pow(h,0.725)*Math.pow(w,0.425);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_boyd = function() {
    var h = getH();
    var w = getW();
    var bsa = 0.0003207*Math.pow(h,0.3)*Math.pow( w*1000,(0.7285 - 0.0188* (Math.log(w*1000)/Math.LN10) ) );
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_haycock = function() {
    var h = getH();
    var w = getW();
    var bsa = 0.024265 * Math.pow(h, 0.3964) * Math.pow(w, 0.5378);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_gehan = function() {
    var h = getH();
    var w = getW();
    var bsa = 0.0235*Math.pow(h,0.42246)*Math.pow(w,0.51456);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.calculatebsa = function() {
    var h = getH();
    var w = getW();  
  }
}
//})();