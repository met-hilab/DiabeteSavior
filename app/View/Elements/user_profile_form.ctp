<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('User');
echo $this->Form->hidden('id');
echo $this->Form->hidden('Profile.id');
echo $this->Form->input('email', array('autocomplete' => 'off'));
echo $this->Form->input('Profile.firstname');
echo $this->Form->input('Profile.lastname');
echo $this->Form->input('Profile.phone');
echo $this->Form->submit();
echo $this->Form->end();

echo $this->Html->script('user-form');
?>
