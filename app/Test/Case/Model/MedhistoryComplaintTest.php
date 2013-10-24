<?php
App::uses('MedhistoryComplaint', 'Model');

/**
 * MedhistoryComplaint Test Case
 *
 */
class MedhistoryComplaintTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medhistory_complaint',
		'app.visit',
		'app.patient',
		'app.diagnosis',
		'app.drug_allergy',
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
		$this->MedhistoryComplaint = ClassRegistry::init('MedhistoryComplaint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedhistoryComplaint);

		parent::tearDown();
	}

}
