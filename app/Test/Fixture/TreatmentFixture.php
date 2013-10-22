<?php
/**
 * TreatmentFixture
 *
 */
class TreatmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false),
		'modified' => array('type' => 'datetime', 'null' => false),
		'visit_id' => array('type' => 'integer', 'null' => false, 'length' => 10, 'key' => 'index'),
		'prescriber_username' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'a1c_goal' => array('type' => 'float', 'null' => true, 'default' => null),
		'weight_goal' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'visit_id' => array('column' => 'visit_id', 'unique' => 0)
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
			'created' => '2013-10-22 19:48:07',
			'modified' => '2013-10-22 19:48:07',
			'visit_id' => 1,
			'prescriber_username' => 'Lorem ipsum dolor sit amet',
			'a1c_goal' => 1,
			'weight_goal' => 1
		),
	);

}
