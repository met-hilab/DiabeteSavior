<html lang="en">
<h2 class="section-title">Add Patient</h2>
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
<form id="add_patient" class="form-horizontal"role="form" action="/patients/add" method="post">
<!-- Text input-->
<?php
  echo $this->Html->css('bootstrap-select');
  echo $this->Html->script('bootstrap-select');
?>
<div class="form-group">
  <label class="col-lg-1 control-label" for="patient_firstname"><font color="red">* </font>Name</label>
  <div class="col-lg-2">
    <input id="patient_firstname" name="patient_firstname" type="Patient_FirstName" placeholder="First Name"
           class="form-control"  required="require">
  </div>
  <div class="col-lg-2">
    <input id="patient_middlename" name="patient_middlename" type="Patient_MiddleName" placeholder="Middle Name"
           class="form-control">
  </div>
  <div class="col-lg-2">
    <input id="patient_lastname" name="patient_lastname" type="Patient_LastName" placeholder="Last Name"
           class="form-control" required="require">
  </div>
  
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="dob"><font color="red">* </font>DOB</label>
  <div class="col-lg-4">
    <input id="dob" name="dob" type="date" placeholder="YYYY-MM-DD" min="1800-01-01" value="<?php echo date('Y-m-d', time() - 20 * (86400*365))?>" class="form-control" required="require">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Occupation">Occupation</label>
  <div class="col-lg-4">
    <input id="occupation" name="occupation" type="occupation" placeholder="Occupation" class="form-control">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="gender"><font color="red">* </font>Gender</label>
  <div class="col-lg-4">
    <select id="gender" name="gender" class="form-control" required="require">
      <option></option>
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="race"><font color="red">* </font>Race</label>
  <div class="col-lg-4">
    <select id="race" name="race" class="form-control" required="require">
      <option></option>
      <option>African or African American</option>
      <option>Asian or Asian American</option>
      <option>Caucasian or European American</option>
      <option>Native American or Native Alaskan</option>
      <option>Other Race</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="street">Address</label>
  <div class="col-lg-4">
    <input id="street" name="street" type="street" placeholder="Street Address" class="form-control">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="city">City</label>
  <div class="col-lg-4">
    <input id="city" name="city" type="text" placeholder="City Name" class="form-control">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="state">State</label>
  <div class="col-lg-4">
    <select id="state" name="state" class="form-control">
      <option value=""></option>
      <option value="Alabama">Alabama</option>
      <option value="Alaska">Alaska</option>
      <option value="Arizona">Arizona</option>
      <option value="Arkansas">Arkansas</option>
      <option value="California">California</option>
      <option value="Colorado">Colorado</option>
      <option value="Connecticut">Connecticut</option>
      <option value="Delaware">Delaware</option>
      <option value="Florida">Florida</option>
      <option value="Georgia">Georgia</option>
      <option value="Hawaii">Hawaii</option>
      <option value="Idaho">Idaho</option>
      <option value="Illinois">Illinois</option>
      <option value="Indiana">Indiana</option>
      <option value="Iowa">Iowa</option>
      <option value="Kansas">Kansas</option>
      <option value="Kentucky">Kentucky</option>
      <option value="Louisiana">Louisiana</option>
      <option value="Maine">Maine</option>
      <option value="Maryland">Maryland</option>
      <option value="Massachusetts">Massachusetts</option>
      <option value="Michigan">Michigan</option>
      <option value="Minnesota">Minnesota</option>
      <option value="Mississippi">Mississippi</option>
      <option value="Missouri">Missouri</option>
      <option value="Montana">Montana</option>
      <option value="Nebraska">Nebraska</option>
      <option value="Nevada">Nevada</option>
      <option value="New Hampshire">New Hampshire</option>
     <option value="New Jersey">New Jersey</option>
      <option value="New Mexico">New Mexico</option>
      <option value="New York">New York</option>
      <option value="North Carolina">North Carolina</option>
      <option value="North Dakota">North Dakota</option>
      <option value="Ohio">Ohio</option>
      <option value="Oklahoma">Oklahoma</option>
      <option value="Oregon">Oregon</option>
      <option value="Pennsylvania">Pennsylvania</option>
      <option value="Rhode Island">Rhode Island</option>
     <option value="South Carolina">South Carolina</option>
      <option value="South Dakota">South Dakota</option>
      <option value="Tennessee">Tennessee</option>
      <option value="Texas">Texas</option>
      <option value="Utah">Utah</option>
      <option value="Vermont">Vermont</option>
      <option value="Virginia">Virginia</option>
      <option value="Washington">Washington</option>
      <option value="West Virginia">West Virginia</option>
      <option value="Wisconsin">Wisconsin</option>
      <option value="Wyoming">Wyoming</option>
    </select> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="postal_code">ZIP</label>
  <div class="col-lg-4">
    <input id="postal_code" name="postal_code" type="text" placeholder="Zipcode" class="form-control">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="col-lg-1 control-label" for="singlebutton"></label>
  <div class="col-lg-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
</div>

<!-- Form Name</fieldset--->
</form>

<br />

<br />

<script>
  
  //document ready function to initialize components
  $( document ).ready(function() {
    
    //init select picker
    $('.selectpicker').selectpicker ({
      
    });
  });
  
</script>