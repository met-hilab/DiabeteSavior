
<h3 class="section-title">Type 2 Diabetes Risk Calculator</h3>

<?php 
echo $this->Html->script('diabetesrisk'); 
echo $this->Html->css('dbrisk');

?>

<p>The calculator below gives a score of 1 to 10 indicating the associated risk of Type 2 diabetes (10 is highest risk).  
Risk factors are based on physical activity, family history of type 2 diabetes, blood pressure, race, age, sex, 
weight and height [1].  </p>


<div id="riskmain">

<form class="form-horizontal" id="riskform" name="riskForm" method="post" action="">

<div id="risk1">	
	<div class="form-group">
		<?php echo $this->Form->bootstrapRadioYesNo('active',array('label' => array('class' => 'col-lg-7 control-label', 'text' => '<font color="red"></font>Physically Acitve?')) ) ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->bootstrapRadioYesNo('history',array('label' => array('class' => 'col-lg-7 control-label', 'text' => '<font color="red"></font>Family History of Type 2 Diabetes?')) ) ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->bootstrapRadioYesNo('highBP',array('label' => array('class' => 'col-lg-7 control-label', 'text' => '<font color="red"></font>High Blood Pressure?')) ) ?>
	</div>
</div>

<div id="risk2">
	<div class="form-group">
	  <?php echo $this->Form->label('race', '<font color="red"></font>Race', array('class' => 'col-lg-1 control-label')); ?>
	  <div class="col-lg-12">
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
	  <?php echo $this->Form->label('age', '<font color="red"></font>Age', array('class' => 'col-lg-1 control-label')); ?>
	  <div class="col-lg-12">
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
	  <?php echo $this->Form->label('gender', '<font color="red"></font>Sex', array('class' => 'col-lg-1 control-label')); ?>
	  <div class="col-lg-12">
	    <?php
	      $genderOptions = array(
	        'Male' => 'Male',
	        'Female' => 'Female'
	      )
	    ?>
	    <?php echo $this->Form->select('gender', $genderOptions, array('div' => false, 'label' => false)); ?>
	  </div>
	</div>
</div>

<div id="risk3">
	<div class="form-group">
	  <label class="col-lg-2 control-label">Units</label>
	  <div class="btn-group">
	    <a href="#" class="btn btn-primary switch-unit btnImperial" data-unit='imperial'>lbs / inch</a>
	    <a href="#" class="btn btn-default switch-unit btnMetric" data-unit='metric'>kg / cm</a>
	  </div>
	</div>
	
	<div class="form-group">
		<?php echo $this->Form->input('weight', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red"></font>Weight'), 'type' => 'text')) ?>
		<?php echo $this->Form->hidden('weight') ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('height', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red"></font>Height'), 'type' => 'text')) ?>
		<?php echo $this->Form->hidden('height') ?>
	</div>
</div>

<div id="calculate">
	<div class="form-group">
		<div style="padding-bottom:10px;">
			<a href="#" class="btn btn-primary btnCalculate"><span class=""></span>Calculate Risk</a>
		</div>
	 
		<label><input name="score" type="text"  size="55" value=""></label>
	</div>
</div>

</form>

</div>

<p>&nbsp;</p>
<p>&nbsp;</p>

<p>* Reference</p>
<p><a href="http://www.diabetes.org/assets/pdfs/at-risk/risk-test-paper-version.pdf" target="_blank">
            1. Are You at Risk for Diabetes? American Diabetes Association</a></p>

