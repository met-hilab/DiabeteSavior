<?php
/**
 * Patient controller.
 *
 * This file will render views from views/patients/
 *
 * PHP 5
 *
 * Copyright (c) Wenjie Shi (wjshi@bu.edu) 
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Wenjie Shi(wjshi@bu.edu)
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
class PatientsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	//function __construct() {
		//$this->assign('title', "TEST");
		//parent::__construct();
		//$this->set('title', "Title");
	//}

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

public function index(){
	//$this->authenticate_user();

	$patients = $this->Patient->find('all');
	$this->set('patients',$patients);
}


/**
 * Create new patient
 *
 * @param firstname, lastname, dob, gender
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
	public function add(){
		//$this->authenticate_user();
		if ($this->request->is('post')){
			$patient = $this->request->data['Patient'];
			$patient_firstname = $patient['patient_firstname'];
			$patient_lastname = $patient['patient_lastname'];
			$patient_middlename = $patient['patient_middlename'];
			$dob = $patient['dob'];
			//$picture = $patient['picture'];
			$occupation = $patient['occupation'];
			//enum type
			$gender = $patient['gender'];

			$race = $patient['race'];
			$street = $patient['street'];
			$postal_code = $patient['postal_code'];
			$city = $patient['city'];
			$state = $patient['state'];
			$data = $patient;
			$this->Patient->create();
			//$res = $this->Patient->save($this->data);
			
			if($this->Patient->save($this->data)){
				//$this->Session->setFlash($_SESSION["patientnum"].' Patient is saved.');
              	$patient_number = $_SESSION["patientnum"];
				$conditions = array("patient_number" => $patient_number);
                //$conditions = array("patient_number" => "M0000001");
                $patient = $this->Patient->find('first', array('conditions' => $conditions));
                $patient = $patient['Patient'];
                $this->Session->write('patient', $patient);
                $this->set('patient', $patient);
                $this->redirect(array('action'=>'view',$patient_number));
                 
			}else{
				//$this->Session->setFlash('Patient is not saved.');
				$this->redirect(array('action'=>'add'));
			}
		}
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

          if(!$this->request->is('post') && !$this->request->is('put')) {
                //$this->header('HTTP/1.1 403 Forbidden');
                //$this->Session->setFlash(__('Go away'));
                //throw new ForbiddenException();
                //$this->cakeError('error403');
                //exit;
              }
              if($this->request->is('post')){

              $patient_number = $this->request->data('patient_number');
              $patient_firstname = strtolower($this->request->data('patient_firstname'));
              $patient_lastname = strtolower($this->request->data('patient_lastname'));
              $patient_dob = $this->request->data('patient_dob');
              $conditions = array("patient_number" => $patient_number, strtolower("patient_firstname") => $patient_firstname, strtolower("patient_lastname") => $patient_lastname, "patient_dob" => $patient_dob);
              //$conditions = array("patient_number" => $patient_number);
              $patient = $this->Patient->find('first', array('conditions' => $conditions));
              $patient = $patient['Patient'];
              $res = new stdClass();
              $res->status = 0;
              $res->message = "Initialized";
              $res->data = null;
              if (!$patient) {
                $res->status = -1;
                $res->message = __d("search", "Search failed");
                $res->data = $patient;
              } else {
                $res->status = 1;
                $res->message = __d("search", "search succeed");
                $res->data = $patient;
                $this->Session->write('patient', $patient);
                $this->set('patient', $patient);
                $this->redirect(array('action'=>'view',$patient_number));
              }
//              $this->set('patient', $patient);
//              $this->autoRender = false;
//              $this->redirect(array('action'=>'view'));
                $this->Session->setFlash('Patient not found, please enter information again or add a new patient.');
              
              }

	}

/**
 * edit patient
 *
 * @param firstname, lastname, dob, gender
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
	public function edit(){
		//$this->authenticate_user();

		$patient_number = $this->request->params['pass'][0];
		$this->Patient->patient_number = $patient_number;
		if($this->Patient->exists()){
			if($this->request->is('post') || $this->request->is('put')){
				//save patient
				if($this->Patient->save($this->request->data)){
					$this->Session->setFlash('Patient was edited.');
					$this->redirect(array('action'=>'view'));
				}else{
					$this->Session->setFlash('Unable to edit patient. Please, try again.');
				}
			}else{
				$this->request->data = $this->Patient->read();
			}

		}else{
			$this->Session->setFlash('The patient you are trying to edit does not exist.');
			$this->redirect(array('action' => 'view'));
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
		//this->authenticate_user();


		//view all patients
		//$patients = $this->Patient->find(all);
		//$this->set('patients', $patients);

		//view a patient
		$patient_number = $this->request->params['pass'][0];
		try{

			$patient = $this->Patient->find('first',
				array('conditions' => array('Patient.patient_number' => $patient_number
			 	))
			);
			$this->set('patient', $patient);
		}catch(NotFoundException $e){
			throw $e;
			
		}
	}

 /**
 * Delete patient
 *
 * @param id
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
	public function delete(){
		//this->authenticate_user();

		$patient_number = $this->request->params['pass'][0];
 
 		$patient = $this->Patient->find('first',
				array('conditions' => array('Patient.patient_number' => $patient_number
			 	))
			);
 		$id = $patient['id'];
   		if( $this->request->is('get') ){
        	$this->Session->setFlash('Delete method is not allowed.');
        	$this->redirect(array('action' => 'view'));
        
	    }else{
    
     	   if( !$id ) {
    	        $this->Session->setFlash('Invalid id for patient');
    	        $this->redirect(array('action'=>'view'));
            
    	    }else{
    	        //delete patient
    	        if( $this->Patient->delete( $id ) ){
    	            //set to screen
    	            $this->Session->setFlash('Patient deleted.');
    	            //redirect to users's list
    	            $this->redirect(array('action'=>'view'));
                
    	        }else{  
     	           //if unable to delete
      	          $this->Session->setFlash('Unable to delete patient.');
      	          $this->redirect(array('action' => 'view'));
    	        }
    	    }
		}
	}
}