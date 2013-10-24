<?php
App::uses('Diagnosis', 'Model');

/**
 * Diagnosis Test Case
 *
 */
class DiagnosisTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.diagnosis',
		'app.patient',
		'app.drug_allergy',
		'app.visit',
		'app.medhistory_complaint',
		'app.treatment',
		'app.treatment_run_algorithm',
		'app.vitals_lab'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Diagnosis = ClassRegistry::init('Diagnosis');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Diagnosis);

		parent::tearDown();
	}

}
