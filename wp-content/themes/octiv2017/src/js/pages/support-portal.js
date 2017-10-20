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