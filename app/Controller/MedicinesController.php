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
            $this->Medicine->create();
            if($this->Medicine->save($this->data)){
                $id = $this->Medicine->getLastInsertId();
                $medicine = $this->Medicine->findById($id);
                $this->Session->write('medicine_id', $id);
                $this->Session->write('medicine', $medicine);
                $this->redirect(array('action'=>'show'));

            }else{
                $this->Session->setFlash('medicine is not saved.');
            }

        }

    }

    public function index(){
        $medicines = $this->Medicine->find('all');
        $this->set('medicines',$medicines);
        if ($this->request->is('post')){
            $id = $this->request->data('medicine_id');
            $medicine = $this->Medicine->findById($id);
            $this->Session->write('medicine_id', $id);
            $this->Session->write('medicine', $medicine);
            $this->redirect(array('action'=>'show'));
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