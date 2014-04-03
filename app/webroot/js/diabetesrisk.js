// Diabetes Risk Calculator - JavaScript Document

function calcRisk() {

	var  active = document.riskForm.data[][active].value;
	var  history = document.riskForm.data[][history].value;
	var  highBP = document.riskForm.data[][highBP].value;
	var race = document.riskForm.data[race].value;
	var age = document.riskForm.data[age].value;
	var gender = document.riskForm.data[gender].value;
	var height = document.riskForm.data[height].value;
	var weight = document.riskForm.data[weight].value;
	
	document.riskForm.data[][active].value = active;
	document.riskForm.data[][history].value = history;
	document.riskForm.data[][highBP].value = highBP;
	document.riskForm.data[race].value = race;
	document.riskForm.data[age].value = age;
	document.riskForm.data[gender].value = gender;
	document.riskForm.data[height].value = height;
	document.riskForm.data[weight].value = weight;
	
	//calculate risk score
	var score = 0;
	if (!active)
		score +=1;
	if (history)
		score +=1;
	if (highBP)
		score +==1;
	
	document.riskForm.score.value = score;

}

/*
function calcRisk2() {

var active=$("name='data[][active]'").val();
var race=$("name='data[race]'").val();

riskValue = '2';

}
*/
