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

var integrationCRM = $('.animation-integration--crm');

if (document.querySelector('.animation-integration--crm')) {

  var topOfintegrationCRM = integrationCRM.offset().top;

  function animateintegrationCRM() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationCRM - (window.innerHeight / 2)) {
      integrationCRM.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationCRM);

}


var integrationEsignature = $('.animation-integration--esignature');

if (document.querySelector('.animation-integration--esignature')) {

  var topOfintegrationEsignature = integrationEsignature.offset().top;

  function animateintegrationEsignature() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationEsignature - (window.innerHeight / 2)) {
      integrationEsignature.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationEsignature);

}

var integrationCPQ = $('.animation-integration--cpq');

if (document.querySelector('.animation-integration--cpq')) {

  var topOfintegrationCPQ = integrationCPQ.offset().top;

  function animateintegrationCPQ() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationCPQ - (window.innerHeight / 2)) {
      integrationCPQ.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationCPQ);

}


var integrationFileStorage = $('.animation-integration--file-storage');

if (document.querySelector('.animation-integration--file-storage')) {

  var topOfintegrationFileStorage = integrationFileStorage.offset().top;

  function animateintegrationFileStorage() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationFileStorage - (window.innerHeight / 2)) {
      integrationFileStorage.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationFileStorage);

}


var integrationEmail = $('.animation-integration--email');

if (document.querySelector('.animation-integration--email')) {

  var topOfintegrationEmail = integrationEmail.offset().top;

  function animateintegrationEmail() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationEmail - (window.innerHeight / 2)) {
      integrationEmail.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationEmail);

}


var integrationFinance = $('.animation-integration--finance');

if (document.querySelector('.animation-integration--finance')) {

  var topOfintegrationFinance = integrationFinance.offset().top;

  function animateintegrationFinance() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationFinance - (window.innerHeight / 2)) {
      integrationFinance.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationFinance);

}


var integrationForms = $('.animation-integration--forms');

if (document.querySelector('.animation-integration--forms')) {

  var topOfintegrationForms = integrationForms.offset().top;

  function animateintegrationForms() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationForms - (window.innerHeight / 2)) {
      integrationForms.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationForms);

}


var integrationSSO = $('.animation-integration--sso');

if (document.querySelector('.animation-integration--sso')) {

  var topOfintegrationSSO = integrationSSO.offset().top;

  function animateintegrationSSO() {
    
    var $this = $(this);
    if ($this.scrollTop() >= topOfintegrationSSO - (window.innerHeight / 2)) {
      integrationSSO.addClass('active');
    }

  }

  $(window).on('scroll', animateintegrationSSO);

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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9ICQoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tY3JlYXRlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldCgpLnRvcDtcblxuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUNyZWF0ZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtQ3JlYXRlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybUNyZWF0ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1DcmVhdGUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybVNoYXJlID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2hhcmUnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLXNoYXJlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybVNoYXJlID0gcGxhdGZvcm1TaGFyZS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU2hhcmUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybVNoYXJlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNoYXJlLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVQbGF0Zm9ybVNoYXJlKTtcblxufVxuXG52YXIgcGxhdGZvcm1TaWduID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1TaWduID0gcGxhdGZvcm1TaWduLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TaWduKCkge1xuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9mUGxhdGZvcm1TaWduIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNpZ24uYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU2lnbik7XG5cbn1cblxudmFyIHBsYXRmb3JtU3RvcmUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1zdG9yZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc3RvcmUnKSkge1xuXG4gIHZhciB0b3BPZlBsYXRmb3JtU3RvcmUgPSBwbGF0Zm9ybVN0b3JlLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TdG9yZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtU3RvcmUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtU3RvcmUuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU3RvcmUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybUFuYWx5emUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJyk7XG5cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUFuYWx5emUgPSBwbGF0Zm9ybUFuYWx5emUub2Zmc2V0KCkudG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUFuYWx5emUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybUFuYWx5emUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQW5hbHl6ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1BbmFseXplKTtcblxufVxuXG52YXIgaW50ZWdyYXRpb25DUk0gPSAkKCcuYW5pbWF0aW9uLWludGVncmF0aW9uLS1jcm0nKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWNybScpKSB7XG5cbiAgdmFyIHRvcE9maW50ZWdyYXRpb25DUk0gPSBpbnRlZ3JhdGlvbkNSTS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZWludGVncmF0aW9uQ1JNKCkge1xuICAgIFxuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9maW50ZWdyYXRpb25DUk0gLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIGludGVncmF0aW9uQ1JNLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG5cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZWludGVncmF0aW9uQ1JNKTtcblxufVxuXG5cbnZhciBpbnRlZ3JhdGlvbkVzaWduYXR1cmUgPSAkKCcuYW5pbWF0aW9uLWludGVncmF0aW9uLS1lc2lnbmF0dXJlJyk7XG5cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYW5pbWF0aW9uLWludGVncmF0aW9uLS1lc2lnbmF0dXJlJykpIHtcblxuICB2YXIgdG9wT2ZpbnRlZ3JhdGlvbkVzaWduYXR1cmUgPSBpbnRlZ3JhdGlvbkVzaWduYXR1cmUub2Zmc2V0KCkudG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVpbnRlZ3JhdGlvbkVzaWduYXR1cmUoKSB7XG4gICAgXG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZpbnRlZ3JhdGlvbkVzaWduYXR1cmUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIGludGVncmF0aW9uRXNpZ25hdHVyZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuXG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVpbnRlZ3JhdGlvbkVzaWduYXR1cmUpO1xuXG59XG5cbnZhciBpbnRlZ3JhdGlvbkNQUSA9ICQoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWNwcScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1pbnRlZ3JhdGlvbi0tY3BxJykpIHtcblxuICB2YXIgdG9wT2ZpbnRlZ3JhdGlvbkNQUSA9IGludGVncmF0aW9uQ1BRLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlaW50ZWdyYXRpb25DUFEoKSB7XG4gICAgXG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZpbnRlZ3JhdGlvbkNQUSAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgaW50ZWdyYXRpb25DUFEuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cblxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlaW50ZWdyYXRpb25DUFEpO1xuXG59XG5cblxudmFyIGludGVncmF0aW9uRmlsZVN0b3JhZ2UgPSAkKCcuYW5pbWF0aW9uLWludGVncmF0aW9uLS1maWxlLXN0b3JhZ2UnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWZpbGUtc3RvcmFnZScpKSB7XG5cbiAgdmFyIHRvcE9maW50ZWdyYXRpb25GaWxlU3RvcmFnZSA9IGludGVncmF0aW9uRmlsZVN0b3JhZ2Uub2Zmc2V0KCkudG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVpbnRlZ3JhdGlvbkZpbGVTdG9yYWdlKCkge1xuICAgIFxuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9maW50ZWdyYXRpb25GaWxlU3RvcmFnZSAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgaW50ZWdyYXRpb25GaWxlU3RvcmFnZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuXG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVpbnRlZ3JhdGlvbkZpbGVTdG9yYWdlKTtcblxufVxuXG5cbnZhciBpbnRlZ3JhdGlvbkVtYWlsID0gJCgnLmFuaW1hdGlvbi1pbnRlZ3JhdGlvbi0tZW1haWwnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWVtYWlsJykpIHtcblxuICB2YXIgdG9wT2ZpbnRlZ3JhdGlvbkVtYWlsID0gaW50ZWdyYXRpb25FbWFpbC5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZWludGVncmF0aW9uRW1haWwoKSB7XG4gICAgXG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZpbnRlZ3JhdGlvbkVtYWlsIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBpbnRlZ3JhdGlvbkVtYWlsLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG5cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZWludGVncmF0aW9uRW1haWwpO1xuXG59XG5cblxudmFyIGludGVncmF0aW9uRmluYW5jZSA9ICQoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWZpbmFuY2UnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWZpbmFuY2UnKSkge1xuXG4gIHZhciB0b3BPZmludGVncmF0aW9uRmluYW5jZSA9IGludGVncmF0aW9uRmluYW5jZS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZWludGVncmF0aW9uRmluYW5jZSgpIHtcbiAgICBcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZmludGVncmF0aW9uRmluYW5jZSAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgaW50ZWdyYXRpb25GaW5hbmNlLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG5cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZWludGVncmF0aW9uRmluYW5jZSk7XG5cbn1cblxuXG52YXIgaW50ZWdyYXRpb25Gb3JtcyA9ICQoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWZvcm1zJyk7XG5cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYW5pbWF0aW9uLWludGVncmF0aW9uLS1mb3JtcycpKSB7XG5cbiAgdmFyIHRvcE9maW50ZWdyYXRpb25Gb3JtcyA9IGludGVncmF0aW9uRm9ybXMub2Zmc2V0KCkudG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVpbnRlZ3JhdGlvbkZvcm1zKCkge1xuICAgIFxuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9maW50ZWdyYXRpb25Gb3JtcyAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgaW50ZWdyYXRpb25Gb3Jtcy5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuXG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVpbnRlZ3JhdGlvbkZvcm1zKTtcblxufVxuXG5cbnZhciBpbnRlZ3JhdGlvblNTTyA9ICQoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLXNzbycpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1pbnRlZ3JhdGlvbi0tc3NvJykpIHtcblxuICB2YXIgdG9wT2ZpbnRlZ3JhdGlvblNTTyA9IGludGVncmF0aW9uU1NPLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlaW50ZWdyYXRpb25TU08oKSB7XG4gICAgXG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZpbnRlZ3JhdGlvblNTTyAtICh3aW5kb3cuaW5uZXJIZWlnaHQgLyAyKSkge1xuICAgICAgaW50ZWdyYXRpb25TU08uYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cblxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlaW50ZWdyYXRpb25TU08pO1xuXG59XG5cblxudmFyIHZpZGVvTGF1bmNoTW9kYWxzID0gJCgnLmxhdW5jaC12aWRlby1tb2RhbCcpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmxhdW5jaC12aWRlby1tb2RhbCcpKSB7XG5cbiAgdmlkZW9MYXVuY2hNb2RhbHMub24oJ2NsaWNrJywgbGF1bmNoVmlkZW9Nb2RhbCk7XG5cbiAgZnVuY3Rpb24gbGF1bmNoVmlkZW9Nb2RhbChlKSB7XG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICB2YXIgbW9kYWxDb250YWluZXIgPSAkKCcudmlkZW8tbW9kYWwnKTtcbiAgICB2YXIgbW9kYWxUeXBlID0gJHRoaXMuZGF0YSgnbW9kYWwtdHlwZScpO1xuICAgIHZhciBtb2RhbElEID0gJHRoaXMuZGF0YSgnbW9kYWwtaWQnKTtcbiAgICB2YXIgbW9kYWxIZWFkbGluZSA9ICR0aGlzLmRhdGEoJ21vZGFsLWhlYWRsaW5lJyk7XG4gICAgdmFyIG1vZGFsQm9keSA9ICR0aGlzLmRhdGEoJ21vZGFsLWJvZHknKTtcbiAgICB2YXIgdmlkZW9Qcm92aWRlciA9ICR0aGlzLmRhdGEoJ3ZpZGVvLXByb3ZpZGVyJyk7XG4gICAgdmFyIHZpZGVvSUQgPSAkdGhpcy5kYXRhKCd2aWRlby1pZCcpO1xuICAgIHdpbmRvdy52aWRlb1NyYyA9ICdodHRwczovL3d3dy55b3V0dWJlLmNvbS9lbWJlZC8nICsgdmlkZW9JRCArICc/cmVsPTAmYW1wO3Nob3dpbmZvPTAmYW1wO21vZGVzdGJyYW5kaW5nPTEmYW1wO1ZRPUhENzIwJmF1dG9wbGF5PTEnO1xuICAgIFxuICAgIGlmICghd2luZG93Lm1vZGFsSGFzUmVnKSB7XG4gICAgICB3aW5kb3cubW9kYWxIYXNSZWcgPSBmYWxzZTtcbiAgICB9XG5cbiAgICBpZiAodmlkZW9Qcm92aWRlciA9PT0gJ3dpc3RpYScpIHtcbiAgICAgIHZpZGVvU3JjID0gJ2h0dHBzOi8vZmFzdC53aXN0aWEubmV0L2VtYmVkL2lmcmFtZS8nICsgdmlkZW9JRCArICc/cGxheWJhcj10cnVlJnNtYWxsUGxheUJ1dHRvbj10cnVlJnZvbHVtZUNvbnRyb2w9dHJ1ZSZmdWxsc2NyZWVuQnV0dG9uPXRydWUmY29udHJvbHNWaXNpYmxlT25Mb2FkPWZhbHNlJmF1dG9wbGF5PXRydWUnO1xuICAgIH1cblxuICAgIC8vIHVuZ2F0ZWQgdmlkZW9zIGxvYWQgaW1tZWRpYXRlbHlcbiAgICBpZiAoIW1vZGFsVHlwZSkge1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLnZpZGVvLW91dGVyJykuc2hvdygpO1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnaWZyYW1lJykuYXR0cignc3JjJywgdmlkZW9TcmMpO1xuICAgIH1cblxuICAgIC8vIGdhdGVkIHZpZGVvIGFjdGlvbnNcbiAgICBpZiAobW9kYWxUeXBlKSB7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcudmlkZW8tb3V0ZXInKS5oaWRlKCk7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcuZm9ybS1jb250YWluZXInKS5zaG93KCk7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcuZm9ybS1jb250YWluZXIgZm9ybScpLmF0dHIoJ2lkJywgJ21rdG9Gb3JtXycgKyBtb2RhbElEKTtcblxuICAgICAgaWYgKHdpbmRvdy5tb2RhbEhhc1JlZyA9PSB0cnVlKSB7XG4gICAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy52aWRlby1vdXRlcicpLnNob3coKTtcbiAgICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLmZvcm0tY29udGFpbmVyJykuaGlkZSgpO1xuICAgICAgICBtb2RhbENvbnRhaW5lci5maW5kKCdpZnJhbWUnKS5hdHRyKCdzcmMnLCB2aWRlb1NyYyk7XG4gICAgICB9XG4gICAgICBcbiAgICAgIGlmICghZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2NyZWF0ZWRNa3RvRm9ybScpKSB7XG4gICAgICAgIHZhciBmb3JtU2NyaXB0ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnc2NyaXB0Jyk7XG4gICAgICAgIGZvcm1TY3JpcHQuc2V0QXR0cmlidXRlKCdpZCcsICdjcmVhdGVkTWt0b0Zvcm0nKTtcbiAgICAgICAgZm9ybVNjcmlwdC5pbm5lckhUTUwgPSBcbiAgICAgICAgICAnTWt0b0Zvcm1zMi5sb2FkRm9ybShcIi8vYXBwLXNqMjAubWFya2V0by5jb21cIiwgXCI2MjUtTVhZLTY4OVwiLCAnICsgbW9kYWxJRCArICcsIGZ1bmN0aW9uKGZvcm0pIHsnICtcbiAgICAgICAgICAgICdmb3JtLm9uU3VjY2VzcyhmdW5jdGlvbih2YWx1ZXMsIGZvbGxvd1VwVXJsKSB7JyArXG4gICAgICAgICAgICAgICdmb3JtLmdldEZvcm1FbGVtKCkuaGlkZSgpOycgK1xuICAgICAgICAgICAgICAnd2luZG93Lm1vZGFsSGFzUmVnID0gdHJ1ZTsnICtcbiAgICAgICAgICAgICAgJyQoXCIudmlkZW8tbW9kYWwgaWZyYW1lXCIpLmF0dHIoXCJzcmNcIiwgdmlkZW9TcmMpOycgK1xuICAgICAgICAgICAgICAnJChcIi52aWRlby1tb2RhbCAudmlkZW8tb3V0ZXJcIikuc2hvdygpOycgK1xuICAgICAgICAgICAgICAncmV0dXJuIGZhbHNlOycgK1xuICAgICAgICAgICAgJ30pOycgK1xuICAgICAgICAgICd9KTsnO1xuICAgICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcuZm9ybS1jb250YWluZXInKS5hcHBlbmQoZm9ybVNjcmlwdCk7XG4gICAgICB9XG5cbiAgICB9XG5cbiAgICBcblxuICAgIC8vIHVwZGF0ZSB0ZXh0IGFuZCBoaWRlIGlmIG5vdCBwcmVzZW50XG4gICAgbW9kYWxDb250YWluZXIuZmluZCgnaDInKS5zaG93KCkudGV4dChtb2RhbEhlYWRsaW5lKTtcbiAgICBtb2RhbENvbnRhaW5lci5maW5kKCdwJykuc2hvdygpLnRleHQobW9kYWxCb2R5KTtcbiAgICBpZiAoIW1vZGFsSGVhZGxpbmUpIHtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ2gyJykuaGlkZSgpOyAgXG4gICAgfVxuICAgIGlmICghbW9kYWxCb2R5KSB7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCdwJykuaGlkZSgpOyAgXG4gICAgfVxuXG4gICAgbW9kYWxDb250YWluZXIubW9kYWwoKTtcblxuICAgIG1vZGFsQ29udGFpbmVyLm9uKCdoaWRlLmJzLm1vZGFsJywgZnVuY3Rpb24oZSkge1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnaWZyYW1lJykuYXR0cignc3JjJywgJycpO1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLmZvcm0tY29udGFpbmVyJykuaGlkZSgpO1xuICAgIH0pXG4gIH1cblxufSJdLCJmaWxlIjoicGFnZS10ZW1wbGF0ZS0tcGFnZS1zZWN0aW9ucy5qcyJ9
