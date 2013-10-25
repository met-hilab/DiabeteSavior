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
		'user_id' => array('type' => 'integer', 'null' => false, 'length' => 10, 'key' => 'index'),
		'patient_number' => array('type' => 'string', 'null' => false, 'length' => 8, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_firstname' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_lastname' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_middlename' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dob' => array('type' => 'date', 'null' => false),
		'picture' => array('type' => 'binary', 'null' => true, 'default' => null),
		'occupation' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'street' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'postal_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'patient_number' => array('column' => 'patient_number', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
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
			'id' => '526ab157-273c-4588-b10f-1714cbdd56cb',
			'created' => '2013-10-25 13:58:47',
			'modified' => '2013-10-25 13:58:47',
			'user_id' => 1,
			'patient_number' => 'Lorem ',
			'patient_firstname' => 'Lorem ipsum dolor sit amet',
			'patient_lastname' => 'Lorem ipsum dolor sit amet',
			'patient_middlename' => 'Lorem ipsum dolor sit amet',
			'dob' => '2013-10-25',
			'picture' => 'Lorem ipsum dolor sit amet',
			'occupation' => 'Lorem ipsum dolor sit amet',
			'street' => 'Lorem ipsum dolor sit amet',
			'postal_code' => 'Lor',
			'city' => 'Lorem ipsum dolor sit amet'
		),
	);

}
