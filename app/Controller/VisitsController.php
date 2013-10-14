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
		// $patients = $this->Visit->Patient->find('list'); 

		// if ( $this->request->is('post')) {
		// 	$visit = $this->request->data['VitalsLab'];
		// 	$patient_id = $visit['patient_id'];
		// 	//var_dump($patient_id); exit;
		// 	$data = $visit;
		// 	$this->Visit->create();
		// 	$this->Visit->save($this->data);
		// }
		// $this->set('patients',$patients);

		$visits = $this->Visit->find('list'); 
 
		if ( $this->request->is('post')) {
			$vitalslab = $this->request->data['VitalsLab'];
			$visit_id = $vitalslab['visit_id'];
			//var_dump($visit_id); exit;
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
				$this->redirect(array('action'=>'add'));
			}else {
				$this->Session->setFlash('Sorry, vitalsLab not saved. Try again please.');
			}
		}
		$this->set('visits',$visits);
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
	    $id = $this->request->params['pass'][0];
	    try {
	      $vitalslab = $this->Visit->VitalsLab->find('first', 
	        array('conditions' => array(
	          'VitalsLab.id' => $id
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

}

?>