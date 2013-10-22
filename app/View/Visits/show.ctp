<h2>Show Visit</h2>

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
	echo "weight: ".$vitals_labs['VitalsLab']['weight']."<br>";
	echo "height: ".$vitals_labs['VitalsLab']['height']."<br>";
	echo "bps: ".$vitals_labs['VitalsLab']['bps']."<br>";
	echo "bpd: ".$vitals_labs['VitalsLab']['bpd']."<br>";
	echo "bmi: ".$vitals_labs['VitalsLab']['bmi']."<br>";
	echo "bmi_status: ".$vitals_labs['VitalsLab']['bmi_status']."<br>";
	echo "A1c: ".$vitals_labs['VitalsLab']['A1c']."<br>";
	echo "eGFR: ".$vitals_labs['VitalsLab']['eGFR']."<br>";	
	echo "notes: ".$vitals_labs['VitalsLab']['notes']."<br>";	
?>
</div>