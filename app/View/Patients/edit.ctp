<!-- <link href="/css/Update.css" rel="stylesheet" type="text/css" /> -->

<div class="tail-right">
 <div class="wrapper">
  <div class="col-1">
   <div class="indent">
     <h2 class="section-title">Update Patient</h2>
     <form class="form-horizontal" role="form" action="/patients/edit" method="post">
      <fieldset>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Patient_Name">Name</label>
        <div class="col-lg-2">

          <input id="Update_Name" name="Update_FirstName" type="Patient_FirstName" placeholder="First Name" class="form-control" value="<?php echo $patient['Patient']['patient_firstname'] ?>">   
        </div>
        <div class="col-lg-2">
          <input id="Update_MiddleName1" name="Update_MiddleName" type="Patient_MiddleName" placeholder="Middle Name" class="form-control">   
        </div>
        <div class="col-lg-2">
          <input id="Update_LastName1" name="Update_LastName" type="Patient_LastName" placeholder="Last Name" class="form-control">   
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Birthday">Birthday</label>
        <div class="col-lg-4">
          <input id="Update_Birthday" name="Update_Birthday" type="text" class="form-control" onClick="getDateString(this, oCalendarEn)" value="MM / DD / YYYY">   
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Gender">Gender</label>
        <div class="col-lg-4">
          <select id="Update_Gender" name="Update_Gender" class="form-control">
            <option></option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Occupation">Occupation</label>
        <div class="col-lg-4">
          <input id="Update_Occupation" name="Update_Occupation" type="text" placeholder="Occupation" class="form-control">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Race">Race</label>
        <div class="col-lg-4">
          <select id="Update_Race" name="Update_Race" class="form-control">
            <option></option>
            <option></option>
            <option></option>

            <option></option>
          </select>
        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Street">Address</label>
        <div class="col-lg-4">
          <input id="Update_Street" name="Update_Street" type="text" placeholder="Street Address" class="form-control">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_City">City</label>
        <div class="col-lg-4">
          <input id="UpdatePatient_City" name="Update_City" type="text" placeholder="City Name" class="form-control">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_State">State</label>
        <div class="col-lg-4">
          <input id="Update_State" name="Update_State" type="text" placeholder="State Name" class="form-control">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_ZIP">ZIP</label>
        <div class="col-lg-4">
          <input id="Update_ZIP" name="Update_ZIP" type="text" placeholder="Zipcode" class="form-control">

        </div>
      </div>


      <div class="form-group">
        <label class="col-lg-1 control-label" for="Update_Country">Country</label>
        <div class="col-lg-4">
          <select id="Update_Country" name="Update_Country" class="form-control">
            <option value=""></option>
            <option value="AR">Argentina</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BA">Bosnia and Herzegovina</option>
            <option value="BR">Brazil</option>
            <option value="BG">Bulgaria</option>
            <option value="CA">Canada</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CO">Colombia</option>
            <option value="CR">Costa Rica</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DO">Dominican Republic</option>
            <option value="EG">Egypt</option>
            <option value="EE">Estonia</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="HK">Hong Kong S.A.R., China</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Laos</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MK">Macedonia</option>
            <option value="MY">Malaysia</option>
            <option value="MT">Malta</option>
            <option value="MX">Mexico</option>
            <option value="MD">Moldova</option>
            <option value="MC">Monaco</option>
            <option value="ME">Montenegro</option>
            <option value="MA">Morocco</option>
            <option value="NL">Netherlands</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="KP">North Korea</option>
            <option value="NO">Norway</option>
            <option value="PK">Pakistan</option>
            <option value="PS">Palestinian Territory</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RO">Romania</option>
            <option value="RU">Russia</option>
            <option value="SA">Saudi Arabia</option>
            <option value="RS">Serbia</option>
            <option value="SG">Singapore</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="ZA">South Africa</option>
            <option value="KR">South Korea</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="TW">Taiwan</option>
            <option value="TH">Thailand</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US">USA</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VN">Vietnam</option>
          </select>
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
<div class="col-2">
 <ul>
  <li><img src="images/m1mx5bga327j_sqr256.jpg" /></li>
  <li><input id="Submit1" type="submit" value="upload" /> </li>

  <li><strong><a href="#">Appoint History</a></strong>82.29.2013</li>
</ul>
</div>
</div>
</div>
