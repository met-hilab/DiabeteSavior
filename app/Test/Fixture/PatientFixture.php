<?php
/**
 * PatientFixture
 *
 */
class PatientFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'created' => array('type' => 'datetime', 'null' => false),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'last_name' => array('type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'patient_number' => array('type' => 'string', 'null' => false, 'length' => 8, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'comment' => 'generate automatically by a function', 'charset' => 'latin1'),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'gender' => array('type' => 'string', 'null' => false, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dob' => array('type' => 'date', 'null' => false),
		'first_name' => array('type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'visit_patient_num' => array('column' => 'patient_number', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'created' => '2013-09-30 19:24:14',
			'modified' => '2013-09-30 19:24:14',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'patient_number' => 'Lorem ',
			'id' => 1,
			'gender' => 'Lorem ipsum dolor sit ame',
			'dob' => '2013-09-30',
			'first_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
