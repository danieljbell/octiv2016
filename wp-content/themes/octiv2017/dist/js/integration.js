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

console.log('daniel');
})();

var sidebar = new StickySidebar('#sidebar', {
  containerSelector: '.post-content',
  innerWrapperSelector: '.sidebar__inner',
  topSpacing: (document.querySelector('.site-header').offsetHeight + 18),
  bottomSpacing: -54
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJpbnRlZ3JhdGlvbi5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKSB7XG4vKlxuPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuU01PT1RIIFNDUk9MTElORyBGT1IgU0lERUJBUiBMSU5LU1xuPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuKi9cbiQoJ2FzaWRlIGEnKS5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gIGUucHJldmVudERlZmF1bHQoKTtcbiAgdmFyIHRhcmdldCA9ICQodGhpcy5oYXNoKTtcbiAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuICAgICAgc2Nyb2xsVG9wOiB0YXJnZXQub2Zmc2V0KCkudG9wIC0gKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5zaXRlLWhlYWRlcicpLm9mZnNldEhlaWdodClcbiAgfSwgMzAwKTtcbn0pO1xuXG5jb25zb2xlLmxvZygnZGFuaWVsJyk7XG59KSgpO1xuXG52YXIgc2lkZWJhciA9IG5ldyBTdGlja3lTaWRlYmFyKCcjc2lkZWJhcicsIHtcbiAgY29udGFpbmVyU2VsZWN0b3I6ICcucG9zdC1jb250ZW50JyxcbiAgaW5uZXJXcmFwcGVyU2VsZWN0b3I6ICcuc2lkZWJhcl9faW5uZXInLFxuICB0b3BTcGFjaW5nOiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtaGVhZGVyJykub2Zmc2V0SGVpZ2h0ICsgMTgpLFxuICBib3R0b21TcGFjaW5nOiAtNTRcbn0pOyJdLCJmaWxlIjoiaW50ZWdyYXRpb24uanMifQ==
