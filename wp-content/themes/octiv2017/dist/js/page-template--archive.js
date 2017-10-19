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

var sidebar = new StickySidebar('#sidebar', {
    containerSelector: '.post-content',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: (document.querySelector('.site-header').offsetHeight + 18),
    bottomSpacing: -54
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1hcmNoaXZlLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qXG49PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG5TTU9PVEggU0NST0xMSU5HIEZPUiBTSURFQkFSIExJTktTXG49PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG4qL1xuJCgnYXNpZGUgYScpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICB2YXIgdGFyZ2V0ID0gJCh0aGlzLmhhc2gpO1xuICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XG4gICAgICBzY3JvbGxUb3A6IHRhcmdldC5vZmZzZXQoKS50b3AgLSAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtaGVhZGVyJykub2Zmc2V0SGVpZ2h0KVxuICB9LCAzMDApO1xufSk7XG5cbnZhciBzaWRlYmFyID0gbmV3IFN0aWNreVNpZGViYXIoJyNzaWRlYmFyJywge1xuICAgIGNvbnRhaW5lclNlbGVjdG9yOiAnLnBvc3QtY29udGVudCcsXG4gICAgaW5uZXJXcmFwcGVyU2VsZWN0b3I6ICcuc2lkZWJhcl9faW5uZXInLFxuICAgIHRvcFNwYWNpbmc6IChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuc2l0ZS1oZWFkZXInKS5vZmZzZXRIZWlnaHQgKyAxOCksXG4gICAgYm90dG9tU3BhY2luZzogLTU0XG59KTsiXSwiZmlsZSI6InBhZ2UtdGVtcGxhdGUtLWFyY2hpdmUuanMifQ==
