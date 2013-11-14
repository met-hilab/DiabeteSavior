<?php echo $this->Form->create('Medicine'); ?>

<div class="form-group">
  <?php echo $this->Form->label('medicine_name', '<font color="red">* </font>Name', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('medicine_name', array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('min_dose', '<font color="red">* </font>Min_dose', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('min_dose', array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('max_dose', '<font color="red">* </font>Max_dose', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('max_dose', array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('unit', '<font color="red">* </font>Units', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->input('unit', array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('hypo', '<font color="red">* </font>Hypo', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $hypoOptions = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
      )
    ?>
    <?php echo $this->Form->select('hypo', $hypoOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('weight', '<font color="red">* </font>Weight', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $weightOptions = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
      )
    ?>
    <?php echo $this->Form->select('weight', $weightOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('renal_gu', '<font color="red">* </font>Renal_gu', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $renal_guOptions = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
      )
    ?>
    <?php echo $this->Form->select('renal_gu', $renal_guOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('gi_sx', '<font color="red">* </font>Gi_sx', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $gi_sxOptions = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
      )
    ?>
    <?php echo $this->Form->select('gi_sx', $gi_sxOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('chf', '<font color="red">* </font>Chf', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $chfOptions = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
      )
    ?>
    <?php echo $this->Form->select('chf', $chfOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('cvd', '<font color="red">* </font>Cvd', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $cvdOptions = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
      )
    ?>
    <?php echo $this->Form->select('cvd', $cvdOptions, array('div' => false, 'label' => false)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('bone', '<font color="red">* </font>Bone', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
      $boneOptions = array(
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
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