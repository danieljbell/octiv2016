(function() {

  if (getParameterByName('demo_auth') === 'true') {
    var $this = $('.launch-video-modal');
    var videoModal = $('.video-modal');
    videoModal.modal();

    var modalContainer = $('.video-modal');
    var modalType = $this.data('modal-type');
    var modalID = $this.data('modal-id');
    var modalHeadline = $this.data('modal-headline');
    var modalBody = $this.data('modal-body');
    var videoProvider = $this.data('video-provider');
    var videoID = $this.data('video-id');
    window.videoSrc = 'https://www.youtube.com/embed/' + videoID + '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720&autoplay=1';

    modalContainer.find('h2').show().text(modalHeadline);
    modalContainer.find('p').hide();  
    modalContainer.find('iframe').attr('src', videoSrc);
  }

  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );

})();





