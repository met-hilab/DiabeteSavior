<h2 class="section-title">Patient Search</h2>
  <form class="form-horizontal" role="form" action="/patients/search" method="post">
    <div class="form-group">
      <label for="patient_number" class="col-lg-1 control-label">PID</label>
      <div class="col-lg-4">
        <input type="patient_number" class="form-control" id="patient_number" placeholder="Enter PID Here . . ." name="patient_number">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-1 control-label" for="Patient_Name">Name</label>
      <div class="col-lg-2">
      <input id="Patient_Name" name="Patient_FirstName" type="Patient_FirstName" placeholder="First Name" class="form-control">   
   </div>
    <div class="col-lg-2">
     <input id="Patient_Name" name="Patient_LastName" type="Patient_LastName" placeholder="Last Name" class="form-control">   
   </div>
  </div>
    <div class="form-group">
  <label class="col-lg-1 control-label" for="patient_dob">DOB</label>
  <div class="col-lg-4">
    <input id="patient_dob" name="patient_dob" type="patient_dob" placeholder="YYYY-MM-DD" class="form-control">   
  </div>
</div>
    <div class="form-group">
      <div class="col-lg-offset-1 col-lg-4">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </div>
  </form>

