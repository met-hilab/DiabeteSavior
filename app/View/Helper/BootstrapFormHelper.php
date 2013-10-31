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

  

  protected $_myInputDefaults = array(
    'class' => 'form-control',
    'format' => array('div', 'label', 'between', 'input', 'error', 'after'),
    'div' => array('class' => 'form-group'),
    'label' => array('class' => 'control-label'),
    'between' => '',
    'after' => ''
    //'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
  );
  
  private $_defaults = array(
    'class' => 'form-horizontal',
  );

  public function create($model, $options = array()) {
    //$this->_inputDefaults = $this->_myInputDefaults;
    $defaults = $this->_defaults;
    $defaults['inputDefaults'] = $this->_myInputDefaults;
    if(is_array($options['inputDefaults'])) {
      foreach($options['inputDefaults'] as $k => $v) {
        $defaults['inputDefaults'][$k] = $v;
      }
      unset($options['inputDefaults']);
    }
    $options = Set::merge($defaults, $options);
    return parent::create($model, $options);
  }

  public function input($fieldName, $options = array()) {
    $defaults = array(
      'placeholder' => Inflector::humanize($fieldName)
    );
    $options = Set::merge($defaults, $options);
    return parent::input($fieldName, $options);
  }

  public function submit($value = 'Save', $options = array()) {
    $defaults = array(
      'class' => 'btn btn-primary'
    );
    $options = Set::merge($defaults, $options);
    return parent::submit($value, $options);
  }

  public function date($fieldName, $options = array()) {
    $defaults = $this->_myInputDefaults;
    $options = Set::merge($defaults, $options);
    return parent::date($fieldName, $options);
  }

  public function select($fieldName, $options = array(), $attributes = array()) {
    $defaults = array('empty' => '-- SELECT --');
    $defaults = Set::merge($this->_myInputDefaults, $defaults);
    $attributes = Set::merge($defaults, $attributes);
    return parent::select($fieldName, $options, $attributes);
  }
}