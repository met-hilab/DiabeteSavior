<hr>
<!-- treatments -->
<h3>Therapy Goals</h3>
<?php echo $this->Form->hidden('Treatment.id') ?>
<?php echo $this->Form->input('Treatment.a1c_goal', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>A1C Goal'))) ?>
<?php echo $this->Form->input('Treatment.weight_goal', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Weight Goal'))) ?>

<hr>
<!-- medhistory_complaints -->
<h3>Medical History and Complaints</h3>
<?php echo $this->Form->hidden('MedhistoryComplaint.id') ?>
<?php echo $this->Form->input('MedhistoryComplaint.complaints', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Chef Complaint'))) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.hypo', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.weight_gain', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.renal_gu', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.gi_sx', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.chf', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.cvd', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.bone', $inputDefaults) ?>

<hr>
<!-- drug_allergies -->
<h3>Drug Allergies</h3>
<?php echo $this->Form->hidden('DrugAllergie.id') ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.met', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.dpp_4i', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.glp_1ra', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.tzd', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.agi', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.colsvl', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.bcr_or', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.su_gln', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.insulin', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.sglt_2', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergie.praml', $inputDefaults) ?>
