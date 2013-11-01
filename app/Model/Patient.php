<?php
App::uses('AppModel', 'Model');
/**
 * Patient Model
 *
 * @property User $User
 * @property Diagnosis $Diagnosis
 * @property DrugAllergy $DrugAllergy
 * @property Visit $Visit
 */
class Patient extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'user_id' => array('notempty', 'numeric'),
    'patient_number' => array(
      'alphanumeric' => array(
        'rule' => array('alphanumeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'patient_firstname' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'patient_lastname' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'dob' => array(
      'date' => array(
        'rule' => array('date'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'gender' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'race' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    
    //the zip code validation 
    'postal_code' => array(
      'postal' => array(
        'rule' => array('postal'),
        //'message' => 'Your custom message here',
        'allowEmpty' => true,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    
  );

  //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
  public $belongsTo = array(
    'User' => array(
      'className' => 'User',
      'foreignKey' => 'user_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );

/**
 * hasMany associations
 *
 * @var array
 */
  public $hasMany = array(
    
    'Diagnosis' => array(
      'className' => 'Diagnosis',
      'foreignKey' => 'patient_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    ),
    'Visit' => array(
      'className' => 'Visit',
      'foreignKey' => 'patient_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    )
  );
  
  public $hasOne = array(
      'DrugAllergy' => array(
      'className' => 'DrugAllergy',
      'foreignKey' => 'patient_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    )
    );
/**
 * generate the patient_number (imcompletely)
 */  
  function beforeSave($options = array()) {
    //first we need to judge if this is a creation of a new patient or just an update        
    parent::beforeSave();
    if(empty($this->data['Patient']['id'])){
       $this->data['Patient']['patient_number'] = substr($this->data['Patient']['gender'], 0, 1) . substr($this->data['Patient']['patient_firstname'], 0, 1) . substr($this->data['Patient']['patient_lastname'], 0, 1) . substr($this->data['Patient']['dob'], 8, 2) . date('B');
       $this->data['Patient']['patient_number'] = strtolower($this->data['Patient']['patient_number']);
    }
    return true;
  }

  function afterFind($results, $primary = false) {
    $results = parent::afterFind($results, $primary);
    //var_dump($results);
    foreach ($results as $key => $val) {
        if (isset($val['Patient']['patient_number'])) {
            $results[$key]['Patient']['patient_number'] = strtoupper($val['Patient']['patient_number']);
        }
    }
    //$results['Patient']['patient_number'] = strtoupper($results['Patient']['patient_number']);
    return $results;
  }
}
