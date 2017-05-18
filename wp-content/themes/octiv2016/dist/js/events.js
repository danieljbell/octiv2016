(function() {
  var allCheckboxes = document.querySelectorAll('.sticky-sidebar input[type="checkbox"]');
  for (var i = 0; i < allCheckboxes.length; i++) {
    allCheckboxes[i].addEventListener('change', function() {
      document.querySelector('body').classList.toggle('no-' + this.id);
    });
  }
})();
