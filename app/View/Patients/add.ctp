<h2 class="section-title">Add Patient</h2>
<form class="form-horizontal"role="form" action="/patients/add" method="post">
<!-- Text input-->

<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Name">Name</label>
  <div class="col-lg-2">
    <input id="Patient_Name" name="Patient_FirstName" type="Patient_FirstName" placeholder="First Name" class="form-control">   
  </div>
  <div class="col-lg-2">
    <input id="Patient_Name" name="Patient_MiddleName" type="Patient_MiddleName" placeholder="Middle Name" class="form-control">   
  </div>
  <div class="col-lg-2">
    <input id="Patient_Name" name="Patient_LastName" type="Patient_LastName" placeholder="Last Name" class="form-control">   
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Birthdate">Birthdate</label>
  <div class="col-lg-4">
    <input id="Patient_Birthdate" name="Patient_Birthdate" type="Patient_Birthdate" placeholder="MM / DD / YYYY" class="form-control">   
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Occupation">Occupation</label>
  <div class="col-lg-4">
    <input id="Patient_Occupation" name="Patient_Occupation" type="text" placeholder="Occupation" class="form-control">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Gender">Gender</label>
  <div class="col-lg-4">
    <select id="Patient_Gender" name="Patient_Gender" class="form-control">
      <option></option>
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Race">Race</label>
  <div class="col-lg-4">
    <select id="Patient_Race" name="Patient_Race" class="form-control">
      <option></option>
      <option></option>
      <option></option>
      <option></option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_Street">Address</label>
  <div class="col-lg-4">
    <input id="Patient_Street" name="Patient_Street" type="Patient_Street" placeholder="Street Address" class="form-control">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_City">City</label>
  <div class="col-lg-4">
    <input id="Patient_City" name="Patient_City" type="text" placeholder="City Name" class="form-control">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_State">State</label>
  <div class="col-lg-4">
    <input id="Patient_State" name="Patient_State" type="text" placeholder="State Name" class="form-control">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-1 control-label" for="Patient_ZIP">ZIP</label>
  <div class="col-lg-4">
    <input id="Patient_ZIP" name="Patient_ZIP" type="text" placeholder="Zipcode" class="form-control">
    
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
</form>
