var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  function animatePlatformCreate() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformCreate);

}

var platformShare = document.querySelector('.animation-platform--share');

if (platformShare) {

  var topOfPlatformShare = platformShare.offsetTop;

  function animatePlatformShare() {
    if (window.scrollY >= topOfPlatformShare - (window.innerHeight / 2)) {
      platformShare.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformShare);

}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAocGxhdGZvcm1DcmVhdGUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldFRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1DcmVhdGUoKSB7XG4gICAgaWYgKHdpbmRvdy5zY3JvbGxZID49IHRvcE9mUGxhdGZvcm1DcmVhdGUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQ3JlYXRlLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1DcmVhdGUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybVNoYXJlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2hhcmUnKTtcblxuaWYgKHBsYXRmb3JtU2hhcmUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybVNoYXJlID0gcGxhdGZvcm1TaGFyZS5vZmZzZXRUb3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU2hhcmUoKSB7XG4gICAgaWYgKHdpbmRvdy5zY3JvbGxZID49IHRvcE9mUGxhdGZvcm1TaGFyZSAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgcGxhdGZvcm1TaGFyZS5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU2hhcmUpO1xuXG59Il0sImZpbGUiOiJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIn0=
