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

