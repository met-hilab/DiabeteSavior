
<hr>

<table class="table table-striped">
<?php foreach($patients as $p) :?>
  <tr>
    <td><?php echo $p['Patient']['patient_number'];?></td>
    <td><?php echo $p['Patient']['patient_firstname'];?></td>
    <td><?php echo $p['Patient']['patient_lastname'];?></td>
    <td><?php echo $p['Patient']['dob'];?></td>
<<<<<<< HEAD
	<td><?php echo $date = date("F j, Y", strtotime($p['Patient']['created']));?></td>
=======
>>>>>>> parent of 2832fef... List of patients (index page)
  </tr>
<?php endforeach; ?>
</table>

<hr>
