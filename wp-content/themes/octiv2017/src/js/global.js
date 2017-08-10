(function() {
  var headerMenuToggle = document.querySelector('#site-header-menu-toggle');
  headerMenuToggle.addEventListener('click', function() {
    var body = document.body;
    if (body.classList.contains('site-header-menu-is-open')) {
      body.classList.remove('site-header-menu-is-open');
      return
    } else {
      body.classList.add('site-header-menu-is-open');
    }
  })
})();