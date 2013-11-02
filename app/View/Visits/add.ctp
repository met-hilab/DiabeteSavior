<h2>Add Visit</h2>  

       
<h3>Demographics</h3>                  
  <table  class="table table-condensed">      
    <tr>
      <th>Patient Number: </th> 
      <td> <?php echo $patient['Patient']['patient_number']; ?> </td>
    </tr>
    <tr> 
      <th>First Name: </th>
      <td><?php echo $patient['Patient']['patient_firstname']." ";
                echo $patient['Patient']['patient_middlename']; ?></td>
    </tr>
    <tr> 
      <th>Last Name: </th>
      <td><?php echo $patient['Patient']['patient_lastname'] ?></td>
    </tr>
    <tr>
      <th>DOB: </th>
      <td><?php echo $patient['Patient']['dob']?></td>
    </tr>
  </table> 
  
<hr>
<h3>Vitals and Labs</h3> 
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
<?php echo $this->Form->bootstrapRadioYesNo('metric_system', array('Metric', 'Imperial')) ?>
<?php echo $this->Form->create('Visit', $formDefaults); ?>

<?php echo $this->Form->input('VitalsLab.weight', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Weight'))) ?>
<?php echo $this->Form->input('VitalsLab.height', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Height'))) ?>
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
