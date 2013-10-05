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
echo $patient['Patient']['patient_id'];
echo $patient['Patient']['first_name'];
echo $patient['Patient']['last_name'];
echo $patient['Patient']['dob'];
echo $patient['Patient']['gender'];
?>