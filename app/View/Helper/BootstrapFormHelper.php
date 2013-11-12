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

  protected $_model = '';
  
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
    $this->_model = $model;
    return parent::create($model, $options);
  }

  public function input($fieldName, $options = array()) {
    $fieldNameShort = $fieldName;
    if(strstr($fieldName, '.')) {
      $fullName = explode('.', $fieldName);
      $model = $fullName[0];
      $fieldNameShort = end($fullName);
    }
    $defaults = array(
      'placeholder' => Inflector::humanize($fieldNameShort)
    );
    $options = Set::merge($defaults, $options);
    return parent::input($fieldName, $options);
  }

  public function bootstrapRadioYesNo($fieldName, $attributes = array()) {
    $optYesNo = array('Yes' => 'yes', 'No' => 'no');
    $attributes['default'] = 'no';
    return $this->bootstrapRadio($fieldName, $optYesNo, $attributes);
  }

  public function bootstrapRadioYesNoUnknow($fieldName, $attributes = array()) {
    $optYesNo = array('Yes' => 'yes', 'No' => 'no', 'Unknow' => 'unknow');
    $attributes['default'] = 'unknow';
    return $this->bootstrapRadio($fieldName, $optYesNo, $attributes);
  }

  public function bootstrapRadio($fieldName, $options, $attributes = array()) {
    $inputDefaults = $this->_inputDefaults;
    
    $separator = '&nbsp;&nbsp;&nbsp;';
    $model = $this->_model;
    $fieldNameShort = $fieldName;
    if(strstr($fieldName, '.')) {
      $fullName = explode('.', $fieldName);
      $model = $fullName[0];
      $fieldNameShort = end($fullName);
    }

    $attributes['label']['class'] = is_string($attributes['label']['class']) ? $attributes['label']['class'] : $inputDefaults['label']['class'];
    $attributes['div']['class'] = is_string($attributes['div']['class']) ? $attributes['div']['class'] : $inputDefaults['div']['class'];
    $attributes['label']['text'] = is_string($attributes['label']['text']) ? $attributes['label']['text'] : Inflector::humanize($fieldNameShort);
    
    $optDefault = is_string($attributes['default'])?$attributes['default']:'';


    $divOpen = '<div class="' . $attributes['div']['class'] . '">';
    $divClose = '</div>';
    $label = '<label class="' . $attributes['label']['class'] . '">' . $attributes['label']['text'] . '</label>';
    $between .= $attributes['between'];

    $out = '';
    foreach($options as $k => $v) {
      $name = $fieldNameShort;
      $id = $model.$fieldNameShort.$v;
      $checked = '';
      
      // Read current status from request->data obj
      $optDefault = is_string($this->request->data[$model][$fieldNameShort])?$this->request->data[$model][$fieldNameShort]:$optDefault;
      if($v == $optDefault) {
        $checked = 'checked="checked"';
      }
      $out .= '<label><input name="data['.$model.']['.$name.']" id="'.$id.'" type="radio" value="' . $v . '" ' . $checked . '>' . $k . '</label>';
      $out .= $separator;
    }
    $after = $attributes['after'];
    $out = $divOpen . $label . $between . $out . $after . $divClose;
    return $out;
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