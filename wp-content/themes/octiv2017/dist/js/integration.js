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






//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJpbnRlZ3JhdGlvbi5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKSB7XG5cbiAgaWYgKGdldFBhcmFtZXRlckJ5TmFtZSgnZGVtb19hdXRoJykgPT09ICd0cnVlJykge1xuICAgIHZhciAkdGhpcyA9ICQoJy5sYXVuY2gtdmlkZW8tbW9kYWwnKTtcbiAgICB2YXIgdmlkZW9Nb2RhbCA9ICQoJy52aWRlby1tb2RhbCcpO1xuICAgIHZpZGVvTW9kYWwubW9kYWwoKTtcblxuICAgIHZhciBtb2RhbENvbnRhaW5lciA9ICQoJy52aWRlby1tb2RhbCcpO1xuICAgIHZhciBtb2RhbFR5cGUgPSAkdGhpcy5kYXRhKCdtb2RhbC10eXBlJyk7XG4gICAgdmFyIG1vZGFsSUQgPSAkdGhpcy5kYXRhKCdtb2RhbC1pZCcpO1xuICAgIHZhciBtb2RhbEhlYWRsaW5lID0gJHRoaXMuZGF0YSgnbW9kYWwtaGVhZGxpbmUnKTtcbiAgICB2YXIgbW9kYWxCb2R5ID0gJHRoaXMuZGF0YSgnbW9kYWwtYm9keScpO1xuICAgIHZhciB2aWRlb1Byb3ZpZGVyID0gJHRoaXMuZGF0YSgndmlkZW8tcHJvdmlkZXInKTtcbiAgICB2YXIgdmlkZW9JRCA9ICR0aGlzLmRhdGEoJ3ZpZGVvLWlkJyk7XG4gICAgd2luZG93LnZpZGVvU3JjID0gJ2h0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2VtYmVkLycgKyB2aWRlb0lEICsgJz9yZWw9MCZhbXA7c2hvd2luZm89MCZhbXA7bW9kZXN0YnJhbmRpbmc9MSZhbXA7VlE9SEQ3MjAmYXV0b3BsYXk9MSc7XG5cbiAgICBtb2RhbENvbnRhaW5lci5maW5kKCdoMicpLnNob3coKS50ZXh0KG1vZGFsSGVhZGxpbmUpO1xuICAgIG1vZGFsQ29udGFpbmVyLmZpbmQoJ3AnKS5oaWRlKCk7ICBcbiAgICBtb2RhbENvbnRhaW5lci5maW5kKCdpZnJhbWUnKS5hdHRyKCdzcmMnLCB2aWRlb1NyYyk7XG4gIH1cblxuICB2YXIgaW5pdGlhbFBhdGggPSB3aW5kb3cubG9jYXRpb24ucGF0aG5hbWU7XG4gIHdpbmRvdy5oaXN0b3J5LnJlcGxhY2VTdGF0ZSgge30gLCAnYmFyJywgaW5pdGlhbFBhdGggKTtcblxufSkoKTtcblxuXG5cblxuXG4iXSwiZmlsZSI6ImludGVncmF0aW9uLmpzIn0=
