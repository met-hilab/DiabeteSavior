
//$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );

$.validator.addMethod('regex', function(value, element, param) {
    return this.optional(element) ||
        value.match(typeof param == 'string' ? new RegExp(param) : param);
},
'Please enter in a correct format');
    
    
//new date method rang year from 1900
$.validator.addMethod("maxDate", function(value, element) {
  var curDate = new Date();
  var startDate = '01/01/1900';
  var inputDate = new Date(value);
  if((inputDate < curDate)) {
      return true;
  } else {
    return false;
  }
}, "");

$(document).ready(function(){
 $('#UserAddForm').validate();
 $('form').validate({
  rules: {
    "data[Patient][patient_firstname]": {
      minlength: 2,
      required: true,
      regex:'^[A-Za-z.\']+$'
    
    },
    "data[Patient][patient_lastname]": {
      minlength: 2,
      required: true,
      regex:'^[A-Za-z.\']+$'
    },
    "data[Patient][dob]":{
      date:true,   
      maxDate:true,
      required:true
     //regex:'^([0]\d|[1][0-2])\/([0-2]\d|[3][0-1])\/([2][01]|[1][6-9])\d{2}(\s([0-1]\d|[2][0-3])(\:[0-5]\d){1,2})?$'
    },
    /*
    email: {
      required: true,
      email: true
    },
    select: {    
      required: true
    },
    note:{
        required:true
    },
    */
   "data[Patient][postal_code]":{
         minlength: 5,
         digits: true
    }, 
    "data[VitalsLab][f_weight]":{
       range:[0,500.0000], 
       required:true,
       regex:'^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$'
    },
     "data[Treatment][f_weight_goal]":{
       range:[0,500.0000], 
       required:true,
       regex:'^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$'
    },
         
    "data[VitalsLab][f_height]":{
        required:true,
        //regex: '^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$'
    },
    
    "data[VitalsLab][A1c]":{
        range:[3.0,20.0],
        required:true
        
    },
    "data[Treatment][a1c_goal]":{
        range:[3.0,20.0],
        required:true
        
    },
      
    "data[VitalsLab][bps]":{
        range:[30.0,250.0],
        required:true
        
    },
     "data[VitalsLab][bpd]":{
        required:true,
        range:[30.0,250.0]
    },
    "data[User][email]": {
      required:true,
      email: true
    },
    "data[User][password]": {
      required:true
    },
    "data[User][password_confirmation]": {
      required:true
    },
    "data[User][firstname]": {
      required:true
    },
    "data[User][lastname]": {
      required:true
    }
  },
  messages:{
      "data[Patient][patient_firstname]":{
          regex:'Please enter valid name using letter from a-z'
      },
      "data[Patient][patient_lastname]":{
          regex:'Please enter valid name using letter from a-z'
      },
      "data[Patient][dob]":{
          maxDate:'Plase enter a date before today',
          regex:'Please enter the date in a correct format: MM/DD/YYYY '
      },
     "data[VitalsLab][f_weight]":{
          regex:'Please enter a number in a reasonble range.'
      },
      "data[Treatment][f_weight_goal]":{
          regex:'Please enter a number in a reasonble range.'
      },
      
     "data[VitalsLab][f_height]":{
        
        regex:'Height must be a number bigger than 0'
      },
      "data[Patient][postal_code]":{
          minlength: 'Please enter a validate USA zipcode',
          digits: 'Please enter a validate USA zipcode'
      },
      
      "data[VitalsLab][A1c]":'A1c must be a number between 3 to 20. ',
      "data[VitalsLab][bps]":'Blood pressure must be between 30 to 250.',
      "data[VitalsLab][bpd]":'Blood pressure must be between 30 to 250.',
      "data[Treatment][a1c_goal]":'A1c must be a number between 3 to 20.'
  },
 
  highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
  },
 
  success: function(element) {
     element
    .addClass('valid')
    .closest('.control-group').removeClass('error').addClass('success');
  }
 });
}); // end document.ready



