<h2>Add Visit</h2>  
  
<div>
<?php
    echo "Patient ID: ".$patient['Patient']['patient_number']."<br>";
    echo "First Name: ".$patient['Patient']['patient_firstname']."<br>";
    echo "Last Name: ".$patient['Patient']['patient_lastname']."<br>";
    echo "DOB: ".$patient['Patient']['dob']."<br>";
?>
</div>
                      
<hr>
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
<?php echo $this->Form->create('Visit', $formDefaults); ?>
<?php echo $this->Form->hidden('id') ?>
<h3>Vitals and Labs</h3>
<?php echo $this->Form->bootstrapRadioYesNo('metric_system', array('Metric', 'Imperial')) ?>
<?php echo $this->Form->input('VitalsLabs.weight', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Weight'))) ?>
<?php echo $this->Form->input('VitalsLabs.height', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Height'))) ?>
<?php echo $this->Form->input('VitalsLabs.A1c', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>A1C'))) ?>
<?php echo $this->Form->input('VitalsLabs.bps', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>BPS'))) ?>
<?php echo $this->Form->input('VitalsLabs.eGFR') ?>
<?php echo $this->Form->input('VitalsLabs.notes') ?>

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

<div class="form-group">
  <label class="col-lg-1 control-label" for="weight"></label>
  <div class="col-lg-4">
    <?php echo $this->Form->submit('Save'); ?>
  </div>
</div>
<?php echo $this->Form->end(); ?>

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
