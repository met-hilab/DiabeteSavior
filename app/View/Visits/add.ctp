<h2>Add Visit</h2>

<script language="javascript">
    function calculateBmi()
         {
            var wei = document.getElementById("weight_units");
            var hei = document.getElementById("height_units");
            var weivalue = document.getElementById("weight_units").value;
            var heivalue = document.getElementById("height_units").value;
            var val1 = document.getElementById("height").value;
            var val2 = document.getElementById("weight").value;
            var ansD = document.getElementById("bmi");
            if (heivalue == "Cm" && weivalue == "Kg"){
                ansD.value = 10000*val2/val1/val1;
            }
            if (heivalue == "Inch" && weivalue == "Lb"){
                ansD.value = 703*val2/val1/val1;
            };
        }
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

<form class="form-horizontal" role="form" action="/visits/add" method="post">
<?php
  echo $this->Html->css('bootstrap-select');
  echo $this->Html->script('bootstrap-select');
?>

<!-- vitals_labs -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="weight">weight</label>
  <div class="col-lg-4">
    <input id="weight" name="weight" type="weight" placeholder="weight" class="form-control">
    <select name="weight_units" id="weight_units" onchange="document.all.height_units.options[this.selectedIndex].selected=true;">
        <option value="Lb">Lb</option>
        <option value="Kg">Kg</option>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;
    BMI = 703&nbsp;* &nbsp;Weight(lb) / Height<sup>2</sup>(inch)
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="height">height</label>
  <div class="col-lg-4">
    <input id="height" name="height" type="height" placeholder="height" class="form-control">
    <select id="height_units" name="height_units" onchange="document.all.weight_units.options[this.selectedIndex].selected=true;">
        <option value="Inch">Inch</option>
        <option value="Cm">Cm</option>
    </select>&nbsp;&nbsp;&nbsp;&nbsp; 
    BMI = Weight(kg) / Height<sup>2</sup>(m)  
  </div>
</div>

<div>
    <input name="Sumbit" value="Calculate" onclick="calculateBmi();" type="button">
    <p>BMI&nbsp;&nbsp;&nbsp;&nbsp;<input id="bmi" name="bmi" value="" type="text"></p>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="bps">bps</label>
  <div class="col-lg-4">
    <input id="bps" name="bps" type="bps" placeholder="bps" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="bpd">bpd</label>
  <div class="col-lg-4">
    <input id="bpd" name="bpd" type="bpd" placeholder="bpd" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="A1c">A1c</label>
  <div class="col-lg-4">
    <input id="A1c" name="A1c" type="A1c" placeholder="A1c" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="eGFR">eGFR</label>
  <div class="col-lg-4">
    <input id="eGFR" name="eGFR" type="eGFR" placeholder="eGFR" class="form-control">   
  </div>
</div>

<hr>

<!-- treatments -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="a1c_goal">a1c_goal</label>
  <div class="col-lg-4">
    <input id="a1c_goal" name="a1c_goal" type="a1c_goal" placeholder="a1c_goal" class="form-control">   
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="weight_goal">weight_goal</label>
  <div class="col-lg-4">
    <input id="weight_goal" name="weight_goal" type="weight_goal" placeholder="weight_goales" class="form-control">   
  </div>
</div>

<!-- medhistory_complaints -->



<hr>

<!-- drug_allergies -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="met">met</label>
  <div class="col-lg-4">
    <input name="met" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="met" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="met">met</label>
  <div class="col-lg-4">
    <input name="met" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="met" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="met">met</label>
  <div class="col-lg-4">
    <input name="met" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="met" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="medpp_4it">dpp_4i</label>
  <div class="col-lg-4">
    <input name="dpp_4i" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="dpp_4i" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="glp_1ra">glp_1ra</label>
  <div class="col-lg-4">
    <input name="glp_1ra" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="glp_1ra" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="tzd">tzd</label>
  <div class="col-lg-4">
    <input name="tzd" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="tzd" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="agi">agi</label>
  <div class="col-lg-4">
    <input name="agi" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="agi" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="colsvl">colsvl</label>
  <div class="col-lg-4">
    <input name="colsvl" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="colsvl" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="bcr_or">bcr_or</label>
  <div class="col-lg-4">
    <input name="bcr_or" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="bcr_or" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="su_gln">su_gln</label>
  <div class="col-lg-4">
    <input name="su_gln" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="su_gln" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="insulin">insulin</label>
  <div class="col-lg-4">
    <input name="insulin" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="insulin" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="sglt_2">sglt_2</label>
  <div class="col-lg-4">
    <input name="sglt_2" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="sglt_2" type="radio" value="no">no  
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="praml">praml</label>
  <div class="col-lg-4">
    <input name="praml" type="radio" value="yes">yes&nbsp;&nbsp; 
    <input name="praml" type="radio" value="no">no  
  </div>
</div>

<hr>

<!-- diagnoses -->



<div class="control-group">
  <label class="col-lg-1 control-label" for="singlebutton"></label>
  <div class="col-lg-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
  </div>
</div>
</form>