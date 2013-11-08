<?php
App::uses('DrugAllergy', 'Model');

/**
 * DrugAllergy Test Case
 *
 */
class DrugAllergyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.drug_allergy',
		'app.patient',
		'app.user',
		'app.profile',
		'app.diagnosis',
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
		$this->DrugAllergy = ClassRegistry::init('DrugAllergy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DrugAllergy);

		parent::tearDown();
	}

}
