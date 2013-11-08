<?php
App::uses('Medicine', 'Model');

/**
 * Medicine Test Case
 *
 */
class MedicineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medicine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medicine = ClassRegistry::init('Medicine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medicine);

		parent::tearDown();
	}

}
