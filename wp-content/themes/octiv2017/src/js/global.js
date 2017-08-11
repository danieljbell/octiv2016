(function() {

  /*
  ==============================
  MENU TOGGLE
  ==============================
  */
  var headerMenuToggle = document.querySelector('#site-header-menu-toggle');
  headerMenuToggle.addEventListener('click', function() {
    this.classList.toggle('is-active');
    var body = document.body;
    if (body.classList.contains('site-header-menu-is-open')) {
      body.classList.remove('site-header-menu-is-open');
      return
    } else {
      body.classList.add('site-header-menu-is-open');
    }
  })

  /*
  ==============================
  MODALS
  ==============================
  */

  // OPEN MODAL
  var radButton = document.querySelectorAll('.rad-modal');
  for (var i = 0; i < radButton.length; i++) {
    radButton[i].addEventListener('click', function(e) {
      var body = document.body;

      e.preventDefault();
      if (body.classList.contains('modal-open')) {
        body.classList.remove('modal-open');
        return
      } else {
        body.classList.add('modal-open');
      }
    });
  }

  // CLOSE MODAL
  var closeModalButton = document.querySelector('#close-modal');
  closeModalButton.addEventListener('click', function() {
    document.body.classList.remove('modal-open');
  });
})();