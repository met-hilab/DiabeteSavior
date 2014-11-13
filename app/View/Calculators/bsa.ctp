<?php

echo $this->Html->script('angular/angular.min');
echo $this->Html->script('angular/angular-cookies.min');
echo $this->Html->script('angular/angular-route.min');
echo $this->Html->script('bsa');
?>

<h2 class="section-title">Body Surface Area (BSA)</h2>
<p>
Body surface area (BSA) can be calculated with several different formulas which all have slightly different results. The calculator below uses just a few of the formulas available.
</p>

<div ng-controller="bsaCalculatorsController">
<form class="form-horizontal" id="bsaForm" role="form" ng-submit="submit">

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

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-primary" id="btnCalculatebsa" ng-click="calculatebsa()">Calculate</button>
    </div>
  </div>

</form>


<p class="alert alert-info text-left">
  Subject's BSA (m<sup>2</sup>): <br>
  &nbsp;&nbsp; Mosteller: <br>
  &nbsp;&nbsp; &nbsp;&nbsp; {{bsa_mosteller()}} = ((height (cm) x weight (kg)) / 3600 ) <sup>0.5</sup><br>
  &nbsp;&nbsp; DuBois: <br>
  &nbsp;&nbsp; &nbsp;&nbsp; {{bsa_dubois()}} = 0.20247 x height (m)<sup>0.725</sup> x weight (kg)<sup>0.425</sup><br>
  &nbsp;&nbsp; Haycock: <br>
  &nbsp;&nbsp; &nbsp;&nbsp; {{bsa_haycock()}} = 0.024265 x height (cm)<sup>0.3964</sup> x weight (kg)<sup>0.5378</sup><br>
  &nbsp;&nbsp; Gehan &amp; George: <br>
  &nbsp;&nbsp; &nbsp;&nbsp; {{bsa_gehan()}} = 0.0235 x height (cm)<sup>0.42246</sup> x weight (kg)<sup>0.51456</sup><br>
  &nbsp;&nbsp; Boyd: <br>
  &nbsp;&nbsp; &nbsp;&nbsp; {{bsa_boyd()}} = 0.0003207 x height (cm)<sup>0.3</sup> x weight (grams)<sup>0.7285 - (0.0188 x log(weight))</sup><br>
</p>
</div>



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
