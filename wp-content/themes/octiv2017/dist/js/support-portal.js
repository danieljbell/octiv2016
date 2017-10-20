$('#submit-ticket').on('click', function() {
  $('.submit-modal').modal();
})

var submitTicket = getParameterByName('submitTicket');

if (submitTicket === 'true') {
  var modalContent = $('.submit-modal');
  modalContent.modal();
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
}

if (document.querySelector('#sticky-sidebar')) {
  var blogSidebar = new StickySidebar('#sticky-sidebar', {
    containerSelector: '.post-content',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: (document.querySelector('.site-header').offsetHeight + 18),
    bottomSpacing: -54
  });
}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJzdXBwb3J0LXBvcnRhbC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIkKCcjc3VibWl0LXRpY2tldCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAkKCcuc3VibWl0LW1vZGFsJykubW9kYWwoKTtcbn0pXG5cbnZhciBzdWJtaXRUaWNrZXQgPSBnZXRQYXJhbWV0ZXJCeU5hbWUoJ3N1Ym1pdFRpY2tldCcpO1xuXG5pZiAoc3VibWl0VGlja2V0ID09PSAndHJ1ZScpIHtcbiAgdmFyIG1vZGFsQ29udGVudCA9ICQoJy5zdWJtaXQtbW9kYWwnKTtcbiAgbW9kYWxDb250ZW50Lm1vZGFsKCk7XG4gIHZhciBpbml0aWFsUGF0aCA9IHdpbmRvdy5sb2NhdGlvbi5wYXRobmFtZTtcbiAgd2luZG93Lmhpc3RvcnkucmVwbGFjZVN0YXRlKCB7fSAsICdiYXInLCBpbml0aWFsUGF0aCApO1xufVxuXG5pZiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI3N0aWNreS1zaWRlYmFyJykpIHtcbiAgdmFyIGJsb2dTaWRlYmFyID0gbmV3IFN0aWNreVNpZGViYXIoJyNzdGlja3ktc2lkZWJhcicsIHtcbiAgICBjb250YWluZXJTZWxlY3RvcjogJy5wb3N0LWNvbnRlbnQnLFxuICAgIGlubmVyV3JhcHBlclNlbGVjdG9yOiAnLnNpZGViYXJfX2lubmVyJyxcbiAgICB0b3BTcGFjaW5nOiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtaGVhZGVyJykub2Zmc2V0SGVpZ2h0ICsgMTgpLFxuICAgIGJvdHRvbVNwYWNpbmc6IC01NFxuICB9KTtcbn0iXSwiZmlsZSI6InN1cHBvcnQtcG9ydGFsLmpzIn0=
