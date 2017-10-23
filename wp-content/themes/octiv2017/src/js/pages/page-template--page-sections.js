var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  console.log();

  function cool() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      console.log('fire');
      // document.body.style.paddingTop = platformCreate.offsetHeight + 'px';
      // document.body.classList.add('site-header-fixed');
    } else {
      // document.body.style.paddingTop = 0;
      // document.body.classList.remove('site-header-fixed');
    }
  }

  window.addEventListener('scroll', cool);

}