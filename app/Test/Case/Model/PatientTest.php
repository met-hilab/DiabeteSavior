<?php
App::uses('Patient', 'Model');

/**
 * Patient Test Case
 *
 */
class PatientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.patient',
		'app.user',
		'app.profile',
		'app.diagnosis',
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
		$this->Patient = ClassRegistry::init('Patient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Patient);

		parent::tearDown();
	}

}
