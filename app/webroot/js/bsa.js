function bsaCalculatorsController($scope) {
  
  $scope.unitW = "kg";
  $scope.unitH = "cm";

  $scope.formulaClass = function(formula) {
    return formula === $scope.race ? "btn-selected" : undefined;
  };
  
  $scope.submit = function() {
    return false;
  }

  $scope.setUnitH = function(unit) {
    $scope.unitH = unit;
  }

  $scope.setUnitW = function(unit) {
    $scope.unitW = unit;
  }

  $scope.setFormula = function(formula) {
    $scope.formula = formula;
  }
  $scope.bsa_mosteller = function() {
    var h = parseFloat($("input[name=txtHeight]").val());
    var w = parseFloat($("input[name=txtWeight]").val());
    var bsa = Math.sqrt((w * h) / 3600);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_dubois = function() {
    var h = parseFloat($("input[name=txtHeight]").val());
    var w = parseFloat($("input[name=txtWeight]").val());
    var bsa = 0.007184*Math.pow(h,0.725)*Math.pow(w,0.425);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_boyd = function() {
    var h = parseFloat($("input[name=txtHeight]").val());
    var w = parseFloat($("input[name=txtWeight]").val());
    var bsa = 0.0003207*Math.pow(h,0.3)*Math.pow( w*1000,(0.7285 - 0.0188* (Math.log(w*1000)/Math.LN10) ) );
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_haycock = function() {
    var h = parseFloat($("input[name=txtHeight]").val());
    var w = parseFloat($("input[name=txtWeight]").val());
    var bsa = 0.024265 * Math.pow(h, 0.3964) * Math.pow(w, 0.5378);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.bsa_gehan = function() {
    var h = parseFloat($("input[name=txtHeight]").val());
    var w = parseFloat($("input[name=txtWeight]").val());
    var bsa = 0.0235*Math.pow(h,0.42246)*Math.pow(w,0.51456);
    bsa = bsa.toFixed(3);
    return bsa
  }
  $scope.calculatebsa = function() {
    
    var h = parseFloat($("input[name=txtHeight]").val());
    var w = parseFloat($("input[name=txtWeight]").val());
  
  }
}