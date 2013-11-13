<?php
/**
 * Class algorithm
 * @author - Jeff Andre, (jandre@bu.edu)
 * @version 2.0
 * @date - 11/13/2013
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
    var $therapy = "none";      // therapy description

    // therapy medicine tables
    var $monotherapy = array("Metformin", "GLP_1RA", "DPP4_i", "AG_i", "SGLT_2","TZD", "SU_GLN");
    var $dualtherapy = array("GLP_1RA", "DPP4_i", "TZD", "SGLT_2", "BasalInsulin", "Colesevelam",
        "Bromocriptine_QR", "AG_i", "SU_GLN");
    var $tripletherapy = array("GLP_1RA", "TZD","SGLT_2", "BasalInsulin", "DPP4_i", "Colesevelam",
        "Bromocriptine_QR", "AG_i", "SU_GLN");
       
    // medicines
    var $medicines = array (
    		"Metformin" =>  array("hypo" =>"0", "weight" =>"1", "renul_gu" => "3", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "1", "bone" => "0"),
    		"GLP_1RA" =>  array("hypo" =>"0", "weight" =>"1", "renul_gu" => "3", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "0", "bone" => "0"),
        	"DPP4_i" =>  array("hypo" =>"0", "weight" =>"0", "renul_gu" => "0", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "0", "bone" => "0"),
        	"TZD" =>  array("hypo" =>"0", "weight" =>"3", "renul_gu" => "3", 
    						"gi_sx" => "0", "chf" => "2", "cvd" => "0", "bone" => "2"),
        	"AG_i" =>  array("hypo" =>"0", "weight" =>"0", "renul_gu" => "0", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "0", "bone" => "0"),
            "Colesevelam" =>  array("hypo" =>"0", "weight" =>"0", "renul_gu" => "0", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "0", "bone" => "0"),
            "Bromocriptine_QR" =>  array("hypo" =>"0", "weight" =>"0", "renul_gu" => "0", 
    						"gi_sx" => "2", "chf" => "0", "cvd" => "1", "bone" => "0"),
            "SU_GLN" =>  array("hypo" =>"2", "weight" =>"3", "renul_gu" => "3", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "1", "bone" => "0"),
            "BasalInsulin" =>  array("hypo" =>"3", "weight" =>"3", "renul_gu" => "3", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "0", "bone" => "0"),
            "SGLT_2" =>  array("hypo" =>"0", "weight" =>"1", "renul_gu" => "3", 
    						"gi_sx" => "0", "chf" => "0", "cvd" => "0", "bone" => "2"),
    );
    
    // algorithm decision & alert message for contraindications
    var $decision ="";
    var $alertmessage = "";

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
        elseif ((($this->a1c >= 6.5)&&($this->a1c < 7.5)&&($this->noTherapy() )) || ($this->isMono() && ($this->a1c <= $this->a1cTarget)) )
        {
            $this->selectMedicine(1);
            $this->decision = "Start or continue with mono therapy.";
        }

        // mono to dual therapy: add medicine 2 if at mono therapy and a1c > target
        elseif ( $this->isMono() && ($this->a1c > $this->a1cTarget) ){
            $this->selectMedicine(2);
            $this->decision = "A1c greater than target, so adding second medicine for dual therapy.";
        }

        // start at dual therapy: select medicine 1 & 2 if 7.5 <= a1c < 9 and no medicine selected
        elseif( (($this->a1c >= 7.5) && (($this->a1c <= 9) && $this->noTherapy() )) )
        {
            $this->selectMedicine(1);
            $this->selectMedicine(2);
            $this->decision = "Starting with dual therapy.";
        }

        // remain at dual therapy: select medicine 2 if at dual therapy and a1c <= target
        elseif ( ($this->isDual() && ($this->a1c <= $this->a1cTarget))){
            $this->selectMedicine(2);
            $this->decision = "A1c less than or equal to target, so continue with dual therapy.";
        }

        // dual to triple therapy: add medicine 3 if at dual therapy and a1c > target
        elseif ( ($this->isDual() && ($this->a1c > $this->a1cTarget)) )
        {
            $this->selectMedicine(3);
            $this->decision = "A1c greater than target, so adding third medicine for triple therapy.";
        }

        // remain at triple therapy: select medicine 3 if at triple therapy and a1c <= target
        elseif ( ($this->isTriple() && ($this->a1c <= $this->a1cTarget)) )
        {
            $this->selectMedicine(3);
            $this->decision = "A1c less than or equal to target, so continue with triple therapy.";
        }

        // start at triple therapy: select medicine 1 and 2 if a1c > 9 with no symptoms, and no medicine selected
        elseif (($this->a1c > 9) && $this->noTherapy() && !$this->symptoms)
        {
            $this->selectMedicine(1);
            $this->selectMedicine(2);
            $this->selectMedicine(3);
            $this->decision = "Start with triple therapy.";

        }

        // insulin therapy: if a1c > 9 and symptoms
        elseif (($this->a1c > 9) && $this->noTherapy() && $this->symptoms)
        {
            $this->therapy = "lifestyle + insulin";
            $this->decision = "Start with Insulin.";
        }

        else
        {
            $this->therapy = "No therapy";
            $this->decision = "No therapy selected.";
        }
    }

    /**
     * Selects first medicine from therapy table (mono, dual, or triple) that the patient is not allergic to.
     * Also gets the therapy description and generates alerts for contraindications.
     * @param $therapyType - 1 for mono, 2 for dual, and 3 for triple
     * @return bool - Returns true if results are successful
     */
    private function selectMedicine($therapyType) {

        if ($therapyType == 1)
        {
            $medlist = $this->monotherapy;
            $nMeds = count($this->monotherapy);
            $medicine = $this->medicine1;
            $prevmed1 = "na";
        }
        elseif ($therapyType == 2)
        {
            $medlist = $this->dualtherapy;
            $nMeds = count($this->dualtherapy);
            $medicine = $this->medicine2;
            $prevmed1 = $this->medicine1;
        }
        elseif ($therapyType == 3)
        {
            $medlist = $this->tripletherapy;
            $nMeds = count($this->tripletherapy);
            $medicine = $this->medicine3;
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
        
        // check patient contraindications for each medicine and generate alert message
        $mh = $this->medhistory;
        if ($mh["hypo"] === "yes")
        {
        	$pmessage = "hypoglycemia! ";
        	$this->alertmessage .= $this->medMessage($medicine, $this->medicines[$medicine]["hypo"], $pmessage);
        }
        if ($mh["weight"] === "yes")
        {
        	$pmessage = "weight gain! ";
        	$this->alertmessage .= $this->medMessage($medicine, $this->medicines[$medicine]["weight"], $pmessage);
        }
        if ($mh["renal_gu"] === "yes")
        {
        	$pmessage = "renul or genitourinary problems! ";
        	$this->alertmessage .= $this->medMessage($medicine, $this->medicines[$medicine]["renul_gu"], $pmessage);
        }
        if ($mh["gi_sx"] === "yes")
        {
        	$pmessage = "gastrointestinal problems! ";
        	$this->alertmessage .= $this->medMessage($medicine, $this->medicines[$medicine]["gi_sx"], $pmessage);
        }
        if ($mh["chf"] === "yes")
        {
        	$pmessage = "chronic heart failure! ";
        	$this->alertmessage .= $this->medMessage($medicine, $this->medicines[$medicine]["chf"], $pmessage);
        }
        if ($mh["cvd"] === "yes")
        {
        	$pmessage = "cardiovascular disease! ";
        	$this->alertmessage .= $this->medMessage($medicine, $this->medicines[$medicine]["cvd"], $pmessage);
        }
        if ($mh["bone"] === "yes")
        {
        	$pmessage = "bone fracture! ";
        	$this->alertmessage .= $this->medMessage($medicine, $this->medicines[$medicine]["bone"], $pmessage);
        }
        
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
     * @param $med - medicine value
     * @param $medrisk - medicine risk value
     * @parm $pmessage - patient message
     * @return - contraindication alert message
     */
    private function medMessage($med, $medrisk,$pmessage)
    {
    	$cmessage = "";
    	if($medrisk == '1')
    		$cmessage = $med. " has few adverse events or possible benefits with patients at risk of ". $pmessage. "<br>";
    	elseif($medrisk == '2')
    		$cmessage = "Use ". $med. " with caution with patients at risk of ". $pmessage. "<br>";
    	elseif($medrisk == '3')
    		$cmessage = $med. " has likelihood of adverse event with patients at risk of ". $pmessage. "<br>";
    	return $cmessage;   	 
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
    public function getAlert()
    {
    	return $this->alertmessage;
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
        echo "Alert Message: ";
        echo "<br>";
        echo $this->alertmessage;
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