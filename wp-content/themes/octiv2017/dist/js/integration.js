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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJpbnRlZ3JhdGlvbi5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKSB7XG4vKlxuPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuU01PT1RIIFNDUk9MTElORyBGT1IgU0lERUJBUiBMSU5LU1xuPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuKi9cbiQoJ2FzaWRlIGEnKS5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gIGUucHJldmVudERlZmF1bHQoKTtcbiAgdmFyIHRhcmdldCA9ICQodGhpcy5oYXNoKTtcbiAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuICAgICAgc2Nyb2xsVG9wOiB0YXJnZXQub2Zmc2V0KCkudG9wXG4gIH0sIDMwMCk7XG59KTtcbn0pKCk7Il0sImZpbGUiOiJpbnRlZ3JhdGlvbi5qcyJ9
