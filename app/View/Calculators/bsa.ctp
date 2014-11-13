<?php

echo $this->Html->script('angular/angular.min');
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
    <label for="" class="col-sm-2 control-label">Height</label>
    <div class="input-group col-sm-10">
      <input id="txtHeight" class="form-control" name="txtHeight" value="" type="text">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id="currentHeightUnit">{{unitH}}</span>  <span class="caret"></span></button>
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
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" ><span id="currentWeightUnit">{{unitW}}</span> <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
          <li><a ng-click="setUnitW('kg');">kg</a></li>
          <li><a ng-click="setUnitW('lb');">lb</a></li>
        </ul>
      </div><!-- /btn-group -->
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
