$(document).ready(function(){
unit = {
  'imperial' : {
    'weightFormat': 'lb',
    'heightFormat': 'ft\'inch"'
  },
  'metric' : {
    'weightFormat': 'kg',
    'heightFormat': 'cm'
  }
};
unitType = 'imperial';
unitFormat = unit[unitType];

weightInput = $("input[name='data[VitalsLab][f_weight]']");
heightInput = $("input[name='data[VitalsLab][f_height]']");
weightGoalInput = $("input[name='data[Treatment][f_weight_goal]']");

mWeightInput = $("input[name='data[VitalsLab][weight]']");
mHeightInput = $("input[name='data[VitalsLab][height]']");
mWeightGoalInput = $("input[name='data[Treatment][weight_goal]']");

unitSwitcher = $('.switch-unit');

function setPlaceholders() {
  weightInput.attr('placeholder', unitFormat.weightFormat);
  weightGoalInput.attr('placeholder', unitFormat.weightFormat);
  heightInput.attr('placeholder', unitFormat.heightFormat);
}
function init() {
  weight = mWeightInput.val();
  height = mHeightInput.val();
  if(unitType == 'imperial') {
    height = mToFt(height);
    weight = kgToLb(weight);
  } 
  if(weight > 0 ) {
    weightInput.val(weight);  
  }
  if(height > 0) {
   heightInput.val(height);
  }
  setPlaceholders();
}
function copyHeight() {
  value = $(this).val();
  if(unitType == 'imperial') {
    value = ftToM(value);
  }
  mHeightInput.val(value);
  console.log('hidden input height: ' + mHeightInput.val());
}
function copyWeight(){
  value = $(this).val();
  if(unitType == 'imperial') {
    value = lbToKg(value);
  }
  mWeightInput.val(value);
  console.log('hidden input weight: ' + mWeightInput.val());
}
function copyWeightGoal(){
  value = $(this).val();
  if(unitType == 'imperial') {
    value = lbToKg(value);
  }
  mWeightGoalInput.val(value);
  console.log('hidden input weight goal: ' + mWeightGoalInput.val());
}
function setUnitType() {
  unitType = $(this).data('unit');
  $('.switch-unit').removeClass('btn-primary').addClass('btn-default');
  $(this).removeClass('btn-default').addClass('btn-primary');
  weight = weightInput.val();
  height = heightInput.val();
  
  if(unitType == 'imperial') {
    // Previous unit type was metric/
    unitFormat = unit.imperial;
    if(height > 0) {
      height = mToFt(height);
    }
    if(weight > 0) {
      weight = kgToLb(weight);
    }
  } else {
    // Previois unit type was imperial
    unitFormat = unit.metric;
    regx = /^\d'\s?(\d{1,2}")?$/g; // TODO: FIX NOT WORKING WITH DOT .
    match = height.match(regx);
    //console.log('value: ' + height);
    //console.log("regexmatch: " + match);
    if(height > 0) {
      height = ftToM(height);
    }
    if(weight > 0) {
      weight = lbToKg(weight);
    }
  }
  heightInput.val(height);
  weightInput.val(weight);

  setPlaceholders();

  return false;
}
function mToFt(value) {
  inches = 0;
  inches = value * 0.3937008;
  feets = Math.floor(inches / 12);
  inches = (inches % 12).toFixed(1);
  value = feets + ("'") + inches + ('"');
  return value;
}
function ftToM(value) {
  if(value.indexOf("'") > 0) {
    inches = value.split("'")[1];
    if(inches.length == 0) {
      inches = 0;
    } else if(inches.indexOf('"') > 0) {
      inches = inches.substring(0, inches.length - 1);
    }
    feets = value.split("'")[0];
    feetsAsInches = feets * 12;
    inches = parseFloat(inches) + feetsAsInches;
  } else {
    feets = value;
    inches = feets * 12;
  }
  value = (inches * 2.54).toFixed(0);
  return value;
}
function lbToKg(value) {
  return (value * 0.453592).toFixed(1);
}
function kgToLb(value) {
  return (value * 2.20462).toFixed(1);
}

weightInput.keydown(function(ev){
  
  value = $(this).val();
  if(value.indexOf('.') >  -1 && ev.keyCode == 190) {
    // Not allow '.' key
    return false;
  }
  allowedKeys = [190]; 
  actionKeys = [67, 86, 88, 82, 65];
  modKeys = [37, 38, 39, 40, 17, 91, 8, 46, 9];
  ctrlDown = ev.ctrlKey || ev.metaKey // Mac support
  allowedKeys = allowedKeys.concat(modKeys);
  
  if(ev.keyCode >= 48 && ev.keyCode <= 57) {
    // is a digit.
    return true;
  } else if($.inArray(ev.keyCode, allowedKeys) > -1){
    // is allowd keys: . ' "
    return true;
  } else if(ctrlDown && $.inArray(ev.keyCode, actionKeys) > -1) {
    return true;
  } else {
    return false;  
  }
});
heightInput.keydown(function(ev){
  // Only allow numbers, ., ', " in this field.
  // Keydown trigger before change, thus the value still old.
  value = $(this).val();

  if(unitType == 'imperial') {
    // . ' "
    if(value.indexOf('"') >  -1) {
      if(ev.keyCode == 8 || ev.keyCode == 46 || ev.keyCode == 9) {
        // Only allow to delete string.
        return true;
      }
      return false;
    }
    if(value.indexOf("'") > -1 && (ev.keyCode == 222 && !ev.shiftKey)) {
      // Not allow "'" key
      return false;
    }
    allowedKeys = [190, 222, 16];
    
  } else {
    allowedKeys = [190];
  }

  if(value.indexOf('.') >  -1 && ev.keyCode == 190) {
    // Not allow '.' key
    return false;
  } 
  // arrow keys: 37 - 40, ctrl 17, cmd 91, backspace 8, del 46, c 67, v 86, x 88, tab 9
  actionKeys = [67, 86, 88, 82, 65];
  modKeys = [37, 38, 39, 40, 17, 91, 8, 46, 9];
  ctrlDown = ev.ctrlKey || ev.metaKey // Mac support
  allowedKeys = allowedKeys.concat(modKeys);
  //console.log('keycode: ' + ev.keyCode);
  
  if(ev.keyCode >= 48 && ev.keyCode <= 57) {
    // is a digit.
    return true;
  } else if($.inArray(ev.keyCode, allowedKeys) > -1){
    // is allowd keys: . ' "
    return true;
  } else if(ctrlDown && $.inArray(ev.keyCode, actionKeys) > -1) {
    return true;
  } else {
    return false;  
  }
});

heightInput.change(copyHeight);
heightInput.keyup(copyHeight);
heightInput.blur(copyHeight);
heightInput.focus(copyHeight);

weightInput.change(copyWeight);
weightInput.keyup(copyWeight);
weightInput.blur(copyWeight);
weightInput.focus(copyWeight);

weightGoalInput.change(copyWeightGoal);
weightGoalInput.keyup(copyWeightGoal);
weightGoalInput.blur(copyWeightGoal);
weightGoalInput.focus(copyWeightGoal);

unitSwitcher.click(setUnitType);

init();
});