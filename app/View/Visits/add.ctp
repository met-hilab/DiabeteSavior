<h2>Add Visit</h2>

<div>
<?php 
	echo $this->Form->create('VitalsLab');
    echo $this->Form->input('visit_id');
	//echo $this->Form->input('patient_id');
    echo $this->Form->input('weight');
    echo $this->Form->input('height');
    echo $this->Form->input('bps');
    echo $this->Form->input('bpd');
    echo $this->Form->input('bmi');
    echo $this->Form->input('bmi_status');
    echo $this->Form->input('A1c');
    echo $this->Form->input('eGFR');
    echo $this->Form->input('notes');
	echo $this->Form->end('Save');
?>
</div>  