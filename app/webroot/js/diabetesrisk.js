// Diabetes Risk Calculator - JavaScript Document
$(document).ready(function(){
// When Document entered "Ready" status (The HTML DOM tree is fully loaded)
// Bind the click event.
$("a.btnCalculate").click(calcRisk);
function calcRisk() {
	// jQuery way to get DOM elements (Attribute selector)
	// https://api.jquery.com/attribute-equals-selector/
	var active = $("input[name='data[][active]']").val();
	var history = $("input[name='data[][history]'").val();
	var highBP = $("input[name='data[][highBP]'").val();

	// Old JS way, error here because of we have "[]" symbol in "name" attibute of input tag.
	// Use "getElementsByName()" method to access these elements.
	// http://www.w3schools.com/jsref/met_doc_getelementsbyname.asp

	// var active = document.riskForm.data[][active].value;
	// var history = document.riskForm.data[][history].value;
	// var highBP = document.riskForm.data[][highBP].value;
	// var race = document.riskForm.data[race].value;
	// var age = document.riskForm.data[age].value;
	// var gender = document.riskForm.data[gender].value;
	// var height = document.riskForm.data[height].value;
	// var weight = document.riskForm.data[weight].value;
	// 
	// document.riskForm.data[][active].value = active;
	// document.riskForm.data[][history].value = history;
	// document.riskForm.data[][highBP].value = highBP;
	// document.riskForm.data[race].value = race;
	// document.riskForm.data[age].value = age;
	// document.riskForm.data[gender].value = gender;
	// document.riskForm.data[height].value = height;
	// document.riskForm.data[weight].value = weight;
	
	//calculate risk score
	var score = 0;
	if (active == 'no')
		score += 1;
	if (history == 'yes')
		score += 1;
	if (highBP == 'yes')
		score += 1;

	// document.riskForm.score.value = score;
	$("input[name=score]").val(score);

	// "return false" in a event handler means cancel the original behavior.
	// If this is a link, make it NOT to jump, if this is a form.onSubmit event, make it NOT to submit, etc...
	// We don't want to user jump to anchor "#" after he clicked the "Calculate Risk" button, so return false here.
	return false;
}

});

/*
function calcRisk2() {

var active=$("name='data[][active]'").val();
var race=$("name='data[race]'").val();

riskValue = '2';

}
*/
