
				  
		     
            <h1 >Patient Information </h1>
			
			</br/>
			

            <!-----Add Three Buttons------------------------------------------>
            <div style="padding-bottom:10px;">
           <a href="/visits/add" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-plus"></span> Add Visit</a>
<!--           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
           <a href="/patients/edit" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-edit"></span> Update Patient</a>
<!--           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
           <a href="/patients/delete" data-confirm="Do you want to delete this patient record?" data-method="delete" class="btn btn-primary" style="padding-left:5px;"><span class="glyphicon glyphicon-trash"></span> Delete Patient</a>
            </div>

		   
<!-- Patient Demographic Information -->		   
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

<tr>
  <th>Occupation: </th>
  <td><?php echo $patient['Patient']['occupation']?></td>
</tr>

<tr>
  <th>Race: </th>
  <td><?php echo $patient['Patient']['race']?></td>
</tr>

</table>
</div> 




<!-- Patient Contact Information -->

 <div class="col-md-4">

        <h3>Contact information</h3> 
<table  class="table table-condensed">
<tr>

  <th>Street address: </th> 
  <td> <?php echo $patient['Patient']['street']; ?> </td>
</tr>

<tr> 
  <th>City: </th>
  <td><?php echo $patient['Patient']['city']; ?></td>
</tr>

<tr> 
  <th>State: </th>
  <td><?php echo $patient['Patient']['state'] ?></td>
</tr>

<tr>
  <th>Postal code: </th>
  <td><?php echo $patient['Patient']['postal_code']?></td>
</tr>

</table>
</div>



<!-- Patient Diagnoses -->
<div class="col-md-4">
<h3>Diagnoses </h3> 
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

<br clear="all">
<hr>



<!-- Patient Drug Allergies -->
<div class="col-md-8">
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




<!-- Patient Visit History -->

<div class="col-md-4">
<h3>Visit history </h3> 

<table class="table table-hover">

<?php 
if ($patient['Visit']==null)
    echo 'This patient does not have visit history';
foreach($patient[ 'Visit' ] as $visit ):?>
<tbody>
  <tr>
    <td><?php echo $this->Html->link($date = date("F j, Y", strtotime($visit['created'])), array('controller' => 'visits', 'action' => 'show', $visit['id'])); ?>

	
	</td>

  </tr>
  </tbody>
<?php endforeach;?> 
 
</table>
</div>

<br clear="all">
    
