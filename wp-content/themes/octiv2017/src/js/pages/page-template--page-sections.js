var platformCreate = document.querySelector('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offsetTop;

  function animatePlatformCreate() {
    if (window.scrollY >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformCreate));

}

var platformShare = document.querySelector('.animation-platform--share');

if (platformShare) {

  var topOfPlatformShare = platformShare.offsetTop;

  function animatePlatformShare() {
    if (window.scrollY >= topOfPlatformShare - (window.innerHeight / 2)) {
      platformShare.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformShare));

}

var platformSign = document.querySelector('.animation-platform--sign');

if (platformSign) {

  var topOfPlatformSign = platformSign.offsetTop;

  function animatePlatformSign() {
    if (window.scrollY >= topOfPlatformSign - (window.innerHeight / 2)) {
      platformSign.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformSign));

}

var platformStore = document.querySelector('.animation-platform--store');

if (platformStore) {

  var topOfPlatformStore = platformStore.offsetTop;

  function animatePlatformStore() {
    if (window.scrollY >= topOfPlatformStore - (window.innerHeight / 2)) {
      platformStore.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformStore));

}

var platformAnalyze = document.querySelector('.animation-platform--analyze');

if (platformAnalyze) {

  var topOfPlatformAnalyze = platformAnalyze.offsetTop;

  function animatePlatformAnalyze() {
    if (window.scrollY >= topOfPlatformAnalyze - (window.innerHeight / 2)) {
      platformAnalyze.classList.add('active');
    }
  }

  window.addEventListener('scroll', debounce(animatePlatformAnalyze));

}