<!--
	find all patients
< class="table table-striped">
<?php foreach($patients as $p) :?>
  <tr>
  	<td><?php echo $p['Patient']['patient_id'];?></td>
    <td><?php echo $p['Patient']['first_name'];?></td>
    <td><?php echo $p['Patient']['last_name'];?></td>
    <td><?php echo $p['Patient']['dob'];?></td>
    <td><?php echo $p['Patient']['gender'];?></td>
  </tr>
<?php endforeach; ?>
</table>
-->

<?php
echo $patient['Patient']['patient_number'];
echo $patient['Patient']['patient_firstname'];
echo $patient['Patient']['patient_lastname'];
echo $patient['Patient']['patient_middlename'];
echo $patient['Patient']['dob'];
echo $patient['Patient']['picture'];
echo $patient['Patient']['occupation'];
echo $patient['Patient']['gender'];
echo $patient['Patient']['race'];
echo $patient['Patient']['street'];
echo $patient['Patient']['pastal_code'];
echo $patient['Patient']['city'];
echo $patient['Patient']['state'];
?>

