var platformCreate = $('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offset().top;


  function animatePlatformCreate() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformCreate);

}

var platformShare = $('.animation-platform--share');

if (platformShare) {

  var topOfPlatformShare = platformShare.offset().top;

  function animatePlatformShare() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformShare - (window.innerHeight / 2)) {
      platformShare.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformShare);

}

var platformSign = document.querySelector('.animation-platform--sign');

if (platformSign) {

  var topOfPlatformSign = platformSign.offsetTop;

  function animatePlatformSign() {
    if (window.scrollY >= topOfPlatformSign - (window.innerHeight / 2)) {
      platformSign.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformSign);

}

var platformStore = document.querySelector('.animation-platform--store');

if (platformStore) {

  var topOfPlatformStore = platformStore.offsetTop;

  function animatePlatformStore() {
    if (window.scrollY >= topOfPlatformStore - (window.innerHeight / 2)) {
      platformStore.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformStore);

}

var platformAnalyze = document.querySelector('.animation-platform--analyze');

if (platformAnalyze) {

  var topOfPlatformAnalyze = platformAnalyze.offsetTop;

  function animatePlatformAnalyze() {
    if (window.scrollY >= topOfPlatformAnalyze - (window.innerHeight / 2)) {
      platformAnalyze.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformAnalyze);

}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9ICQoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAocGxhdGZvcm1DcmVhdGUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldCgpLnRvcDtcblxuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUNyZWF0ZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtQ3JlYXRlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybUNyZWF0ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1DcmVhdGUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybVNoYXJlID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2hhcmUnKTtcblxuaWYgKHBsYXRmb3JtU2hhcmUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybVNoYXJlID0gcGxhdGZvcm1TaGFyZS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU2hhcmUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybVNoYXJlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNoYXJlLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVQbGF0Zm9ybVNoYXJlKTtcblxufVxuXG52YXIgcGxhdGZvcm1TaWduID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpO1xuXG5pZiAocGxhdGZvcm1TaWduKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1TaWduID0gcGxhdGZvcm1TaWduLm9mZnNldFRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TaWduKCkge1xuICAgIGlmICh3aW5kb3cuc2Nyb2xsWSA+PSB0b3BPZlBsYXRmb3JtU2lnbiAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgcGxhdGZvcm1TaWduLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1TaWduKTtcblxufVxuXG52YXIgcGxhdGZvcm1TdG9yZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLXN0b3JlJyk7XG5cbmlmIChwbGF0Zm9ybVN0b3JlKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1TdG9yZSA9IHBsYXRmb3JtU3RvcmUub2Zmc2V0VG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybVN0b3JlKCkge1xuICAgIGlmICh3aW5kb3cuc2Nyb2xsWSA+PSB0b3BPZlBsYXRmb3JtU3RvcmUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtU3RvcmUuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsIGFuaW1hdGVQbGF0Zm9ybVN0b3JlKTtcblxufVxuXG52YXIgcGxhdGZvcm1BbmFseXplID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tYW5hbHl6ZScpO1xuXG5pZiAocGxhdGZvcm1BbmFseXplKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1BbmFseXplID0gcGxhdGZvcm1BbmFseXplLm9mZnNldFRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1BbmFseXplKCkge1xuICAgIGlmICh3aW5kb3cuc2Nyb2xsWSA+PSB0b3BPZlBsYXRmb3JtQW5hbHl6ZSAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgcGxhdGZvcm1BbmFseXplLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1BbmFseXplKTtcblxufSJdLCJmaWxlIjoicGFnZS10ZW1wbGF0ZS0tcGFnZS1zZWN0aW9ucy5qcyJ9
