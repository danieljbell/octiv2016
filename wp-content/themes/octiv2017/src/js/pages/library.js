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
    appendArrows: $('#arrow-append'),
    prevArrow : '<button type="button" class="btn-dark--outline mar-r slick-prev slick-arrow">&lt;</button>',
    nextArrow : '<button type="button" class="btn-dark--outline slick-next slick-arrow">&gt;</button>',
    dots: true,
    draggable: false,
  });
}


})();