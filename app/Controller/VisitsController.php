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
 * Search a patient
 *
 * @param patientid, firstname, lastname, dob
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
	public function search(){

		if($this->request->is('post')){
			$patient_number = $this->request->data('patient_number');
			$patient_firstname = strtolower($this->request->data('Patient_FirstName'));
			$patient_lastname = strtolower($this->request->data('Patient_LastName'));
			$patient_dob = $this->request->data('patient_dob');
			$conditions = array(
				"patient_number" => $patient_number, 
				strtolower("patient_firstname") => $patient_firstname, 
				strtolower("patient_lastname") => $patient_lastname, 
				"dob" => $patient_dob);
			$visit = $this->Visit->Patient->find('first', array('conditions' => $conditions));
			$visit = $visit['Patient'];
			$res = new stdClass();
			$res->status = 0;
			$res->message = "Initialized";
			$res->data = null;
			if (!$visit) {
				$res->status = -1;
				$res->message = __d("search", "Search failed");
				$res->data = $visit;
			} else {
				$res->status = 1;
				$res->message = __d("search", "search succeed");
				$res->data = $visit;
				$this->Session->write('visit', $visit);
				$this->redirect(array('action'=>'add', $patient_number));
			}
			$this->Session->setFlash('Patient not found, please enter information again or add a new patient.');
		}
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
 
 		$patient_number = $this->request->params['pass'][0];
		$patient = $this->Visit->Patient->find('first', array('conditions' => array('patient_number' => $patient_number)));
		$this->set('patient', $patient);

		if ( $this->request->is('post')) {
			$patient_id = $patient['Patient']['id'];
			//pr($patient_id); exit;
			//$data = array('patient_id' => $patient_id);

			$this->data['Visit']['patient_id'] = $patient_id;
			//var_dump($this->data); exit;
			$this->Visit->create();
			$this->Visit->patient_id = $patient_id;

			
			if($this->Visit->save()){
				$vitalslab = $this->request->data['VitalsLab'];
				$visit = $this->Visit->find('first', array('conditions' => array('patient_id' => $patient_id)));
				$visit_id = $visit['Visit']['id'];
				//pr($visit_id); exit;
				$weight = $vitalslab['weight'];
				$height = $vitalslab['height'];
				$bps = $vitalslab['bps'];
				$bpd = $vitalslab['bpd'];
				$bmi = $vitalslab['bmi'];
				$bmi_status = $vitalslab['bmi_status'];
				$A1c = $vitalslab['A1c'];
				$eGFR = $vitalslab['eGFR'];
				$notes = $vitalslab['notes'];
				$data = $vitalslab;
				$this->Visit->VitalsLab->create();
				if ($this->Visit->VitalsLab->save($this->data)) {
					$this->Session->setFlash('VitalsLab has been saved!');
					$this->redirect(array('action'=>'view', $visit_id));
				}else {
					$this->Session->setFlash('Sorry, vitalsLab not saved. Try again please.');
				}

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
	public function view(){
	    $visit_id = $this->request->params['pass'][0];
	    try {
	      $vitalslab = $this->Visit->VitalsLab->find('first', 
	        array('conditions' => array(
	          'VitalsLab.visit_id' => $visit_id
	        ))
	      );
	      $this->set('vitalslab', $vitalslab);
	    } catch (NotFoundException $e) {
	      throw $e;
	    }
	    //pr($id);
	    //pr($vitalslab);
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

     //$a1c = $this->Algorithm->getA1C();
        $this->Algorithm->printA1C();

    }

}

?>