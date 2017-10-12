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
    draggable: false,
  });
}


})();
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJsaWJyYXJ5LmpzIl0sInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpIHtcblxuLypcbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cblNNT09USCBTQ1JPTExJTkcgRk9SIFNJREVCQVIgTElOS1Ncbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiovXG4kKCdbaHJlZj1cIiNjYWxsLXRvLWFjdGlvblwiXScpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICB2YXIgdGFyZ2V0ID0gJCh0aGlzLmhhc2gpO1xuICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XG4gICAgICBzY3JvbGxUb3A6IHRhcmdldC5vZmZzZXQoKS50b3AgLSAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtaGVhZGVyJykub2Zmc2V0SGVpZ2h0KVxuICB9LCAzMDApO1xufSk7XG5cblxuLypcbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuV0hJVEVQQVBFUiBTTElERVJcbj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuKi9cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcud2hpdGVwYXBlci1zbGlkZXInKSkge1xuICAkKCcud2hpdGVwYXBlci1zbGlkZXInKS5zbGljayh7XG4gICAgYXJyb3dzOiB0cnVlLFxuICAgIGRvdHM6IHRydWUsXG4gICAgZHJhZ2dhYmxlOiBmYWxzZSxcbiAgfSk7XG59XG5cblxufSkoKTsiXSwiZmlsZSI6ImxpYnJhcnkuanMifQ==
