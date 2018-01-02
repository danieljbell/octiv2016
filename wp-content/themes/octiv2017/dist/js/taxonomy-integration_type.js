$('.integrations-category-slider').on('init', function (event, slick, direction) {
  $(this).removeClass('hide');
});

$('.integrations-category-slider').slick({
  arrows: false,
  autoplay: true,
  autoplaySpeed: 4000,
  dots: true,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1281,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      }
    },
  ]
});


//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJ0YXhvbm9teS1pbnRlZ3JhdGlvbl90eXBlLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIiQoJy5pbnRlZ3JhdGlvbnMtY2F0ZWdvcnktc2xpZGVyJykub24oJ2luaXQnLCBmdW5jdGlvbiAoZXZlbnQsIHNsaWNrLCBkaXJlY3Rpb24pIHtcbiAgJCh0aGlzKS5yZW1vdmVDbGFzcygnaGlkZScpO1xufSk7XG5cbiQoJy5pbnRlZ3JhdGlvbnMtY2F0ZWdvcnktc2xpZGVyJykuc2xpY2soe1xuICBhcnJvd3M6IGZhbHNlLFxuICBhdXRvcGxheTogdHJ1ZSxcbiAgYXV0b3BsYXlTcGVlZDogNDAwMCxcbiAgZG90czogdHJ1ZSxcbiAgc2xpZGVzVG9TaG93OiA0LFxuICBzbGlkZXNUb1Njcm9sbDogNCxcbiAgcmVzcG9uc2l2ZTogW1xuICAgIHtcbiAgICAgIGJyZWFrcG9pbnQ6IDEyODEsXG4gICAgICBzZXR0aW5nczoge1xuICAgICAgICBzbGlkZXNUb1Nob3c6IDMsXG4gICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAzLFxuICAgICAgfVxuICAgIH0sXG4gICAge1xuICAgICAgYnJlYWtwb2ludDogNjAwLFxuICAgICAgc2V0dGluZ3M6IHtcbiAgICAgICAgc2xpZGVzVG9TaG93OiAxLFxuICAgICAgICBzbGlkZXNUb1Njcm9sbDogMSxcbiAgICAgICAgZG90czogZmFsc2VcbiAgICAgIH1cbiAgICB9LFxuICBdXG59KTtcblxuIl0sImZpbGUiOiJ0YXhvbm9teS1pbnRlZ3JhdGlvbl90eXBlLmpzIn0=
