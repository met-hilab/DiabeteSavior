<?php
App::uses('Visit', 'Model');

/**
 * Visit Test Case
 *
 */
class VisitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.visit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Visit = ClassRegistry::init('Visit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Visit);

		parent::tearDown();
	}

}
