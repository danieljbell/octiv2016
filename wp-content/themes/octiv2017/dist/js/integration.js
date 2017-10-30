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
      scrollTop: target.offset().top - (document.querySelector('.site-header').offsetHeight)
  }, 300);
});

var initialPath = window.location.pathname;
window.history.replaceState( {} , 'bar', initialPath );

})();

var sidebar = new StickySidebar('#sidebar', {
  containerSelector: '.post-content',
  innerWrapperSelector: '.sidebar__inner',
  topSpacing: (document.querySelector('.site-header').offsetHeight + 18),
  bottomSpacing: -54
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJpbnRlZ3JhdGlvbi5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKSB7XG4vKlxuPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuU01PT1RIIFNDUk9MTElORyBGT1IgU0lERUJBUiBMSU5LU1xuPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuKi9cbiQoJ2FzaWRlIGEnKS5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gIGUucHJldmVudERlZmF1bHQoKTtcbiAgdmFyIHRhcmdldCA9ICQodGhpcy5oYXNoKTtcbiAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuICAgICAgc2Nyb2xsVG9wOiB0YXJnZXQub2Zmc2V0KCkudG9wIC0gKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5zaXRlLWhlYWRlcicpLm9mZnNldEhlaWdodClcbiAgfSwgMzAwKTtcbn0pO1xuXG52YXIgaW5pdGlhbFBhdGggPSB3aW5kb3cubG9jYXRpb24ucGF0aG5hbWU7XG53aW5kb3cuaGlzdG9yeS5yZXBsYWNlU3RhdGUoIHt9ICwgJ2JhcicsIGluaXRpYWxQYXRoICk7XG5cbn0pKCk7XG5cbnZhciBzaWRlYmFyID0gbmV3IFN0aWNreVNpZGViYXIoJyNzaWRlYmFyJywge1xuICBjb250YWluZXJTZWxlY3RvcjogJy5wb3N0LWNvbnRlbnQnLFxuICBpbm5lcldyYXBwZXJTZWxlY3RvcjogJy5zaWRlYmFyX19pbm5lcicsXG4gIHRvcFNwYWNpbmc6IChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2l0ZS1oZWFkZXInKS5vZmZzZXRIZWlnaHQgKyAxOCksXG4gIGJvdHRvbVNwYWNpbmc6IC01NFxufSk7Il0sImZpbGUiOiJpbnRlZ3JhdGlvbi5qcyJ9
