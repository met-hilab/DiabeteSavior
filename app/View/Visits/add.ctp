<h1> Add Encounter for <?php echo $patient['Patient']['patient_firstname']; ?>  <?php echo $patient['Patient']['patient_lastname'] ?></h1> 

       
<!-- Demograpfics -->

<div class="col-md-4">


	<table  class="table table-condensed">
	    <tr>
            <th>Patient Number: </th> 
            <td> <?php echo $patient['Patient']['patient_number']; ?> </td>
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
<div class="col-md-4">
    <a href="../patients/show" class="btn btn-primary" style="padding-left:10px;"><span class=""></span>Go Back</a>
</div>

<br clear="all">
<hr>


<?php echo $this->element('visit_form'); ?>
