
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
