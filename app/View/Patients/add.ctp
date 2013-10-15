<html lang="en">
<h2 class="section-title">Add Patient</h2>
<form class="form-horizontal"role="form" action="/patients/add" method="post">
<!-- Text input-->
<?php

?>
<div class="form-group">
  <label class="col-lg-1 control-label" for="patient_firstname">Name</label>
  <div class="col-lg-2">
    <input id="patient_firstname" name="patient_firstname" type="Patient_FirstName" placeholder="First Name" class="form-control">   
  </div>
  <div class="col-lg-2">
    <input id="patient_middlename" name="patient_middlename" type="Patient_MiddleName" placeholder="Middle Name" class="form-control">   
  </div>
  <div class="col-lg-2">
    <input id="patient_lastname" name="patient_lastname" type="Patient_LastName" placeholder="Last Name" class="form-control">   
  </div>
  
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="dob">Birthdate</label>
  <div class="col-lg-4">
    <input id="dob" name="dob" type="dob" placeholder="MM / DD / YYYY" class="form-control">   
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
  <label class="col-lg-1 control-label" for="gender">Gender</label>
  <div class="col-lg-4">
    <select id="gender" name="gender" class="form-control">
      <option></option>
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="race">Race</label>
  <div class="col-lg-4">
    <select id="race" name="race" class="form-control">
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
    <input id="state" name="state" type="text" placeholder="State Name" class="form-control">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="postal_code">ZIP</label>
  <div class="col-lg-4">
    <input id="postal_code" name="postal_code" type="text" placeholder="Zipcode" class="form-control">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Country">Country</label>
  <div class="col-lg-4">
    <select id="Patient_Country" name="Patient_Country" class="form-control">
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

<!-- Button -->
<div class="control-group">
  <label class="col-lg-1 control-label" for="singlebutton"></label>
  <div class="col-lg-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
</div>

<!-- Form Name</fieldset>
</form--->
