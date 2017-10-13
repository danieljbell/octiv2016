(function() {

/*
==================================
SMOOTH SCROLLING FOR SIDEBAR LINKS
==================================
*/
$('[href="#call-to-action"]').on('click', function(e) {
  e.preventDefault();
  var target = $(this.hash);
  $('html, body').animate({
      scrollTop: target.offset().top - (document.querySelector('.site-header').offsetHeight)
  }, 300);
});


/*
==============================
WHITEPAPER SLIDER
==============================
*/
if (document.querySelectorAll('.whitepaper-slider')) {
  $('.whitepaper-slider').slick({
    arrows: true,
    dots: true,
    appendDots: $('.notch'),
    draggable: false,
  });
}


})();