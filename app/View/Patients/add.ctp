

<div class ="row featurette">
    <div class ="col-md-5">
        <img class ="featurette-image img-responsive"
             src ="/img/register.png"
             data-src="holder.js/500x500/auto"
             alt="500x500">
<?php
echo $this->Form->creat('Patient', array('type'=>'file'));
// file of uploading image
echo $this->Form->end(__('Upload'));


?>
        
  </div>      
    
   <div class ="col-md-7">
        <h2 style="font-family:black;" >ADD PATIENT</h2>       

<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Patient');
    echo $this->Form->input('patient_firstname');
    echo $this->Form->input('patient_lastname');
    echo $this->Form->input('patient_middlename');
    echo $this->Form->input('dob');
    //echo $this->Form->input('picture');
    echo $this->Form->input('occupation');
    echo $this->Form->input('gender');
    echo $this->Form->input('race');
    echo $this->Form->input('street');
    echo $this->Form->input('postal_code');
    echo $this->Form->input('city');
    echo $this->Form->input('state');
echo $this->Form->end('Submit', array('class'=>'btn'));

?>
 </div>  