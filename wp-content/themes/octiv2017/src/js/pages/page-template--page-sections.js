var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  console.log();

  function cool() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.classList.add('active');
    } else if (window.scrollY <= topOfPlatformCreate - (window.innerHeight)) {
      platformCreate.classList.remove('active');
    }
  }

  window.addEventListener('scroll', cool);

}