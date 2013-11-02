<h2>Add Visit</h2>  

<div>
<?php
    echo "Patient ID: ".$patient['Patient']['patient_number']."<br>";
    echo "First Name: ".$patient['Patient']['patient_firstname']."<br>";
    echo "Last Name: ".$patient['Patient']['patient_lastname']."<br>";
    echo "DOB: ".$patient['Patient']['dob']."<br>";
?>
</div>
                      
<hr>

<?php echo $this->element('visit_form'); ?>
