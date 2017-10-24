var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  console.log();

  function cool() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.classList.add('active');
      // document.body.style.paddingTop = platformCreate.offsetHeight + 'px';
      // document.body.classList.add('site-header-fixed');
    } else {
      // document.body.style.paddingTop = 0;
      // document.body.classList.remove('site-header-fixed');
    }
  }

  window.addEventListener('scroll', cool);

}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAocGxhdGZvcm1DcmVhdGUpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldFRvcDtcblxuICBjb25zb2xlLmxvZygpO1xuXG4gIGZ1bmN0aW9uIGNvb2woKSB7XG4gICAgaWYgKHdpbmRvdy5zY3JvbGxZID49IHRvcE9mUGxhdGZvcm1DcmVhdGUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQ3JlYXRlLmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuICAgICAgLy8gZG9jdW1lbnQuYm9keS5zdHlsZS5wYWRkaW5nVG9wID0gcGxhdGZvcm1DcmVhdGUub2Zmc2V0SGVpZ2h0ICsgJ3B4JztcbiAgICAgIC8vIGRvY3VtZW50LmJvZHkuY2xhc3NMaXN0LmFkZCgnc2l0ZS1oZWFkZXItZml4ZWQnKTtcbiAgICB9IGVsc2Uge1xuICAgICAgLy8gZG9jdW1lbnQuYm9keS5zdHlsZS5wYWRkaW5nVG9wID0gMDtcbiAgICAgIC8vIGRvY3VtZW50LmJvZHkuY2xhc3NMaXN0LnJlbW92ZSgnc2l0ZS1oZWFkZXItZml4ZWQnKTtcbiAgICB9XG4gIH1cblxuICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgY29vbCk7XG5cbn0iXSwiZmlsZSI6InBhZ2UtdGVtcGxhdGUtLXBhZ2Utc2VjdGlvbnMuanMifQ==
