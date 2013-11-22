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
    $this->set('unitType', $_COOKIE['unitType']);
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
    $visit = $this->Visit->find('first', array(
      'conditions' => array('patient_id' => $p_id),
      'order' => 'Visit.modified DESC'));
    
    if ($this->request->is('post')) {
      $this->_add();
    } else {
      $this->request->data['DrugAllergy'] = $patient['DrugAllergy'];
      $this->request->data['MedhistoryComplaint'] = $visit['MedhistoryComplaint'];  
      $this->request->data['MedhistoryComplaint']['complaints'] = null;   
    }
  }

 /**
 * The actual add action
 * @author Jason Lu, Yingyuan Zhang
 * @version 1.2, 2013-11-16
 */
  private function _add() {
    // Uset IDs to make sure these are insert comments.
    unset($this->request->data['Visit']['id']);
    unset($this->request->data['Treatment']['id']);
    unset($this->request->data['MedhistoryComplaint']['id']);
    
    $this->request->data['Treatment']['prescriber_username'] = "NO DATA";
    // BMI = ( Weight in Kilograms / ( Height in Meters x Height in Meters ) )
    // Caculate BMI in Metric. kg / m^2
    // Assume data are metric, more easier to caculate.
    $weight = (float)$this->request->data['VitalsLab']['weight'];
    $height = (float)$this->request->data['VitalsLab']['height'] * 0.01;   
    $bmi = (float)($weight / pow($height,2));
    $this->request->data['VitalsLab']['bmi'] = round($bmi,1);

    $this->request->data['VitalsLab']['bps'] = 0;
    $this->request->data['VitalsLab']['bpd'] = 0;

    $p_id = $this->Session->read('patient_id');
    $patient = $this->Visit->Patient->findById($p_id);
    $race = $patient['Patient']['race'];

    //Weight Classifications
    if ($race == 'Asian or Asian American'){
      switch ($bmi) {
        case ($bmi<16.0):
          $bmi_status = 'Severely underweight';
          break;
        case ($bmi>=16.0 && $bmi<18.5):
          $bmi_status = 'Underweight';
          break;
        case ($bmi>=18.5 && $bmi<23.0):
          $bmi_status = 'Normal range';
          break;
        case ($bmi>=23.0 && $bmi<25.0):
          $bmi_status = 'Overweight';
          break;
        case ($bmi>=25.0 && $bmi<35.0):
          $bmi_status = 'Obese';
          break;
        case ($bmi>=35.0):
          $bmi_status = 'Extremely obese';
          break;
      }
    } else {
      switch ($bmi) {
        case ($bmi<16.0):
          $bmi_status = 'Severely underweight';
          break;
        case ($bmi>=16.0 && $bmi<18.5):
          $bmi_status = 'Underweight';
          break;
        case ($bmi>=18.5 && $bmi<25.0):
          $bmi_status = 'Normal range';
          break;
        case ($bmi>=25.0 && $bmi<30.0):
          $bmi_status = 'Overweight';
          break;
        case ($bmi>=30.0 && $bmi<40.0):
          $bmi_status = 'Obese';
          break;
        case ($bmi>=40.0):
          $bmi_status = 'Extremely obese';
          break;
      }
    }
    $this->request->data['VitalsLab']['bmi_status'] = $bmi_status;

    //Target Weight Suggestion    
    if ($bmi_status != 'Normal range'){
      $height_val = $height/0.01;
      if ($race == 'Asian or Asian American'){
        switch ($bmi_status) {
          case 'Severely underweight':
            $target_weight = 16.0*pow($height_val,2)/10000;
            break;
          case 'Underweight':
            $target_weight = 18.5*pow($height_val,2)/10000;
            break;
          case 'Overweight':
            $target_weight = 22.9*pow($height_val,2)/10000;
            break;
          case 'Obese':
            $target_weight = 24.9*pow($height_val,2)/10000;
            break;
          case 'Extremely obese':
            $target_weight = 34.9*pow($height_val,2)/10000;
            break;
        }
      } else {
        switch ($bmi_status) {
          case 'Severely underweight':
            $target_weight = 16.0*pow($height_val,2)/10000;
            break;
          case 'Underweight':
            $target_weight = 18.5*pow($height_val,2)/10000;
            break;
          case 'Overweight':
            $target_weight = 24.9*pow($height_val,2)/10000;
            break;
          case 'Obese':
            $target_weight = 29.9*pow($height_val,2)/10000;
            break;
          case 'Extremely obese':
            $target_weight = 39.9*pow($height_val,2)/10000;
            break;
        }
      }
      $notes = $this->request->data['VitalsLab']['notes'];
      $weight_goal = $this->request->data['Treatment']['weight_goal'];
      if ( $weight_goal < $target_weight ){
        $target_weight = $weight_goal;
      }
      $this->request->data['VitalsLab']['notes'] = 'Target weight is '.round($target_weight,1).' kg / ' . round($target_weight * 2.20462). ' lb.'."\n".$notes;
    }

    $this->Visit->create();
    if($this->Visit->saveAssociated($this->request->data)) {
      $id = $this->Visit->id;
      $t_id = $this->Visit->Treatment->id;

      $drugAllergy = new DrugAllergy();
      $drugAllergy->create();
      if($drugAllergy->save($this->request->data)){
        $this->Session->write('visit_id', $id);
        $this->Session->write('treatment_id', $t_id);
        $this->Session->setFlash('Visit added successfully!', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('action'=>'current'));
      } else {
        $errors = $this->Visit->Patient->validationErrors;
        $this->Session->setFlash('Sorry, add allergy failed.', 'default', array('class' => 'alert alert-danger'));
      }
    } else {
      $errors = $this->Visit->validationErrors;
      $this->Session->setFlash('Sorry, add visit failed.', 'default', array('class' => 'alert alert-danger'));
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

    $p_id = $this->Session->read('patient_id');
    $v_id = $this->Session->read('visit_id');
    $t_id = $this->Session->read('treatment_id');

    /* set A1C values */
    $visit = $this->Visit->find('all', array(
      'conditions' => array('patient_id' => $p_id),
      'fields' => 'Visit.id',
      'order' => 'Visit.modified DESC'));
    $v_current_id = $visit[0]['Visit']['id'];  //current visit id
    $v_last_id = $visit[1]['Visit']['id'];  // last visit id

    $medhistory_complaints = $this->Visit->MedhistoryComplaint->findByVisit_id($v_current_id);
    $current_pregnancy = $medhistory_complaints['MedhistoryComplaint']['current_pregnancy'];

    if ($current_pregnancy == 'yes'){
      $this->Session->setFlash('Sorry, this algorithm does not apply to diabetes patients during pregnancy.', 'default', array('class' => 'alert alert-danger'));
      $this->redirect(array('action'=>'current'));
    } 
    else {

      $current_visit = $this->Visit->VitalsLab->findByVisit_id($v_current_id);
      $A1C = $current_visit['VitalsLab']['A1c'];  //current a1c value
      $this->Algorithm->setA1C($A1C);

      $last_visit = $this->Visit->VitalsLab->findByVisit_id($v_last_id);
      $A1Clast = $last_visit['VitalsLab']['A1c'];  // last a1c value
      $this->Algorithm->setA1Clast($A1Clast);
      
      $treatments = $this->Visit->Treatment->findByVisit_id($v_id);
      $A1CTarget = $treatments['Treatment']['a1c_goal'];  //current a1c_goal value
      $this->Algorithm->setA1CTarget($A1CTarget);

      $this->Algorithm->setSymptoms(false);  // diabetes symptoms - only used for insulin therapy

      /* set allergies */
      $drug_allergies = $this->Visit->Patient->DrugAllergy->findByPatient_id($p_id);  //current patient's drug allergies
      $Metformin = $drug_allergies['DrugAllergy']['met'];
      $GLP_1RA = $drug_allergies['DrugAllergy']['glp_1ra'];
      $DPP4_i = $drug_allergies['DrugAllergy']['dpp_4i'];
      $AG_i = $drug_allergies['DrugAllergy']['agi'];
      $SGLT_2 = $drug_allergies['DrugAllergy']['sglt_2'];
      $TZD = $drug_allergies['DrugAllergy']['tzd'];
      $SU_GLN = $drug_allergies['DrugAllergy']['su_gln'];
      $BasalInsulin = $drug_allergies['DrugAllergy']['insulin'];
      $Colesevelam = $drug_allergies['DrugAllergy']['colsvl'];
      $Bromocriptine_QR = $drug_allergies['DrugAllergy']['bcr_or'];
      
      $stack = array();
      if ($Metformin === "yes")
      	array_push($stack,"Metformin");
      if ($GLP_1RA === "yes")
      	array_push($stack, "GLP_1RA");
      if ($DPP4_i === "yes")
      	array_push($stack, "DPP4_i");
      if ($AG_i === "yes")
      	array_push($stack, "AG_i");
      if ($SGLT_2 === "yes")
      	array_push($stack, "SGLT_2");
      if ($TZD === "yes")
      	array_push($stack, "TZD");
      if ($SU_GLN === "yes")
      	array_push($stack, "SU_GLN");
      if ($BasalInsulin === "yes")
      	array_push($stack, "BasalInsulin");
      if ($Colesevelam === "yes")
      	array_push($stack, "Colesevelam");
      if ($Bromocriptine_QR === "yes")
      	array_push($stack, "Bromocriptine_QR");

      $this->Algorithm->setAllergies($stack);

      /* set current medicines */
      $last_visit_treatment = $this->Visit->Treatment->findByVisit_id($v_last_id);  //last treatment_run_algorithms data
      $Medicine1 = $last_visit_treatment['TreatmentRunAlgorithm'][0]['medicine_name_one'];
      $Medicine2 = $last_visit_treatment['TreatmentRunAlgorithm'][0]['medicine_name_two'];
      $Medicine3 = $last_visit_treatment['TreatmentRunAlgorithm'][0]['medicine_name_three'];
      if ($Medicine1 == null)
          $Medicine1 = "none";
      if ($Medicine2 == null)
          $Medicine2 = "none";
      if ($Medicine3 == null)
          $Medicine3 = "none";

      $this->Algorithm->setMedicine1($Medicine1);
      $this->Algorithm->setMedicine2($Medicine2);
      $this->Algorithm->setMedicine3($Medicine3);

      // set medical history
      $hypo = $medhistory_complaints['MedhistoryComplaint']['hypo'];
      $weight_gain = $medhistory_complaints['MedhistoryComplaint']['weight_gain'];
      $renal_gu = $medhistory_complaints['MedhistoryComplaint']['renal_gu'];
      $gi_sx = $medhistory_complaints['MedhistoryComplaint']['gi_sx'];
      $chf = $medhistory_complaints['MedhistoryComplaint']['chf'];
      $cvd = $medhistory_complaints['MedhistoryComplaint']['cvd'];
      $bone = $medhistory_complaints['MedhistoryComplaint']['bone'];
      
      $medhistory = array("hypo" => $hypo, "weight" => $weight_gain, "renal_gu" => $renal_gu, "gi_sx" => $gi_sx,
      		"chf" => $chf, "cvd" => $cvd, "bone" => $bone );
      $this->Algorithm->setMedhistory($medhistory);
      
      /* run glcymic control algorithm */
      $this->Algorithm->gcAlgorithm();
  	
      /* get algorithm results */
      $decision = $this->Algorithm->getDecision();
      $therapy = $this->Algorithm->getTherapy();
      $med1 = $this->Algorithm->getMedicine1();
      $med2 = $this->Algorithm->getMedicine2();
      $med3 = $this->Algorithm->getMedicine3();
      $medalert = $this->Algorithm->getAlert();
      
      $this->set('decision', $decision);
      $this->set('therapy', $therapy);
      $this->Session->write('therapy', $therapy);
      $this->set('medicine1', $med1);
      $this->Session->write('med1', $med1);
      $this->set('medicine2', $med2);
      $this->Session->write('med2', $med2);
      $this->set('medicine3', $med3);
      $this->Session->write('med3', $med3);
      $this->set('medalert', $medalert);
      $this->Session->write('medalert', $medalert);

      /* accept algorithm results */
      if ($this->request->is('post')) {  
        $data = array('TreatmentRunAlgorithm' =>array(
          'treatment_id' => $t_id,
          'type' => $therapy,
          'medicine_name_one' => $med1,
          'medicine_name_two' => $med2,
          'medicine_name_three' => $med3,
          'recommendations' => str_replace('<br>', "\n", $medalert),
          'edited_by_user' => 'no'
      )); 
        $this->Visit->Treatment->TreatmentRunAlgorithm->create();
        if($this->Visit->Treatment->TreatmentRunAlgorithm->save($data)){
          $this->Session->setFlash('Algorithm results accepted successfully!', 'default', array('class' => 'alert alert-success'));
          $this->redirect(array('action'=>'../patients/show'));
        } else {
          $this->Session->setFlash('Sorry, accept algorithm results failed.', 'default', array('class' => 'alert alert-danger'));
        };
      }

    }
  }

  public function edit(){    
      $t_id = $this->Session->read('treatment_id');
      $type = $this->Session->read('therapy');
      $med1 = $this->Session->read('med1');
      $med2 = $this->Session->read('med2');
      $med3 = $this->Session->read('med3');
      $medalert = $this->Session->read('medalert');
      $this->set('type', $type);
      $this->set('med1', $med1);
      $this->set('med2', $med2);
      $this->set('med3', $med3);
      $this->set('medalert', $medalert);

      if($this->request->is('post') || $this->request->is('put')){       
        $data = $this->request->data;   
        $data['TreatmentRunAlgorithm']['treatment_id'] = $t_id;    
        $data['TreatmentRunAlgorithm']['edited_by_user'] = 'yes';
        
        $this->Visit->Treatment->TreatmentRunAlgorithm->create();

        if($this->Visit->Treatment->TreatmentRunAlgorithm->save($data)){
          $this->Session->setFlash('Algorithm results edited successfully!', 'default', array('class' => 'alert alert-success'));
          $this->redirect(array('action'=>'../patients/show'));
        } else {
          $this->Session->setFlash('Sorry, edit algorithm results failed.', 'default', array('class' => 'alert alert-danger'));
        }
    }
  }

}

?>