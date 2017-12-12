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


//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1wYWdlLXNlY3Rpb25zLXdpdGgtcHJvbW8uanMiXSwic291cmNlc0NvbnRlbnQiOlsiJCgnLmludGVncmF0aW9ucy1jYXRlZ29yeS1zbGlkZXInKS5vbignaW5pdCcsIGZ1bmN0aW9uIChldmVudCwgc2xpY2ssIGRpcmVjdGlvbikge1xuICAkKHRoaXMpLnJlbW92ZUNsYXNzKCdoaWRlJyk7XG59KTtcblxuJCgnLmludGVncmF0aW9ucy1jYXRlZ29yeS1zbGlkZXInKS5zbGljayh7XG4gIGFycm93czogZmFsc2UsXG4gIGF1dG9wbGF5OiB0cnVlLFxuICBhdXRvcGxheVNwZWVkOiA0MDAwLFxuICBkb3RzOiB0cnVlLFxuICBzbGlkZXNUb1Nob3c6IDQsXG4gIHNsaWRlc1RvU2Nyb2xsOiA0LFxuICByZXNwb25zaXZlOiBbXG4gICAge1xuICAgICAgYnJlYWtwb2ludDogMTI4MSxcbiAgICAgIHNldHRpbmdzOiB7XG4gICAgICAgIHNsaWRlc1RvU2hvdzogMyxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDMsXG4gICAgICB9XG4gICAgfSxcbiAgICB7XG4gICAgICBicmVha3BvaW50OiA2MDAsXG4gICAgICBzZXR0aW5nczoge1xuICAgICAgICBzbGlkZXNUb1Nob3c6IDEsXG4gICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAxLFxuICAgICAgICBkb3RzOiBmYWxzZVxuICAgICAgfVxuICAgIH0sXG4gIF1cbn0pO1xuXG4iXSwiZmlsZSI6InBhZ2UtdGVtcGxhdGUtLXBhZ2Utc2VjdGlvbnMtd2l0aC1wcm9tby5qcyJ9
