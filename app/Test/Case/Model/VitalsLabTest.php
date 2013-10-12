<?php
App::uses('VitalsLab', 'Model');

/**
 * VitalsLab Test Case
 *
 */
class VitalsLabTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vitals_lab',
		'app.visit',
		'app.patient',
		'app.diagnosis',
		'app.drug_allergy',
		'app.medhistory_complaint',
		'app.treatment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VitalsLab = ClassRegistry::init('VitalsLab');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VitalsLab);

		parent::tearDown();
	}

}
