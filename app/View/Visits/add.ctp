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
$formDefaults = array(
  'inputDefaults' => array(
    'format' => array('div', 'label', 'between', 'input', 'after'),
    'div' => array('class' => 'form-group'),
    'label' => array('class' => 'col-lg-1 control-label'),
    'between' => '<div class="col-lg-4">',
    'after' => '</div>'
  )
);
?>
<?php echo $this->Form->create('Visit', $formDefaults); ?>
<h3>Vitals and Labs</h3>
<?php echo $this->Form->input('weight', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Weight'))) ?>
<?php echo $this->Form->input('height', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Height'))) ?>
<?php echo $this->Form->input('A1c', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>A1C'))) ?>
<?php echo $this->Form->input('bps', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>BPS'))) ?>
<?php echo $this->Form->input('eGFR') ?>
<?php echo $this->Form->input('notes') ?>

<hr>
<!-- treatments -->
<h3>Therapy Goals</h3>
<?php echo $this->Form->input('Treatment.a1c_goal', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>A1C Goal'))) ?>
<?php echo $this->Form->input('Treatment.weight_goal', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Weight Goal'))) ?>

<hr>
<!-- medhistory_complaints -->
<h3>Medical History and Complaints</h3>
<?php echo $this->Form->input('MedhistoryComplaint.complaints', array('label' => array('class' => 'col-lg-1 control-label', 'text' => '<font color="red">* </font>Chef Complaint'))) ?>
<?php echo $this->Form->input('MedhistoryComplaint.hypo') ?>
<?php echo $this->Form->input('MedhistoryComplaint.weight_gain') ?>
<?php echo $this->Form->input('MedhistoryComplaint.renal_gu') ?>
<?php echo $this->Form->input('MedhistoryComplaint.gi_sx') ?>
<?php echo $this->Form->input('MedhistoryComplaint.chf') ?>
<?php echo $this->Form->input('MedhistoryComplaint.cvd') ?>
<?php echo $this->Form->input('MedhistoryComplaint.bone') ?>

<hr>
<!-- drug_allergies -->
<h3>Drug Allergies</h3>
<?php echo $this->Form->input('DrugAllergie.met') ?>
<?php echo $this->Form->input('DrugAllergie.dpp_4i') ?>
<?php echo $this->Form->input('DrugAllergie.glp_1ra') ?>
<?php echo $this->Form->input('DrugAllergie.tzd') ?>
<?php echo $this->Form->input('DrugAllergie.agi') ?>
<?php echo $this->Form->input('DrugAllergie.colsvl') ?>
<?php echo $this->Form->input('DrugAllergie.bcr_or') ?>
<?php echo $this->Form->input('DrugAllergie.su_gln') ?>
<?php echo $this->Form->input('DrugAllergie.insulin') ?>
<?php echo $this->Form->input('DrugAllergie.sglt_2') ?>
<?php echo $this->Form->input('DrugAllergie.praml') ?>

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
