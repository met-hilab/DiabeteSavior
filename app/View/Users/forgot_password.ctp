
<p>Please enter your email:</p>
<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('User');
echo $this->Form->hidden('id');
echo $this->Form->input('email', array('type'=>'email', 'required' => 'true'));
echo $this->Form->submit();
echo $this->Form->end();

echo $this->Html->script('user-form');
?>
