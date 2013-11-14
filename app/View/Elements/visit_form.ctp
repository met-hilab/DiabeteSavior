

<?php
$inputDefaults = array(
  'format' => array('div', 'label', 'between', 'input', 'after'),
  'div' => array('class' => 'form-group'),
  'label' => array('class' => 'col-lg-2 control-label'),
  'between' => '<div class="col-lg-4">',
  'after' => '</div>'
);
$formDefaults = array(
  'inputDefaults' => $inputDefaults
);
?>
<?php echo $this->Html->script('visit-form'); ?>
<?php echo $this->Form->create('Visit', $formDefaults); ?>

<!-- medhistory_complaints -->
<h3>Medical History and Complaints</h3>
<?php echo $this->Form->hidden('MedhistoryComplaint.id') ?>
<?php echo $this->Form->input('MedhistoryComplaint.complaints', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Chief Complaint'))) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.hypo',array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Hypoglycemia')) ) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.weight_gain', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Weight gain'))) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.renal_gu', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Renal or Genitourinary symptoms'))) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.gi_sx', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Gastrointestinal symptoms'))) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.chf', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Coronary heart disease'))) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.cvd', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Cardiovascular disease'))) ?>
<?php echo $this->Form->bootstrapRadioYesNo('MedhistoryComplaint.bone', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Osteoporosis'))) ?>

<hr>
<!-- drug_allergies -->
<h3>Drug Allergies and Contraindications</h3>
<?php echo $this->Form->hidden('DrugAllergy.id') ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.met', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Metformin'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.dpp_4i', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Dipeptidyl peptidase 4 inhibitors (DPP-4)'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.glp_1ra', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Glucagon-like peptide-1 receptor agonists (GLP-1)'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.tzd', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Thiazolidinediones (TZD)'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.agi', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Alpha-glucosidase inhibitors (AGIs)'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.colsvl', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Colesevelam'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.bcr_or', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Bromocriptine Mesylate'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.su_gln', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Sulfonylurea (SFU) and Glinides'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.insulin', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Insulin'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.sglt_2', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Sodium-glucose co-transporter 2 inhibitors (SGLT2)'))) ?>
<?php echo $this->Form->bootstrapRadioYesNoUnknow('DrugAllergy.praml', array('label' => array('class' => 'col-lg-3 control-label', 'text' => '<font color="red">* </font>Pramlintide'))) ?>

<hr>

<!-- Vitals and Lab Results -->
<h3>Vitals and Labs</h3>
<div class="form-group">
  <label class="col-lg-2 control-label">Unit type</label>
  <div class="btn-group">
    <a href="#" class="btn btn-primary switch-unit" data-unit='imperial'>lbs / ft</a>
    <a href="#" class="btn btn-default switch-unit" data-unit='metric'>kg / cm</a>
  </div>
</div>
<?php echo $this->Form->input('VitalsLab.f_weight', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red">* </font>Weight'), 'type' => 'text')) ?>
<?php echo $this->Form->input('VitalsLab.f_height', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red">* </font>Height'), 'type' => 'text')) ?>
<?php echo $this->Form->hidden('VitalsLab.weight') ?>
<?php echo $this->Form->hidden('VitalsLab.height') ?>
<?php echo $this->Form->input('VitalsLab.A1c', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red">* </font>Glycated hemoglobin (A1C)'))) ?>
<?php echo $this->Form->input('VitalsLab.bps', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red">* </font>Systolic Blood Pressure'))) ?>
<?php echo $this->Form->input('VitalsLab.bpd', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red">* </font>Diastolic Blood Pressure'))) ?>

<!--
<?php echo $this->Form->input('VitalsLab.eGFR') ?>
-->

<?php echo $this->Form->input('VitalsLab.notes') ?>

<hr>

<!-- treatments -->
<h3>Therapy Goals</h3>
<?php echo $this->Form->hidden('Treatment.id') ?>
<?php echo $this->Form->input('Treatment.a1c_goal', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red">* </font>Glycated hemoglobin (A1C) Goal'))) ?>
<?php echo $this->Form->input('Treatment.f_weight_goal', array('label' => array('class' => 'col-lg-2 control-label', 'text' => '<font color="red">* </font>Weight Goal'))) ?>
<?php echo $this->Form->hidden('Treatment.weight_goal') ?>

<hr>

<div class="form-group">
  <label class="col-lg-1 control-label"></label>
  <div class="col-lg-4">
    <?php echo $this->Form->submit('Save'); ?>
  </div>
</div>
<?php echo $this->Form->end(); ?>