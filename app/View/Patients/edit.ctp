<!-- <link href="/css/Update.css" rel="stylesheet" type="text/css" /> -->

<div class="tail-right">
 <div class="wrapper">
  <div class="col-1">
   <div class="indent">
     <h2 class="section-title">Update Patient</h2>
     <form class="form-horizontal" role="form" action="/patients/edit" method="post">
      <div style="display:none">
        <input id="" name="['Patient']['patient_number']" type="hidden" value="<?php echo $patient['Patient']['patient_number'] ?>">
      </div>
      <fieldset>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Patient_Name">Name</label>
        <div class="col-lg-2">

          <input id="Update_Name" name="Update_FirstName" type="Patient_FirstName" placeholder="First Name" class="form-control" value="<?php echo $patient['Patient']['patient_firstname'] ?>">   
        </div>
        <div class="col-lg-2">
          <input id="Update_MiddleName1" name="Update_MiddleName" type="Patient_MiddleName" placeholder="Middle Name" class="form-control" value="<?php echo $patient['Patient']['patient_middlename'] ?>">   
        </div>
        <div class="col-lg-2">
          <input id="Update_LastName1" name="Update_LastName" type="Patient_LastName" placeholder="Last Name" class="form-control"  value="<?php echo $patient['Patient']['patient_lastname'] ?>">   
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Birthday">Birthday</label>
        <div class="col-lg-4">
          <input id="Update_Birthday" name="Update_Birthday" type="text" class="form-control" onClick="getDateString(this, oCalendarEn)" value="<?php echo $patient['Patient']['dob'] ?>">   
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Gender">Gender</label>
        <div class="col-lg-4">
          <select id="Update_Gender" name="Update_Gender" class="form-control">
            <option> <?php echo $patient['Patient']['gender']?></option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Occupation">Occupation</label>
        <div class="col-lg-4">
          <input id="Update_Occupation" name="Update_Occupation" type="text" placeholder="Occupation" class="form-control" value="<?php echo $patient['Patient']['occupation'] ?>">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Race">Race</label>
        <div class="col-lg-4">

 <select id="race" name="race" class="form-control">
     
<option> <?php echo $patient['Patient']['race']?></option>
      <option>African or African American</option>
      <option>Asian or Asian American</option>
      <option>Caucasian or European American</option>
      <option>Native American or Native Alaskan</option>
      <option>Other Race</option>
 </select>

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Street">Address</label>
        <div class="col-lg-4">
          <input id="Update_Street" name="Update_Street" type="text" placeholder="Street Address" class="form-control" value="<?php echo $patient['Patient']['street'] ?>">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_City">City</label>
        <div class="col-lg-4">
          <input id="UpdatePatient_City" name="Update_City" type="text" placeholder="City Name" class="form-control" value="<?php echo $patient['Patient']['city'] ?>">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_State">State</label>
        <div class="col-lg-4">
          <input id="Update_State" name="Update_State" type="text" placeholder="State Name" class="form-control" value="<?php echo $patient['Patient']['state'] ?>">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_ZIP">ZIP</label>
        <div class="col-lg-4">
          <input id="Update_ZIP" name="Update_ZIP" type="text" placeholder="Zipcode" class="form-control" value="<?php echo $patient['Patient']['postal_code'] ?>">

        </div>
      </div>



      <div class="control-group">
        <label class="col-lg-1 control-label" for="singlebutton"></label>
        <div class="col-lg-4">
          <button id="UpdatePatient" name="UpdatePatient" class="btn btn-primary">Update</button>
        </div>
      </div>


    </fieldset>
  </form>
</div>
</div>
<!--<div class="col-2">
 <ul>
  <li><img src="images/m1mx5bga327j_sqr256.jpg" /></li>
  <li><input id="Submit1" type="submit" value="upload" /> </li>

  <li><strong><a href="#">Appoint History</a></strong>82.29.2013</li>
</ul>
</div>-->
</div>
</div>
