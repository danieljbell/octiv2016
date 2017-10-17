$('#submit-ticket').on('click', function() {
  $('.submit-modal').modal();
})

var submitTicket = getParameterByName('submitTicket');

if (submitTicket === 'true') {
  var modalContent = $('.submit-modal');
  modalContent.modal();
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
}

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJzdXBwb3J0LXBvcnRhbC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIkKCcjc3VibWl0LXRpY2tldCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAkKCcuc3VibWl0LW1vZGFsJykubW9kYWwoKTtcbn0pXG5cbnZhciBzdWJtaXRUaWNrZXQgPSBnZXRQYXJhbWV0ZXJCeU5hbWUoJ3N1Ym1pdFRpY2tldCcpO1xuXG5pZiAoc3VibWl0VGlja2V0ID09PSAndHJ1ZScpIHtcbiAgdmFyIG1vZGFsQ29udGVudCA9ICQoJy5zdWJtaXQtbW9kYWwnKTtcbiAgbW9kYWxDb250ZW50Lm1vZGFsKCk7XG4gIHZhciBpbml0aWFsUGF0aCA9IHdpbmRvdy5sb2NhdGlvbi5wYXRobmFtZTtcbiAgd2luZG93Lmhpc3RvcnkucmVwbGFjZVN0YXRlKCB7fSAsICdiYXInLCBpbml0aWFsUGF0aCApO1xufVxuIl0sImZpbGUiOiJzdXBwb3J0LXBvcnRhbC5qcyJ9
