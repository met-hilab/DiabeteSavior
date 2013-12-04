<?php echo $this->Form->create('Patient'); ?>
<div class="form-group">
  <?php echo $this->Form->label('patient_firstname', '<font color="red">* </font>Name', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-2">
    <?php echo $this->Form->input('patient_firstname', array('div' => false, 'label' => false)); ?>
  </div>
  <div class="col-lg-2">
    <?php echo $this->Form->input('patient_middlename', array('div' => false, 'label' => false)); ?>
  </div>
  <div class="col-lg-2">
    <?php echo $this->Form->input('patient_lastname', array('div' => false, 'label' => false)); ?>
  </div>
</div>
<div class="form-group">
  <?php echo $this->Form->label('dob', '<font color="red">* </font>DOB', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->date('dob', array('div' => false, 'label' => false, 'placeholder' => "MM-DD-YYYY" )); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('occupation', null, array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('occupation', array('div' => false, 'label' => false)); ?>
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

<div class="form-group">
  <?php echo $this->Form->label('race', '<font color="red">* </font>Race', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $raceOptions = array(
      'African or African American' => 'African or African American',
      'Asian or Asian American' => 'Asian or Asian American',
      'Caucasian or European American' => 'Caucasian or European American',
      'Native American or Native Alaskan' => 'Native American or Native Alaskan',
      'Other Race' => 'Other Race'
      )
    ?>
    <?php echo $this->Form->select('race', $raceOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('street', 'Address', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('street', array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('city', null, array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('city', array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('state', null, array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $stateOptions = array(
      'Alabama' => 'Alabama',
      'Alaska' => 'Alaska',
      'Arizona' => 'Arizona',
      'Arkansas' => 'Arkansas',
      'California' => 'California',
      'Colorado' => 'Colorado',
      'Connecticut' => 'Connecticut',
      'Delaware' => 'Delaware',
      'Florida' => 'Florida',
      'Georgia' => 'Georgia',
      'Hawaii' => 'Hawaii',
      'Idaho' => 'Idaho',
      'Illinois' => 'Illinois',
      'Indiana' => 'Indiana',
      'Iowa' => 'Iowa',
      'Kansas' => 'Kansas',
      'Kentucky' => 'Kentucky',
      'Louisiana' => 'Louisiana',
      'Maine' => 'Maine',
      'Maryland' => 'Maryland',
      'Massachusetts' => 'Massachusetts',
      'Michigan' => 'Michigan',
      'Minnesota' => 'Minnesota',
      'Mississippi' => 'Mississippi',
      'Missouri' => 'Missouri',
      'Montana' => 'Montana',
      'Nebraska' => 'Nebraska',
      'Nevada' => 'Nevada',
      'New Hampshire' => 'New Hampshire',
      'New Jersey' => 'New Jersey',
      'New Mexico' => 'New Mexico',
      'New York' => 'New York',
      'North Carolina' => 'North Carolina',
      'North Dakota' => 'North Dakota',
      'Ohio' => 'Ohio',
      'Oklahoma' => 'Oklahoma',
      'Oregon' => 'Oregon',
      'Pennsylvania' => 'Pennsylvania',
      'Rhode Island' => 'Rhode Island',
      'South Carolina' => 'South Carolina',
      'South Dakota' => 'South Dakota',
      'Tennessee' => 'Tennessee',
      'Texas' => 'Texas',
      'Utah' => 'Utah',
      'Vermont' => 'Vermont',
      'Virginia' => 'Virginia',
      'Washington' => 'Washington',
      'West Virginia' => 'West Virginia',
      'Wisconsin' => 'Wisconsin',
      'Wyoming' => 'Wyoming'
      )
    ?>
    <?php echo $this->Form->select('state', $stateOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('postal_code', 'ZIP', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('postal_code', array('div' => false, 'label' => false, 'placeholder' => 'Zipcode')); ?>
  </div>
</div>

<div class="control-group">
  <label class="col-lg-1 control-label"></label>
  <div class="col-lg-4">
    <?php echo $this->Form->submit('Submit'); ?>
  </div>
</div>

<?php echo $this->Form->end(); ?>


<!-- Load jQuery and the validate plugin -->



  <!-- jQuery Form Validation code -->
<!--
  <script type="text/javascript">

  // When the browser is ready...
  $(function() {

    // Setup form validation on the #add_patient element
    $("#add_patient").validate({

        // Specify the validation rules
        rules: {
            patient_firstname: "required",
            patient_lastname: "required",
            dob:"required",
            gender: "required",
            race: "required"

        },

        // Specify the validation error messages
        messages: {
            patient_firstname: "Please enter your first name",
            patient_lastname: "Please enter you last name",
            dob:"Please enter your birthdate",
            gender: "Please specify your gender",
            race: "Please specify your race"

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });

  </script>
  -->