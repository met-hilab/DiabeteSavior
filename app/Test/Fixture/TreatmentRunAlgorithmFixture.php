<?php
/**
 * TreatmentRunAlgorithmFixture
 *
 */
class TreatmentRunAlgorithmFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false),
		'modified' => array('type' => 'datetime', 'null' => false),
		'treatment_id' => array('type' => 'integer', 'null' => false, 'length' => 10, 'key' => 'index'),
		'recommendations' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'medicine_name_one' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dose_one' => array('type' => 'float', 'null' => true, 'default' => null),
		'medicine_name_two' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dose_two' => array('type' => 'float', 'null' => true, 'default' => null),
		'medicine_name_three' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dose_three' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'treatment_id' => array('column' => 'treatment_id', 'unique' => 0)
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
			'created' => '2013-10-24 12:27:54',
			'modified' => '2013-10-24 12:27:54',
			'treatment_id' => 1,
			'recommendations' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'medicine_name_one' => 'Lorem ipsum dolor sit amet',
			'dose_one' => 1,
			'medicine_name_two' => 'Lorem ipsum dolor sit amet',
			'dose_two' => 1,
			'medicine_name_three' => 'Lorem ipsum dolor sit amet',
			'dose_three' => 1
		),
	);

}
