/*
==================================
SMOOTH SCROLLING FOR SIDEBAR LINKS
==================================
*/
$('aside a').on('click', function(e) {
  e.preventDefault();
  var target = $(this.hash);
  $('html, body').animate({
      scrollTop: target.offset().top - (document.querySelector('.site-header').offsetHeight - (5*18))
  }, 300);
});

var sidebar = new StickySidebar('#sidebar', {
    containerSelector: '.post-content',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: (document.querySelector('.site-header').offsetHeight + 18),
    bottomSpacing: -54
});