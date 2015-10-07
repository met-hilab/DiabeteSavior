var bmiApp = angular.module('diabeteSavior', ['ngRoute', 'ngCookies']);
bmiApp.controller('bmiCalculatorsController', ['$scope','$cookies', '$cookieStore', bmiCalculatorsController]);


function bmiCalculatorsController($scope, $cookies, $cookieStore) {
  $scope.race = ""
  $scope.bmi = "";
  $scope.weightClassification = "";
  $scope.obesityClass = "";

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
    $scope.unitFormat = unit[$scope.unitType];    
    setPlaceholders();
  }
  init();

  $scope.enterInput = function(ev) {
    tgt = ev.target;
    setTimeout(function() { 
      tgt.setSelectionRange(0, tgt.value.length);
    },10);    
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
   
    //Update the value only if the textbox is not empty 
    if($('#txtWeight').val().length > 0)
      $('#txtWeight').val(newW);
    if($('#txtHeight').val().length > 0)
      $('#txtHeight').val(newH);
    
    return false;
  }

  $scope.populationClass = function(race) {
    return race === $scope.race ? "btn-primary" : '';
  };

  $scope.setPopulcation = function(race) {
    $scope.race = race;
  }
  
  $scope.submit = function() {
    return false;
  }

  $scope.calculateBMI = function() {
    if($scope.race === '') {
      alert("Please select population.");
    } else {
      var h = 0;
      var w = 0;
      if($scope.unitType == 'imperial') {
        h = ftToM($("input[name=txtHeight]").val());
        w = lbToKg($("input[name=txtWeight]").val());
      } else {
        h = parseFloat($("input[name=txtHeight]").val());
        w = parseFloat($("input[name=txtWeight]").val());
      }
      

      $scope.bmi = w / ((h / 100) * (h / 100));
      $scope.bmi = $scope.bmi.toFixed(2);

      var weightClass = "";
      var obesityClass = "";

      switch($scope.race) {
        case "caucasian":
          if($scope.bmi < 16.0) {
            weightClass = "Severely underweight";
            obesityClass = "none";
          } else if($scope.bmi < 18.5) {
            weightClass = "Underweight";
            obesityClass = "none";
          } else if($scope.bmi < 25.0) {
            weightClass = "Normal";
            obesityClass = "none";
          } else if($scope.bmi < 30.0) {
            weightClass = "Overweight";
            obesityClass = "none";
          } else if($scope.bmi < 35.0) {
            weightClass = "Obese";
            obesityClass = "I";
          } else if($scope.bmi < 40.0) {
            weightClass = "Extremely obese";
            obesityClass = "II";  
          } else {
            weightClass = "Extremely obese";
            obesityClass = "III";
          }
          break;
        case "asian":
          if($scope.bmi < 16.0) {
            weightClass = "Severely underweight";
            obesityClass = "none";
          } else if($scope.bmi < 18.5) {
            weightClass = "Underweight";
            obesityClass = "none";
          } else if($scope.bmi < 23.0) {
            weightClass = "Normal";
            obesityClass = "none";
          } else if($scope.bmi < 25.0) {
            weightClass = "Overweight";
            obesityClass = "none";
          } else if($scope.bmi < 35.0) {
            weightClass = "Obese";
            obesityClass = "I";
          } else if($scope.bmi < 40.0) {
            weightClass = "Extremely obese";
            obesityClass = "II";  
          } else {
            weightClass = "Extremely obese";
            obesityClass = "III";
          }
          break;
      }

      $scope.weightClassification = weightClass;
      $scope.obesityClass = obesityClass;
      //$scope.$apply();
    }
  }
}
