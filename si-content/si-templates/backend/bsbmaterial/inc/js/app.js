jQuery(document).ready(function() {
  $.fn.printMessage = function(opsi) {
    var opsi = $.extend({
        type: 'success',
        message: 'Success',
        timeout: 500000
    }, opsi);

    $(this).hide();
    $(this).html(

     '<div class="col-md-12 message-alert" ><div class="callout callout-' 
      + opsi.type + '"><h4>' + opsi.type 
      + '!  </h4></div><div class="alert alert-'+ opsi.type + ' alert-dismissible" role="alert">'+
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
       opsi.message + 
      '</div></div>'
      );
    $(this).slideDown('slow');
    // Run the effect
    setTimeout(function() {
        $('.message-alert').slideUp('slow');
    }, opsi.timeout);

    var parentElem  = $(this);

    $(this).find('.message-alert .close').click(function(event) {
      event.preventDefault();
      parentElem.html('');
    });
  };
});

