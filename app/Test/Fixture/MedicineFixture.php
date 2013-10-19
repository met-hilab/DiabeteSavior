<?php
/**
 * MedicineFixture
 *
 */
class MedicineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false),
		'modified' => array('type' => 'datetime', 'null' => false),
		'medicine_name' => array('type' => 'string', 'null' => false, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'min_dose' => array('type' => 'float', 'null' => false),
		'max_dose' => array('type' => 'float', 'null' => false),
		'metric' => array('type' => 'string', 'null' => false, 'length' => 8, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'medicine_name' => array('column' => 'medicine_name', 'unique' => 1)
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
			'id' => 1,
			'created' => '2013-10-19 14:03:51',
			'modified' => '2013-10-19 14:03:51',
			'medicine_name' => 'Lorem ipsum dolor sit amet',
			'min_dose' => 1,
			'max_dose' => 1,
			'metric' => 'Lorem '
		),
	);

}
