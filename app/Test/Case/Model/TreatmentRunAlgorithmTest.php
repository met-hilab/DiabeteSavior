<?php
App::uses('TreatmentRunAlgorithm', 'Model');

/**
 * TreatmentRunAlgorithm Test Case
 *
 */
class TreatmentRunAlgorithmTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.treatment_run_algorithm',
		'app.treatment',
		'app.visit',
		'app.patient',
		'app.diagnosis',
		'app.drug_allergy',
		'app.medhistory_complaint',
		'app.vitals_lab'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TreatmentRunAlgorithm = ClassRegistry::init('TreatmentRunAlgorithm');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TreatmentRunAlgorithm);

		parent::tearDown();
	}

}
