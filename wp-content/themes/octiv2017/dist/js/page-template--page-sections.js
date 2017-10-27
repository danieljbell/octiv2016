var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  function animatePlatformCreate() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformCreate));

}

var platformShare = document.querySelector('.animation-platform--share');

if (platformShare) {

  var topOfPlatformShare = platformShare.offsetTop;

  function animatePlatformShare() {
    if (window.scrollY >= topOfPlatformShare - (window.innerHeight / 2)) {
      platformShare.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformShare));

}

var platformSign = document.querySelector('.animation-platform--sign');

if (platformSign) {

  var topOfPlatformSign = platformSign.offsetTop;

  function animatePlatformSign() {
    if (window.scrollY >= topOfPlatformSign - (window.innerHeight / 2)) {
      platformSign.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformSign));

}

var platformStore = document.querySelector('.animation-platform--store');

if (platformStore) {

  var topOfPlatformStore = platformStore.offsetTop;

  function animatePlatformStore() {
    if (window.scrollY >= topOfPlatformStore - (window.innerHeight / 2)) {
      platformStore.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformStore));

}

var platformAnalyze = document.querySelector('.animation-platform--analyze');

if (platformAnalyze) {

  var topOfPlatformAnalyze = platformAnalyze.offsetTop;

  function animatePlatformAnalyze() {
    if (window.scrollY >= topOfPlatformAnalyze - (window.innerHeight / 2)) {
      platformAnalyze.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformAnalyze));

}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAocGxhdGZvcm1DcmVhdGUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldFRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1DcmVhdGUoKSB7XG4gICAgaWYgKHdpbmRvdy5zY3JvbGxZID49IHRvcE9mUGxhdGZvcm1DcmVhdGUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQ3JlYXRlLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCBkZWJvdW5jZShhbmltYXRlUGxhdGZvcm1DcmVhdGUpKTtcblxufVxuXG52YXIgcGxhdGZvcm1TaGFyZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLXNoYXJlJyk7XG5cbmlmIChwbGF0Zm9ybVNoYXJlKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1TaGFyZSA9IHBsYXRmb3JtU2hhcmUub2Zmc2V0VG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybVNoYXJlKCkge1xuICAgIGlmICh3aW5kb3cuc2Nyb2xsWSA+PSB0b3BPZlBsYXRmb3JtU2hhcmUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtU2hhcmUuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsIGRlYm91bmNlKGFuaW1hdGVQbGF0Zm9ybVNoYXJlKSk7XG5cbn1cblxudmFyIHBsYXRmb3JtU2lnbiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLXNpZ24nKTtcblxuaWYgKHBsYXRmb3JtU2lnbikge1xuXG4gIHZhciB0b3BPZlBsYXRmb3JtU2lnbiA9IHBsYXRmb3JtU2lnbi5vZmZzZXRUb3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU2lnbigpIHtcbiAgICBpZiAod2luZG93LnNjcm9sbFkgPj0gdG9wT2ZQbGF0Zm9ybVNpZ24gLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtU2lnbi5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgZGVib3VuY2UoYW5pbWF0ZVBsYXRmb3JtU2lnbikpO1xuXG59XG5cbnZhciBwbGF0Zm9ybVN0b3JlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc3RvcmUnKTtcblxuaWYgKHBsYXRmb3JtU3RvcmUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybVN0b3JlID0gcGxhdGZvcm1TdG9yZS5vZmZzZXRUb3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU3RvcmUoKSB7XG4gICAgaWYgKHdpbmRvdy5zY3JvbGxZID49IHRvcE9mUGxhdGZvcm1TdG9yZSAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgcGxhdGZvcm1TdG9yZS5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgZGVib3VuY2UoYW5pbWF0ZVBsYXRmb3JtU3RvcmUpKTtcblxufVxuXG52YXIgcGxhdGZvcm1BbmFseXplID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tYW5hbHl6ZScpO1xuXG5pZiAocGxhdGZvcm1BbmFseXplKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1BbmFseXplID0gcGxhdGZvcm1BbmFseXplLm9mZnNldFRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1BbmFseXplKCkge1xuICAgIGlmICh3aW5kb3cuc2Nyb2xsWSA+PSB0b3BPZlBsYXRmb3JtQW5hbHl6ZSAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgcGxhdGZvcm1BbmFseXplLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCBkZWJvdW5jZShhbmltYXRlUGxhdGZvcm1BbmFseXplKSk7XG5cbn0iXSwiZmlsZSI6InBhZ2UtdGVtcGxhdGUtLXBhZ2Utc2VjdGlvbnMuanMifQ==
