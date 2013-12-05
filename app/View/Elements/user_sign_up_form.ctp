<?php
$inputDefaults = array(
  'format' => array('div', 'label', 'between', 'input', 'after'),
  'div' => array('class' => 'form-group'),
  'label' => array('class' => 'col-lg-2 control-label'),
  'between' => '<div class="col-lg-4">',
  'after' => '</div>',
  'autocomplete' => 'off'
);
$formDefaults = array(
  'inputDefaults' => $inputDefaults,
  'action' => 'add'
);
?>

<?php echo $this->Form->create('User', $formDefaults); ?>

<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('password', array('type'=>'password', 'required' => 'true')); ?>
<?php echo $this->Form->input('password_confirmation', array('type'=>'password', 'required' => 'true')); ?>

<?php echo $this->Form->input('Profile.firstname'); ?>

<?php echo $this->Form->input('Profile.lastname'); ?>

<?php //echo $this->Form->input('Profile.phone'); ?>

<?php echo $this->Form->submit("Sign up"); ?>

<?php echo $this->Form->end(); ?>

<?php echo $this->Html->script('user-form'); ?>
