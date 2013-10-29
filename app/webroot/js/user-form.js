$(document).ready(function(){
  $('form input[type=submit').addClass('disabled').attr('disabled', true);

  // Bind validate on keyup event inside input.
  // Change event for select, radio button, checkbox elements
  $('form').validate();

});