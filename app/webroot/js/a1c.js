// A1C to AG conversion - JavaScript Document

function color(x) {
	document.getElementById(x).style.backgroundColor="#A9E2F3";
}

function deColor(x) {
	document.getElementById(x).style.backgroundColor="white";
}

function a1cToAG() {
	
	var a1clevel = document.a1cForm.a1clevel.value;

	aglevel1 = 28.7*a1clevel - 46.7;
	aglevel2 = 1.5944*a1clevel - 2.5944;
	
	document.a1cForm.aglevel1.value = aglevel1.toFixed(0);	
	document.a1cForm.aglevel2.value = aglevel2.toFixed(1);
	
	A1Cmessage(a1clevel);

}

function AGmgToA1C() {
	
	var aglevel1 = Number(document.a1cForm.aglevel1.value);
	var a1clevel = 0;
	var aglevel2 = 0;
	
	a1clevel = (aglevel1 + 46.7)/28.7;
	aglevel2 = 1.5944*a1clevel - 2.5944;
	
	document.a1cForm.a1clevel.value = a1clevel.toFixed(1);
	document.a1cForm.aglevel2.value = aglevel2.toFixed(1);
	
	A1Cmessage(a1clevel);

}

function AGmmolToA1C() {
	
	var aglevel2 = Number(document.a1cForm.aglevel2.value);
	var a1clevel = 0;
	var aglevel1 = 0;
	
	a1clevel = (aglevel2 + 2.5944)/1.5944;
	aglevel1 = 28.7*a1clevel - 46.7;
	
	document.a1cForm.a1clevel.value = a1clevel.toFixed(1);
	document.a1cForm.aglevel1.value = aglevel1.toFixed(0);
	
	A1Cmessage(a1clevel);	
}

function A1Cmessage(a1clevel){
	var low = 4.1;
	var normal = 5.7;
	var diabetic = 6.5;
	var target = 7;

	if (a1clevel < low)
		{document.a1cForm.message.value = "Your A1C level is too low (risk of hypoglycemia)";}
	else if ((a1clevel >= low) && (a1clevel < normal))
		{document.a1cForm.message.value = "Your A1C level is in the normal range.";}
	else if ((a1clevel >= normal) && (a1clevel < diabetic))
		{document.a1cForm.message.value = "Your A1C level indicates risk of diabetes.";}
	else if ((a1clevel >= low) && (a1clevel < target))
		{document.a1cForm.message.value = "Your A1C level is in the target range for diabetic patients.";}
	else if( (a1clevel >= target))
		{document.a1cForm.message.value = "Your A1C level is above the diabetic target level.";}
}
