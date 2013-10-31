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
    'format' => array('div', 'label', 'input', 'error'),
    'div' => array('class' => 'form-group'),
    'label' => array('class' => 'control-label'),
    'between' => '',
    'after' => ''
    //'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
  );
  
  private $_defaults = array(
    'class' => 'form-horizontal'
  );

  public $optionsYesNo = array('Yes' => 'Yes', 'No' => 'No');
  
  


  public function create($model, $options = array()) {
    $this->_defaults['inputDefaults'] = $this->_myInputDefaults;
    $defaults = $this->_defaults;
    if(is_array($options['inputDefaults'])) {
      foreach($options['inputDefaults'] as $key => $value) {
        $defaults['inputDefaults'][$key] = $value;
      }
      unset($options['inputDefaults']);
    }
    //$defaults['inputDefaults'] = Set::merge($this->_myInputDefaults, $defaults['inputDefaults']);
    $options = Set::merge($defaults, $options);
    return parent::create($model, $options);
  }

  public function input($fieldName, $options = array()) {
    if(strstr($fieldName, '.')) {
      $fnameOnly = substr($fieldName, strpos($fieldName, '.') + 1);
    } else {
      $fnameOnly = $fieldName;
    }
    
    $defaults = array(
      'placeholder' => Inflector::humanize($fnameOnly)
    );
    $options = Set::merge($defaults, $options);
    return parent::input($fieldName, $options);
  }

  public function bootstrapRadio($fieldName, $options = array(), $attributes = array()) {
    $inputDefaults = $this->_inputDefaults;
    //$attributes['separator'];
    $attributes = $this->_initInputField($fieldName, $attributes);
    $attributes['format'] = isset($attributes['format'])?$attributes['format']:$inputDefaults['format'];

    $out = '';
    
    $div = '';
    foreach($attributes['format'] as $ele) {
      $attributes[$ele] = isset($attributes[$ele])?$attributes[$ele]:$inputDefaults[$ele];
      switch ($ele) {
        case 'lebel':
          $label = $this->_getLabel($fieldName, $attributes);
          $out .= $label;
          # code...
          break;
        case 'div':
          $out .= '<div class="form-group">';// . $out . '</div>';
          break;

        
        default:
          $out .= $attributes[$ele];
          # code...
          break;
      }
    }
    
    
    foreach($options as $key => $value) {
      $out .= '<label><input name="' . $attributes['name'] . '" id="' . $attributes['id'].$value . '" type="radio" value="' . $value . '">' . $key . '</label>' . $attributes['separator'];
    }
    $out = $attributes['between'] . $out . $attributes['after'];

    
    
    return '<div class="form-group">' . $label . $out . '</div>';
  }


  public function email($fieldName, $options = array()) {
    $defaults = array(
      'placeholder' => Inflector::humanize($fieldName)
    );
    $defaults = Set::merge($this->_myInputDefaults, $defaults);
    $options = Set::merge($defaults, $options);
    return parent::email($fieldName, $options);
  }

  public function password($fieldName, $options = array()) {
    $defaults = array(
      'placeholder' => Inflector::humanize($fieldName)
    );
    $defaults = Set::merge($this->_myInputDefaults, $defaults);
    $options = Set::merge($defaults, $options);
    return parent::password($fieldName, $options);
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