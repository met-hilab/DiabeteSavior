<h1> <?php echo $date = date("m/d/y", strtotime($visit['Visit']['created'])); ?> Current Visit for <?php echo $patient['Patient']['patient_firstname']; ?>  <?php echo $patient['Patient']['patient_lastname'] ?></h1> 

<?php echo $this->element('visit_detail') ?>

<div style="padding-bottom:10px;">
	<a href="<?php echo $this->webroot; ?>visits/gcalgorithm" class="btn btn-primary" style="padding-left:5px;"><span class="">
		</span>Run Algorithm</a>&nbsp;&nbsp;
	<a href="<?php echo $this->webroot; ?>patients/show" class="btn btn-primary" style="padding-left:10px;"><span class="">
		</span>Go Back</a>
</div>