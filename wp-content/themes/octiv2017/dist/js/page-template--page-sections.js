var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  console.log();

  function cool() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      console.log('fire');
      // document.body.style.paddingTop = platformCreate.offsetHeight + 'px';
      // document.body.classList.add('site-header-fixed');
    } else {
      // document.body.style.paddingTop = 0;
      // document.body.classList.remove('site-header-fixed');
    }
  }

  window.addEventListener('scroll', cool);

}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAocGxhdGZvcm1DcmVhdGUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldFRvcDtcblxuICBjb25zb2xlLmxvZygpO1xuXG4gIGZ1bmN0aW9uIGNvb2woKSB7XG4gICAgaWYgKHdpbmRvdy5zY3JvbGxZID49IHRvcE9mUGxhdGZvcm1DcmVhdGUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIGNvbnNvbGUubG9nKCdmaXJlJyk7XG4gICAgICAvLyBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdUb3AgPSBwbGF0Zm9ybUNyZWF0ZS5vZmZzZXRIZWlnaHQgKyAncHgnO1xuICAgICAgLy8gZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QuYWRkKCdzaXRlLWhlYWRlci1maXhlZCcpO1xuICAgIH0gZWxzZSB7XG4gICAgICAvLyBkb2N1bWVudC5ib2R5LnN0eWxlLnBhZGRpbmdUb3AgPSAwO1xuICAgICAgLy8gZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QucmVtb3ZlKCdzaXRlLWhlYWRlci1maXhlZCcpO1xuICAgIH1cbiAgfVxuXG4gIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCBjb29sKTtcblxufSJdLCJmaWxlIjoicGFnZS10ZW1wbGF0ZS0tcGFnZS1zZWN0aW9ucy5qcyJ9
