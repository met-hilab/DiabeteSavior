<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jeff
 * Date: 10/21/13
 * Time: 2:08 PM
 *
 *  Component for Glycemic Control Algorithm.
 */

App::uses('Component', 'Controller');

/*
*
* Note: Patient information fields must be set first, then run gcAlgorithm() provide therapy results.
*/
class AlgorithmComponent extends Component {


    // patient information
    var $a1c = 0.0;             // patient a1c
    var $a1clast = 0.0;         // patient last a1c
    var $a1cTarget = 0.0;       // patient targe a1c
    var $symptoms = false;      // patient diabetes symptoms present or not
    var $allergy = array("none", "none", "none", "none", "none", "none", "none", "none","none", "none","none");

    // algorithm therapy results
    var $medicine1 = "none";    // mono therapy medicine 1
    var $medicine2 = "none";    // dual therapy medicine 2
    var $medicine3 = "none";    // triple therpay medicne 3
    var $therapy = "none";      // therapy description

    // therapy medicine tables
    var $monotherapy = array("Metformin", "GLP-1RA", "DPP4-i", "AG-i", "SGLT-2","TZD", "SU/GLN");
    var $dualtherapy = array("GLP-1RA", "DPP4-i", "TZD", "SGLT-2", "BasalInsulin", "Colesevelam",
        "Bromocriptine-QR", "AG-i", "SU/GLN");
    var $tripletherapy = array("GLP-1RA", "TZD","SGLT-2", "BasalInsulin", "DPP4-i", "Colesevelam",
        "Bromocriptine-QR", "AG-i", "SU/GLN");
    var $decision ="";

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
            $this->therapy = "Lifestyle";
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
            $this->therapy = "Lifestyle + Insulin";
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
     * Also gets the therapy description.
     * @param $therapyType - 1 for mono, 2 for dual, and 3 for triple
     * @return bool - Returns true if results are successful
     */
    private function selectMedicine($therapyType) {

        if ($therapyType == 1)
        {
            $medlist = $this->monotherapy;
            $nMeds = count($this->monotherapy);
            $medicine = $this->medicine1;
            $prevmed = "na";
        }
        elseif ($therapyType == 2)
        {
            $medlist = $this->dualtherapy;
            $nMeds = count($this->dualtherapy);
            $medicine = $this->medicine2;
            $prevmed = $this->medicine1;
        }
        elseif ($therapyType == 3)
        {
            $medlist = $this->tripletherapy;
            $nMeds = count($this->tripletherapy);
            $medicine = $this->medicine3;
            $prevmed = $this->medicine2;
        }
        else
        {
            return false;
        }

        // get medicine if not selected and no allergies
        $medCount = 0;
        while(($medicine =="none") && ($medCount < $nMeds))
        {
            if (($medlist[$medCount] != $this->allergy[$medCount]) && ($medlist[$medCount] != $prevmed))
            {
                $medicine = $medlist[$medCount];
            }
            $medCount += 1;
        } // while

        // copy selected medicine into medicine 1, 2, or 3
        if ( ($therapyType == 1) && ($medicine != "none"))
        {
            $this->medicine1 = $medicine;
            $this->therapy = "Lifestyle + Monotherapy";
            return true;
        }
        elseif ( ($therapyType == 2) && ($medicine != "none"))
        {
            $this->medicine2 = $medicine;
            $this->therapy = "Lifestyle + Dual Therapy";
            return true;

        }
        elseif (($therapyType == 3) && ($medicine != "none"))
        {
            $this->medicine3 = $medicine;
            $this->therapy = "Lifestyle + Triple Therapy";
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
        return (($this->medicine1 == "none") && ($this->medicine2 == "none") && ($this->medicine3 == "none"));
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
