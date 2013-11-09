<html lang="en">
<h2 class="section-title">Edit Medicine</h2>
<form class="form-horizontal"role="form" action="/Medicines/edit" method="post">
    <?php
  echo $this->Html->css('bootstrap-select');
  echo $this->Html->script('bootstrap-select');
?>
    <?php echo $this->Form->create('Medicines'); ?>
<div class="form-group" align="center">
  <label class="col-lg-1 control-label" for="Medicine_Name">Name </label>
  <div class="col-lg-2">
    <?php echo $this->Form->input('medicine_name', array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group" align="center">
  <label class="col-lg-1 control-label" for="Min_dose">Min_dose</label>
  <div class="col-lg-2">
    <?php echo $this->Form->input('min_dose', array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group">
  <label class="col-lg-1 control-label" for="Max_dose">Max_dose</label>
  <div class="col-lg-2">
    <?php echo $this->Form->input('max_dose', array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-1 control-label" for="Metric">Metric</label>
  <div class="col-lg-2">
    <?php echo $this->Form->input('metric', array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group">
  <?php echo $this->Form->label('hypo', '</font>Hypo', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $hypoOptions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'
      )
    ?>
    <?php echo $this->Form->select('hypo', $hypoOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group">
  <?php echo $this->Form->label('weight', '</font>Weight', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $weightOptions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'
      )
    ?>
    <?php echo $this->Form->select('weight', $weightOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group">
  <?php echo $this->Form->label('renal_gu', '</font>Renal_gu', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $renal_guOptions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'
      )
    ?>
    <?php echo $this->Form->select('renal_gu', $renal_guOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('gi_sx', '</font>Gi_sx', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $gi_sxOptions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'
      )
    ?>
    <?php echo $this->Form->select('gi_sx', $gi_sxOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group">
  <?php echo $this->Form->label('chf', '</font>Chf', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $chfOptions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'
      )
    ?>
    <?php echo $this->Form->select('gi_sx', $chfOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group">
  <?php echo $this->Form->label('cvd', '</font>Cvd', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $cvdOptions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'
      )
    ?>
    <?php echo $this->Form->select('cvd', $cvdOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="form-group">
  <?php echo $this->Form->label('bone', '</font>Bone', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $boneOptions = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'
      )
    ?>
    <?php echo $this->Form->select('bone', $boneOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>
    
<div class="control-group">
  <label class="col-lg-1 control-label"></label>
  <div class="col-lg-4">
    <?php echo $this->Form->submit('Submit'); ?>
  </div>
</div>

<?php echo $this->Form->end(); ?>
    
</form>
