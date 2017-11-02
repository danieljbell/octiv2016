var platformCreate = $('.animation-platform--create');

if (platformCreate) {

  var topOfPlatformCreate = platformCreate.offset().top;


  function animatePlatformCreate() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformCreate - (window.innerHeight / 2)) {
      platformCreate.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformCreate);

}

var platformShare = $('.animation-platform--share');

if (platformShare) {

  var topOfPlatformShare = platformShare.offset().top;

  function animatePlatformShare() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformShare - (window.innerHeight / 2)) {
      platformShare.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformShare);

}

var platformSign = document.querySelector('.animation-platform--sign');

if (platformSign) {

  var topOfPlatformSign = platformSign.offsetTop;

  function animatePlatformSign() {
    if (window.scrollY >= topOfPlatformSign - (window.innerHeight / 2)) {
      platformSign.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformSign);

}

var platformStore = document.querySelector('.animation-platform--store');

if (platformStore) {

  var topOfPlatformStore = platformStore.offsetTop;

  function animatePlatformStore() {
    if (window.scrollY >= topOfPlatformStore - (window.innerHeight / 2)) {
      platformStore.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformStore);

}

var platformAnalyze = document.querySelector('.animation-platform--analyze');

if (platformAnalyze) {

  var topOfPlatformAnalyze = platformAnalyze.offsetTop;

  function animatePlatformAnalyze() {
    if (window.scrollY >= topOfPlatformAnalyze - (window.innerHeight / 2)) {
      platformAnalyze.classList.add('active');
    }
  }

  window.addEventListener('scroll', animatePlatformAnalyze);

}