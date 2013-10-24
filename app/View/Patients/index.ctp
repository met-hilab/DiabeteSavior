<div class="row">
  <div class="col-lg-6 pull-right">
    <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">index</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<hr>

<table class="table table-striped">
<?php foreach($patients as $p) :?>
  <tr>
    <td><?php echo $p['Patient']['patient_number'];?></td>
    <td><?php echo $p['Patient']['patient_firstname'];?></td>
    <td><?php echo $p['Patient']['patient_lastname'];?></td>
    <td><?php echo $p['Patient']['dob'];?></td>
  </tr>
<?php endforeach; ?>
</table>

<hr>

<a type="button" class="btn btn-primary" href="/patients/add">New Patient</a>