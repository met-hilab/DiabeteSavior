<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('User');
  echo $this->Html->div("hidden", null, array("style" => 'display:none'));
    echo $this->Form->hidden('id');
    echo $this->Form->hidden('Profile.id');
  echo $this->Html->tag("/div", null);

  echo $this->Form->email('email', array('autocomplete' => 'off'));
  echo $this->Form->password('password', array('required' => 'false'));
  echo $this->Form->password('confirm_password', array('required' => 'false'));
  echo $this->Form->input('Profile.firstname');
  echo $this->Form->input('Profile.lastname');
  echo $this->Form->input('Profile.phone');
  echo $this->Form->submit();
echo $this->Form->end();

echo $this->Html->script('user-form');
?>
