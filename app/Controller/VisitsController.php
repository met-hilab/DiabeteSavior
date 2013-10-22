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
 * @param weight, height, bps, bpd, bmi, bmi_status, A1c, eGFR, notes
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
				$bmi = $vitals_labs['bmi'];
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
				$prescriber_username = $patient['patient_firstname'].' '.$patient['patient_lastname'];
				$a1c_goal = $treatments['a1c_goal'];
				$weight_goal = $treatments['weight_goal'];
				$data = $treatments;
				$this->Visit->Treatment->create();
				$this->Visit->Treatment->save($this->data);

			/*medhistory_complaints table*/


			/*drug_allergies table*/
				$drug_allergies = $this->request->data;
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
				$this->Visit->DrugAllergy->create();
				$this->Visit->DrugAllergy->save($this->data);

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

    	$v_id = $this->Session->read('visit_id');
		try{
			$vitals_labs = $this->Visit->Vitalslab->findById($v_id);
			$this->set('vitals_labs', $vitals_labs);
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

        $this->Algorithm->setA1C(6.2);
        $a1cnew = $this->Algorithm->getA1C();
        $this->set('a1cnew', $a1cnew);

    }

}

?>