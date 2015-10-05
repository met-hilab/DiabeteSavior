<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script type="text/javascript" src="/101_diabetesavior/js/angular/angular.min.js"></script>
<script type="text/javascript" src="/101_diabetesavior/js/angular/angular-cookies.min.js"></script>
<script type= "text/javascript" src= "/101_diabetesavior/js/ms.js"></script>

<h2>Metabolic Syndrome</h2>		
<br>
<p class="text-left">
Metabolic Syndrome is a group of metabolic risk factors that exist in one person (American Heart Association, 2012).
It is associated with obesity and insulin resistance thus can lead to more serious health issues like cardiovascular disease and type 2 diabetes.
A person with at three or more of these risk factors below can be identified as positive of having metabolic syndrome. 
<a href="/101_diabetesavior/img/metabolic_syndrome_flowchart.png" target="_blank">Click here to see the flowchart of the algorithm used by this application.</a>
</p>
<br>
<div ng-controller="msCtrl" align=center>
  <div class="row">
	<div class="col-md-4 form-group">
		<div class="text-left"><b>Gender</b></div>
		<div class="btn-group btn-group-justified" role="group">
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-default" ng-click="setGender('male')" ng-class="genderClass('male')">Male</button>
			</div>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-default" ng-click="setGender('female')" ng-class="genderClass('female')">Female</button>
			</div>
		</div>
	</div>
	<div class="col-md-4 form-group">
		<div class="text-left"><b>Waist Circumference</b></div>
		<div class="input-group">
		<input type="number" min="0" step="1" ng-model="waist" class="form-control" placeholder="Enter waist circumference" ng-class="waistClass">
		<span class="input-group-btn" role="group">
			<button type="button" class="btn btn-default" ng-click="setUnit('inch')" ng-class="unitClass('inch')">inch</button>
			<button type="button" class="btn btn-default" ng-click="setUnit('cm')" ng-class="unitClass('cm')">cm</button>
		</span>
		</div>
	</div>
	<div class="col-md-4 form-group">	
		<div class="text-left"><b>HDL Cholesterol</b> (mg/dL)</div>
		<input type="number" min="0" step="1" ng-model="hdl" class="form-control" placeholder="Enter HDL cholesterol" ng-class="hdlClass">
	</div>
	<div class="col-md-4 form-group">
		<div class="text-left"><b>Fasting Blood Triglycerides</b>(mg/dL)</div>
		<input type="number" min="0" step="1" ng-model="fbt" class="form-control" placeholder="Enter fasting blood triglycerides" >
	</div>			
	<div class="col-md-4 form-group">		
		<div class="text-left"><b>Blood Pressure</b> (mm Hg)</div>
		<div class="input-group">
			<input type="number" min="0" step="1" ng-model="systolic" class="form-control" placeholder="Enter upper value" ng-class="systolicClass"/>
			<span class="input-group-addon">/</span>
			<input type="number" min="0" step="1" ng-model="diastolic" class="form-control" placeholder="Enter lower value" ng-class="diastolicClass"/>
		</div>
	</div>
	<div class="col-md-4 form-group">	
		<div class="text-left"><b>Fasting Glucose</b> (mg/dL)</div>
		<input type="number" min="0" step="1" ng-model="fg" class="form-control" placeholder="Enter fasting glucose" ng-class="fgClass">
	</div>
  </div>
  <br>
  <button type="button" class="btn btn-primary" ng-click="calculateMS()">Calculate</button>
  &nbsp; &nbsp;
  <button type="button" class="btn btn-primary" ng-click="resetAll()">Reset</button>
  <br><br>
  <div class="row">
    <div class="alert" ng-class="alertClass" role="alert">
	<b>{{output}}</b>
	<p ng-bind-html="htmlString | unsafe"></p>
    </div>
  </div>
</div>
<div class="text-left">
<h4>Reference:</h4>
American Heart Association (2012) Answers by heart: What Is Metabolic Syndrome? Retrieve 9/30/2015 from <a href="http://www.heart.org/idc/groups/heart-public/@wcm/@hcm/documents/downloadable/ucm_300322.pdf" target="_blank">www.heart.org/idc/groups/heart-public/@wcm/@hcm/documents/downloadable/ucm_300322.pdf</a>
</div>

