
<!-- Demograpfics -->

<div class="col-md-4">

<h3>Demographics</h3> 
	<table  class="table table-condensed">
	    <tr>
            <th>Patient Number: </th> 
            <td> <?php echo $patient['Patient']['patient_number']; ?> </td>
        </tr>

        <tr> 
            <th>First Name: </th>
            <td><?php echo $patient['Patient']['patient_firstname']; ?></td>
        </tr>

        <!-- Does not show middle name field if the patient does not have one -->
        <?php if ($patient['Patient']['patient_middlename']!=null) {?>
        <tr> 
            <th>Middle Name: </th>
            <td><?php echo $patient['Patient']['patient_middlename']; ?></td>
        </tr>
        <?php }?>

        <tr> 
            <th>Last Name: </th>
            <td><?php echo $patient['Patient']['patient_lastname'] ?></td>
        </tr>

        <tr>
             <th>DOB: </th>
        <td><?php echo $date = date("F j, Y", strtotime($p['Patient']['dob']));?></td>
        </tr>
		<tr>
             <th>Age: </th>
        <td><?php $date = date("F j, Y", strtotime($p['Patient']['dob']));
		         echo $age = calculateAge($date);?></td>
        </tr>
		<tr>
            <th>Gender: </th>
            <td><?php echo $patient['Patient']['gender']?></td>
        </tr>
</table>
</div> 

<!-- Chief Complaints -->
<div class="col-md-8">
    <h3>Chief Complaint</h3>
      <div class="dimgray-header">
         <?php echo $visit['MedhistoryComplaint']['complaints'] ?> 
      </div>
</div>	



<!-- Diagnosis -->
<div class="col-md-8">
   <h3>Diagnoses</h3>
         <table class="table table-condensed">
<thead>
    <tr>
      <th>Diagnosis</th>
      <th>ICD-9</th>
		  <th>ICD-10</th>
	</tr>
</thead>

<?php foreach($patient[ 'Diagnosis' ] as $diagnosis ) :?>
<tbody>
  <tr>
     <td class="dimgray-header"><?php echo $diagnosis['dxname']?>
	 <td class="dimgray-header"><?php echo $diagnosis['icd9code']?>
	 <td class="dimgray-header"><?php echo $diagnosis['icd10code']?>
</tr>
  </tbody>
  <?php endforeach; ?>
</table>
</div>

<br clear = "all">

<hr>
<!-- Medical History and Complaints -->
<div class="col-md-6">

<h3>Medical History and Complaints</h3> 
	<?php echo $this->element('medhistory_complaints_table'); ?>
</div> 

<!-- Patient Drug Allergies -->
<div class="col-md-6">

<h3>Drug Allergies or Contraindications</h3> 
  <?php echo $this->element('drug_allergies_table'); ?>
</div>

<br clear = "all">
<hr>		
		
<!-- Vitals and Lab Results -->
<div class="col-md-6">

<h3>Vitals and Lab Results</h3> 
	<table  class="table table-condensed">
	    <tr>
            <th class="dimgray-header">Weight: </th> 
            <td> <?php echo $visit['VitalsLab']['weight'] ?> </td>
			<td> </td>
        </tr>

        <tr> 
            <th class="dimgray-header">Height: </th>
            <td><?php echo $visit['VitalsLab']['height'] ?> </td>
			<td> </td>
        </tr>
        <tr>  
            <th class="dimgray-header">BMI: </th>
            <td><?php echo $visit['VitalsLab']['bmi'] ?> kg/m<sup>2</sup> </td>
			<td> (18.5 - 25.0 kg/m<sup>2</sup>) </td>
        </tr>
        <tr>  
            <th class="dimgray-header">Weight Classification: </th>
            <td><?php echo $visit['VitalsLab']['bmi_status'] ?></td>
			<td> </td>
        </tr>
        <tr> 
            <th class="dimgray-header">Glycated Hemoglobin (A1C): </th>
            <td><?php echo $visit['VitalsLab']['A1c'] ?> % </td>
			<td> (4.5 - 5.7%) </td>
        </tr>

        <tr>
             <th class="dimgray-header">Systolic Blood Pressure: </th>
             <td><?php echo $visit['VitalsLab']['bps'] ?>  mmHg</td>
		     <td> (90 - 120 mmHg)</td>
        </tr>

        <tr>
            <th class="dimgray-header">Diastolic Blood Pressure: </th>
            <td><?php echo $visit['VitalsLab']['bpd'] ?> mmHg</td>
			<td> (60 - 80 mmHg)</td>
        </tr>
		
</table>
</div> 

<!-- Therapy goals -->
<div class="col-md-6">

<h3>Therapy Goals</h3> 
	<table  class="table table-condensed">
	    <tr>
            <th class="dimgray-header">Glycated Hemoglobin (A1C) Goal: </th> 
            <td> <?php echo $visit['Treatment']['a1c_goal'] ?> %</td>
        </tr>
        <tr> 
            <th class="dimgray-header">Weight Goal: </th>
            <td><?php echo $visit['Treatment']['weight_goal'] ?> </td>
        </tr>        
</table>
</div> 

<!-- Notes -->  
  <div class="col-md-6">
    <h3>Notes </h3>
    <div class="dimgray-header">
      <?php if ($visit['VitalsLab']['notes']==null){
            echo "There are no notes on file for this patient.";
          }
          else{
            echo $visit['VitalsLab']['notes'];
          }
      ?>
    </div>    
  </div>

<br clear = "all">
<hr>



