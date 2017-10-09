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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJpbnRlZ3JhdGlvbnMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uKCkge1xuLypcbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cblNNT09USCBTQ1JPTExJTkcgRk9SIFNJREVCQVIgTElOS1Ncbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiovXG4kKCdhc2lkZSBhJykub24oJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICBlLnByZXZlbnREZWZhdWx0KCk7XG4gIHZhciB0YXJnZXQgPSAkKHRoaXMuaGFzaCk7XG4gICQoJ2h0bWwsIGJvZHknKS5hbmltYXRlKHtcbiAgICAgIHNjcm9sbFRvcDogdGFyZ2V0Lm9mZnNldCgpLnRvcFxuICB9LCAzMDApO1xufSk7XG59KSgpOyJdLCJmaWxlIjoiaW50ZWdyYXRpb25zLmpzIn0=
