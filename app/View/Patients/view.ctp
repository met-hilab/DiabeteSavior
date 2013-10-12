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

<h2 class="section-title">Patient View</h2>
<?php
echo "<br>";
echo "<h4> Demographics </h4>";
echo "Patient Number: ";
echo $patient['Patient']['patient_number'];
echo "<br>";
echo "First name: ";
echo $patient['Patient']['patient_firstname'];
echo "<br>";
echo "Last name: ";
echo $patient['Patient']['patient_lastname'];
echo "<br>";
echo "Middle name: ";
echo $patient['Patient']['patient_middlename'];
echo "<br>";
echo "Date of birth: ";
echo $patient['Patient']['dob'];
echo "<br>";
echo "Occupation: ";
echo $patient['Patient']['occupation'];
echo "<br>";
echo "Gender: ";
echo $patient['Patient']['gender'];
echo "<br>";
echo "Race: ";
echo $patient['Patient']['race'];
echo "<br>";
echo "Street address: ";
echo $patient['Patient']['street'];
echo "<br>";
echo "Postal code: ";
echo $patient['Patient']['pastal_code'];
echo "<br>";
echo "City: ";
echo $patient['Patient']['city'];
echo "<br>";
echo "State: ";
echo $patient['Patient']['state'];
echo "<br>";
?>
