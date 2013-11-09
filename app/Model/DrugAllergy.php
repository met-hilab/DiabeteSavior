<?php
App::uses('AppModel', 'Model');
/**
 * DrugAllergy Model
 *
 * @property Patient $Patient
 */
class DrugAllergy extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'patient_id' => 'notempty',
		'met' => 'notempty',
		'dpp_4i' => 'notempty',
		'glp_1ra' => 'notempty',
		'tzd' => 'notempty',
		'agi' => 'notempty',
		'colsvl' => 'notempty',
		'bcr_or' => 'notempty',
		'su_gln' => 'notempty',
		'insulin' => 'notempty',
		'sglt_2' => 'notempty',
		'praml' => 'notempty' ,
		'created' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
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
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
