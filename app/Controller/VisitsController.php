<?php
/**
 * Visit controller.
 *
 * This file will render views from views/visits/
 *
 * PHP 5
 *
 * Copyright (c) Yingyuan Zhang (zyy2013@bu.edu)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Yingyuan Zhang (zyy2013@bu.edu)
 * @link          http://github.com/bumetcs/cs673
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
*/
class VisitsController extends AppController {
	
	public $uses = array();

    public $components = array('Algorithm');

    /**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */	
	public function index(){		  

        $visits = $this->Visit->find('all'); 
        $this->set('visits', $visits);
        //pr($visits);
	}
	
/**
 * Create new vitals_lab
 *
 * @param weight, height, bps, bpd, A1c, eGFR, notes, a1c_goal, weight_goal, drug_allergies
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
	public function add(){	
		$this->Session->delete('visit_id');

 		$p_id = $this->Session->read('patient_id');
 		$patient = $this->Visit->Patient->findById($p_id);
 		$this->set('patient', $patient);
 	    $this->Session->write('patient', $patient);
        $this->Session->write('patient_id', $p_id);

		 if ( $this->request->is('post')) {		
			$this->Visit->patient_id = $p_id;
			$this->Visit->create();
			
			if($this->Visit->save()){
				$v_id = $this->Visit->getLastInsertId();
        		//$visit = $this->Visit->findById($id);
        		//$this->Session->write('visit', $visit);
				$this->Session->write('visit_id', $v_id);

			/*vitals_labs table*/
				$vitals_labs = $this->request->data;
				$visit_id = $v_id;
				$weight = $vitals_labs['weight'];
				$height = $vitals_labs['height'];
				$weight_units = $vitals_labs['weight_units'];
				$height_units = $vitals_labs['height_units'];

            	if ($height_units == "Cm" && $weight_units == "Kg"){
                	$bmi = round((10000*$weight/$height/$height),1);
            	}
            	if ($height_units == "Inch" && $weight_units == "Lb"){
                	$bmi = round((703*$weight/$height/$height),1);
            	};
            	//pr($bmi); exit;

				$bps = $vitals_labs['bps'];
				$bpd = $vitals_labs['bpd'];
				$A1c = $vitals_labs['A1c'];
				$eGFR = $vitals_labs['eGFR'];
				$notes = $vitals_labs['notes'];
				$data = $vitals_labs;
				$this->Visit->VitalsLab->create();
				$this->Visit->VitalsLab->save($this->data);

			/*treatments table*/
				$treatments = $this->request->data;
				$visit_id = $v_id;
				$prescriber_username = $patient['patient_firstname'].' '.$patient['patient_lastname'];
				$a1c_goal = $treatments['a1c_goal'];
				$weight_goal = $treatments['weight_goal'];
				$data = $treatments;
				$this->Visit->Treatment->create();
				$this->Visit->Treatment->save($this->data);

			/*medhistory_complaints table*/
				$medhistory_complaints = $this->request->data;
				$visit_id = $v_id;
				$complaints = $medhistory_complaints['complaints'];
				$hypo = $medhistory_complaints['hypo'];
				$weight_gain = $medhistory_complaints['weight_gain'];
				$renal_gu = $medhistory_complaints['renal_gu'];
				$gi_sx = $medhistory_complaints['gi_sx'];
				$chf = $medhistory_complaints['chf'];
				$cvd = $medhistory_complaints['cvd'];
				$bone = $medhistory_complaints['bone'];
				$data = $medhistory_complaints;
				$this->Visit->MedhistoryComplaint->create();
				$this->Visit->MedhistoryComplaint->save($this->data);

			/*drug_allergies table*/
				$drug_allergies = $this->request->data;
				$patient_id = $p_id;
				$met = $drug_allergies['met'];
				$dpp_4i = $drug_allergies['dpp_4i'];
				$glp_1ra = $drug_allergies['glp_1ra'];
				$tzd = $drug_allergies['tzd'];
				$agi = $drug_allergies['agi'];
				$colsvl = $drug_allergies['colsvl'];
				$bcr_or = $drug_allergies['bcr_or'];
				$su_gln = $drug_allergies['su_gln'];
				$insulin = $drug_allergies['insulin'];
				$sglt_2 = $drug_allergies['sglt_2'];
				$praml = $drug_allergies['praml'];
				$data = $drug_allergies;
				$this->Visit->Patient->DrugAllergy->create();
				$this->Visit->Patient->DrugAllergy->save($this->data);

			/*diagnoses table*/
		
			}else {
				$this->Session->setFlash('Sorry, add visit failed.');
			}		
		}
	}
	
 /**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */       	
	public function show(){
		$p_id = $this->Session->read('patient_id');
		try{
			$patient = $this->Visit->Patient->findById($p_id);
			$this->set('patient', $patient);
      		$this->Session->write('patient_id', $p_id);
		}catch(NotFoundException $e){
			throw $e;
		}

    	//$v_id = $this->Session->read('visit_id');
    	$v_id = 1;
		try{
			$vitals_labs = $this->Visit->VitalsLab->findById($v_id);
			$this->set('vitals_labs', $vitals_labs);

			$treatments = $this->Visit->Treatment->findById($v_id);
			$this->set('treatments', $treatments);

			$medhistory_complaints = $this->Visit->MedhistoryComplaint->findById($v_id);
			$this->set('medhistory_complaints', $medhistory_complaints);

			$drug_allergies = $this->Visit->Patient->DrugAllergy->findById($p_id);
			$this->set('drug_allergies', $drug_allergies);

      		$this->Session->write('visit_id', $v_id);
		}catch(NotFoundException $e){
			throw $e;
		}
	}	
	
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();
		$this->set('title', "Title");
	
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;
	
		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
	
		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			} 
			throw new NotFoundException();
		}
	}

    public function algtest(){

        // Medicine list
        // "Metformin", "GLP-1RA", "DPP4-i", "AG-i", "SGLT-2","TZD", "SU/GLN",  "BasalInsulin", "Colesevelam",
        // "Bromocriptine-QR"

        // set A1C values
        $this->Algorithm->setA1C(6.6);
        $this->Algorithm->setA1Clast(6.4);
        $this->Algorithm->setA1CTarget(6.0);
        $this->Algorithm->setSymptoms(true);

        // set allergies
        $testAllergy = array("Metformin");
        $this->Algorithm->setAllergies($testAllergy);

        // set current medicines
        $this->Algorithm->setMedicine1("none");
        $this->Algorithm->setMedicine1("none");
        $this->Algorithm->setMedicine1("none");

        // run glcymic control algorithm
        $this->Algorithm->gcAlgorithm();


        // get algorithm results
        $decision = $this->Algorithm->getDecision();
        $therapy = $this->Algorithm->getTherapy();
        $medicine1 = $this->Algorithm->getMedicine1();
        $medicine2 = $this->Algorithm->getMedicine2();
        $medicine3 = $this->Algorithm->getMedicine3();

        $this->set('decision', $decision);
        $this->set('therapy', $therapy);
        $this->set('medicine1', $medicine1);
        $this->set('medicine2', $medicine2);
        $this->set('medicine3', $medicine3);

        $a1cnew = $this->Algorithm->getA1C();
        $this->set('a1cnew', $a1cnew);

    }

}

?>