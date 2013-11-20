<?php

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://localhost/");
    $this->open("/");
    $this->click("link=Login");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=List Patients");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=Add Patient");
    $this->waitForPageToLoad("30000");
    $this->type("id=PatientPatientFirstname", "Mark");
    $this->type("id=PatientPatientLastname", "Twin");
    $this->click("id=PatientDob");
    $this->click("css=span.ui-icon.ui-icon-circle-triangle-w");
    $this->click("link=3");
    $this->type("id=PatientOccupation", "Doctor");
    $this->select("id=PatientGender", "label=Male");
    $this->select("id=PatientRace", "label=African or African American");
    $this->type("id=PatientStreet", "18 Street");
    $this->type("id=PatientCity", "New York");
    $this->select("id=PatientState", "label=Maine");
    $this->select("id=PatientState", "label=Georgia");
    $this->type("id=PatientPostalCode", "13579");
    $this->click("css=input.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=List Patients");
    $this->waitForPageToLoad("30000");
    $this->click("link=MMT03248");
    $this->click("link=Patients");
    $this->click("link=Search Patient");
    $this->waitForPageToLoad("30000");
    $this->type("id=patient_number", "MMT03248");
    $this->type("id=Patient_Name", "Mark");
    $this->type("name=Patient_LastName", "Twin");
    $this->type("id=patient_dob", "2013-10-2");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=List Patients");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=Search Patient");
    $this->waitForPageToLoad("30000");
    $this->type("id=patient_number", "MMT03248");
    $this->type("id=Patient_Name", "Mark");
    $this->type("name=Patient_LastName", "Twin");
    $this->type("id=patient_dob", "2013-10-3");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=My Account");
    $this->click("link=Logout");
    $this->waitForPageToLoad("30000");
  }
}
?>