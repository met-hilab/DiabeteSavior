<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Singh
 * Date: 10/20/13
 * Time: 12:09 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AppController', 'Controller');

class MedicinesController extends AppController {

    public $uses = array();

    /*public function index() {

        $Medicines= $this->Medicine->find('all');

        $this->set('Medicines',$Medicines);
    }
*/

    public function add() {
      /*if($this->request->is('Post'))
      $this->Medicine->save($this->request->data);
      }
*/
       $this->Session->delete('medicine_id');

        if ($this->request->is('post')){
            $medicine = $this->request->data['Medicine'];
/*            $medicine_name = $medicine['medicine_name'];
            $min_dose = $medicine['min_dose'];
            $max_dose = $medicine['max_dose'];
            $metric = $medicine['metric'];
            $hypo = $medicine['hypo'];
            $weight = $medicine['weight'];
            $renal_gu = $medicine['renal_gu'];
            $gi_sx = $medicine['gi_sx'];
            $chf = $medicine['chf'];
            $cvd = $medicine['cvd'];
            $bone= $medicine['bone'];

            $data = $medicine;*/
            $this->Medicine->create();
            //$res = $this->Patient->save($this->data);

            if($this->Medicine->save($this->data)){

                //$this->Session->setFlash($_SESSION["patientnum"].' Patient is saved.');
                //$patient_number = $_SESSION["patientnum"];
                //$conditions = array("patient_number" => $patient_number);
                //$conditions = array("patient_number" => "M0000001");
                //$patient = $this->Patient->find('first', array('conditions' => $conditions));
                //$patient = $patient['Patient'];
                $id = $this->Medicine->getLastInsertId();
                $medicine = $this->Medicine->findById($id);
                $this->Session->write('medicine_id', $id);
                $this->Session->write('medicine', $medicine);
                //var_dump($_SESSION); exit;
                //$this->set('patient', $patient);
                //$_SERVER['patient_number'] = $patient_number;
                //$this->redirect(array('action'=>'view',$patient_number));
                $this->redirect(array('action'=>'show'));

            }else{
                $this->Session->setFlash('medicine is not saved.');
                //$this->redirect(array('action'=>'add'));
            }

        }

    }



    public function edit(){
        $id = $this->Session->read('medicine_id');
        $this->Medicine->id = $id;
        if($this->Medicine->exists()){
            if($this->request->is('post') || $this->request->is('put')){                
                if($this->Medicine->save($this->request->data)){
                    $this->Session->setFlash('Medicine was edited.');
                    $this->redirect(array('action'=>'show'));
                }else{
                    $this->Session->setFlash('Unable to edit medicine. Please, try again.');
                }
            }else{
                $medicine = $this->Medicine->read();
        $this->set('medicine', $medicine);
            }
        }else{
            $this->Session->setFlash('The medicine you are trying to edit does not exist.');
            $this->redirect(array('action' => 'show'));
        }
    }

    public function show(){
        $id = $this->Session->read('medicine_id');
        try{
            $medicine = $this->Medicine->findById($id);
            $this->set('medicine', $medicine);
            $this->Session->write('medicine', $medicine);
            $this->Session->write('medicine_id', $id);
        }catch(NotFoundException $e){
            throw $e;
        }
    }

    public function delete(){
        //this->authenticate_user();
        $id = $this->Session->read('medicine_id');
        $medicine = $this->Medicine->findById($id);

        if($this->request->is('get') ){
            $this->Session->setFlash('Delete method is not allowed.');
            $this->redirect(array('action' => 'show'));
        } else {
            if(!$id) {
                $this->Session->setFlash('Invalid id for medicine');
                $this->redirect(array('action'=>'show'));
            }else{
                if( $this->Medicine->delete( $id ) ){
                    $this->Session->setFlash('Medicine deleted.');
                    $this->redirect(array('action'=>'add'));
                }else{  
                    $this->Session->setFlash('Unable to delete medicine.');
                    $this->redirect(array('action' => 'show'));
                }
            }
        }
    }

}

?>