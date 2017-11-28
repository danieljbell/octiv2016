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
    var headlineColorClass = $this.parents('.page-section-item').find('h2').attr('class');
    var modalHeadline = $this.data('modal-headline');
    var modalBody = $this.data('modal-body');
    var videoProvider = $this.data('video-provider');
    var videoID = $this.data('video-id');
    var videoSrc = 'https://www.youtube.com/embed/' + videoID + '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720&autoplay=1';

    if (videoProvider === 'wistia') {
      var videoSrc = 'https://fast.wistia.net/embed/iframe/' + videoID + '?playbar=true&smallPlayButton=true&volumeControl=true&fullscreenButton=true&controlsVisibleOnLoad=false&autoplay=true';
    }

    modalContainer.find('iframe').attr('src', videoSrc);
    modalContainer.find('h2').show().text(modalHeadline).attr('class', headlineColorClass);
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
    })
  }

}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBwbGF0Zm9ybUNyZWF0ZSA9ICQoJy5hbmltYXRpb24tcGxhdGZvcm0tLWNyZWF0ZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tY3JlYXRlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUNyZWF0ZSA9IHBsYXRmb3JtQ3JlYXRlLm9mZnNldCgpLnRvcDtcblxuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUNyZWF0ZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtQ3JlYXRlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybUNyZWF0ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1DcmVhdGUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybVNoYXJlID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2hhcmUnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5hbmltYXRpb24tcGxhdGZvcm0tLXNoYXJlJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybVNoYXJlID0gcGxhdGZvcm1TaGFyZS5vZmZzZXQoKS50b3A7XG5cbiAgZnVuY3Rpb24gYW5pbWF0ZVBsYXRmb3JtU2hhcmUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybVNoYXJlIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNoYXJlLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICB9XG4gIH1cblxuICAkKHdpbmRvdykub24oJ3Njcm9sbCcsIGFuaW1hdGVQbGF0Zm9ybVNoYXJlKTtcblxufVxuXG52YXIgcGxhdGZvcm1TaWduID0gJCgnLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc2lnbicpKSB7XG5cbiAgdmFyIHRvcE9mUGxhdGZvcm1TaWduID0gcGxhdGZvcm1TaWduLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TaWduKCkge1xuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgaWYgKCR0aGlzLnNjcm9sbFRvcCgpID49IHRvcE9mUGxhdGZvcm1TaWduIC0gKHdpbmRvdy5pbm5lckhlaWdodCAvIDIpKSB7XG4gICAgICBwbGF0Zm9ybVNpZ24uYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU2lnbik7XG5cbn1cblxudmFyIHBsYXRmb3JtU3RvcmUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1zdG9yZScpO1xuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFuaW1hdGlvbi1wbGF0Zm9ybS0tc3RvcmUnKSkge1xuXG4gIHZhciB0b3BPZlBsYXRmb3JtU3RvcmUgPSBwbGF0Zm9ybVN0b3JlLm9mZnNldCgpLnRvcDtcblxuICBmdW5jdGlvbiBhbmltYXRlUGxhdGZvcm1TdG9yZSgpIHtcbiAgICB2YXIgJHRoaXMgPSAkKHRoaXMpO1xuICAgIGlmICgkdGhpcy5zY3JvbGxUb3AoKSA+PSB0b3BPZlBsYXRmb3JtU3RvcmUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtU3RvcmUuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH1cbiAgfVxuXG4gICQod2luZG93KS5vbignc2Nyb2xsJywgYW5pbWF0ZVBsYXRmb3JtU3RvcmUpO1xuXG59XG5cbnZhciBwbGF0Zm9ybUFuYWx5emUgPSAkKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJyk7XG5cbmlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYW5pbWF0aW9uLXBsYXRmb3JtLS1hbmFseXplJykpIHtcblxuICB2YXIgdG9wT2ZQbGF0Zm9ybUFuYWx5emUgPSBwbGF0Zm9ybUFuYWx5emUub2Zmc2V0KCkudG9wO1xuXG4gIGZ1bmN0aW9uIGFuaW1hdGVQbGF0Zm9ybUFuYWx5emUoKSB7XG4gICAgdmFyICR0aGlzID0gJCh0aGlzKTtcbiAgICBpZiAoJHRoaXMuc2Nyb2xsVG9wKCkgPj0gdG9wT2ZQbGF0Zm9ybUFuYWx5emUgLSAod2luZG93LmlubmVySGVpZ2h0IC8gMikpIHtcbiAgICAgIHBsYXRmb3JtQW5hbHl6ZS5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBhbmltYXRlUGxhdGZvcm1BbmFseXplKTtcblxufVxuXG5cbnZhciB2aWRlb0xhdW5jaE1vZGFscyA9ICQoJy5sYXVuY2gtdmlkZW8tbW9kYWwnKTtcblxuaWYgKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5sYXVuY2gtdmlkZW8tbW9kYWwnKSkge1xuXG4gIHZpZGVvTGF1bmNoTW9kYWxzLm9uKCdjbGljaycsIGxhdW5jaFZpZGVvTW9kYWwpO1xuXG4gIGZ1bmN0aW9uIGxhdW5jaFZpZGVvTW9kYWwoZSkge1xuICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgdmFyIG1vZGFsQ29udGFpbmVyID0gJCgnLnZpZGVvLW1vZGFsJyk7XG4gICAgdmFyIGhlYWRsaW5lQ29sb3JDbGFzcyA9ICR0aGlzLnBhcmVudHMoJy5wYWdlLXNlY3Rpb24taXRlbScpLmZpbmQoJ2gyJykuYXR0cignY2xhc3MnKTtcbiAgICB2YXIgbW9kYWxIZWFkbGluZSA9ICR0aGlzLmRhdGEoJ21vZGFsLWhlYWRsaW5lJyk7XG4gICAgdmFyIG1vZGFsQm9keSA9ICR0aGlzLmRhdGEoJ21vZGFsLWJvZHknKTtcbiAgICB2YXIgdmlkZW9Qcm92aWRlciA9ICR0aGlzLmRhdGEoJ3ZpZGVvLXByb3ZpZGVyJyk7XG4gICAgdmFyIHZpZGVvSUQgPSAkdGhpcy5kYXRhKCd2aWRlby1pZCcpO1xuICAgIHZhciB2aWRlb1NyYyA9ICdodHRwczovL3d3dy55b3V0dWJlLmNvbS9lbWJlZC8nICsgdmlkZW9JRCArICc/cmVsPTAmYW1wO3Nob3dpbmZvPTAmYW1wO21vZGVzdGJyYW5kaW5nPTEmYW1wO1ZRPUhENzIwJmF1dG9wbGF5PTEnO1xuXG4gICAgaWYgKHZpZGVvUHJvdmlkZXIgPT09ICd3aXN0aWEnKSB7XG4gICAgICB2YXIgdmlkZW9TcmMgPSAnaHR0cHM6Ly9mYXN0Lndpc3RpYS5uZXQvZW1iZWQvaWZyYW1lLycgKyB2aWRlb0lEICsgJz9wbGF5YmFyPXRydWUmc21hbGxQbGF5QnV0dG9uPXRydWUmdm9sdW1lQ29udHJvbD10cnVlJmZ1bGxzY3JlZW5CdXR0b249dHJ1ZSZjb250cm9sc1Zpc2libGVPbkxvYWQ9ZmFsc2UmYXV0b3BsYXk9dHJ1ZSc7XG4gICAgfVxuXG4gICAgbW9kYWxDb250YWluZXIuZmluZCgnaWZyYW1lJykuYXR0cignc3JjJywgdmlkZW9TcmMpO1xuICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ2gyJykuc2hvdygpLnRleHQobW9kYWxIZWFkbGluZSkuYXR0cignY2xhc3MnLCBoZWFkbGluZUNvbG9yQ2xhc3MpO1xuICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ3AnKS5zaG93KCkudGV4dChtb2RhbEJvZHkpO1xuICAgIGlmICghbW9kYWxIZWFkbGluZSkge1xuICAgICAgbW9kYWxDb250YWluZXIuZmluZCgnaDInKS5oaWRlKCk7ICBcbiAgICB9XG4gICAgaWYgKCFtb2RhbEJvZHkpIHtcbiAgICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ3AnKS5oaWRlKCk7ICBcbiAgICB9XG5cbiAgICBtb2RhbENvbnRhaW5lci5tb2RhbCgpO1xuXG4gICAgbW9kYWxDb250YWluZXIub24oJ2hpZGUuYnMubW9kYWwnLCBmdW5jdGlvbihlKSB7XG4gICAgICBtb2RhbENvbnRhaW5lci5maW5kKCdpZnJhbWUnKS5hdHRyKCdzcmMnLCAnJyk7XG4gICAgfSlcbiAgfVxuXG59Il0sImZpbGUiOiJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLmpzIn0=
