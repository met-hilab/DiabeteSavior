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
    $this->type("id=PatientPatientFirstname", "Harry");
    $this->type("id=PatientPatientLastname", "Potter");
    $this->type("id=PatientPatientMiddlename", "D");
    $this->click("id=PatientDob");
    $this->click("link=4");
    $this->type("id=PatientDob", "11/04/1997");
    $this->click("//form[@id='PatientAddForm']/div[4]");
    $this->type("id=PatientOccupation", "Magician");
    $this->select("id=PatientGender", "label=Male");
    $this->select("id=PatientRace", "label=Caucasian or European American");
    $this->type("id=PatientStreet", "2233 AB Street");
    $this->type("id=PatientCity", "KCity");
    $this->select("id=PatientState", "label=Georgia");
    $this->type("id=PatientPostalCode", "04256");
    $this->click("css=input.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=Add Patient");
    $this->waitForPageToLoad("30000");
    $this->type("id=PatientPatientFirstname", "Hello");
    $this->type("id=PatientPatientLastname", "Kitty");
    $this->click("id=PatientDob");
    $this->click("link=5");
    $this->type("id=PatientDob", "01/05/1987");
    $this->click("id=PatientOccupation");
    $this->type("id=PatientOccupation", "Pet");
    $this->select("id=PatientGender", "label=Female");
    $this->select("id=PatientRace", "label=Native American or Native Alaskan");
    $this->type("id=PatientStreet", "000");
    $this->type("id=PatientCity", "Boston");
    $this->select("id=PatientState", "label=Maine");
    $this->select("id=PatientState", "label=Florida");
    $this->select("id=PatientState", "label=Massachusetts");
    $this->type("id=PatientPostalCode", "21458");
    $this->click("css=input.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=List Patients");
    $this->waitForPageToLoad("30000");
    $this->click("link=FHK05095");
    $this->click("link=Update Patient");
    $this->waitForPageToLoad("30000");
    $this->type("id=PatientPatientFirstname", "Goodbye");
    $this->click("css=input.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=List Patients");
    $this->waitForPageToLoad("30000");
    $this->click("link=FGK05095");
    $this->click("link=Delete Patient");
    $this->assertTrue((bool)preg_match('/^Do you want to delete this patient record[\s\S]$/',$this->getConfirmation()));
    $this->click("link=Patients");
    $this->click("link=Search Patient");
    $this->waitForPageToLoad("30000");
    $this->type("id=patient_number", "MHP04094");
    $this->type("id=Patient_Name", "Harry");
    $this->type("id=patient_dob", "1997-11-04");
    $this->type("name=Patient_LastName", "Potter");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=List Patients");
    $this->waitForPageToLoad("30000");
    $this->click("link=My Account");
    $this->click("link=Logout");
    $this->waitForPageToLoad("30000");
  }
}
?>