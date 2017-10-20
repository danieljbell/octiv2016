var sidebar = new StickySidebar('.releases-sidebar', {
  containerSelector: '.post-content',
  innerWrapperSelector: '.sidebar__inner',
  topSpacing: (document.querySelector('.site-header').offsetHeight + 18),
  bottomSpacing: -54
});

if ($('body').hasClass('single-releases')) {
  $('.accordian button').on('click', function() {
    var modal = $('.empty-modal');
    var $this = $(this);
    var imgSRC = $this.data('img');
    var imgText = $this.data('img-text');
    modal.find('.modal-content').html('<h3 class="has-text-center pad-y">' + imgText + '</h3><img src="' + imgSRC + '">');
    modal.modal();
  });
}