

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
         <?php echo $visit['MedhistoryComplaint']['complaints'] ?> 
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
     <td><?php echo $diagnosis['dxname']?>
	 <td><?php echo $diagnosis['icd9code']?>
	 <td><?php echo $diagnosis['icd10code']?>
</tr>
  </tbody>
  <?php endforeach; ?>
</table>
</div>
</div>	


<br clear = "all">
<hr>
<!-- Medical History and Complaints -->
<div class="col-md-6">

<h3>Medical History and Complaints</h3> 
	<table  class="table table-condensed">
	    

        <tr> 
            <th>Hypoglycemia: </th>
            <td><?php echo $visit['MedhistoryComplaint']['hypo'] ?></td>
        </tr>
        <tr> 
            <th>Weight gain: </th>
            <td><?php echo $visit['MedhistoryComplaint']['weight_gain'] ?></td>
        </tr>
        <tr> 
            <th>Renal or Genitourinary symptoms: </th>
            <td><?php echo $visit['MedhistoryComplaint']['renal_gu']?> </td>
        </tr>

        <tr>
             <th>Gastrointestinal symptoms:</th>
        <td><?php echo $visit['MedhistoryComplaint']['gi_sx']?>  </td>
        </tr>

        <tr>
            <th>Coronary heart disease: </th>
            <td><?php echo $visit['MedhistoryComplaint']['chf']?> </td>
        </tr>
		<tr>
             <th>Cardiovascular disease:</th>
        <td><?php echo $visit['MedhistoryComplaint']['cvd']?>  </td>
        </tr>

        <tr>
            <th>Osteoporosis: </th>
            <td><?php echo $visit['MedhistoryComplaint']['bone']?> </td>
        </tr>
</table>
</div> 



<!-- Patient Drug Allergies -->
<div class="col-md-6">
<h3>Drug Allergies or Contraindications</h3> 

<table  class="table table-condensed">

<tr>

  <th>Metformin:  </th> 
  <td> <?php echo $patient['DrugAllergy']['met'] ?: 'Unknown' ?> </td>
</tr>

<tr> 
  <th>Dipeptidyl peptidase 4 inhibitors (DPP-4): </th>
  <td><?php echo $patient['DrugAllergy']['dpp_4i']?: 'Unknown' ?></td>
</tr>

<tr> 
  <th>Glucagon-like peptide-1 receptor agonists (GLP-1): </th>
  <td><?php echo $patient['DrugAllergy']['glp_1ra']?: 'Unknown' ?></td>
</tr>

<tr>
  <th>Thiazolidinediones (TZD): </th>
  <td><?php echo $patient['DrugAllergy']['tzd']?: 'Unknown' ?></td>
</tr>

<tr>
  <th>Alpha-glucosidase inhibitors (AGIs): </th>
  <td><?php echo $patient['DrugAllergy']['agi']?: 'Unknown'?></td>
</tr>


<tr>

  <th>Colesevelam:  </th> 
  <td> <?php echo $patient['DrugAllergy']['colsvl']?: 'Unknown' ?> </td>
</tr>

<tr> 
  <th>Bromocriptine Mesylate: </th>
  <td><?php echo $patient['DrugAllergy']['bcr_or']?: 'Unknown' ?></td>
</tr>

<tr> 
  <th>Sulfonylurea (SFU) and Glinides: </th>
  <td><?php echo $patient['DrugAllergy']['su_gln']?: 'Unknown' ?></td>
</tr>

<tr>
  <th>Insulin: </th>
  <td><?php echo $patient['DrugAllergy']['insulin']?: 'Unknown' ?></td>
</tr>

<tr>
  <th>Sodium-glucose co-transporter 2 inhibitors (SGLT2): </th>
  <td><?php echo $patient['DrugAllergy']['sglt_2']?: 'Unknown'?></td>
</tr>

<tr>
  <th>Pramlintide: </th>
  <td><?php echo $patient['DrugAllergy']['praml']?: 'Unknown'?></td>
</tr>

</table>
</div>

<br clear = "all">
<hr>		
		
<!-- Vitals and Lab Results -->
<div class="col-md-4">

<h3>Vitals and Lab Results</h3> 
	<table  class="table table-condensed">
	    <tr>
            <th>Weight: </th> 
            <td> <?php echo $visit['VitalsLab']['weight'] ?> kg</td>
        </tr>

        <tr> 
            <th>Height: </th>
            <td><?php echo $visit['VitalsLab']['height']; ?> cm</td>
        </tr>
        <tr>  
            <th> BMI: </th>
            <td><?php echo $visit['VitalsLab']['bmi']; ?></td>
        </tr>
        <tr> 
            <th>Glycated hemoglobin (A1C): </th>
            <td><?php echo $visit['VitalsLab']['A1c'] ?> %</td>
        </tr>

        <tr>
             <th>Systolic Blood Pressure: </th>
        <td><?php echo $visit['VitalsLab']['bps']?>  mmHg</td>
        </tr>

        <tr>
            <th>Diastolic Blood Pressure: </th>
            <td><?php echo $visit['VitalsLab']['bpd']?> mmHg</td>
        </tr>
		
</table>
</div> 

<!-- Therapy goals -->
<div class="col-md-4">

<h3>Therapy Goals</h3> 
	<table  class="table table-condensed">
	    <tr>
            <th>Glycated hemoglobin (A1C) Goal: </th> 
            <td> <?php echo $visit['Treatment']['a1c_goal'] ?> %</td>
        </tr>
        <tr> 
            <th>Weight Goal: </th>
            <td><?php echo $visit['Treatment']['weight_goal'] ?> kg</td>
        </tr>        
</table>
</div> 

<!-- Notes -->	
	<div class="col-md-4">
<h3>Notes </h3>
<?php if ($visit['VitalsLab']['notes']==null){
 echo "There are no notes on file for this patient.";
 }
 else{
 echo $visit['VitalsLab']['notes'];
 }
?>		
</div>
<br clear = "all">
<hr>



