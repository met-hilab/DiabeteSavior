
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
    if((inputDate < curDate))
        return true;
    return false;
}, "");

 $(document).ready(function(){
 
 $('Form').validate(
 {
  rules: {
    name: {
      minlength: 2,
      required: true,
      regex:'^[A-Za-z.\']+$'
    
    },
    date:{
      
      date:true,   
      maxDate:true,
      required:true
     //regex:'^([0]\d|[1][0-2])\/([0-2]\d|[3][0-1])\/([2][01]|[1][6-9])\d{2}(\s([0-1]\d|[2][0-3])(\:[0-5]\d){1,2})?$'
        
    },
    
    email: {
      required: true,
      email: true
    },
    select: {    
      required: true
    },
    ZIP:{
      regex:'^(\d{5}-\d{4}|\d{5}|\d{9})$|^([a-zA-Z]\d[a-zA-Z]( )?\d[a-zA-Z]\d)$'
    },
    
    note:{
        required:true
    },
    weight:{
       required:true,
       regex:'^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$'
    },
    height:{
        required:true,
        regex: '^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$'
    },
    A1c:{
        required:true,
       
        range:[3.0000,20.0000]
    },
    bps:{
        required:true,
        range:[30.0000,250.0000]
    },
    bpd:{
        required:true,
        range:[30.0000,250.0000]
    }
    
  },
  messages:{
      name:{
          regex:'Please enter valid name using letter from a-z'
      },
      date:{
          maxDate:'Plase enter a date before today',
          regex:'Please enter the date in a correct format: MM/DD/YYYY '
      },
      weight:{
          regex:'Weight must be a number bigger than 0'
      },
      height:{
        
        regex:'Height must be a number bigger than 0'
      },
      ZIP:{
          regex: 'Please enter a validate USA zipcode'
      },
      A1c:'A1c must a number between 3 to 20. If not in the range, go to the doctor now.',
      bps:'Blood pressure must between 30 to 250.If not in the range, go to the doctor now.',
      bpd:'Blood pressure must between 30 to 250.If not in the range, go to the doctor now.'
     
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



