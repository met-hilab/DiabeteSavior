<?php

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://localhost/")
    $this->open("/");
    $this->click("link=Login");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("link=List Patients");
    $this->waitForPageToLoad("30000");
    $this->click("link=MHP04094");
    $this->click("link=Charts");
    $this->click("//div[@id='charts']/div/div[3]/a/span");
    $this->click("//div[@id='charts']/div/div/a/span");
    $this->click("//div[@id='charts']/div/div[3]/a/span");
    $this->click("link=Visits");
    $this->click("link=November 17, 2013");
    $this->waitForPageToLoad("30000");
    $this->click("link=Patients");
    $this->click("id=content");
    $this->click("link=Go Back");
    $this->waitForPageToLoad("30000");
    $this->click("link=Vitals & Labs");
    $this->click("link=Weight Classification:");
    $this->click("link=Drug Allergies");
    $this->click("link=Medical History");
    $this->click("link=Medications");
    $this->click("link=Visits");
    $this->click("link=Add Visit");
    $this->waitForPageToLoad("30000");
    $this->type("id=MedhistoryComplaintComplaints", "Stomache");
    $this->click("id=DrugAllergytzdyes");
    $this->click("link=kg / cm");
    $this->type("id=VitalsLabFWeight", "123");
    $this->type("id=VitalsLabFHeight", "178");
    $this->type("id=VitalsLabA1c", "6.1");
    $this->type("id=TreatmentA1cGoal", "5.5");
    $this->type("id=TreatmentFWeightGoal", "100");
    $this->click("css=input.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Run Algorithm");
    $this->waitForPageToLoad("30000");
    $this->click("link=AACE Comprehensive Diabetes Management, Endocr Pract. 2013;19(Suppl 2)");
    $this->click("link=Edit");
    $this->waitForPageToLoad("30000");
    $this->type("id=TreatmentRunAlgorithmEditedJustification", "test justification");
    $this->click("css=input.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    $this->click("link=Charts");
    $this->click("//div[@id='charts']/div/div[3]/a/span");
    $this->click("//div[@id='charts']/div/div[3]/a/span");
    $this->click("//div[@id='charts']/div/div/a/span");
    $this->click("link=My Account");
    $this->click("link=Logout");
    $this->waitForPageToLoad("30000");
  }
}
?>