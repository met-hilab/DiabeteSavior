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

  public function beforeFilter() {
    parent::beforeFilter();
    $this->authenticate_user();
  }

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
 * Add a visit
 *
 * @param weight, height, bps, bpd, A1c, eGFR, notes, a1c_goal, weight_goal, drug_allergies
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function add(){  
    $p_id = $this->Session->read('patient_id');
    $this->Visit->Patient->id = $p_id;
    $patient = $this->Visit->Patient->read();
    $this->set('patient', $patient);
    $this->request->data['Visit']['patient_id'] = $p_id;
    $this->request->data['DrugAllergy']['patient_id'] = $p_id;
    
    if ($this->request->is('post')) {
      $this->_add();
    } else {
      $this->request->data['DrugAllergy'] = $patient['DrugAllergy']; 
    }
  }

 /**
 * The actual add action
 * @author Jason Lu
 * @version 1.0, 2013-10-31
 */

 private function _add() {
  // Uset IDs to make sure these are insert comments.
  unset($this->request->data['Visit']['id']);
  unset($this->request->data['Treatment']['id']);
  unset($this->request->data['MedhistoryComplaint']['id']);
  // BMI = ( Weight in Kilograms / ( Height in Meters x Height in Meters ) )
  // Caculate BMI in Metric. kg / m^2
  // Assume data are metric, more easier to caculate.
  $weight = (float)$this->request->data['VitalsLab']['weight'];
  //var_dump($weight);
  $height = (float)$this->request->data['VitalsLab']['height'] * 0.01;
  //var_dump($height);
  $bmi = (float)($weight / $height^2);
  //var_dump($bmi); exit;
  $this->request->data['VitalsLab']['bmi'] = $bmi;

  $this->Visit->create();
  if($this->Visit->saveAssociated($this->request->data)) {
    $id = $this->Visit->id;

    $drugAllergy = new DrugAllergy();
    $drugAllergy->create();
    if($drugAllergy->save($this->request->data)){
      $this->Session->write('visit_id', $id);
      $this->Session->setFlash('Visit added successfully!');
      $this->redirect(array('action'=>'current'));
    } else {
      $errors = $this->Visit->Patient->validationErrors;
      $this->Session->setFlash('Sorry, add allergy failed.');
    }
  } else {
    $errors = $this->Visit->validationErrors;
    $this->Session->setFlash('Sorry, add visit failed.');
  }
 }

 /**
 * Displays a current visit
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */         
  public function current(){
    $p_id = $this->Session->read('patient_id');
    $v_id = $this->Session->read('visit_id');
    
    $this->Visit->id = $v_id;
    $visit = $this->Visit->read();
    $this->set('visit', $visit);

    $this->Visit->Patient->id = $p_id;
    $patient = $this->Visit->Patient->read();
    $this->set('patient', $patient);
  }  



 /**
 * Displays a show visit
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
    $v_id = $this->request->pass[0];
    try{
      $visit = $this->Visit->findById($v_id);
      $this->set('visit', $visit);
    } catch(NotFoundException $e){
      throw $e;
    }
  }



// Medicine list
// "Metformin", "GLP_1RA", "DPP4_i", "AG_i", "SGLT_2","TZD", "SU_GLN",  "BasalInsulin", "Colesevelam",
// "Bromocriptine-QR"
  public function gcalgorithm(){
    $data = array('TreatmentRunAlgorithm' => array(
      'treatment_id' => '',
      'type' => '',
      'recommendations' => '',
      'medicine_name_one' => '',
      'dose_one' => '',
      'medicine_name_two' => '',
      'dose_two' => '',
      'medicine_name_three' => '',
      'dose_three' => '',
      'edited_by_user' => ''
    ));
    $this->request->data = $data;
    //return true;
    


    $p_id = $this->Session->read('patient_id');
    echo $p_id;

    $v_id = $this->Session->read('visit_id');
    echo $v_id;
    $t_id = $this->Session->read('treatment_id');
    echo $t_id;

    /* set A1C values */
    $vitals_labs = $this->Visit->VitalsLab->find('all', array(
      'conditions' => array('visit_id' => $v_id),
      'fields' => 'VitalsLab.A1c',
      'order' => 'VitalsLab.modified DESC'));
    $A1C = $vitals_labs[0]['VitalsLab']['A1c'];  //current a1c value
    $A1Clast = $vitals_labs[1]['VitalsLab']['A1c'];  // last a1c value
    $this->Algorithm->setA1C($A1C);
    $this->Algorithm->setA1Clast($A1Clast);

    $treatments = $this->Visit->Treatment->find('all', array(
      'conditions' => array('visit_id' => $v_id),
      'fields' => 'Treatment.a1c_goal',
      'order' => 'Treatment.modified DESC'));
    $A1CTarget = $treatments[0]['Treatment']['a1c_goal'];  //current a1c_goal value
    $this->Algorithm->setA1CTarget($A1CTarget);

    $this->Algorithm->setSymptoms(false);       // diabetes symptoms - only used for insulin therapy

    /* set allergies */
    $drug_allergies = $this->Visit->Patient->DrugAllergy->findById($p_id);  //current patient's drug allergies
    $Metformin = $drug_allergies['DrugAllergy']['met'];
    $GLP_1RA = $drug_allergies['DrugAllergy']['glp_1ra'];
    $DPP4_i = $drug_allergies['DrugAllergy']['dpp_4i'];
    $AG_i = $drug_allergies['DrugAllergy']['agi'];
    $SGLT_2 = $drug_allergies['DrugAllergy']['sglt_2'];
    $TZD = $drug_allergies['DrugAllergy']['tzd'];
    $SU_GLN = $drug_allergies['DrugAllergy']['su_gln'];
    $BasalInsulin = $drug_allergies['DrugAllergy']['insulin'];
    $Colesevelam = $drug_allergies['DrugAllergy']['colsvl'];

    $stack = array();
    if ($Metformin)
        array_push($stack,"Metformin");
    if ($GLP_1RA)
        array_push($stack, "GLP_1RA");
    if ($DPP4_i)
        array_push($stack, "DPP4_i");
    if ($AG_i)
        array_push($stack, "AG_i");
    if ($SGLT_2)
        array_push($stack, "SGLT_2");
    if ($SGLT_2)
        array_push($stack, "SGLT_2");
    if ($TZD)
        array_push($stack, "TZD");
    if ($SU_GLN)
        array_push($stack, "SU_GLN");
    if ($BasalInsulin)
        array_push($stack, "BasalInsulin");
    if ($Colesevelam)
        array_push($stack, "Colesevelam");

    $this->Algorithm->setAllergies($stack);

    /* set current medicines */
    $treatment_run_algorithms = $this->Visit->Treatment->TreatmentRunAlgorithm->findById($t_id); //current medicines
    $Medicine1 = $treatment_run_algorithms['TreatmentRunAlgorithm']['medicine_name_one'];
    $Medicine2 = $treatment_run_algorithms['TreatmentRunAlgorithm']['medicine_name_two'];
    $Medicine3 = $treatment_run_algorithms['TreatmentRunAlgorithm']['medicine_name_three'];
    if ($Medicine1 == null)
        $Medicine1 = "none";
    if ($Medicine2 == null)
        $Medicine2 = "none";
    if ($Medicine3 == null)
        $Medicine3 = "none";
    $this->Algorithm->setMedicine1($Medicine1);
    $this->Algorithm->setMedicine2($Medicine2);
    $this->Algorithm->setMedicine3($Medicine3);
    //pr($Medicine1); pr($Medicine2); pr($Medicine3); exit;

    /* run glcymic control algorithm */
    $this->Algorithm->gcAlgorithm();

    /* get algorithm results */
    $decision = $this->Algorithm->getDecision();
    $therapy = $this->Algorithm->getTherapy();
    $med1 = $this->Algorithm->getMedicine1();
    $med2 = $this->Algorithm->getMedicine2();
    $med3 = $this->Algorithm->getMedicine3();

    $this->set('decision', $decision);
    $this->set('therapy', $therapy);
    $this->set('medicine1', $med1);
    $this->set('medicine2', $med2);
    $this->set('medicine3', $med3);

    if ($this->request->is('post')) {
      $data = array(
        'treatment_id' => $t_id,
        'medicine_name_one' => $med1,
        'medicine_name_two' => $med2,
        'medicine_name_three' => $med3,
        'edited_by_user' => 'no');      
      $this->Visit->Treatment->TreatmentRunAlgorithm->create();
      if($this->Visit->Treatment->TreatmentRunAlgorithm->save($data)){
        $this->Session->setFlash('Algorithm results accepted successfully!');
        $this->redirect(array('action'=>'show'));
      } else {
        $this->Session->setFlash('Sorry, accept algorithm results failed.');
      }
    }
  }

  public function edit(){


  }


}

?>