<h2>Add Medicine
<?php
echo $this->form->create();

echo $this->form->input('medicine_name');
echo $this->form->input('min_dose');
echo $this->form->input('max_dose');
echo $this->form->input('metric');


echo $this->Form->input('hypo', array(
    'options' => array('0', '1','2','3')
));

echo $this->Form->input('Weight', array(
    'options' => array('0', '1','2','3')
));

echo $this->Form->input('renal_gu', array(
    'options' => array('0', '1','2','3')
));

echo $this->Form->input('gi_sx', array(
    'options' => array('0', '1','2','3')
));

echo $this->Form->input('chf', array(
    'options' => array('0', '1','2','3')
));

echo $this->Form->input('cvd', array(
    'options' => array('0', '1','2','3')
));

echo $this->Form->input('bone', array(
    'options' => array('0', '1','2','3')
));


echo $this->form->end('save');
?>