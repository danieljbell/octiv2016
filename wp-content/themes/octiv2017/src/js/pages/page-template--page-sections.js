var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  function animatePlatformCreate() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformCreate);

}