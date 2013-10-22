<?php
App::uses('Treatment', 'Model');

/**
 * Treatment Test Case
 *
 */
class TreatmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.treatment',
		'app.visit',
		'app.patient',
		'app.diagnosis',
		'app.drug_allergy',
		'app.medhistory_complaint',
		'app.vitals_lab',
		'app.treatment_run_algorithm'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Treatment = ClassRegistry::init('Treatment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Treatment);

		parent::tearDown();
	}

}
