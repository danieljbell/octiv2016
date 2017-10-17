var submitTicket = getParameterByName('reg');

if (submitTicket === 'true') {
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
}
