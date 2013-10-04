<h2>Add Patient</h2>

<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Patient');
    echo $this->Form->input('firstname');
    echo $this->Form->input('lastname');
    echo $this->Form->input('dob');
    echo $this->Form->input('gender');
echo $this->Form->end('Submit', array('class'=>'btn'));
?>