var platformCreate = $('.animation-platform--create');

if (document.querySelector('.animation-platform--create')) {

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

if (document.querySelector('.animation-platform--share')) {

  var topOfPlatformShare = platformShare.offset().top;

  function animatePlatformShare() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformShare - (window.innerHeight / 2)) {
      platformShare.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformShare);

}

var platformSign = $('.animation-platform--sign');

if (document.querySelector('.animation-platform--sign')) {

  var topOfPlatformSign = platformSign.offset().top;

  function animatePlatformSign() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformSign - (window.innerHeight / 2)) {
      platformSign.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformSign);

}

var platformStore = $('.animation-platform--store');

if (document.querySelector('.animation-platform--store')) {

  var topOfPlatformStore = platformStore.offset().top;

  function animatePlatformStore() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformStore - (window.innerHeight / 2)) {
      platformStore.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformStore);

}

var platformAnalyze = $('.animation-platform--analyze');

if (document.querySelector('.animation-platform--analyze')) {

  var topOfPlatformAnalyze = platformAnalyze.offset().top;

  function animatePlatformAnalyze() {
    var $this = $(this);
    if ($this.scrollTop() >= topOfPlatformAnalyze - (window.innerHeight / 2)) {
      platformAnalyze.addClass('active');
    }
  }

  $(window).on('scroll', animatePlatformAnalyze);

}


var videoLaunchModals = $('.launch-video-modal');

if (document.querySelectorAll('.launch-video-modal')) {

  videoLaunchModals.on('click', launchVideoModal);

  function launchVideoModal(e) {
    e.preventDefault();

    var $this = $(this);
    var modalContainer = $('.video-modal');
    var modalType = $this.data('modal-type');
    var modalID = $this.data('modal-id');
    var modalHeadline = $this.data('modal-headline');
    var modalBody = $this.data('modal-body');
    var videoProvider = $this.data('video-provider');
    var videoID = $this.data('video-id');
    window.videoSrc = 'https://www.youtube.com/embed/' + videoID + '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720&autoplay=1';
    
    if (!window.modalHasReg) {
      window.modalHasReg = false;
    }

    if (videoProvider === 'wistia') {
      videoSrc = 'https://fast.wistia.net/embed/iframe/' + videoID + '?playbar=true&smallPlayButton=true&volumeControl=true&fullscreenButton=true&controlsVisibleOnLoad=false&autoplay=true';
    }

    // ungated videos load immediately
    if (!modalType) {
      modalContainer.find('.video-outer').show();
      modalContainer.find('iframe').attr('src', videoSrc);
    }

    // gated video actions
    if (modalType) {
      modalContainer.find('.video-outer').hide();
      modalContainer.find('.form-container').show();
      modalContainer.find('.form-container form').attr('id', 'mktoForm_' + modalID);

      if (window.modalHasReg == true) {
        modalContainer.find('.video-outer').show();
        modalContainer.find('.form-container').hide();
        modalContainer.find('iframe').attr('src', videoSrc);
      }
      
      if (!document.querySelector('#createdMktoForm')) {
        var formScript = document.createElement('script');
        formScript.setAttribute('id', 'createdMktoForm');
        formScript.innerHTML = 
          'MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", ' + modalID + ', function(form) {' +
            'form.onSuccess(function(values, followUpUrl) {' +
              'form.getFormElem().hide();' +
              'window.modalHasReg = true;' +
              '$(".video-modal iframe").attr("src", videoSrc);' +
              '$(".video-modal .video-outer").show();' +
              'return false;' +
            '});' +
          '});';
        modalContainer.find('.form-container').append(formScript);
      }

    }

    

    // update text and hide if not present
    modalContainer.find('h2').show().text(modalHeadline);
    modalContainer.find('p').show().text(modalBody);
    if (!modalHeadline) {
      modalContainer.find('h2').hide();  
    }
    if (!modalBody) {
      modalContainer.find('p').hide();  
    }

    modalContainer.modal();

    modalContainer.on('hide.bs.modal', function(e) {
      modalContainer.find('iframe').attr('src', '');
      modalContainer.find('.form-container').hide();
    })
  }

}