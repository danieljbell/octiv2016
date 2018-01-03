(function() {

var initialPath = window.location.pathname;
window.history.replaceState( {} , 'bar', initialPath );

})();