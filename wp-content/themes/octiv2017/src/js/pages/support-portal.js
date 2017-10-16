$('#submit-ticket').on('click', function() {
  $('.submit-modal').modal();
})

var submitTicket = getParameterByName('submitTicket');

if (submitTicket === 'true') {
  var modalContent = $('.submit-modal');
  modalContent.modal();
  window.history.pushState( {} , 'bar', '/support' );
}
