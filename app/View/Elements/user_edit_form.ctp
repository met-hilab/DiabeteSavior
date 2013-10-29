<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('User');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('Profile.id', array('type' => 'hidden'));

echo $this->Form->input('email', array('autocomplete' => 'off'));
echo $this->Form->input('password', array('type'=>'password', 'required' => 'false'));
echo $this->Form->input('confirm_password', array('type'=>'password', 'required' => 'false'));
echo $this->Form->input('Profile.firstname');
echo $this->Form->input('Profile.lastname');
echo $this->Form->input('Profile.phone');
echo $this->Form->submit();
echo $this->Form->end();

echo $this->Html->script('user-form');
?>
