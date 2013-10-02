<h2>Add User</h2>

<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('User');
    //echo $this->Form->input('firstname');
    //echo $this->Form->input('lastname');
    echo $this->Form->input('email');
    echo $this->Form->input('password', array('type'=>'password'));
echo $this->Form->end('Submit', array('class'=>'btn'));
?>