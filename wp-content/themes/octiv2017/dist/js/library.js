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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJsaWJyYXJ5LmpzIl0sInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpIHtcblxuLypcbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cblNNT09USCBTQ1JPTExJTkcgRk9SIFNJREVCQVIgTElOS1Ncbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiovXG4kKCdbaHJlZj1cIiNjYWxsLXRvLWFjdGlvblwiXScpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICB2YXIgdGFyZ2V0ID0gJCh0aGlzLmhhc2gpO1xuICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XG4gICAgICBzY3JvbGxUb3A6IHRhcmdldC5vZmZzZXQoKS50b3AgLSAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtaGVhZGVyJykub2Zmc2V0SGVpZ2h0KVxuICB9LCAzMDApO1xufSk7XG5cblxuLypcbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuV0hJVEVQQVBFUiBTTElERVJcbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuKi9cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcud2hpdGVwYXBlci1zbGlkZXInKSkge1xuICAkKCcud2hpdGVwYXBlci1zbGlkZXInKS5zbGljayh7XG4gICAgYXJyb3dzOiB0cnVlLFxuICAgIGFwcGVuZEFycm93czogJCgnI2Fycm93LWFwcGVuZCcpLFxuICAgIHByZXZBcnJvdyA6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImJ0bi1kYXJrLS1vdXRsaW5lIG1hci1yIHNsaWNrLXByZXYgc2xpY2stYXJyb3dcIj4mbHQ7PC9idXR0b24+JyxcbiAgICBuZXh0QXJyb3cgOiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJidG4tZGFyay0tb3V0bGluZSBzbGljay1uZXh0IHNsaWNrLWFycm93XCI+Jmd0OzwvYnV0dG9uPicsXG4gICAgZG90czogdHJ1ZSxcbiAgICBkcmFnZ2FibGU6IGZhbHNlLFxuICB9KTtcbn1cblxuTWt0b0Zvcm1zMi53aGVuUmVuZGVyZWQoZnVuY3Rpb24oZm9ybSkge1xuICB2YXIgdGhpc0Zvcm0gPSBmb3JtLmdldEZvcm1FbGVtKClbMF07XG4gIGlmKHRoaXNGb3JtLmlkID09PSAnbWt0b0Zvcm1fMTI2MycpIHtcbiAgICB2YXIgdGhlc2VDaGVja2JveGVzID0gdGhpc0Zvcm0ucXVlcnlTZWxlY3RvckFsbCgnLm1rdG9DaGVja2JveExpc3QnKTtcbiAgICBmb3IgKHZhciBpID0gdGhlc2VDaGVja2JveGVzLmxlbmd0aCAtIDE7IGkgPj0gMDsgaS0tKSB7XG4gICAgICBpZiAoaSAhPSAxKSB7XG4gICAgICAgIHRoZXNlQ2hlY2tib3hlc1tpXS5wYXJlbnRFbGVtZW50LnN0eWxlLmZsZXhEaXJlY3Rpb24gPSAnY29sdW1uJztcbiAgICAgICAgdGhlc2VDaGVja2JveGVzW2ldLnBhcmVudEVsZW1lbnQuY2hpbGRyZW5bMF0uc3R5bGUub3JkZXIgPSAtMTtcbiAgICAgIH1cbiAgICB9XG4gIH1cbn0pO1xuXG59KSgpOyJdLCJmaWxlIjoibGlicmFyeS5qcyJ9
