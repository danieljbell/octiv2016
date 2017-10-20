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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZWxlYXNlcy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgc2lkZWJhciA9IG5ldyBTdGlja3lTaWRlYmFyKCcucmVsZWFzZXMtc2lkZWJhcicsIHtcbiAgY29udGFpbmVyU2VsZWN0b3I6ICcucG9zdC1jb250ZW50JyxcbiAgaW5uZXJXcmFwcGVyU2VsZWN0b3I6ICcuc2lkZWJhcl9faW5uZXInLFxuICB0b3BTcGFjaW5nOiAoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtaGVhZGVyJykub2Zmc2V0SGVpZ2h0ICsgMTgpLFxuICBib3R0b21TcGFjaW5nOiAtNTRcbn0pO1xuXG5pZiAoJCgnYm9keScpLmhhc0NsYXNzKCdzaW5nbGUtcmVsZWFzZXMnKSkge1xuICAkKCcuYWNjb3JkaWFuIGJ1dHRvbicpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgIHZhciBtb2RhbCA9ICQoJy5lbXB0eS1tb2RhbCcpO1xuICAgIHZhciAkdGhpcyA9ICQodGhpcyk7XG4gICAgdmFyIGltZ1NSQyA9ICR0aGlzLmRhdGEoJ2ltZycpO1xuICAgIHZhciBpbWdUZXh0ID0gJHRoaXMuZGF0YSgnaW1nLXRleHQnKTtcbiAgICBtb2RhbC5maW5kKCcubW9kYWwtY29udGVudCcpLmh0bWwoJzxoMyBjbGFzcz1cImhhcy10ZXh0LWNlbnRlciBwYWQteVwiPicgKyBpbWdUZXh0ICsgJzwvaDM+PGltZyBzcmM9XCInICsgaW1nU1JDICsgJ1wiPicpO1xuICAgIG1vZGFsLm1vZGFsKCk7XG4gIH0pO1xufSJdLCJmaWxlIjoicmVsZWFzZXMuanMifQ==
