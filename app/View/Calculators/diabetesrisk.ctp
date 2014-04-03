
<h3 class="section-title">Type 2 Diabetes Risk Calculator</h3>

<?php 
echo $this->Html->script('diabetesrisk'); 
?>

<p>This calculator generates a score of 1 to 10 indicating the associated risk (10 is highest) of Type 2 diabetes based on 
the selected risk factors below[1].  </p>

<p>&nbsp;</p>

<hr>

<form id="riskform" name="riskForm" method="post" action="">

<div class="form-group">
		<?php echo $this->Form->bootstrapRadioYesNo('active',array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Physically Acitve?')) ) ?>
		<?php echo $this->Form->bootstrapRadioYesNo('history',array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Family History of Type 2 Diabetes?')) ) ?>
		<?php echo $this->Form->bootstrapRadioYesNo('highBP',array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>High Blood Pressure?')) ) ?>
</div>

<hr>

<div class="form-group">
  <?php echo $this->Form->label('race', '<font color="red">* </font>Race', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $raceOptions = array(
      'African or African American' => 'African or African American',
      'Asian or Asian American' => 'Asian or Asian American',
      'Caucasian or European American' => 'Caucasian or European American',
      'Native American or Native Alaskan' => 'Native American or Native Alaskan',
      'Hispanic or Latino' => 'Hispanic or Latino',
      'Pacific Islander' => 'Pacific Islander',
      'Other Race' => 'Other Race'
      )
    ?>
    <?php echo $this->Form->select('race', $raceOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('age', '<font color="red">* </font>Age', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $ageOptions = array(
        '<40' => 'Less than 40 Years',
        '40-49' => '40-49 Years',
        '50-59' => '50-59 Years',
        '60+' => '60+ Years'
      )
    ?>
    <?php echo $this->Form->select('age', $ageOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('gender', '<font color="red">* </font>Gender', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $genderOptions = array(
        'Male' => 'Male',
        'Female' => 'Female'
      )
    ?>
    <?php echo $this->Form->select('gender', $genderOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<hr>

<div class="form-group">
  <?php echo $this->Form->label('height', '<font color="red">* </font>Height', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $heightOptions = array(
        '4ft 10in (147cm)' => '4ft 10in (147cm)',
        '4ft 11in (150cm)' => '4ft 11in  (150cm)',
        '5ft 0in (152cm)' => '5ft 0in  (152cm)',
        '5ft 1in (155cm)' => '5ft 1in  (155cm)',
        '5ft 2in (157cm)' => '5ft 2in  (157cm)',
        '5ft 3in (160cm)' => '5ft 3in (160cm)',
        '5ft 4in (163cm)' => '5ft 4in  (163cm)',
        '5ft 5in (165cm)' => '5ft 5in (165cm)',
        '5ft 6in (168cm)' => '5ft 6in (168cm)',
        '5ft 7in (170cm)' => '5ft 7in (170cm)',
        '5ft 8in (173cm)' => '5ft 8in (173cm)',
        '5ft 9in (175cm)' => '5ft 9in (175cm)',
        '5ft 10in (178cm)' => '5ft 10in (178cm)',
        '5ft 11in (180cm)' => '5ft 11in (180cm)',
        '6ft 0in (183cm)' => '6ft 0in  (183cm)',
        '6ft 1in (185cm)' => '6ft 1in  (185cm)',
        '6ft 2in (188cm)' => '6ft 2in  (188cm)',
        '6ft 3in (191cm)' => '6ft 3in (191cm)',
        '6ft 4in (193cm)' => '6ft 4in  (193cm)'
      )
    ?>
    <?php echo $this->Form->select('height', $heightOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>


<div class="form-group">
  <?php echo $this->Form->label('weight', '<font color="red">* </font>Weight', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $weightOptions = array(
        '< 179 lbs' => 'less than 179 lbs ( < 81 kg)',
        '179 - 214 lbs' => '179 - 214 lbs (81 - 97 kg)',
        '215 - 285 lbs' => '215 - 285 lbs (98 - 129 kg)',
        'More than 285 lbs' => '285+ lbs (285+ kg)'
      )
    ?>
    <?php echo $this->Form->select('age', $weightOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<hr>


<div style="padding-bottom:10px;">
	<a href="#" class="btn btn-primary btnCalculate" style="padding-left:5px;"><span class="">
		</span>Calculate Risk</a>
</div>

<!--

Don't bind event in DOM, this is a bad practice 
http://stackoverflow.com/questions/6941483/onclick-vs-event-handler
<button onclick="calcRisk()" class="btnCalculate">Calculate Risk</button>
Give it a class or id and bind the event in JS script.
In this case, I use "btnCalculate" class to find the button and link to trigger the event handler.
-->
<button class="btnCalculate">Calculate Risk</button>

<h1>Risk Score: </h1> 
<input name="score" type="number" value="">

</form>

<p>&nbsp;</p>
<p>&nbsp;</p>

<p>* Reference</p>
<p><a href="http://www.diabetes.org/assets/pdfs/at-risk/risk-test-paper-version.pdf" target="_blank">
            1. Are You at Risk for Diabetes? American Diabetes Association</a></p>

