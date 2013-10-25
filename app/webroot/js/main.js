$(document).ready(function(){

if (!Modernizr.inputtypes.date) {
  //console.$('input[type=date]').val();
  
  $('input[type=date]').datepicker({
    dateFormat: 'mm/dd/yy',
    minDate: new Date()
  });

}


});
/*
$(document).ajaxStart(function() {
  $.blockUI({ message: '<img src="/images/loading.gif" >' });
});

$(document).ajaxStop($.unblockUI);
*/