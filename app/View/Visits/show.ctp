<h1> <?php echo $date = date("m/d/y", strtotime($visit['Visit']['created'])); ?> Encounter for <?php echo $patient['Patient']['patient_firstname']; ?>  <?php echo $patient['Patient']['patient_lastname'] ?></h1> 
<?php echo $this->element('visit_detail') ?>