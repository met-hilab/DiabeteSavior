// Diabetes Risk Calculator - JavaScript Document
$(document).ready(function(){
// When Document entered "Ready" status (The HTML DOM tree is fully loaded)
// Bind the click event.

unitType = "imperial";
$("a.btnImperial").click(setImperial);
$("a.btnMetric").click(setMetric);

$("#height").attr("placeholder", "inches");
$("#weight").attr("placeholder", "lbs");


function setImperial(){
	unitType = "imperial";

	$("#height").val("");
	$("#weight").val("");

	// defaults for height and weight
	$("#height").attr("placeholder", "inches");
	$("#weight").attr("placeholder", "lbs");


  $('.switch-unit').removeClass('btn-primary').addClass('btn-default');
  $(this).removeClass('btn-default').addClass('btn-primary');

return false;

}

function setMetric(){
	unitType = "metric";
	
	$("#height").val("");
	$("#weight").val("");

	// defaults for height and weight
	$("#height").attr("placeholder", "cm");
	$("#weight").attr("placeholder", "kg");
	
  $('.switch-unit').removeClass('btn-primary').addClass('btn-default');
  $(this).removeClass('btn-default').addClass('btn-primary');


return false;
}

$("a.btnCalculate").click(calcRisk);
function calcRisk() {
	// jQuery way to get DOM elements (Attribute selector)
	// https://api.jquery.com/attribute-equals-selector/
	var active = $("input[name='data[][active]']:checked").val();
	var history = $("input[name='data[][history]']:checked").val();
	var highBP = $("input[name='data[][highBP]']:checked").val();
	var race = $('#race').val();
	var age = $('#age').val();
	var gender = $('#gender').val();
	var ht = $('#height').val();
	var wt = $('#weight').val();
			
	//calculate risk score
	var score = 0;
	if (active == "no") {score += 1;}
	if (history == "yes"){score += 1;}
	if (highBP == "yes") {score += 1;}
	
	if (race != 'Caucasian or European American') {score +=1};
	
	if (age == '40-49') {score +=1};
	if (age == '50-59') {score +=2};
	if (age == '60+') {score +=3};
	
	if ( gender == 'Male') {score +=1};
	
	// bmi > 25: +1
	// bmi > 30: +2
	// bmi > 40: +3
	if ( unitType == "metric") {bmi = wt/((ht*ht)/10000);}
	else {bmi = 703*wt/(ht*ht);}
	
	if (bmi > 25 && bmi < 30) { score +=1};
	if (bmi >= 30 && bmi < 40) { score +=2};
	if (bmi >= 40) { score +=3};
	
	if (score >= 5) { 
	score = "Score = " + score +": You are at increased risk of Type 2 Diabetes";
	$("input[name=score]").css({ 'color': 'red', 'font-size': '150%' });
	}
	else { 
	score = "Score = " + score +": You are at lower risk of Type 2 Diabetes";
	$("input[name=score]").css({ 'color': 'black', 'font-size': '150%' });

	}
	
	$("input[name=score]").val(score);
	
	$("input[name=bmi]").val(bmi.toFixed(2));
	
	// "return false" in a event handler means cancel the original behavior.
	// If this is a link, make it NOT to jump, if this is a form.onSubmit event, make it NOT to submit, etc...
	// We don't want to user jump to anchor "#" after he clicked the "Calculate Risk" button, so return false here.
	return false;
	
}

});
