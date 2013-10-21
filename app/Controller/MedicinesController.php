<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Singh/garima
 * Date: 10/20/13
 * Time: 12:09 PM
 * To change this template use File | Settings | File Templates.
 */
Class MedicinesController extends AppController {

    public function index() {

        $Medicines= $this->Medicine->find('all');

        $this->set('Medicines',$Medicines);
    }


    public function add() {
      if($this->request->is('Post'))
      {
         $this->Medicine->save($this->request->data);
      }
    }

}

?>