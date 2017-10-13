$('#submit-ticket').on('click', function() {
  $('.submit-modal').modal();
})

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}
var submitTicket = getParameterByName('submitTicket');

if (submitTicket === 'true') {
  var modalContent = $('.submit-modal');
  modalContent.modal();
  window.history.pushState( {} , 'bar', '/support' );
}

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJzdXBwb3J0LXBvcnRhbC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIkKCcjc3VibWl0LXRpY2tldCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAkKCcuc3VibWl0LW1vZGFsJykubW9kYWwoKTtcbn0pXG5cbmZ1bmN0aW9uIGdldFBhcmFtZXRlckJ5TmFtZShuYW1lLCB1cmwpIHtcbiAgaWYgKCF1cmwpIHVybCA9IHdpbmRvdy5sb2NhdGlvbi5ocmVmO1xuICBuYW1lID0gbmFtZS5yZXBsYWNlKC9bXFxbXFxdXS9nLCBcIlxcXFwkJlwiKTtcbiAgdmFyIHJlZ2V4ID0gbmV3IFJlZ0V4cChcIls/Jl1cIiArIG5hbWUgKyBcIig9KFteJiNdKil8JnwjfCQpXCIpLFxuICAgICAgcmVzdWx0cyA9IHJlZ2V4LmV4ZWModXJsKTtcbiAgaWYgKCFyZXN1bHRzKSByZXR1cm4gbnVsbDtcbiAgaWYgKCFyZXN1bHRzWzJdKSByZXR1cm4gJyc7XG4gIHJldHVybiBkZWNvZGVVUklDb21wb25lbnQocmVzdWx0c1syXS5yZXBsYWNlKC9cXCsvZywgXCIgXCIpKTtcbn1cbnZhciBzdWJtaXRUaWNrZXQgPSBnZXRQYXJhbWV0ZXJCeU5hbWUoJ3N1Ym1pdFRpY2tldCcpO1xuXG5pZiAoc3VibWl0VGlja2V0ID09PSAndHJ1ZScpIHtcbiAgdmFyIG1vZGFsQ29udGVudCA9ICQoJy5zdWJtaXQtbW9kYWwnKTtcbiAgbW9kYWxDb250ZW50Lm1vZGFsKCk7XG4gIHdpbmRvdy5oaXN0b3J5LnB1c2hTdGF0ZSgge30gLCAnYmFyJywgJy9zdXBwb3J0JyApO1xufVxuIl0sImZpbGUiOiJzdXBwb3J0LXBvcnRhbC5qcyJ9
