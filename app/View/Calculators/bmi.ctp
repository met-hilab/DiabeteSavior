<h2 class="section-title">Body Mass Index (BMI)</h2>

<?php
echo $this->Html->script('bmi');
?>

<p>
BMI is used for assessment of obesity-related risk for heart disease, diabetes, osteoarthritis, cancer, sleep apnea, abdominal hernias, varicose veins, gout, gall bladder disease, respiratory problems, and liver malfunction. The increased risk for these diseases and conditions are calculated by observing population. BMI is not a very precise measure-there are differences in definition of BMI in different populations, and also between individuals. Nevertheless, BMI is broadly used. It is often combined with the measurement of waist circumference or waist-to-height ratio.
</p>

<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr> 
<p>Population : <select id="pop" name="pop">
<option value="US/European">US/European</option>
<option value="Asian">Asian</option>
Height = </select></p><p>Height = &nbsp; &nbsp; &nbsp;<input id="value1" name="value1" value="" type="text">&nbsp;<select id="height" name="height" onchange="document.all.weight.options[this.selectedIndex].selected=true;">
<option value="Inch">Inch</option>
<option value="Cm">Cm</option>
</select>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;BMI = Weight(kg) / Height<sup>2</sup>(m)</p><p>Weight = &nbsp; &nbsp;&nbsp;<input id="value2" name="value2" value="" type="text">
        <select name="weight" id="weight" onchange="document.all.height.options[this.selectedIndex].selected=true;">
<option value="Lb">Lb</option>
<option value="Kg">Kg</option>
</select>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;BMI = 703&nbsp;* &nbsp;Weight(lb) / Height<sup>2</sup>(inch)</p><p></p><p><input name="Sumbit" value="Calcuate" onclick="addNumbers();classification();" type="button"><p>&nbsp;BMI : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="answer" name="answer" value="" type="text"></p><p><a href="#table1">Weight Classification </a>:<input id="Cate" name="answer" value="" type="text"></p><p>Obesity Class : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="obclass" name="answer" value="" type="text"></p>
<div>&nbsp;</div><div>&nbsp;</div><div><p>Gender : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<select id="sex" name="sex">
<option value="men">Male</option>
<option value="women">Female</option>
</select>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Waist Circumference :&nbsp;<input id="waist" name="value4" value="" type="text">&nbsp;<select id="unit" name="unit">
<option value="in">In</option>
<option value="cm">Cm</option>
</select></p>
<p><input name="Sumbit" value="Calcuate" onclick="classification2();" type="button"></p><a href="#table2">&nbsp;Disease Risk</a><span style="font-size:9.0pt;font-family:&quot;Segoe UI&quot;,&quot;sans-serif&quot;">*</span> : <input id="answer2" name="answer2" value="" type="text">






<div>&nbsp;</div><div><span style="font-size: 9pt; font-family: &quot;Segoe UI&quot;,&quot;sans-serif&quot;;">* Disease risk for type 2 diabetes, hypertension, and cardiovascular diseases</span></div><div>&nbsp;</div><p class="MsoNormal" style="margin: 0px; font-size: 14px; line-height: normal; ">
<div><font style="font-size: 12px; " face="arial, helvetica, sans-serif">Reference:</font></span></p><p class="MsoNormal" style="margin: 0px; font-size: 14px; line-height: normal; ">&nbsp;</p><font style="font-size: 12px; " face="arial, helvetica, sans-serif"><span style="font-size: 10pt; line-height: normal; ">US Department of Health and Human Services, Public Health Service, National Institutes of Health (HHLBI). The Practical Guide: Identification, Evaluation, and Treatment of Overweight and Obesity in Adults. Washington NIH Pub. no. 00-4084 2000.</span></font></div>
<div id="table1"><img src="<?php echo $this->webroot; ?>/img/table2.png"></div>
<div id="table2"><img src="<?php echo $this->webroot; ?>/img/table.png" ></div><span style="font-size: 11pt; "></div>
</table>

<!--
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Population</label>
    <div class="col-lg-10">
      <div class="btn-group">
        <button type="button" class="btn btn-default col-lg-x">US/European</button>
        <button type="button" class="btn btn-default col-lg-x">Asian</button>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Unit</label>
    <div class="col-lg-10">
      <div class="btn-group">
        <button type="button" class="btn btn-default col-lg-x">Inch/Lb</button>
        <button type="button" class="btn btn-default col-lg-x">Cm/Kg</button>
      </div>
    </div>
    
  </div>

  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Height</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="inputPassword1" placeholder="Height">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Weight</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="inputPassword1" placeholder="Weight">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Do the math</button>
    </div>
  </div>
</form>
-->
