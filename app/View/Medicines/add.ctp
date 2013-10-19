<html lang="en">
<h2 class="section-title">Add Medicine</h2>
<form class="form-horizontal"role="form" action="/Medicines/add" method="post">
<!-- Text input-->
<?php
  echo $this->Html->css('bootstrap-select');
  echo $this->Html->script('bootstrap-select');
?>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Medicine_Name">Medicine_Name</label>
  <div class="col-lg-2">
    <input id="Medicine_Name" name="Medicine_Name" type="Medicine_Name" placeholder="Medicine Name" class="form-control">   
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-lg-1 control-label" for="Min_dose">Min_dose</label>
  <div class="col-lg-2">
    <input id="Min_dose" name="Min_dose" type="Min_dose" placeholder="Min_dose" class="form-control">   
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Max_dose">Max_dose</label>
  <div class="col-lg-2">
    <input id="Max_dose" name="Max_dose" type="Max_dose" placeholder="Max_dose" class="form-control">   
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Metric">Metric</label>
  <div class="col-lg-2">
    <input id="Metric" name="Metric" type="Metric" placeholder="Metric" class="form-control">   
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Hypo">Hypo</label>
  <div class="col-lg-4">
    <select id="Hypo" name="Hypo" class="form-control">
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
    <select id="Weight" name="Weight" class="form-control">
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
    <select id="Renal_gu" name="Renal_gu" class="form-control">
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
    <select id="Gi_sx" name="Gi_sx" class="form-control">
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
    <select id="Chf" name="Chf" class="form-control">
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
    <select id="Cvd" name="Cvd" class="form-control">
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
    <select id="Bone" name="Bone" class="form-control">
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

