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

          <input id="Update_Name" name="patient_firstname" type="text" placeholder="First Name" class="form-control" value="<?php echo $patient['Patient']['patient_firstname'] ?>">   
        </div>
        <div class="col-lg-2">
          <input id="Update_MiddleName1" name="patient_middlename" type="Patient_MiddleName" placeholder="Middle Name" class="form-control" value="<?php echo $patient['Patient']['patient_middlename'] ?>">   
        </div>
        <div class="col-lg-2">
          <input id="Update_LastName1" name="patient_lastname" type="Patient_LastName" placeholder="Last Name" class="form-control"  value="<?php echo $patient['Patient']['patient_lastname'] ?>">   
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Birthday">Birthday</label>
        <div class="col-lg-4">
          <input id="Update_Birthday" name="dob" type="text" class="form-control" onClick="getDateString(this, oCalendarEn)" value="<?php echo $patient['Patient']['dob'] ?>">   
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Gender">Gender</label>
        <div class="col-lg-4">
          <select id="Update_Gender" name="gender" class="form-control">
            <option> <?php echo $patient['Patient']['gender']?></option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Occupation">Occupation</label>
        <div class="col-lg-4">
          <input id="Update_Occupation" name="occupation" type="text" placeholder="Occupation" class="form-control" value="<?php echo $patient['Patient']['occupation'] ?>">

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
          <input id="Update_Street" name="street" type="text" placeholder="Street Address" class="form-control" value="<?php echo $patient['Patient']['street'] ?>">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_City">City</label>
        <div class="col-lg-4">
          <input id="UpdatePatient_City" name="city" type="text" placeholder="City Name" class="form-control" value="<?php echo $patient['Patient']['city'] ?>">

        </div>
      </div>



      <div class="form-group">
  <label class="col-lg-1 control-label" for="state">State</label>
  <div class="col-lg-4">
    <select id="state" name="state" class="form-control">
      <option > <?php echo $patient['Patient']['state'] ?> </option>
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


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_ZIP">ZIP</label>
        <div class="col-lg-4">
          <input id="Update_ZIP" name="postal_code" type="text" placeholder="Zipcode" class="form-control" value="<?php echo $patient['Patient']['postal_code'] ?>">

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
