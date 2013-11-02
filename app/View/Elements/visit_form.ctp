<div class="form-group">
  <label class="col-lg-1 control-label">Unit type</label>
  <div class="btn-group">
    <a href="#" class="btn btn-primary switch-unit" data-unit='imperial'>lbs / ft</a>
    <a href="#" class="btn btn-default switch-unit" data-unit='metric'>kg / m</a>
  </div>
</div>

<?php
$inputDefaults = array(
  'format' => array('div', 'label', 'between', 'input', 'after'),
  'div' => array('class' => 'form-group'),
  'label' => array('class' => 'col-lg-1 control-label'),
  'between' => '<div class="col-lg-4">',
  'after' => '</div>'
);
$formDefaults = array(
  'inputDefaults' => $inputDefaults
);
?>
<?php echo $this->Html->script('visit-form'); ?>
<?php echo $this->Form->create('Visit', $formDefaults); ?>
<h3>Vitals and Labs</h3>
<?php echo $this->Form->input('VitalsLab.f_weight', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Weight'), 'type' => 'text')) ?>
<?php echo $this->Form->input('VitalsLab.f_height', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Height'), 'type' => 'text')) ?>
<?php echo $this->Form->hidden('VitalsLab.weight') ?>
<?php echo $this->Form->hidden('VitalsLab.height') ?>
<?php echo $this->Form->input('VitalsLab.A1c', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>A1C'))) ?>
<?php echo $this->Form->input('VitalsLab.bps', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>BPS'))) ?>
<?php echo $this->Form->input('VitalsLab.bpd', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>BPD'))) ?>
<?php echo $this->Form->input('VitalsLab.eGFR') ?>
<?php echo $this->Form->input('VitalsLab.notes') ?>

<hr>
<!-- treatments -->
<h3>Therapy Goals</h3>
<?php echo $this->Form->hidden('Treatment.id') ?>
<?php echo $this->Form->input('Treatment.a1c_goal', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>A1C Goal'))) ?>
<?php echo $this->Form->input('Treatment.f_weight_goal', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Weight Goal'))) ?>
<?php echo $this->Form->hidden('Treatment.weight_goal') ?>
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
<?php echo $this->Form->hidden('DrugAllergy.id') ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.met', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.dpp_4i', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.glp_1ra', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.tzd', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.agi', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.colsvl', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.bcr_or', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.su_gln', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.insulin', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.sglt_2', $inputDefaults) ?>
<?php echo $this->Form->bootstrapRadioYesNo('DrugAllergy.praml', $inputDefaults) ?>


<div class="form-group">
  <label class="col-lg-1 control-label"></label>
  <div class="col-lg-4">
    <?php echo $this->Form->submit('Save'); ?>
  </div>
</div>
<?php echo $this->Form->end(); ?>