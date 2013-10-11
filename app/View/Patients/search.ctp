
<h2 class="section-title">Patient Search</h2>
  <form class="form-horizontal" role="form" action="/patients/search" method="post">
    <div class="form-group">
      <label for="patient_number" class="col-lg-1 control-label">PID</label>
      <div class="col-lg-4">
        <input type="patient_number" class="form-control" id="patient_number" placeholder="Enter PID Here . . ." name="patient_number">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-1 col-lg-4">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </div>
  </form>
