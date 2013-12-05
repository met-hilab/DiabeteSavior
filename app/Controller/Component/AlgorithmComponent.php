<?php
/**
 * Class algorithm
 * @author - Jeff Andre, (jandre@bu.edu)
 * @version 2.3
 * @date - 12/5/2013
 * 
 * This algorithm is used only for acedemic puruposes and is based on the Glycemic Control Algorithm section in the 
 * American Association of Clinical Endocrinologists' Comprehensive Diabetes Management Algorithm 2013 Consensus Statement.
 * AACE Comprehensive Diabetes Management, Endocr Pract. 2013;19(Suppl 2)
 * 
 * Note: Patient information and medical history must be set first, then run gcAlgorithm() provides 
 * therapy results and alert messages for contraindications.
 */
App::uses('Component', 'Controller');

class AlgorithmComponent extends Component {
//class algorithm {
	
    // patient information
    var $a1c = 0.0;             // patient a1c
    var $a1clast = 0.0;         // patient last a1c
    var $a1cTarget = 0.0;       // patient targe a1c
    var $symptoms = false;      // patient diabetes symptoms present or not
    var $allergy = array("none", "none", "none", "none", "none", "none", "none", "none","none", "none","none");
    // medical history or complaints
    var $medhistory = array("hypo" => "no", "weight" => "no", "renal_gu" => "no", "gi_sx" => "no",
    		"chf" => "no", "cvd" => "no", "bone" => "no" );
    
    // algorithm therapy results
    var $medicine1 = "none";    // mono therapy medicine 1
    var $medicine2 = "none";    // dual therapy medicine 2
    var $medicine3 = "none";    // triple therpay medicne 3
    var $medicine4 = "none";	// insulin
    var $therapy = "none";      // therapy description

    // algorithm decision, side effects message for medicines, and alert message for patient contraindications,
    var $decision ="";
    var $medeffects = '<b>Reported medicine side effects:</b><br>';
    var $patientAlert = '<b><font color="red">Patient is at higher risk of side effects due to contraindications with following medications:</font></b><br>';
    var $alert = "";
    
    // therapy medicine tables
    var $monotherapy = array("Metformin", "GLP_1RA", "DPP4_i", "AG_i", "SGLT_2","TZD", "SU_GLN");
    var $dualtherapy = array("GLP_1RA", "DPP4_i", "TZD", "SGLT_2", "BasalInsulin", "Colesevelam",
        "Bromocriptine_QR", "AG_i", "SU_GLN");
    var $tripletherapy = array("GLP_1RA", "TZD","SGLT_2", "BasalInsulin", "DPP4_i", "Colesevelam",
        "Bromocriptine_QR", "AG_i", "SU_GLN");
       
    // medicines
    var $medicines = array (
    		"Metformin" =>  array("hypo" =>"0", "weight" =>"1", "renal_gu" => "3", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "1", "bone" => "0"),
    		"GLP_1RA" =>  array("hypo" =>"0", "weight" =>"1", "renal_gu" => "3", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "0", "bone" => "0"),
        	"DPP4_i" =>  array("hypo" =>"0", "weight" =>"0", "renal_gu" => "0", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "0", "bone" => "0"),
        	"TZD" =>  array("hypo" =>"0", "weight" =>"3", "renal_gu" => "3", 
    						"gi_sx" => "0", "chf" => "2", "cvd" => "0", "bone" => "2"),
        	"AG_i" =>  array("hypo" =>"0", "weight" =>"0", "renal_gu" => "0", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "0", "bone" => "0"),
            "Colesevelam" =>  array("hypo" =>"0", "weight" =>"0", "renal_gu" => "0", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "0", "bone" => "0"),
            "Bromocriptine_QR" =>  array("hypo" =>"0", "weight" =>"0", "renal_gu" => "0", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "1", "bone" => "0"),
            "SU_GLN" =>  array("hypo" =>"2", "weight" =>"3", "renal_gu" => "3", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "2", "bone" => "0"),
            "BasalInsulin" =>  array("hypo" =>"3", "weight" =>"3", "renal_gu" => "3", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "0", "bone" => "0"),
            "SGLT_2" =>  array("hypo" =>"0", "weight" =>"1", "renal_gu" => "3", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "0", "bone" => "2"),
    );
    
    // medicine side effects
    var $effects = array(	"Metformin" => '-High likelyhood of adverse effects related to renal or genitourinary problems.<br>
    									-Use with caution: risk of gastrointestinal side effects.<br>
    									-Possible benefits related to weight loss and cardiovascular disease.',
    						"GLP_1RA" => '-High likelyhood of adverse effects related to renal or genitourinary problems.<br>
    									-Use with caution: risk of gastrointestinal side effects.<br>
    									-Possible benefits related to weight loss.',					
    						"DPP4_i" => '-nuetral',					
    						"TZD" => 	'-High likelyhood of adverse effects related to weight gain, and renal or genitourinary problems.<br>
    									-Use with caution: risk of chronic heart failure and bone fracture.',
    						"AG_i" =>   '-Use with caution: risk of gastrointestinal side effects.',
    						"Colesevelam" => '-Use with caution: risk of gastrointestinal side effects.',					
    						"Bromocriptine_QR" =>  '-Use with caution: risk of gastrointestinal side effects.<br>
    									-Possible benefits related to cardiovascular disease.',					
    						"SU_GLN" => '-High likelyhood of adverse effects related to weight gain and renal or genitourinary problems.<br>
    									-Use with caution: risk of hypoglycemia and cardiovascular disease.',
    						"BasalInsulin" => '-High likelyhood of adverse effects related to hypoglycemia, weight gain, 
    												and renal or genitourinary problems.',
    						"SGLT_2" => '-High likelyhood of adverse effects related to renal or genitourinary problems.<br>
    									-Use with caution: risk of bone fracture.<br>
    									-Possible benefits related to weight loss.',					
    						"Insulin" => '-High likelyhood of adverse effects related to hypoglycemia, weight gain, 
    												and renal or genitourinary problems.'
    								
    );
    

    /**
     * Glycemic control algorithm provides therapy results based on patient A1c levels and allergies.
     */
    public function gcAlgorithm( ) {

        // hypoglycemic ac1 < 4.1
        if ($this->a1c < 4.1)
        {
            $this->therapy = "none";
            $this->decision = "Warning: Patient is Hypoglycemic";
        }

        // normal range (not diabetic) 4.1 <= a1c < 5.7
        elseif (($this->a1c >= 4.1) && ($this->a1c <5.7)&&$this->noTherapy())
        {
            $this->therapy = "none";
            $this->decision = "Patient is normal (not at risk of diabetes).";
        }

        // pre-diabetic range 5.7 <= a1c < 6.5
        elseif (($this->a1c >= 5.7) && ($this->a1c < 6.5)&&$this->noTherapy())
        {
            $this->therapy = "lifestyle modification";
            $this->decision = "Patient is at risk of diabetes.";
        }

        // start or remain at mono therapy: select medicine 1 if no therapy or if a1c <= target 
        // or if a1c > target and a1c is decreasing
        elseif ((($this->a1c >= 6.5)&&($this->a1c < 7.5)&&($this->noTherapy() )) 
        		|| ($this->isMono() && ($this->a1c <= $this->a1cTarget)) 
        		|| ($this->isMono() && ($this->a1c > $this->a1cTarget) && $this->a1cDecrease()) )
        {
        	if ($this->noTherapy())
            	$this->selectMedicine(1);
            $this->therapy = "lifestyle + monotherapy";
        	$this->decision = "Start or continue with mono therapy.";
        }

        // mono to dual therapy: add medicine 2 if at mono therapy and a1c > target and a1c is not decreasing
        elseif ( $this->isMono() && ($this->a1c > $this->a1cTarget) && !$this->a1cDecrease()){
        	$this->selectMedicine(1);
        	$this->selectMedicine(2);
            $this->therapy = "lifestyle + dual therapy";
            $this->decision = "A1c greater than target and A1c not decreasing, so adding second medicine for dual therapy.";
        }

        // start at dual therapy: select medicine 1 & 2 if 7.5 <= a1c < 9 and no medicine selected
        elseif( (($this->a1c >= 7.5) && (($this->a1c <= 9) && $this->noTherapy() )) )
        {
            $this->selectMedicine(1);
            $this->selectMedicine(2);
            $this->therapy = "lifestyle + dual therapy";
            $this->decision = "Starting with dual therapy.";
        }

        // remain at dual therapy if at dual therapy and a1c <= target 
        // or if a1c > target and a1c is decreasing
        elseif ( ($this->isDual() && ($this->a1c <= $this->a1cTarget))
        		|| ($this->isDual() && ($this->a1c > $this->a1cTarget) && $this->a1cDecrease())){
            $this->selectMedicine(1);	
        	$this->selectMedicine(2);
            $this->therapy = "lifestyle + dual therapy";
        	$this->decision = "A1c less than or equal to target or A1c greater than target and decreasing, so continue with dual therapy.";
        }

        // dual to triple therapy: add medicine 3 if at dual therapy and a1c > target and a1c not decreasing
        elseif ( ($this->isDual() && ($this->a1c > $this->a1cTarget)) && !$this->a1cDecrease() )
        {
            $this->selectMedicine(1);
        	$this->selectMedicine(2);
            $this->selectMedicine(3);
            $this->therapy = "lifestyle + triple therapy";
            $this->decision = "A1c greater than target and A1C not decreasing, so adding third medicine for triple therapy.";
        }

        // start at triple therapy: select medicine 1 and 2 if a1c > 9 with no symptoms, and no medicine selected
        elseif (($this->a1c > 9) && $this->noTherapy() && !$this->symptoms)
        {
            $this->selectMedicine(1);
            $this->selectMedicine(2);
            $this->selectMedicine(3);
            $this->therapy = "lifestyle + triple therapy";
            $this->decision = "Start with triple therapy.";

        }
        
        // remain at triple therapy if at triple therapy and a1c <= target
        // or if a1c > target and a1c is decreasing
        elseif ( ($this->isTriple() && ($this->a1c <= $this->a1cTarget)) 
        		|| ($this->isTriple() && ($this->a1c > $this->a1cTarget) && $this->a1cDecrease()) )
        {
            $this->selectMedicine(1);
        	$this->selectMedicine(2);
            $this->selectMedicine(3);
        	$this->therapy = "lifestyle + triple therapy";
        	$this->decision = "A1c less than or equal to target or A1c is decreasing, so continue with triple therapy.";
        }
                
        // insulin therapy: at triple therapy and a1c > target and a1c not decreasing
        elseif (($this->isTriple() && ($this->a1c > $this->a1cTarget)&& !$this->a1cDecrease()))
        {
            $this->selectMedicine(1);
            $this->selectMedicine(2);
            $this->selectMedicine(3);
            $this->therapy = "lifestyle + triple therapy + insulin";
            $this->decision = "Add or intensify insulin";
            $this->medicine4 = "Insulin";
        }
        
        // insulin therapy: if a1c > 9 and symptoms 
        elseif ((($this->a1c > 9) && $this->noTherapy() && $this->symptoms))
        {
        	$this->therapy = "lifestyle + insulin";
        	$this->decision = "Start with insulin";
            $this->medicine4 = "Insulin";
        }
        
        else
        {
            $this->therapy = "No therapy";
            $this->decision = "No therapy selected.";
        }
        
        // generate side effects message for each selected medicine
        $this->genEffects();

        // generate alert message for side effects related to patient problems for each medicine
        $this->genAlert();
        $this->alert .= "<br>". $this->medeffects;	// append medicine side effects
        
    }
    
    /**
     * Generates side effects message for used medicines
     */
    private function genEffects() {
    	if ($this->medicine1 != "none")
    		$this->medeffects .= $this->medicine1. ":<br>". $this->effects[$this->medicine1]. "<br>";
    	if ($this->medicine2 != "none")
    		$this->medeffects .= $this->medicine2. ":<br>". $this->effects[$this->medicine2]. "<br>";
    	if ($this->medicine3 != "none")
    		$this->medeffects .= $this->medicine3. ":<br>". $this->effects[$this->medicine3]. "<br>";
    	if ($this->medicine4 != "none")
    		$this->medeffects .= $this->medicine4. ":<br>". $this->effects[$this->medicine4]. "<br>";  	 
    }

    /**
     * Generates alert message for medicine side effects related to patient problems
     */
    private function genAlert() {
    	    	
    	if ($this->medicine1 !== "none"){
    		$peffects = $this->patientEffects($this->medicine1);
    		if ($peffects !== ""){
    			$this->alert = $this->patientAlert. 
    						   $this->medicine1. ": ". $peffects. "<br>";	
    		}
    	}
    	if ($this->medicine2 !== "none"){
    		if ($this->patientEffects($this->medicine2) !== ""){
    			if ($this->alert === "")
    				$this->alert = $this->patientAlert;   			 
    			$this->alert .= $this->medicine2. ": ". $this->patientEffects($this->medicine2). "<br>";
    		}
    	}
    	if ($this->medicine3 !== "none"){
    		if ($this->patientEffects($this->medicine3) !== ""){
    			if ($this->alert === "")
    				$this->alert = $this->patientAlert;   			 
    			$this->alert .= $this->medicine3. ": ". $this->patientEffects($this->medicine3). "<br>";
    		}
    	}
    }
    
    /**
     * @param - medicine 
     * @return - returns side effects for a given medicine related to patient problems,
     * 			 or returns empty string "" if no side effects.
     */
    private function patientEffects($medicine) {
    	
    	$mh = $this->medhistory;
    	$problems = "";
    	 
    	if (($mh["hypo"] === "yes") && ($this->medicines[$medicine]["hypo"] > 0) )
    	{
    		$problems = "hypoglycemia";
    	}
    	if ($mh["weight"] === "yes" && ($this->medicines[$medicine]["weight"] > 0))
    	{
    		if ($problems !== "")
    			$problems .= ",";
    		$problems .= " weight gain";
    	}
    	if ($mh["renal_gu"] === "yes" && ($this->medicines[$medicine]["renal_gu"] > 0))
    	{
    		if ($problems !== "")
    			$problems .= ",";
    		$problems .= " renul or genitourinary failure";
    	}
    	if ($mh["gi_sx"] === "yes" && ($this->medicines[$medicine]["gi_sx"] > 0))
    	{
    		if ($problems !== "")
    			$problems .= ",";
    		$problems .= " gastrointestinal effects";
    	}
    	if ($mh["chf"] === "yes" && ($this->medicines[$medicine]["chf"] > 0))
    	{
    		if ($problems !== "")
    			$problems .= ",";
    		$problems .= " chronic heart failure";
    	}
    	if ($mh["cvd"] === "yes" && ($this->medicines[$medicine]["cvd"] > 0))
    	{
    		if ($problems !== "")
    			$problems .= ",";
    		$problems .= " cardiovascular disease";
    	}
    	if ($mh["bone"] === "yes" && ($this->medicines[$medicine]["bone"] > 0))
    	{
    		if ($problems !== "")
    			$problems .= ",";
    		$problems .= " bone fracture";
    	}
    	    	    	
    	return $problems;
    }
    
    
    /**
     * Selects first medicine from therapy table (mono, dual, or triple) that the patient is not allergic to.
     * Also gets the therapy description and generates messages for side medeffects.
     * @param $therapyType - 1 for mono, 2 for dual, and 3 for triple
     * @return bool - Returns true if results are successful
     */
    private function selectMedicine($therapyType) {

        if ($therapyType == 1)
        {
            $medlist = $this->monotherapy;
            $nMeds = count($this->monotherapy);
            //$medicine = $this->medicine1;
            $medicine = "none";
            $prevmed1 = "na";
            
        }
        elseif ($therapyType == 2)
        {
            $medlist = $this->dualtherapy;
            $nMeds = count($this->dualtherapy);
            //$medicine = $this->medicine2;
            $medicine = "none";
            $prevmed1 = $this->medicine1;
        }
        elseif ($therapyType == 3)
        {
            $medlist = $this->tripletherapy;
            $nMeds = count($this->tripletherapy);
            //$medicine = $this->medicine3;
            $medicine = "none";
            $prevmed2 = $this->medicine2;
            $prevmed1 = $this->medicine1;
        }
        else
        {
            return false;
        }

        // get medicine if not selected and no allergies
        $medCount = 0;
        while(($medicine =="none") && ($medCount < $nMeds))
        {
            if (($medlist[$medCount] != $prevmed1) && ($medlist[$medCount] != $prevmed2))
            {
            	$nAllergy = count($this->allergy);
            	$noAllergy = true;
            	for ( $i = 0; $i < $nAllergy; $i++)
            	{
            		if($medlist[$medCount] == $this->allergy[$i])
                		$noAllergy = false;
            	}
            	if ($noAllergy)
            		$medicine = $medlist[$medCount];
            	 
            }
            $medCount += 1;
        } // while

        
        // copy selected medicine into medicine 1, 2, or 3
        if ( ($therapyType == 1) && ($medicine != "none"))
        {
            $this->medicine1 = $medicine;
            $this->therapy = "lifestyle + monotherapy";
            return true;
        }
        elseif ( ($therapyType == 2) && ($medicine != "none"))
        {
            $this->medicine2 = $medicine;
            $this->therapy = "lifestyle + dual therapy";
            return true;

        }
        elseif (($therapyType == 3) && ($medicine != "none"))
        {
            $this->medicine3 = $medicine;
            $this->therapy = "lifestyle + triple therapy";
            return true;
        }
        else
            return false;
    }
    
    /**
     * @param $a1cval - sets a1c value
     */
    public function setA1C($a1cval)
    {
        $this->a1c = $a1cval;
    }

    /**
     * @return float - returns a1c value
     */
    public function getA1C()
    {
        return $this->a1c;
    }

    /**
     * @param $a1cval - sets last a1c value
     */
    public function setA1Clast($a1cval)
    {
        $this->a1clast = $a1cval;
    }

    /**
     * @return float - returns last a1c value
     */
    public function getA1Clast()
    {
        return $this->a1clast;
    }

    /**
     * @param $a1cval - sets a1c target value
     */
    public function setA1CTarget($a1cval)
    {
        $this->a1cTarget = $a1cval;
    }

    /**
     * @return float - returns target a1c value
     */
    public function getA1CTarget()
    {
        return $this->a1cTarget;
    }

    /**
     * @param $sval - sets symptoms (true/false)
     */
    public function setSymptoms($sval)
    {
        $this->symptoms = $sval;
    }

    /**
     * @return bool - returns symptoms
     */
    public function getSymptoms()
    {
        return $this->symptoms;
    }

    public function setAllergies($newAllergies)
    {
        $this->allergy = $newAllergies;
    }
    public function getAllergies()
    {
        return $this->allergy;
    }
    public function setMedhistory($newMedhistory)
    {
    	$this->medhistory = $newMedhistory;
    }
    public function getMedhistory()
    {
    	return $this->medhistory;
    }
    public function setMedicines($newMedicines)
    {
    	$this->medicines = $newMedicines;
    }
    public function getMedicines()
    {
    	return $this->medicines;
    }
    
    public function setMonotherapy($newTherapy)
    {
        $this->monotherapy = $newTherapy;
    }
    public function setDualtherapy($newTherapy)
    {
        $this->dualtherapy = $newTherapy;
    }
    public function setTripletherapy($newTherapy)
    {
        $this->tripletherapy = $newTherapy;
    }
    public function getMonotherapy()
    {
        return $this->monotherapy;
    }
    public function getDualtherapy()
    {
        return $this->dualtherapy;
    }
    public function getTripletherapy()
    {
        return $this->tripletherapy;
    }
    public function setMedicine1($med)
    {
        $this->medicine1 = $med;
    }
    public function getMedicine1()
    {
        return $this->medicine1;
    }
    public function setMedicine2($med)
    {
        $this->medicine2 = $med;
    }
    public function getMedicine2()
    {
        return $this->medicine2;
    }
    public function setMedicine3($med)
    {
        $this->medicine3 = $med;
    }
    public function getMedicine3()
    {
        return $this->medicine3;
    }
    public function setTherapy($ther)
    {
        $this->therapy = $ther;
    }
    public function getTherapy()
    {
        return $this->therapy;
    }
    public function getDecision()
    {
        return $this->decision;
    }
    public function getEffects()
    {
    	return $this->medeffects;
    }
	public function getAlert()
	{
		return $this->alert;
	}    
	
    /**
     * @return bool - returns true if medicine 1 selected
     */
    private function isMono() {
        return (($this->medicine1 != "none") && ($this->medicine2 == "none") && ($this->medicine3 == "none"));
    }

    /**
     * @return bool - returns true if medicines 1,2 selected
     */
    private function isDual() {
        return (($this->medicine1 != "none") && ($this->medicine2 != "none") && ($this->medicine3 == "none"));
    }

    /**
     * @return bool - returns true if medicines 1,2,3, selected
     */
    private function isTriple() {
        return (($this->medicine1 != "none") && ($this->medicine2 != "none") && ($this->medicine3 != "none"));
    }

    /**
     * @return bool - returns true if no medicines selected
     */
    private function noTherapy() {
        return (($this->medicine1 === "none") && ($this->medicine2 === "none") && ($this->medicine3 === "none"));
    }
    
    /**
     * @return bool - true if a1c is decreasing
     */
    private function a1cDecrease() {
    	return (($this->a1c - $this->a1clast) < 0);
    }

    /**
     * Print algorithm results
     */
    public function printResults() {
        echo "Algorithm decision: ";
        echo $this->decision;
        echo "<br>";
        echo "Therapy:  ";
        echo $this->therapy;
        echo "<br>";
        echo "Medicine1 = ";
        echo $this->medicine1;
        echo "<br>";
        echo "Medicine2 = ";
        echo $this->medicine2;
        echo "<br>";
        echo "Medicine3 = ";
        echo $this->medicine3;
        echo "<br>";
        echo "<br>";
        echo $this->alert;
        echo "<br>";
    }

    /**
     * Print A1c values
     */
    public function printA1C() {
        echo "A1c = ";
        echo $this->a1c;
        echo "<br>";
        echo "A1c last = ";
        echo $this->a1clast;
        echo "<br>";
        echo "A1c target = ";
        echo $this->a1cTarget;
        echo "<br>";
        echo "Symptoms = ";
        echo $this->symptoms;
        echo "<br>";
    }

    /**
     * print allergies
     */
    public function printAllergies() {
        echo "Allergies = ";
        print_r($this->allergy);
        echo "<br>";
    }

    /**
     * print therapy medicine tables
     */
    public function printTherapyTables() {
        echo "Monotherapy Table = ";
        print_r($this->monotherapy);
        echo "<br>";
        echo "Dual Therapy Table = ";
        print_r($this->dualtherapy);
        echo "<br>";
        echo "Triple Therapy Table = ";
        print_r($this->tripletherapy);
        echo "<br>";
    }

}

?>