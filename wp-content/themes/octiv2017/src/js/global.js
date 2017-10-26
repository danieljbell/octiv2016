(function() {


  /*
  ==============================
  ACCORDIANS
  ==============================
  */
  var accordianContainer = $('.accordian');

  accordianContainer.find('dd').hide();

  accordianContainer.find('dt').on('click', function() {
    $(this).next().slideToggle(200);
  });

  $('dl.accordian dt').on('click', function() {
      $(this).toggleClass('rotated');
  });



  /*
  ==============================
  STICKY SITE HEADER
  ==============================
  */
  var siteHeader = document.querySelector('.site-header');
  var topOfSiteHeader = siteHeader.offsetTop;
  
  function fixedHeaderNav() {
    if (window.scrollY >= topOfSiteHeader) {
      document.body.style.paddingTop = siteHeader.offsetHeight + 'px';
      document.body.classList.add('site-header-fixed');
    } else {
      document.body.style.paddingTop = 0;
      document.body.classList.remove('site-header-fixed');
    }
  }

  window.addEventListener('scroll', fixedHeaderNav);


  /*
  ==============================
  STICKY NAV LIST
  ==============================
  */
  var stickyNav = document.querySelector('#persistent-nav-list');
  if (stickyNav) {

    var topOfStickyNav = stickyNav.offsetTop - stickyNav.offsetHeight - 18;

    function stickyNavList() {
      if (window.scrollY >= topOfStickyNav) {
        var initialBodyPadding = document.body.style.paddingTop;
        var currentBodyPadding = parseInt(initialBodyPadding.slice(0, 2)) + stickyNav.offsetHeight + (18*6) +'px';
        document.body.style.paddingTop = currentBodyPadding;
        document.body.classList.add('sticky-nav-fixed');
      } else {
        document.body.classList.remove('sticky-nav-fixed');
      }
    }

    window.addEventListener('scroll', stickyNavList);

  }


  /*
  ==============================
  BLOG STICKY SIDEBAR
  ==============================
  */
  if (document.querySelector('.single-post')) {
    var blogSidebar = new StickySidebar('.single-post-sidebar', {
      containerSelector: '.post-content',
      innerWrapperSelector: '.sidebar__inner',
      topSpacing: (document.querySelector('.site-header').offsetHeight + 18),
      bottomSpacing: -54
    });
  }
  



  /*
  ==============================
  MENU TOGGLE
  ==============================
  */
  // var headerMenuToggle = document.querySelector('#site-header-menu-toggle');
  // headerMenuToggle.addEventListener('click', function() {
  //   this.classList.toggle('is-active');
  //   var body = document.body;
  //   if (body.classList.contains('site-header-menu-is-open')) {
  //     body.classList.remove('site-header-menu-is-open');
  //     return
  //   } else {
  //     body.classList.add('site-header-menu-is-open');
  //   }
  // })

  /*
  ==============================
  MODALS
  ==============================
  */

  // GLOBAL RAD MODAL
  var radButtons = $('.rad-modal');
  radButtons.on('click', function() {
    $('.rad-modal-container').modal();
  });
  if (getParameterByName('rad') === 'true') {
    $('.rad-modal-container').modal();
    var initialPath = window.location.pathname;
    window.history.replaceState( {} , 'bar', initialPath );
  }

  var radLinks = $('[href="#request-a-demo"]');
  radLinks.on('click', function(e) {
    e.preventDefault();
    $('.rad-modal-container').modal();
  });

  // LOGO MODAL
  var siteHeaderLogo = $('.site-header-logo');
  siteHeaderLogo.on('contextmenu', function(e) {
    e.preventDefault();
    $('.logo-modal-container').modal();
  })

  // GLOBAL SEARCH 
  var searchButton = $('[href="#search"]');
  searchButton.on('click', function(e) {
    e.preventDefault();
    $('.search-modal-container').modal();
  })


  /*
  ==============================
  CARDS
  ==============================
  */
  var allCards = document.querySelectorAll('.card');
  for (var i = 0; i < allCards.length; i++) {
    // add mouseenter event on all cards
    allCards[i].addEventListener('mouseenter', function(e) {
      // get all children of the hovered element's parent
      var allSiblings = this.parentElement.children;
      // add .is-hovered class to the hovered element
      this.classList.add('is-hovered');
      // loop thru all children of the element's parent
      for (var j = 0; j < allSiblings.length; j++) {
        // test for .is-hovered class
        if (!allSiblings[j].classList.contains('is-hovered')) {
          // add .is-faded if a sibling element
          allSiblings[j].classList.add('is-faded');
        }
      }
    });

    // add mouseleave event on all cards
    allCards[i].addEventListener('mouseleave', function(e) {
      // get all children of the hovered element's parent
      var allSiblings = this.parentElement.children;
      // remove .is-hovered class to the hovered element
      this.classList.remove('is-hovered');
      // loop thru all children of the element's parent
      for (var j = 0; j < allSiblings.length; j++) {
        // remove .is-faded class from all children of the element's parent
        allSiblings[j].classList.remove('is-faded');
      }
    });
  }

  
  /*
  ==============================
  SLIDERS
  ==============================
  */
  if (document.querySelectorAll('.slider')) {
    $('.slider').slick({
      arrows: false,
      // autoplay: true,
      autoplaySpeed: 5000,
      dots: true,
      draggable: false,
      adaptiveHeight: true
    });
  }

  if (document.querySelectorAll('.slider-for')) {
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      slidesToShow: 7,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      arrows: false,
      centerMode: true,
      centerPadding: '2rem',
      focusOnSelect: true,
      draggable: false,
      responsive: [
        {
          breakpoint: 1280,
          settings: {
            slidesToShow: 5
          }
        },
        {
          breakpoint: 960,
          settings: {
            slidesToShow: 3,
            draggable: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            centerMode: true,
            centerPadding: '18px',
            draggable: true,
          }
        }
      ]
    });
  }

  /*
  ==============================
  DOCUMENT CONTAINER TYPED
  ==============================
  */
  if (document.querySelector('#typed')) {
    var typed = new Typed('#typed', {
      stringsElement: '#typed-strings',
      loop: true,
      typeSpeed: 60,
      backSpeed: 40,
      backDelay: 1500
    });
  }



  /*
  ==============================
  GLOBAL SEARCH MODAL
  ==============================
  */
  var gloablSearch = new Vue({
    el: '#global-search-app',
    data: {
      keyword: '',
      postList: [],
      offset: 0,
      selectedCats: []
    },
    mounted: function() {
      var self = this;
      $.ajax({
        dataType: "json",
        async: false,
        url: "/wp-json/wp/v2/posts",
        success: function(data) {
          self.postList = data;
        },
        error: function(error) {
          alert(JSON.stringify(error));
        }
      });
    },
    methods: {
      getMorePosts() {
        var self = this;
        var postList = this.postList;
        $.ajax({
          dataType: "json",
          async: false,
          url: "/wp-json/wp/v2/posts",
          success: function(data) {
            var resp = data;
            for (var i = 0; i < resp.length; i++) {
              postList.push(resp[i]);
            }
          },
          error: function(error) {
            alert(JSON.stringify(error));
          } 
        });
      }
    },
    computed: {
      filteredList() {
        return this.postList.filter((post) => {
          return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
        });
      }
    }
  });

})();

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

