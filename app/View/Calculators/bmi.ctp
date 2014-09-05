<?php
echo $this->Html->script('bmi');
echo $this->Html->script('angular.min');
echo $this->Html->script('angular-route.min');

?>
<script>
$(document).ready(function(){
unit = {
  'imperial' : {
    'weightFormat': 'lb',
    'heightFormat': 'ft\'inch"'
  },
  'metric' : {
    'weightFormat': 'kg',
    'heightFormat': 'cm'
  }
};
unitType = 'imperial';
unitFormat = unit[unitType];
unitSwitcher = $('.switch-unit');

});

function mToFt(value) {
  inches = 0;
  inches = value * 0.3937008;
  feets = Math.floor(inches / 12);
  inches = Math.round(inches % 12);//.toFixed(1);
  value = feets + ("'") + inches + ('"');
  return value;
}
function ftToM(value) {
  if(value.indexOf("'") > 0) {
    inches = value.split("'")[1];
    if(inches.length == 0) {
      inches = 0;
    } else if(inches.indexOf('"') > 0) {
      inches = inches.substring(0, inches.length - 1);
    }
    feets = value.split("'")[0];
    feetsAsInches = feets * 12;
    inches = parseFloat(inches) + feetsAsInches;
  } else {
    feets = value;
    inches = feets * 12;
  }
  value = (inches * 2.54).toFixed(0);
  return value;
}
function lbToKg(value) {
  return (value * 0.453592).toFixed(1);
}
function kgToLb(value) {
  return (value * 2.20462).toFixed(1);
}

function bmiCalculatorsController($scope) {
  $scope.race = ""
  $scope.bmi = "";
  $scope.weightClassification = "";
  $scope.obesityClass = "";
  $scope.unitW = "kg";
  $scope.unitH = "cm";

  $scope.populationClass = function(race) {
    return race === $scope.race ? "btn-selected" : undefined;
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

  $scope.setPopulcation = function(race) {
    $scope.race = race;
  }

  $scope.calculateBMI = function() {
    if($scope.race === '') {
      alert("Please select population.");
    } else {
      var h = parseFloat($("input[name=txtHeight]").val());
      var w = parseFloat($("input[name=txtWeight]").val());
      if($scope.unitType == 'imperial') {
        h = inchToCm();
        w = poundToKg();
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
</script>
<h2 class="section-title">Body Mass Index (BMI)</h2>
<p>
BMI is used for assessment of obesity-related risk for heart disease, diabetes, osteoarthritis, cancer, sleep apnea, abdominal hernias, varicose veins, gout, gall bladder disease, respiratory problems, and liver malfunction. The increased risk for these diseases and conditions are calculated by observing population. BMI is not a very precise measure-there are differences in definition of BMI in different populations, and also between individuals. Nevertheless, BMI is broadly used. It is often combined with the measurement of waist circumference or waist-to-height ratio.
</p>
<p>BMI = Weight(kg) / Height<sup>2</sup>(m)</p>

<div ng-controller="bmiCalculatorsController">
<form class="form-horizontal" id="bmiForm" role="form" ng-submit="submit">
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Population</label>
    <div class="col-sm-10">
      <div class="btn-group">
        <button type="button" class="btn btn-default col-sm-x" ng-click="setPopulcation('caucasian')" ng-class="populationClass('caucasian')">US/European</button>
        <button type="button" class="btn btn-default col-sm-x" ng-click="setPopulcation('asian')" ng-class="populationClass('asian')">Asian</button>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Unit type</label>
    <div class="col-sm-10">
      <div class="btn-group">
        <?php if($unitType == 'imperial'): ?>
        <a href="#" class="btn btn-primary switch-unit" data-unit='imperial'>lbs / ft</a>
        <a href="#" class="btn btn-default switch-unit" data-unit='metric'>kg / cm</a>
        <?php else: ?>
        <a href="#" class="btn btn-default switch-unit" data-unit='imperial'>lbs / ft</a>
        <a href="#" class="btn btn-primary switch-unit" data-unit='metric'>kg / cm</a>
        <?php endif; ?>
      </div>  
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Weight</label>
    <div class="col-sm-10">
      <input id="txtWeight" class="form-control" name="txtWeight" value="" type="text">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Height</label>
    <div class="col-sm-10">
      <input id="txtHeight" class="form-control" name="txtHeight" value="" type="text">
    </div>
  </div>

<?php echo $this->Form->hidden('weight') ?>
<?php echo $this->Form->hidden('height') ?>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-primary" id="btnCalculateBMI" ng-click="calculateBMI()">Calculate</button>
    </div>
  </div>

</form>


<p class="alert alert-info text-left">
  Subject is: {{race}}<br>
  Subject's BMI: {{bmi}}<br>
  Weight Classification: {{weightClassification}}<br>
  Obesity Class: {{obesityClass}}<br>
</p>
</div>

<hr>

<p>
* Disease risk for type 2 diabetes, hypertension, and cardiovascular diseases
</p>
<h4>Reference:</h4>
<p class="">US Department of Health and Human Services, Public Health Service, National Institutes of Health (HHLBI). The Practical Guide: Identification, Evaluation, and Treatment of Overweight and Obesity in Adults. Washington NIH Pub. no. 00-4084 2000.</p>
<p class="note">
  <img src="<?php echo $this->webroot; ?>/img/table2.png">
  <img src="<?php echo $this->webroot; ?>/img/table.png" >
</p>

<style>
.btn-selected {
  background: #ebebeb;
}

p.note img {
  width: 100%;
  height: auto;
  display: block;
}
</style>
