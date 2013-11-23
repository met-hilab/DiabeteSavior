<h1> <?php echo $date = date("m/d/y", strtotime($visit['Visit']['created'])); ?> Visit for <?php echo $patient['Patient']['patient_firstname']; ?>  <?php echo $patient['Patient']['patient_lastname'] ?></h1> 
<?php echo $this->element('visit_detail') ?>


<h3>Algorithm Results</h3> 
	<table class="table table-condensed">
		<?php 
			if ($algorithm_results == null){
				echo 'Do not have algorithm results for this visit.';} 
			else{ ?>   

			<tr>
				<th class="dimgray-header">Therapy: </th>
				<td style="padding-left:20px">
					<?php echo $algorithm_results['TreatmentRunAlgorithm']['type']; ?>
				</td>
			</tr>
		<?php if ($algorithm_results['TreatmentRunAlgorithm']['medicine_name_one'] != 'none') { ?>
			<tr> 
				<th class="dimgray-header">Medicine1: </th>
				<td style="padding-left:20px">
					<?php echo $algorithm_results['TreatmentRunAlgorithm']['medicine_name_one'];?>
				</td>
			</tr>
		<?php }?>
		<?php if ($algorithm_results['TreatmentRunAlgorithm']['medicine_name_two'] != 'none') { ?>
			<tr> 
				<th class="dimgray-header">Medicine2: </th>
				<td style="padding-left:20px">
					<?php echo $algorithm_results['TreatmentRunAlgorithm']['medicine_name_two'];?>
				</td>
			</tr>
		<?php }?>
		<?php if ($algorithm_results['TreatmentRunAlgorithm']['medicine_name_three'] != 'none') { ?>
			<tr> 
				<th class="dimgray-header">Medicine3: </th>
				<td style="padding-left:20px">
					<?php echo $algorithm_results['TreatmentRunAlgorithm']['medicine_name_three'];?>
				</td>
			</tr>
		<?php }?>
		<?php if ($algorithm_results['TreatmentRunAlgorithm']['recommendations'] != null) { ?>
			<tr> 
				<th class="dimgray-header">Alert * </th>
				<td style="padding-left:20px">
					<?php echo nl2br($algorithm_results['TreatmentRunAlgorithm']['recommendations']);?>
				</td>
			</tr>
		<?php }?>
			<tr> 
				<th class="dimgray-header">Edited: </th>
				<td style="padding-left:20px"><?php echo $algorithm_results['TreatmentRunAlgorithm']['edited_by_user'];?></td>
			</tr>
		<?php if ($algorithm_results['TreatmentRunAlgorithm']['edited_justification'] != null) { ?>
			<tr> 
				<th class="dimgray-header">Justification: </th>
				<td style="padding-left:20px">
					<?php echo $algorithm_results['TreatmentRunAlgorithm']['edited_justification'];?>
				</td>
			</tr>
		<?php }?>
	    <?php } ?>
	</table>

<hr>

<div style="padding-bottom:10px;">
	<a href="/patients/show" class="btn btn-primary" style="padding-left:10px;">Go Back</a>
</div>