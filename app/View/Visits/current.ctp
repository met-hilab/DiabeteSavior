<h1> <?php echo $date = date("m/d/y", strtotime($visit['Visit']['created'])); ?> Current Encounter for <?php echo $patient['Patient']['patient_firstname']; ?>  <?php echo $patient['Patient']['patient_lastname'] ?></h1> 

<div style="padding-bottom:10px;">
	<a href="/visits/gcalgorithm" class="btn btn-primary" style="padding-left:5px;">
		<span class=""></span>Run Algorithm</a>
</div>
<?php echo $this->element('visit_detail') ?>