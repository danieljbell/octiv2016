(function() {
  var allFilterToggles = document.querySelectorAll('.filter-toggle');
  for (var i = 0; i < allFilterToggles.length; i++) {
    allFilterToggles[i].addEventListener('click', function() {
      this.classList.toggle('is-open');
      if (this.classList.contains('is-open')) {
          this.innerHTML = 'Hide Filters';
      } else {
        this.innerHTML = 'Show Filters';
      }
    });
  }

  var allCheckboxes = document.querySelectorAll('.sticky-listing input[type="checkbox"]');
  for (var i = 0; i < allCheckboxes.length; i++) {
    allCheckboxes[i].addEventListener('change', function() {
      this.parentElement.parentElement.parentElement.parentElement.parentElement.classList.toggle('no-' + this.id);
    });
  }
})();
