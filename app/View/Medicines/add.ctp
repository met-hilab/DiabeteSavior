<html lang="en">
<h2 class="section-title">Add Medicine</h2>
<form class="form-horizontal"role="form" action="/Medicines/add" method="post">
<!-- Text input-->
<?php
  echo $this->Html->css('bootstrap-select');
  echo $this->Html->script('bootstrap-select');
?>

<!-- Text input-->
<div class="form-group" align="center">
  <label class="col-lg-1 control-label" for="Medicine_Name">Name </label>
  <div class="col-lg-2">
    <input id="medicine_name" name="medicine_name" type="Medicine_Name" placeholder="Medicine Name" class="form-control">
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-lg-1 control-label" for="Min_dose">Min_dose</label>
  <div class="col-lg-2">
    <input id="min_dose" name="min_dose" type="Min_dose" placeholder="Min_dose" class="form-control">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Max_dose">Max_dose</label>
  <div class="col-lg-2">
    <input id="max_dose" name="max_dose" type="Max_dose" placeholder="Max_dose" class="form-control">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Metric">Metric</label>
  <div class="col-lg-2">
    <input id="metric" name="metric" type="Metric" placeholder="Metric" class="form-control">
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Hypo">Hypo</label>
  <div class="col-lg-4">
    <select id="hypo" name="hypo" class="form-control">
      <option></option>
      <option>0</option>
      <option>1</option>
	  <option>2</option>
      <option>3</option>
    </select>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Weight">Weight</label>
  <div class="col-lg-4">
    <select id="weight" name="weight" class="form-control">
      <option></option>
      <option>0</option>
      <option>1</option>
	  <option>2</option>
      <option>3</option>
    </select>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Renal_gu">Renal_gu</label>
  <div class="col-lg-4">
    <select id="renal_gu" name="renal_gu" class="form-control">
      <option></option>
      <option>0</option>
      <option>1</option>
	  <option>2</option>
      <option>3</option>
    </select>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Gi_sx">Gi_sx</label>
  <div class="col-lg-4">
    <select id="gi_sx" name="gi_sx" class="form-control">
      <option></option>
      <option>0</option>
      <option>1</option>
	  <option>2</option>
      <option>3</option>
    </select>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Chf">Chf</label>
  <div class="col-lg-4">
    <select id="chf" name="chf" class="form-control">
      <option></option>
      <option>0</option>
      <option>1</option>
	  <option>2</option>
      <option>3</option>
    </select>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Cvd">Cvd</label>
  <div class="col-lg-4">
    <select id="cvd" name="cvd" class="form-control">
      <option></option>
      <option>0</option>
      <option>1</option>
	  <option>2</option>
      <option>3</option>
    </select>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Bone">Bone</label>
  <div class="col-lg-4">
    <select id="bone" name="bone" class="form-control">
      <option></option>
      <option>0</option>
      <option>1</option>
	  <option>2</option>
      <option>3</option>
    </select>
  </div>
</div>


<!-- Button -->
<div class="control-group">
  <label class="col-lg-1 control-label" for="singlebutton"></label>
  <div class="col-lg-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
</div>

<!-- Form Name</fieldset>
</form--->

