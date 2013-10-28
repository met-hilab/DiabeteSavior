<h2>Current Visit</h2>

<div style="padding-bottom:10px;">
	<a href="/visits/gcalgorithm" class="btn btn-primary" style="padding-left:5px;">
		<span class=""></span>Run Algorithm</a>
</div>

<div>
<?php
	echo "Patient ID: ".$patient['Patient']['patient_number']."<br>";
	echo "First Name: ".$patient['Patient']['patient_firstname']."<br>";
	echo "Last Name: ".$patient['Patient']['patient_lastname']."<br>";
	echo "DOB: ".$patient['Patient']['dob']."<br>";
?>
</div>

<hr>

<!-- vitals_labs -->
<h3>Vitals and Labs</h3>
<div>
<?php
	echo "Weight: ".$vitals_labs['VitalsLab']['weight']."<br>";
	echo "Height: ".$vitals_labs['VitalsLab']['height']."<br>";
	echo "BMI: ".$vitals_labs['VitalsLab']['bmi']."<br>";
	echo "BMI Status: ".$vitals_labs['VitalsLab']['bmi_status']."<br>";
	echo "A1c: ".$vitals_labs['VitalsLab']['A1c']."<br>";
	echo "bps: ".$vitals_labs['VitalsLab']['bps']."<br>";
	echo "bpd: ".$vitals_labs['VitalsLab']['bpd']."<br>";	
	echo "eGFR: ".$vitals_labs['VitalsLab']['eGFR']."<br>";	
	echo "Notes: ".$vitals_labs['VitalsLab']['notes']."<br>";	
?>
</div>

<hr>

<!-- treatments -->
<h3>Therapy Goals</h3>
<div>
<?php
	echo "A1c Goal: ".$treatments['Treatment']['a1c_goal']."<br>";
	echo "Weight Goal: ".$treatments['Treatment']['weight_goal']."<br>";
?>
</div>

<hr>

<!-- medhistory_complaints -->
<h3>Medical History and Complaints</h3>
<div>
<?php
	echo "Chief Complaint: ".$medhistory_complaints['MedhistoryComplaint']['complaints']."<br>";
	echo "Hypo: ".$medhistory_complaints['MedhistoryComplaint']['hypo']."<br>";
	echo "Weight_gain: ".$medhistory_complaints['MedhistoryComplaint']['weight_gain']."<br>";
	echo "Renal_gu: ".$medhistory_complaints['MedhistoryComplaint']['renal_gu']."<br>";
	echo "Gi_sx: ".$medhistory_complaints['MedhistoryComplaint']['gi_sx']."<br>";
	echo "Chf: ".$medhistory_complaints['MedhistoryComplaint']['chf']."<br>";
	echo "Cvd: ".$medhistory_complaints['MedhistoryComplaint']['cvd']."<br>";
	echo "Bone: ".$medhistory_complaints['MedhistoryComplaint']['bone']."<br>";	
?>
</div>

<hr>

<!-- drug_allergies -->
<h3>Drug Allergies</h3>
<div>
<?php
	echo "Met: ".$drug_allergies['DrugAllergy']['met']."<br>";
	echo "Dpp_4i: ".$drug_allergies['DrugAllergy']['dpp_4i']."<br>";
	echo "Glp_1ra: ".$drug_allergies['DrugAllergy']['glp_1ra']."<br>";
	echo "Tzd: ".$drug_allergies['DrugAllergy']['tzd']."<br>";
	echo "Agi: ".$drug_allergies['DrugAllergy']['agi']."<br>";
	echo "Colsvl: ".$drug_allergies['DrugAllergy']['colsvl']."<br>";
	echo "Bcr_or: ".$drug_allergies['DrugAllergy']['bcr_or']."<br>";
	echo "Su_gln: ".$drug_allergies['DrugAllergy']['su_gln']."<br>";	
	echo "Insulin: ".$drug_allergies['DrugAllergy']['insulin']."<br>";
	echo "Sglt_2: ".$drug_allergies['DrugAllergy']['sglt_2']."<br>";	
	echo "Praml: ".$drug_allergie['DrugAllergy']['praml']."<br>";		
?>
</div>

<!-- diagnoses -->
<br/>
<br/>