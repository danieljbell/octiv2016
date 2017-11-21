// Hero button jump to CTA section
$('[href="#call-to-action"]').on('click', function(e) {
  e.preventDefault();
  var target = $(this.hash);
  $('html, body').animate({
      scrollTop: target.offset().top - (document.querySelector('.site-header').offsetHeight)
  }, 300);
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1sYW5kaW5nLXBhZ2UuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gSGVybyBidXR0b24ganVtcCB0byBDVEEgc2VjdGlvblxuJCgnW2hyZWY9XCIjY2FsbC10by1hY3Rpb25cIl0nKS5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gIGUucHJldmVudERlZmF1bHQoKTtcbiAgdmFyIHRhcmdldCA9ICQodGhpcy5oYXNoKTtcbiAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xuICAgICAgc2Nyb2xsVG9wOiB0YXJnZXQub2Zmc2V0KCkudG9wIC0gKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5zaXRlLWhlYWRlcicpLm9mZnNldEhlaWdodClcbiAgfSwgMzAwKTtcbn0pOyJdLCJmaWxlIjoicGFnZS10ZW1wbGF0ZS0tbGFuZGluZy1wYWdlLmpzIn0=
