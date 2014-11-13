lbToKg = function(value) {
  return (value * 0.453592).toFixed(1);
}
kgToLb = function(value) {
  return (value * 2.20462).toFixed(1);
}
mToFt = function(value) {
  inches = 0;
  inches = value * 0.3937008;
  feets = Math.floor(inches / 12);
  inches = Math.round(inches % 12);//.toFixed(1);
  value = feets + ("'") + inches + ('"');
  return value;
}
ftToM = function(value) {
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