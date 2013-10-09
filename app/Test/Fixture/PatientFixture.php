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
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false),
		'modified' => array('type' => 'datetime', 'null' => false),
		'patient_number' => array('type' => 'string', 'null' => false, 'length' => 8, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_firstname' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_lastname' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_middlename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dob' => array('type' => 'date', 'null' => false),
		'picture' => array('type' => 'binary', 'null' => true, 'default' => null),
		'occupation' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'street' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'postal_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'patient_number' => array('column' => 'patient_number', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '52549fbc-3980-458e-a592-1fcccbdd56cb',
			'created' => '2013-10-08 20:13:48',
			'modified' => '2013-10-08 20:13:48',
			'patient_number' => 'Lorem ',
			'patient_firstname' => 'Lorem ipsum dolor sit amet',
			'patient_lastname' => 'Lorem ipsum dolor sit amet',
			'patient_middlename' => 'Lorem ipsum dolor sit amet',
			'dob' => '2013-10-08',
			'picture' => 'Lorem ipsum dolor sit amet',
			'occupation' => 'Lorem ipsum dolor sit amet',
			'street' => 'Lorem ipsum dolor sit amet',
			'postal_code' => 1,
			'city' => 'Lorem ipsum dolor sit amet'
		),
	);

}
