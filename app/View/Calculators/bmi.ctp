<?php
echo $this->Html->script('utilities');
echo $this->Html->script('angular/angular.min');
echo $this->Html->script('angular/angular-cookies.min');
echo $this->Html->script('angular/angular-route.min');
echo $this->Html->script('bmi');
?>

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
        
        <button class="btn btn-default switch-unit" data-unit='imperial' ng-class="unitTypeClass('imperial')" ng-click="setUnitType('imperial')" >lbs / ft</button>
        <button class="btn btn-default switch-unit" data-unit='metric' ng-class="unitTypeClass('metric')" ng-click="setUnitType('metric')" >kg / cm</button>
        
      </div>  
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Weight</label>
    <div class="col-sm-10">
      <input id="txtWeight" class="form-control" name="txtWeight" value="" type="text" ng-focus="enterInput($event)" ng-keyup="weightKeyUp($event)">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Height</label>
    <div class="col-sm-10">
      <input id="txtHeight" class="form-control" name="txtHeight" value="" type="text" ng-focus="enterInput($event)" ng-keydown="heightKeyDown($event)">
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
