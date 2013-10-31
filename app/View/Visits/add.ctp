<h2>Add Visit</h2>
<!-- Load jQuery and the validate plugin -->
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
  <script type="text/javascript">
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #add_patient element
    $("#add_visit").validate({
    
        // Specify the validation rules
        rules: {
            weight: "required",
            height: "required",
            
            
        },
        
        // Specify the validation error messages
        messages: {
            weight: "Please enter your weight",
            height: "Please enter you height",
            
          
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
<div>
<?php
    echo "Patient ID: ".$patient['Patient']['patient_number']."<br>";
    echo "First Name: ".$patient['Patient']['patient_firstname']."<br>";
    echo "Last Name: ".$patient['Patient']['patient_lastname']."<br>";
    echo "DOB: ".$patient['Patient']['dob']."<br>";
?>
</div>
                      
<hr>

<form id="add_visit" class="form-horizontal" role="form" action="/visits/add" method="post">
<?php
  echo $this->Html->css('bootstrap-select');
  echo $this->Html->script('bootstrap-select');
?>

<!-- vitals_labs -->
<h3>Vitals and Labs</h3>
<div class="form-group">
  <label class="col-lg-1 control-label" for="weight"><font color="red">* </font>Weight</label>
  <div class="col-lg-4">
    <input id="weight" name="weight" type="text" placeholder="weight" class="">
    <select name="weight_units" id="weight_units" onchange="document.all.height_units.options[this.selectedIndex].selected=true;">
        <option value="Lb">Lb</option>
        <option value="Kg">Kg</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="height"><font color="red">* </font>Height</label>
  <div class="col-lg-4">
    <input id="height" name="height" type="text" placeholder="height" class="">
    <select id="height_units" name="height_units" onchange="document.all.weight_units.options[this.selectedIndex].selected=true;">
        <option value="Inch">Inch</option>
        <option value="Cm">Cm</option>
    </select> 
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="A1c"><font color="red">* </font>A1c</label>
  <div class="col-lg-4">
    <input id="A1c" name="A1c" type="text" placeholder="A1c" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="bps"><font color="red">* </font>bps</label>
  <div class="col-lg-4">
    <input id="bps" name="bps" type="text" placeholder="bps" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="bpd"><font color="red">* </font>bpd</label>
  <div class="col-lg-4">
    <input id="bpd" name="bpd" type="text" placeholder="bpd" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="eGFR">eGFR</label>
  <div class="col-lg-4">
    <input id="eGFR" name="eGFR" type="text" placeholder="eGFR" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="notes">Notes</label>
  <div class="col-lg-4">
    <input id="notes" name="notes" type="textarea" placeholder="notes" class="form-control">   
  </div>
</div>

<hr>

<!-- treatments -->
<h3>Therapy Goals</h3>
<div class="form-group">
  <label class="col-lg-1 control-label" for="a1c_goal"><font color="red">* </font>A1c Goal</label>
  <div class="col-lg-4">
    <input id="a1c_goal" name="a1c_goal" type="text" placeholder="a1c_goal" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="weight_goal"><font color="red">* </font>Weight Goal</label>
  <div class="col-lg-4">
    <input id="weight_goal" name="weight_goal" type="text" placeholder="weight_goales" class="form-control">   
  </div>
</div>

<hr>

<!-- medhistory_complaints -->
<h3>Medical History and Complaints</h3>
<div class="form-group">
  <label class="col-lg-1 control-label" for="complaints"><font color="red">* </font>Chief Complaint</label>
  <div class="col-lg-4">
    <input id="complaints" name="complaints" type="textarea" placeholder="chief complaint" class="form-control"> 
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="hypo">Hypo</label>
  <div class="col-lg-4">
    <input name="hypo" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="hypo" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="weight_gain">Weight_gain</label>
  <div class="col-lg-4">
    <input name="weight_gain" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="weight_gain" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="renal_gu">Renal_gu</label>
  <div class="col-lg-4">
    <input name="renal_gu" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="renal_gu" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="gi_sx">Gi_sx</label>
  <div class="col-lg-4">
    <input name="gi_sx" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="gi_sx" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="chf">Chf</label>
  <div class="col-lg-4">
    <input name="chf" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="chf" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="cvd">Cvd</label>
  <div class="col-lg-4">
    <input name="cvd" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="cvd" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="bone">Bone</label>
  <div class="col-lg-4">
    <input name="bone" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="bone" type="radio" checked="checked" value="no">no  
  </div>
</div>

<hr>

<!-- drug_allergies -->
<h3>Drug Allergies</h3>
<div class="form-group">
  <label class="col-lg-1 control-label" for="met">Met</label>
  <div class="col-lg-4">
    <input name="met" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="met" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="dpp_4i">Dpp_4i</label>
  <div class="col-lg-4">
    <input name="dpp_4i" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="dpp_4i" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="glp_1ra">Glp_1ra</label>
  <div class="col-lg-4">
    <input name="glp_1ra" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="glp_1ra" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="tzd">Tzd</label>
  <div class="col-lg-4">
    <input name="tzd" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="tzd" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="agi">Agi</label>
  <div class="col-lg-4">
    <input name="agi" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="agi" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="colsvl">Colsvl</label>
  <div class="col-lg-4">
    <input name="colsvl" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="colsvl" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="bcr_or">Bcr_or</label>
  <div class="col-lg-4">
    <input name="bcr_or" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="bcr_or" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="su_gln">Su_gln</label>
  <div class="col-lg-4">
    <input name="su_gln" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="su_gln" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="insulin">Insulin</label>
  <div class="col-lg-4">
    <input name="insulin" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="insulin" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="sglt_2">Sglt_2</label>
  <div class="col-lg-4">
    <input name="sglt_2" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="sglt_2" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="praml">Praml</label>
  <div class="col-lg-4">
    <input name="praml" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="praml" type="radio" checked="checked" value="no">no  
  </div>
</div>

<div class="control-group">
  <label class="col-lg-1 control-label" for="singlebutton"></label>
  <div class="col-lg-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
  </div>
</div>
</form>
<br/>
<br/>