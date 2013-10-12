<?php
/**
 * VitalsLabFixture
 *
 */
class VitalsLabFixture extends CakeTestFixture {

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
		'weight' => array('type' => 'float', 'null' => false),
		'height' => array('type' => 'float', 'null' => false),
		'bps' => array('type' => 'integer', 'null' => false),
		'bpd' => array('type' => 'integer', 'null' => false),
		'bmi' => array('type' => 'float', 'null' => true, 'default' => null),
		'bmi_status' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'A1c' => array('type' => 'float', 'null' => false),
		'eGFR' => array('type' => 'integer', 'null' => true, 'default' => null),
		'notes' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'created' => '2013-10-11 21:13:51',
			'modified' => '2013-10-11 21:13:51',
			'visit_id' => 1,
			'weight' => 1,
			'height' => 1,
			'bps' => 1,
			'bpd' => 1,
			'bmi' => 1,
			'bmi_status' => 'Lorem ipsum dolor sit amet',
			'A1c' => 1,
			'eGFR' => 1,
			'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
