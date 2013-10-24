<h2>Edit Medicine</h2>

<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Medicine');
    echo $this->Form->input('medicine_name');
    echo $this->Form->input('min_dose');
    echo $this->Form->input('max_dose');
    echo $this->Form->input('metric');
    echo $this->Form->input('hypo');
    echo $this->Form->input('weight');
    echo $this->Form->input('renal_gu');
    echo $this->Form->input('gi_sx');
    echo $this->Form->input('chf');
    echo $this->Form->input('cvd');
    echo $this->Form->input('bone');

    
echo $this->Form->end('Submit');
?>
