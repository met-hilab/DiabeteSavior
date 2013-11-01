<div>
<?php
  echo "Patient ID: ".$patient['Patient']['patient_number']."<br>";
  echo "First Name: ".$patient['Patient']['patient_firstname']."<br>";
  echo "Last Name: ".$patient['Patient']['patient_lastname']."<br>";
  echo "DOB: ".$patient['Patient']['dob']."<br>";
?>
</div>

<hr>

<!-- visit -->
<h3>Vitals and Labs</h3>
<div>
<?php
  echo "Weight: ".$visit['VitalsLab']['weight']."<br>";
  echo "Height: ".$visit['VitalsLab']['height']."<br>";
  echo "BMI: ".$visit['VitalsLab']['bmi']."<br>";
  echo "BMI Status: ".$visit['VitalsLab']['bmi_status']."<br>";
  echo "A1c: ".$visit['VitalsLab']['A1c']."<br>";
  echo "bps: ".$visit['VitalsLab']['bps']."<br>";
  echo "bpd: ".$visit['VitalsLab']['bpd']."<br>"; 
  echo "eGFR: ".$visit['VitalsLab']['eGFR']."<br>"; 
  echo "Notes: ".$visit['VitalsLab']['notes']."<br>"; 
?>
</div>

<hr>

<!-- visit -->
<h3>Therapy Goals</h3>
<div>
<?php
  echo "A1c Goal: ".$visit['Treatment']['a1c_goal']."<br>";
  echo "Weight Goal: ".$visit['Treatment']['weight_goal']."<br>";
?>
</div>

<hr>

<!-- visit -->
<h3>Medical History and Complaints</h3>
<div>
<?php
  echo "Chief Complaint: ".$visit['MedhistoryComplaint']['complaints']."<br>";
  echo "Hypo: ".$visit['MedhistoryComplaint']['hypo']."<br>";
  echo "Weight_gain: ".$visit['MedhistoryComplaint']['weight_gain']."<br>";
  echo "Renal_gu: ".$visit['MedhistoryComplaint']['renal_gu']."<br>";
  echo "Gi_sx: ".$visit['MedhistoryComplaint']['gi_sx']."<br>";
  echo "Chf: ".$visit['MedhistoryComplaint']['chf']."<br>";
  echo "Cvd: ".$visit['MedhistoryComplaint']['cvd']."<br>";
  echo "Bone: ".$visit['MedhistoryComplaint']['bone']."<br>"; 
?>
</div>

<hr>

<!-- patient -->
<h3>Drug Allergies</h3>
<div>
<?php
  echo "Met: ".$patient['DrugAllergy']['met']."<br>";
  echo "Dpp_4i: ".$patient['DrugAllergy']['dpp_4i']."<br>";
  echo "Glp_1ra: ".$patient['DrugAllergy']['glp_1ra']."<br>";
  echo "Tzd: ".$patient['DrugAllergy']['tzd']."<br>";
  echo "Agi: ".$patient['DrugAllergy']['agi']."<br>";
  echo "Colsvl: ".$patient['DrugAllergy']['colsvl']."<br>";
  echo "Bcr_or: ".$patient['DrugAllergy']['bcr_or']."<br>";
  echo "Su_gln: ".$patient['DrugAllergy']['su_gln']."<br>"; 
  echo "Insulin: ".$patient['DrugAllergy']['insulin']."<br>";
  echo "Sglt_2: ".$patient['DrugAllergy']['sglt_2']."<br>"; 
  echo "Praml: ".$patient['DrugAllergy']['praml']."<br>";   
?>
</div>

<!-- diagnoses -->
<br/>
<br/>