<?php

/**
 * @author Jeff Andre
 * 11/21/13
 * 
 * Class algtest1 - PHPunit tests cases for the Glycemic Control Algorithm
 * 
 * Note: Copy AlgorithmComponent.php into algorithm.php, then comment out App::uses('Component', 'Controller') and
 * class AlgorithmComponent extends Component, then replace with class algorithm.
 * 
 * Use the command to run the test from command line from the directory that has both 
 * algtest1.php and algorithm.php files.
 * 
 * dir> phpunit algtest1
 * 
 */

include('algorithm.php');
require_once "PHPUnit/Autoload.php";

class algtest extends PHPUnit_Framework_TestCase {
	
	function test_gcalgorithm(){
		
		// Turn off all error reporting
		//error_reporting(0);
		
		// Report all errors except E_NOTICE
		// This is the default value set in php.ini
		error_reporting(E_ALL ^ E_NOTICE);
		
		// Medicine list
		// "Metformin", "GLP_1RA", "DPP4_i", "AG_i", "SGLT_2","TZD", "SU_GLN",  "BasalInsulin", "Colesevelam",
		// "Bromocriptine_QR"
		
		// patient medical history
		$medhistory = array("hypo" => "yes", "weight" => "yes", "renal_gu" => "yes", "gi_sx" => "yes",
				"chf" => "no", "cvd" => "no", "bone" => "no" );
		
		// hypoglycemic a1c < 4.1
		$testAllergy = array("none");
		$result = $this->algTest(1, 4, 6.4, 6.0, false, $testAllergy, "none", "none", "none", $medhistory);
		
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();

		$this->assertEquals($decision, "Warning: Patient is Hypoglycemic");
		$this->assertEquals($med1, "none");
		$this->assertEquals($med2, "none");
		$this->assertEquals($med3, "none");
		
		// normal a1c < 5.7
		$testAllergy = array("none");
		$result = $this->algTest(2, 5.6, 6.4, 6.0, false, $testAllergy, "none", "none", "none", $medhistory);
				
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();
		
		$this->assertEquals($decision, "Patient is normal (not at risk of diabetes).");
		$this->assertEquals($therapy, "none");
		$this->assertEquals($med1, "none");
		$this->assertEquals($med2, "none");
		$this->assertEquals($med3, "none");

		// pre-diabetes 5.7 <= a1c < 6.5
		$testAllergy = array("none");
		$result = $this->algTest(3, 5.7, 6.4, 6.0, false, $testAllergy, "none", "none", "none", $medhistory);
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();
		
		$this->assertEquals($decision, "Patient is at risk of diabetes.");
		$this->assertEquals($therapy, "lifestyle modification");
		$this->assertEquals($med1, "none");
		$this->assertEquals($med2, "none");
		$this->assertEquals($med3, "none");
		
		// start at mono therapy, a1c < 7.5
		$testAllergy = array("Metformin");
		$result = $this->algTest(4, 6.6, 6.4, 6.0, false, $testAllergy, "none", "none", "none", $medhistory);
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();
		
		$this->assertEquals($decision, "Start or continue with mono therapy.");
		$this->assertEquals($therapy, "lifestyle + monotherapy");
		$this->assertEquals($med1, "GLP_1RA");
		$this->assertEquals($med2, "none");
		$this->assertEquals($med3, "none");
		
		// start at tiple therapy ac1 > 9 and no symptoms
		$testAllergy = array("none");
		$result= $this->algTest(6, 9.1, 6.4, 6.0, false, $testAllergy, "none", "none", "none", $medhistory);
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();
		
		$this->assertEquals($decision, "Start with triple therapy.");
		$this->assertEquals($therapy, "lifestyle + triple therapy");
		$this->assertEquals($med1, "Metformin");
		$this->assertEquals($med2, "GLP_1RA");
		$this->assertEquals($med3, "TZD");
		
		// at mono therapy, a1c decreasing and > target
		$testAllergy = array("none");
		$result = $this->algTest(8, 6.6, 6.8, 6.0, false, $testAllergy, "Metformin", "none", "none", $medhistory);
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();
		
		$this->assertEquals($decision, "Start or continue with mono therapy.");
		$this->assertEquals($therapy, "lifestyle + monotherapy");
		$this->assertEquals($med1, "Metformin");
		$this->assertEquals($med2, "none");
		$this->assertEquals($med3, "none");

		// at mono therapy -> dual, a1c increasing and a1c > target
		$testAllergy = array("none");
		$result = $this->algTest(9, 6.8, 6.6, 6.0, false, $testAllergy, "Metformin", "none", "none", $medhistory);
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();
		
		$this->assertEquals($decision, "A1c greater than target and A1c not decreasing, so adding second medicine for dual therapy.");
		$this->assertEquals($therapy, "lifestyle + dual therapy");
		$this->assertEquals($med1, "Metformin");
		$this->assertEquals($med2, "GLP_1RA");
		$this->assertEquals($med3, "none");

		// at mono therapy -> dual, a1c increasing and a1c < target
		$testAllergy = array("none");
		$result = $this->algTest(10, 5.9, 6.6, 6.0, false, $testAllergy, "Metformin", "none", "none", $medhistory);
		$this->checkResults($result,"Start or continue with mono therapy.",
									"lifestyle + monotherapy", 
									"Metformin", "none","none");
		
		// at dual, a1c decreasing and a1c > target
		$testAllergy = array("none");
		$result = $this->algTest(11, 7.6, 7.8, 6.0, false, $testAllergy, "Metformin", "GLP_1RA", "none", $medhistory);
		$this->checkResults($result,"A1c less than or equal to target or A1c greater than target and decreasing, so continue with dual therapy.",
				"lifestyle + dual therapy",
				"Metformin", "GLP_1RA","none");
		
		// at dual -> triple with a1c > a1c target and a1c not decreasing
		$testAllergy = array("none");
		$result = $this->algTest(12, 6.6, 6.4, 6.0, false, $testAllergy, "Metformin", "GLP_1RA", "none", $medhistory);
		$this->checkResults($result,"A1c greater than target and A1C not decreasing, so adding third medicine for triple therapy.",
				"lifestyle + triple therapy",
				"Metformin", "GLP_1RA","TZD");
		
		// at triple, a1c decreasing and a1c > target and a1c decreasing
		$testAllergy = array("none");
		$result = $this->algTest(13, 7.6, 7.8, 6.0, false, $testAllergy, "Metformin", "GLP_1RA", "TZD", $medhistory);
		$this->checkResults($result,"A1c less than or equal to target or A1c is decreasing, so continue with triple therapy.",
				"lifestyle + triple therapy",
				"Metformin", "GLP_1RA","TZD");
		
		// at triple->insulin, a1c increasing and a1c > target and a1c decreasing
		$testAllergy = array("none");
		$result = $this->algTest(14, 7.8, 7.6, 6.0, false, $testAllergy, "Metformin", "GLP_1RA", "TZD", $medhistory);
		$this->checkResults($result,"Add or intensify insulin",
				"lifestyle + triple therapy + insulin",
				"Metformin", "GLP_1RA","TZD");
		
	}

	function checkResults($result, $rdecision, $ther, $med1, $med2, $med3){
		$decision = $result->getDecision();
		$therapy = $result->getTherapy();
		$med1 = $result->getMedicine1();
		$med2 = $result->getMedicine2();
		$med3 = $result->getMedicine3();
		
		$this->assertEquals($decision, $rdecision);
		$this->assertEquals($therapy, $ther);
		$this->assertEquals($med1, $med1);
		$this->assertEquals($med2, $med2);
		$this->assertEquals($med3, $med3);
		
	}

	/**
	 * Glycemic Control Algorithm Test bench
	 * 
	 * Creates algorithm object, sets algorithm parameters, runs algorithm and returns the algorithm object.
	 *
	 * @param $testNumber -
	 * @param $a1c          - current a1c value
	 * @param $a1clast      - last a1c value
	 * @param $a1cTarget    - a1c target value
	 * @param $symptoms     - Type II diabetes symptoms (true/false)
	 * @param $allergies    - patient drug allergies
	 * @param $med1			- previous medicine 1
	 * @param $med2			- previous medicine 2
	 * @param $med3			- previous medicine 3
	 * @param $medhistory	- patient medical history
	 */
	
	function algTest($testNumber, $a1c, $a1clast, $a1cTarget, $symptoms, $allergies, $med1, $med2, $med3, $medhistory) {
	
		echo "<br>";
		echo "Test Number ";
		echo $testNumber;
		echo "<br>";
	
		$alg1 = new algorithm();
	
		// set A1c values
		$alg1->setA1C($a1c);
		$alg1->setA1Clast($a1clast);
		$alg1->setA1CTarget($a1cTarget);
		$alg1->setSymptoms($symptoms);
	
		// Set allergies
		$alg1->setAllergies($allergies);
	
		// Set medicines
		$alg1->setMedicine1($med1);
		$alg1->setMedicine2($med2);
		$alg1->setMedicine3($med3);
	
		// set medical history
		$alg1->setMedhistory($medhistory);
	
		// print a1c values
		$alg1->printA1C();
		$alg1->printAllergies();
		echo "<br>";
	
		// run algorithm and print results
		$alg1->gcAlgorithm();
		echo "Results:";
		echo "<br>";
		$alg1->printResults();
		
		return $alg1;
	}
	
}
?>