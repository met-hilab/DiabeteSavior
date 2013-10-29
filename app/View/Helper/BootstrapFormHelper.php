<?php
/**
 * Application level Form Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Jason Lu
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('FormHelper', 'View/Helper');

/**
 * Bootstrap Form helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class BootstrapFormHelper extends FormHelper {
  public function create($model, $options = array()) {
    $defaults = array(
      'class' => 'form-horizontal',
      'inputDefaults' => array(
        'class' => 'form-control',
        'format' => array('div', 'label', 'input', 'error'),
        'div' => array('class' => 'form-group'),
        'label' => array('class' => ''),
        'between' => '',
        'after' => ''
        //'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
      )
    );
    $options = Set::merge($defaults, $options);
    return parent::create($model, $options);
  }

  public function submit($value = 'Save', $options = array()) {
    $defaults = array(
      'class' => 'btn btn-primary'
    );

    $options = Set::merge($defaults, $options);
    return parent::submit($value, $options);
  }
}