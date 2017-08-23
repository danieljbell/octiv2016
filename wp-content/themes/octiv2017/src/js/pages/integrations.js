(function() {
/*
==================================
SMOOTH SCROLLING FOR SIDEBAR LINKS
==================================
*/
$('aside a').on('click', function(e) {
  e.preventDefault();
  var target = $(this.hash);
  $('html, body').animate({
      scrollTop: target.offset().top
  }, 300);
});
})();