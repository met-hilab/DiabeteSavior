<h2>View Visit</h2>

<div>
<?php
	echo "Patient ID: ".$patient['Patient']['patient_number']."<br>";
	echo "First Name: ".$patient['Patient']['patient_firstname']."<br>";
	echo "Last Name: ".$patient['Patient']['patient_lastname']."<br>";
	echo "DOB: ".$patient['Patient']['dob']."<br>";
?>
</div>
<hr>
<div>
<?php
	echo "weight: ".$vitalslab['VitalsLab']['weight']."<br>";
	echo "height: ".$vitalslab['VitalsLab']['height']."<br>";
	echo "bps: ".$vitalslab['VitalsLab']['bps']."<br>";
	echo "bpd: ".$vitalslab['VitalsLab']['bpd']."<br>";
	echo "bmi: ".$vitalslab['VitalsLab']['bmi']."<br>";
	echo "bmi_status: ".$vitalslab['VitalsLab']['bmi_status']."<br>";
	echo "A1c: ".$vitalslab['VitalsLab']['A1c']."<br>";
	echo "eGFR: ".$vitalslab['VitalsLab']['eGFR']."<br>";	
	echo "notes: ".$vitalslab['VitalsLab']['notes']."<br>";	
?>
</div>