(function() {
  // Adding Filter Class to the body element based on checkboxes
  var allCheckboxes = document.querySelectorAll('.sticky-sidebar input[type="checkbox"]');
  for (var i = 0; i < allCheckboxes.length; i++) {
    allCheckboxes[i].addEventListener('change', function() {
      document.querySelector('body').classList.toggle('no-' + this.id);
    });
  }

  if (document.querySelector('body').classList.contains('single')) {
    window.history.replaceState( null , null, window.location.pathname );
  }

  $('.event-agenda').slick();

})();
