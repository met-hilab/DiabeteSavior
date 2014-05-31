<?php
echo $this->Html->script('bmi');
echo $this->Html->script('angular.min');
echo $this->Html->script('angular-route.min');

?>
<script>
$(document).ready(function(){

});

function bmiCalculatorsController($scope) {
  $scope.race = ""
  $scope.bmi = "";
  $scope.weightClassification = "";
  $scope.obesityClass = "";
  $scope.unitW = "kg";
  $scope.unitH = "cm";
  
  $scope.submit = function() {
    return false;
  }

  $scope.setUnitH = function(unit) {
    $scope.unitH = unit;
    $("#currentHeightUnit").text(unit);
  }

  $scope.setUnitW = function(unit) {
    $scope.unitW = unit;
    $("#currentWeightUnit").text(unit);
  }

  $scope.setPopulcation = function(sender, race) {
    $scope.race = race;
    $(sender).siblings("button").removeClass("btn-selected");
    $(sender).addClass("btn-selected");
  }


  $scope.calculateBMI = function() {
    if($scope.race === '') {
      alert("Please select population.");
    } else {
      var h = parseFloat($("input[name=txtHeight]").val());
      var w = parseFloat($("input[name=txtWeight]").val());

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
        <button type="button" class="btn btn-default col-sm-x" ng-click="setPopulcation(this, 'caucasian')">US/European</button>
        <button type="button" class="btn btn-default col-sm-x" ng-click="setPopulcation(this, 'asian')">Asian</button>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Height</label>
    <div class="input-group col-sm-10">
      <input id="txtHeight" class="form-control" name="txtHeight" value="" type="text">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id="currentHeightUnit">cm</span>  <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
          <li><a ng-click="setUnitH('cm');">cm</a></li>
          <li><a ng-click="setUnitH('ft');">ft</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Weight</label>
    <div class="input-group col-sm-10">
      <input id="txtWeight" class="form-control" name="txtWeight" value="" type="text">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" ><span id="currentWeightUnit">kg</span> <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
          <li><a ng-click="setUnitW('kg');">kg</a></li>
          <li><a ng-click="setUnitW('lb');">lb</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-primary" id="btnCalculateBMI" ng-click="calculateBMI()">Calculate</button>
    </div>
  </div>

</form>


<p class="alert alert-info">
  Subject is: {{race}}<br>
  Subject's BMI: {{bmi}}<br>
  Weight Classification: {{weightClassification}}<br>
  Obesity Class: {{obesityClass}}<br>
</p>
</div>

<hr>
<!--
<input id="answer" name="answer" value="" type="text">
<a href="#table1">Weight Classification </a>:
<input id="Cate" name="answer" value="" type="text">

Obesity Class : 
<input id="obclass" name="answer" value="" type="text">

Gender
<select id="sex" name="sex">
  <option value="men">Male</option>
  <option value="women">Female</option>
</select>

Waist Circumference
<input id="waist" name="value4" value="" type="text">
<input name="Sumbit" value="Calcuate" onclick="classification2();" type="button">

<a href="#table2">&nbsp;Disease Risk</a><span style="font-size:9.0pt;">*</span>
<input id="answer2" name="answer2" value="" type="text">

-->



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

<!--
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-sm-2 control-label">Population</label>
    <div class="col-sm-10">
      <div class="btn-group">
        <button type="button" class="btn btn-default col-sm-x">US/European</button>
        <button type="button" class="btn btn-default col-sm-x">Asian</button>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-sm-2 control-label">Unit</label>
    <div class="col-sm-10">
      <div class="btn-group">
        <button type="button" class="btn btn-default col-sm-x">Inch/Lb</button>
        <button type="button" class="btn btn-default col-sm-x">Cm/Kg</button>
      </div>
    </div>
    
  </div>

  <div class="form-group">
    <label for="inputPassword1" class="col-sm-2 control-label">Height</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword1" placeholder="Height">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-sm-2 control-label">Weight</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword1" placeholder="Weight">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Do the math</button>
    </div>
  </div>
</form>
-->
