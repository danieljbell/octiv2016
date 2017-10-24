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

var platformShare = document.querySelector('.animation-platform--share');

if (platformShare) {

  var topOfPlatformShare = platformShare.offsetTop;

  function animatePlatformShare() {
    if (window.scrollY >= topOfPlatformShare - (window.innerHeight / 2)) {
      platformShare.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformShare);

}