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

MktoForms2.whenRendered(function(form) {
  var thisForm = form.getFormElem()[0];
  if(thisForm.id === 'mktoForm_1263') {
    var theseCheckboxes = thisForm.querySelectorAll('.mktoCheckboxList');
    for (var i = theseCheckboxes.length - 1; i >= 0; i--) {
      if (i != 1) {
        theseCheckboxes[i].parentElement.style.flexDirection = 'column';
        theseCheckboxes[i].parentElement.children[0].style.order = -1;
      }
    }
  }
});

})();

var hasDemoAuth = getParameterByName('demo_auth');
var hasReg = getParameterByName('reg');

if (hasDemoAuth || hasReg) {
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
}