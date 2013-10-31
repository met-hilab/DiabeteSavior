<?php echo $this->Form->create('User', array('action' => 'add')); ?>

<?php echo $this->Form->input('email'); ?>

<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->input('password_confirmation'); ?>

<?php echo $this->Form->input('Profile.firstname'); ?>

<?php echo $this->Form->input('Profile.lastname'); ?>

<?php echo $this->Form->input('Profile.phone'); ?>

<?php echo $this->Form->submit("Sign up"); ?>

<?php echo $this->Form->end(); ?>
