var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  console.log();

  function cool() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.classList.add('active');
    } else if (window.scrollY <= topOfPlatformCreate - (window.innerHeight)) {
      platformCreate.classList.remove('active');
    }
  }

  window.addEventListener('scroll', cool);

}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAocGxhdGZvcm1DcmVhdGUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldFRvcDtcblxuICBjb25zb2xlLmxvZygpO1xuXG4gIGZ1bmN0aW9uIGNvb2woKSB7XG4gICAgaWYgKHdpbmRvdy5zY3JvbGxZID49IHRvcE9mUGxhdGZvcm1DcmVhdGUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQ3JlYXRlLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgIH0gZWxzZSBpZiAod2luZG93LnNjcm9sbFkgPD0gdG9wT2ZQbGF0Zm9ybUNyZWF0ZSAtICh3aW5kb3cuaW5uZXJIZWlnaHQpKSB7XG4gICAgICBwbGF0Zm9ybUNyZWF0ZS5jbGFzc0xpc3QucmVtb3ZlKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgY29vbCk7XG5cbn0iXSwiZmlsZSI6InBhZ2UtdGVtcGxhdGUtLXBhZ2Utc2VjdGlvbnMuanMifQ==
