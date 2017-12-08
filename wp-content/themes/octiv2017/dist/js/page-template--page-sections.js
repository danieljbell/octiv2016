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

  

  setInterval(function() {
    if (integrationCRM.hasClass('active')) {
      loopIntegrations(integrationCRM);
    }
  }, 500);

  function loopIntegrations(elem) {
    console.log(elem);
  }

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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9ICQoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tY3JlYXRlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldCgpLnRvcDtcblxuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUNyZWF0ZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtQ3JlYXRlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybUNyZWF0ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1DcmVhdGUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybVNoYXJlID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2hhcmUnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLXNoYXJlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybVNoYXJlID0gcGxhdGZvcm1TaGFyZS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU2hhcmUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybVNoYXJlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNoYXJlLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVQbGF0Zm9ybVNoYXJlKTtcblxufVxuXG52YXIgcGxhdGZvcm1TaWduID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1TaWduID0gcGxhdGZvcm1TaWduLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TaWduKCkge1xuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9mUGxhdGZvcm1TaWduIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNpZ24uYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU2lnbik7XG5cbn1cblxudmFyIHBsYXRmb3JtU3RvcmUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1zdG9yZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc3RvcmUnKSkge1xuXG4gIHZhciB0b3BPZlBsYXRmb3JtU3RvcmUgPSBwbGF0Zm9ybVN0b3JlLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TdG9yZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtU3RvcmUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtU3RvcmUuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU3RvcmUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybUFuYWx5emUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJyk7XG5cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUFuYWx5emUgPSBwbGF0Zm9ybUFuYWx5emUub2Zmc2V0KCkudG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUFuYWx5emUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybUFuYWx5emUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQW5hbHl6ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1BbmFseXplKTtcblxufVxuXG52YXIgaW50ZWdyYXRpb25DUk0gPSAkKCcuYW5pbWF0aW9uLWludGVncmF0aW9uLS1jcm0nKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWNybScpKSB7XG5cbiAgdmFyIHRvcE9maW50ZWdyYXRpb25DUk0gPSBpbnRlZ3JhdGlvbkNSTS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZWludGVncmF0aW9uQ1JNKCkge1xuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9maW50ZWdyYXRpb25DUk0gLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIGludGVncmF0aW9uQ1JNLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG5cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZWludGVncmF0aW9uQ1JNKTtcblxuICBcblxuICBzZXRJbnRlcnZhbChmdW5jdGlvbigpIHtcbiAgICBpZiAoaW50ZWdyYXRpb25DUk0uaGFzQ2xhc3MoJ2FjdGl2ZScpKSB7XG4gICAgICBsb29wSW50ZWdyYXRpb25zKGludGVncmF0aW9uQ1JNKTtcbiAgICB9XG4gIH0sIDUwMCk7XG5cbiAgZnVuY3Rpb24gbG9vcEludGVncmF0aW9ucyhlbGVtKSB7XG4gICAgY29uc29sZS5sb2coZWxlbSk7XG4gIH1cblxufVxuXG5cbnZhciB2aWRlb0xhdW5jaE1vZGFscyA9ICQoJy5sYXVuY2gtdmlkZW8tbW9kYWwnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5sYXVuY2gtdmlkZW8tbW9kYWwnKSkge1xuXG4gIHZpZGVvTGF1bmNoTW9kYWxzLm9uKCdjbGljaycsIGxhdW5jaFZpZGVvTW9kYWwpO1xuXG4gIGZ1bmN0aW9uIGxhdW5jaFZpZGVvTW9kYWwoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgdmFyIG1vZGFsQ29udGFpbmVyID0gJCgnLnZpZGVvLW1vZGFsJyk7XG4gICAgdmFyIG1vZGFsVHlwZSA9ICR0aGlzLmRhdGEoJ21vZGFsLXR5cGUnKTtcbiAgICB2YXIgbW9kYWxJRCA9ICR0aGlzLmRhdGEoJ21vZGFsLWlkJyk7XG4gICAgdmFyIG1vZGFsSGVhZGxpbmUgPSAkdGhpcy5kYXRhKCdtb2RhbC1oZWFkbGluZScpO1xuICAgIHZhciBtb2RhbEJvZHkgPSAkdGhpcy5kYXRhKCdtb2RhbC1ib2R5Jyk7XG4gICAgdmFyIHZpZGVvUHJvdmlkZXIgPSAkdGhpcy5kYXRhKCd2aWRlby1wcm92aWRlcicpO1xuICAgIHZhciB2aWRlb0lEID0gJHRoaXMuZGF0YSgndmlkZW8taWQnKTtcbiAgICB3aW5kb3cudmlkZW9TcmMgPSAnaHR0cHM6Ly93d3cueW91dHViZS5jb20vZW1iZWQvJyArIHZpZGVvSUQgKyAnP3JlbD0wJmFtcDtzaG93aW5mbz0wJmFtcDttb2Rlc3RicmFuZGluZz0xJmFtcDtWUT1IRDcyMCZhdXRvcGxheT0xJztcbiAgICBcbiAgICBpZiAoIXdpbmRvdy5tb2RhbEhhc1JlZykge1xuICAgICAgd2luZG93Lm1vZGFsSGFzUmVnID0gZmFsc2U7XG4gICAgfVxuXG4gICAgaWYgKHZpZGVvUHJvdmlkZXIgPT09ICd3aXN0aWEnKSB7XG4gICAgICB2aWRlb1NyYyA9ICdodHRwczovL2Zhc3Qud2lzdGlhLm5ldC9lbWJlZC9pZnJhbWUvJyArIHZpZGVvSUQgKyAnP3BsYXliYXI9dHJ1ZSZzbWFsbFBsYXlCdXR0b249dHJ1ZSZ2b2x1bWVDb250cm9sPXRydWUmZnVsbHNjcmVlbkJ1dHRvbj10cnVlJmNvbnRyb2xzVmlzaWJsZU9uTG9hZD1mYWxzZSZhdXRvcGxheT10cnVlJztcbiAgICB9XG5cbiAgICAvLyB1bmdhdGVkIHZpZGVvcyBsb2FkIGltbWVkaWF0ZWx5XG4gICAgaWYgKCFtb2RhbFR5cGUpIHtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy52aWRlby1vdXRlcicpLnNob3coKTtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ2lmcmFtZScpLmF0dHIoJ3NyYycsIHZpZGVvU3JjKTtcbiAgICB9XG5cbiAgICAvLyBnYXRlZCB2aWRlbyBhY3Rpb25zXG4gICAgaWYgKG1vZGFsVHlwZSkge1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLnZpZGVvLW91dGVyJykuaGlkZSgpO1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLmZvcm0tY29udGFpbmVyJykuc2hvdygpO1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLmZvcm0tY29udGFpbmVyIGZvcm0nKS5hdHRyKCdpZCcsICdta3RvRm9ybV8nICsgbW9kYWxJRCk7XG5cbiAgICAgIGlmICh3aW5kb3cubW9kYWxIYXNSZWcgPT0gdHJ1ZSkge1xuICAgICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcudmlkZW8tb3V0ZXInKS5zaG93KCk7XG4gICAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy5mb3JtLWNvbnRhaW5lcicpLmhpZGUoKTtcbiAgICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnaWZyYW1lJykuYXR0cignc3JjJywgdmlkZW9TcmMpO1xuICAgICAgfVxuICAgICAgXG4gICAgICBpZiAoIWRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNjcmVhdGVkTWt0b0Zvcm0nKSkge1xuICAgICAgICB2YXIgZm9ybVNjcmlwdCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3NjcmlwdCcpO1xuICAgICAgICBmb3JtU2NyaXB0LnNldEF0dHJpYnV0ZSgnaWQnLCAnY3JlYXRlZE1rdG9Gb3JtJyk7XG4gICAgICAgIGZvcm1TY3JpcHQuaW5uZXJIVE1MID0gXG4gICAgICAgICAgJ01rdG9Gb3JtczIubG9hZEZvcm0oXCIvL2FwcC1zajIwLm1hcmtldG8uY29tXCIsIFwiNjI1LU1YWS02ODlcIiwgJyArIG1vZGFsSUQgKyAnLCBmdW5jdGlvbihmb3JtKSB7JyArXG4gICAgICAgICAgICAnZm9ybS5vblN1Y2Nlc3MoZnVuY3Rpb24odmFsdWVzLCBmb2xsb3dVcFVybCkgeycgK1xuICAgICAgICAgICAgICAnZm9ybS5nZXRGb3JtRWxlbSgpLmhpZGUoKTsnICtcbiAgICAgICAgICAgICAgJ3dpbmRvdy5tb2RhbEhhc1JlZyA9IHRydWU7JyArXG4gICAgICAgICAgICAgICckKFwiLnZpZGVvLW1vZGFsIGlmcmFtZVwiKS5hdHRyKFwic3JjXCIsIHZpZGVvU3JjKTsnICtcbiAgICAgICAgICAgICAgJyQoXCIudmlkZW8tbW9kYWwgLnZpZGVvLW91dGVyXCIpLnNob3coKTsnICtcbiAgICAgICAgICAgICAgJ3JldHVybiBmYWxzZTsnICtcbiAgICAgICAgICAgICd9KTsnICtcbiAgICAgICAgICAnfSk7JztcbiAgICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLmZvcm0tY29udGFpbmVyJykuYXBwZW5kKGZvcm1TY3JpcHQpO1xuICAgICAgfVxuXG4gICAgfVxuXG4gICAgXG5cbiAgICAvLyB1cGRhdGUgdGV4dCBhbmQgaGlkZSBpZiBub3QgcHJlc2VudFxuICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ2gyJykuc2hvdygpLnRleHQobW9kYWxIZWFkbGluZSk7XG4gICAgbW9kYWxDb250YWluZXIuZmluZCgncCcpLnNob3coKS50ZXh0KG1vZGFsQm9keSk7XG4gICAgaWYgKCFtb2RhbEhlYWRsaW5lKSB7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCdoMicpLmhpZGUoKTsgIFxuICAgIH1cbiAgICBpZiAoIW1vZGFsQm9keSkge1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgncCcpLmhpZGUoKTsgIFxuICAgIH1cblxuICAgIG1vZGFsQ29udGFpbmVyLm1vZGFsKCk7XG5cbiAgICBtb2RhbENvbnRhaW5lci5vbignaGlkZS5icy5tb2RhbCcsIGZ1bmN0aW9uKGUpIHtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ2lmcmFtZScpLmF0dHIoJ3NyYycsICcnKTtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy5mb3JtLWNvbnRhaW5lcicpLmhpZGUoKTtcbiAgICB9KVxuICB9XG5cbn0iXSwiZmlsZSI6InBhZ2UtdGVtcGxhdGUtLXBhZ2Utc2VjdGlvbnMuanMifQ==
