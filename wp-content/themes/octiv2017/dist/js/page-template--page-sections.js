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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9ICQoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tY3JlYXRlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldCgpLnRvcDtcblxuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUNyZWF0ZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtQ3JlYXRlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybUNyZWF0ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1DcmVhdGUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybVNoYXJlID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2hhcmUnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLXNoYXJlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybVNoYXJlID0gcGxhdGZvcm1TaGFyZS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU2hhcmUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybVNoYXJlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNoYXJlLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVQbGF0Zm9ybVNoYXJlKTtcblxufVxuXG52YXIgcGxhdGZvcm1TaWduID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1TaWduID0gcGxhdGZvcm1TaWduLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TaWduKCkge1xuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9mUGxhdGZvcm1TaWduIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNpZ24uYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU2lnbik7XG5cbn1cblxudmFyIHBsYXRmb3JtU3RvcmUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1zdG9yZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc3RvcmUnKSkge1xuXG4gIHZhciB0b3BPZlBsYXRmb3JtU3RvcmUgPSBwbGF0Zm9ybVN0b3JlLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TdG9yZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtU3RvcmUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtU3RvcmUuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU3RvcmUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybUFuYWx5emUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJyk7XG5cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUFuYWx5emUgPSBwbGF0Zm9ybUFuYWx5emUub2Zmc2V0KCkudG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUFuYWx5emUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybUFuYWx5emUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQW5hbHl6ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1BbmFseXplKTtcblxufVxuXG52YXIgaW50ZWdyYXRpb25DUk0gPSAkKCcuYW5pbWF0aW9uLWludGVncmF0aW9uLS1jcm0nKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24taW50ZWdyYXRpb24tLWNybScpKSB7XG5cbiAgdmFyIHRvcE9maW50ZWdyYXRpb25DUk0gPSBpbnRlZ3JhdGlvbkNSTS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZWludGVncmF0aW9uQ1JNKCkge1xuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9maW50ZWdyYXRpb25DUk0gLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIGludGVncmF0aW9uQ1JNLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVpbnRlZ3JhdGlvbkNSTSk7XG5cbn1cblxuXG52YXIgdmlkZW9MYXVuY2hNb2RhbHMgPSAkKCcubGF1bmNoLXZpZGVvLW1vZGFsJyk7XG5cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcubGF1bmNoLXZpZGVvLW1vZGFsJykpIHtcblxuICB2aWRlb0xhdW5jaE1vZGFscy5vbignY2xpY2snLCBsYXVuY2hWaWRlb01vZGFsKTtcblxuICBmdW5jdGlvbiBsYXVuY2hWaWRlb01vZGFsKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIHZhciBtb2RhbENvbnRhaW5lciA9ICQoJy52aWRlby1tb2RhbCcpO1xuICAgIHZhciBtb2RhbFR5cGUgPSAkdGhpcy5kYXRhKCdtb2RhbC10eXBlJyk7XG4gICAgdmFyIG1vZGFsSUQgPSAkdGhpcy5kYXRhKCdtb2RhbC1pZCcpO1xuICAgIHZhciBtb2RhbEhlYWRsaW5lID0gJHRoaXMuZGF0YSgnbW9kYWwtaGVhZGxpbmUnKTtcbiAgICB2YXIgbW9kYWxCb2R5ID0gJHRoaXMuZGF0YSgnbW9kYWwtYm9keScpO1xuICAgIHZhciB2aWRlb1Byb3ZpZGVyID0gJHRoaXMuZGF0YSgndmlkZW8tcHJvdmlkZXInKTtcbiAgICB2YXIgdmlkZW9JRCA9ICR0aGlzLmRhdGEoJ3ZpZGVvLWlkJyk7XG4gICAgd2luZG93LnZpZGVvU3JjID0gJ2h0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2VtYmVkLycgKyB2aWRlb0lEICsgJz9yZWw9MCZhbXA7c2hvd2luZm89MCZhbXA7bW9kZXN0YnJhbmRpbmc9MSZhbXA7VlE9SEQ3MjAmYXV0b3BsYXk9MSc7XG4gICAgXG4gICAgaWYgKCF3aW5kb3cubW9kYWxIYXNSZWcpIHtcbiAgICAgIHdpbmRvdy5tb2RhbEhhc1JlZyA9IGZhbHNlO1xuICAgIH1cblxuICAgIGlmICh2aWRlb1Byb3ZpZGVyID09PSAnd2lzdGlhJykge1xuICAgICAgdmlkZW9TcmMgPSAnaHR0cHM6Ly9mYXN0Lndpc3RpYS5uZXQvZW1iZWQvaWZyYW1lLycgKyB2aWRlb0lEICsgJz9wbGF5YmFyPXRydWUmc21hbGxQbGF5QnV0dG9uPXRydWUmdm9sdW1lQ29udHJvbD10cnVlJmZ1bGxzY3JlZW5CdXR0b249dHJ1ZSZjb250cm9sc1Zpc2libGVPbkxvYWQ9ZmFsc2UmYXV0b3BsYXk9dHJ1ZSc7XG4gICAgfVxuXG4gICAgLy8gdW5nYXRlZCB2aWRlb3MgbG9hZCBpbW1lZGlhdGVseVxuICAgIGlmICghbW9kYWxUeXBlKSB7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcudmlkZW8tb3V0ZXInKS5zaG93KCk7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCdpZnJhbWUnKS5hdHRyKCdzcmMnLCB2aWRlb1NyYyk7XG4gICAgfVxuXG4gICAgLy8gZ2F0ZWQgdmlkZW8gYWN0aW9uc1xuICAgIGlmIChtb2RhbFR5cGUpIHtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy52aWRlby1vdXRlcicpLmhpZGUoKTtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy5mb3JtLWNvbnRhaW5lcicpLnNob3coKTtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy5mb3JtLWNvbnRhaW5lciBmb3JtJykuYXR0cignaWQnLCAnbWt0b0Zvcm1fJyArIG1vZGFsSUQpO1xuXG4gICAgICBpZiAod2luZG93Lm1vZGFsSGFzUmVnID09IHRydWUpIHtcbiAgICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnLnZpZGVvLW91dGVyJykuc2hvdygpO1xuICAgICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcuZm9ybS1jb250YWluZXInKS5oaWRlKCk7XG4gICAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ2lmcmFtZScpLmF0dHIoJ3NyYycsIHZpZGVvU3JjKTtcbiAgICAgIH1cbiAgICAgIFxuICAgICAgaWYgKCFkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjY3JlYXRlZE1rdG9Gb3JtJykpIHtcbiAgICAgICAgdmFyIGZvcm1TY3JpcHQgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdzY3JpcHQnKTtcbiAgICAgICAgZm9ybVNjcmlwdC5zZXRBdHRyaWJ1dGUoJ2lkJywgJ2NyZWF0ZWRNa3RvRm9ybScpO1xuICAgICAgICBmb3JtU2NyaXB0LmlubmVySFRNTCA9IFxuICAgICAgICAgICdNa3RvRm9ybXMyLmxvYWRGb3JtKFwiLy9hcHAtc2oyMC5tYXJrZXRvLmNvbVwiLCBcIjYyNS1NWFktNjg5XCIsICcgKyBtb2RhbElEICsgJywgZnVuY3Rpb24oZm9ybSkgeycgK1xuICAgICAgICAgICAgJ2Zvcm0ub25TdWNjZXNzKGZ1bmN0aW9uKHZhbHVlcywgZm9sbG93VXBVcmwpIHsnICtcbiAgICAgICAgICAgICAgJ2Zvcm0uZ2V0Rm9ybUVsZW0oKS5oaWRlKCk7JyArXG4gICAgICAgICAgICAgICd3aW5kb3cubW9kYWxIYXNSZWcgPSB0cnVlOycgK1xuICAgICAgICAgICAgICAnJChcIi52aWRlby1tb2RhbCBpZnJhbWVcIikuYXR0cihcInNyY1wiLCB2aWRlb1NyYyk7JyArXG4gICAgICAgICAgICAgICckKFwiLnZpZGVvLW1vZGFsIC52aWRlby1vdXRlclwiKS5zaG93KCk7JyArXG4gICAgICAgICAgICAgICdyZXR1cm4gZmFsc2U7JyArXG4gICAgICAgICAgICAnfSk7JyArXG4gICAgICAgICAgJ30pOyc7XG4gICAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJy5mb3JtLWNvbnRhaW5lcicpLmFwcGVuZChmb3JtU2NyaXB0KTtcbiAgICAgIH1cblxuICAgIH1cblxuICAgIFxuXG4gICAgLy8gdXBkYXRlIHRleHQgYW5kIGhpZGUgaWYgbm90IHByZXNlbnRcbiAgICBtb2RhbENvbnRhaW5lci5maW5kKCdoMicpLnNob3coKS50ZXh0KG1vZGFsSGVhZGxpbmUpO1xuICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ3AnKS5zaG93KCkudGV4dChtb2RhbEJvZHkpO1xuICAgIGlmICghbW9kYWxIZWFkbGluZSkge1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnaDInKS5oaWRlKCk7ICBcbiAgICB9XG4gICAgaWYgKCFtb2RhbEJvZHkpIHtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ3AnKS5oaWRlKCk7ICBcbiAgICB9XG5cbiAgICBtb2RhbENvbnRhaW5lci5tb2RhbCgpO1xuXG4gICAgbW9kYWxDb250YWluZXIub24oJ2hpZGUuYnMubW9kYWwnLCBmdW5jdGlvbihlKSB7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCdpZnJhbWUnKS5hdHRyKCdzcmMnLCAnJyk7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCcuZm9ybS1jb250YWluZXInKS5oaWRlKCk7XG4gICAgfSlcbiAgfVxuXG59Il0sImZpbGUiOiJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIn0=
