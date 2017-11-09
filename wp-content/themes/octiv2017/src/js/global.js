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
    if (window.scrollY === 0) {
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
        var currentBodyPadding = parseInt(initialBodyPadding.slice(0, 2)) + stickyNav.offsetHeight + (18*6) + 'px';
        document.body.style.paddingTop = currentBodyPadding;
        document.body.style.paddingBottom = stickyNav.offsetHeight + siteHeader.offsetHeight + 10 + 'px';
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
  var headerMenuToggle = document.querySelector('.site-header-menu-toggle');
  headerMenuToggle.addEventListener('click', function() {
    // this.classList.toggle('is-active');
    var body = document.body;
    if (body.classList.contains('site-header-menu-open')) {
      body.classList.remove('site-header-menu-open');
      return
    } else {
      body.classList.add('site-header-menu-open');
    }
  })


  /*
  ==============================
  MOBILE MENU
  ==============================
  */
  function initMobileMenu() {

    function itemClicked(e) {
      e.stopPropagation();
      e.preventDefault();
      $this = $(this);
      $this.parent().toggleClass('active');
      $this.next().slideToggle();
    }

    if (window.innerWidth < 1050) {
      var allTopLevelLinks = document.querySelectorAll('.site-header .menu-item-has-children > a');
      for (var i = 0; i < allTopLevelLinks.length; i++) {
        allTopLevelLinks[i].addEventListener('click', itemClicked, {
          capture: true
        });
      }
    }
  }

  initMobileMenu();
  window.addEventListener('resize', initMobileMenu);
  

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

  var radLinks = $('[href="#request-a-demo"], [href="?rad=true"]');
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

  // TINDERBOX REFERAL
  if (getParameterByName('ref') === 'tinderbox') {
    $('.rebrand-modal').modal();
    var initialPath = window.location.pathname;
    window.history.replaceState( {} , 'bar', initialPath );
  }

  // TINDERBOX REFERAL
  var bioModalButtons = $('.launch-bio-modal');
  bioModalButtons.on('click', function() {
    var personName = this.dataset.name;
    var personTitle = this.dataset.title;
    var personBio = this.dataset.bio;
    var personHeadshot = this.dataset.headshot;
    var personLinkedIn = this.dataset.linkedin;
    var personTwitter = this.dataset.twitter;
    var modalContainer = $('.leadership-modal-container');
    if (personTwitter) {
      modalContainer.find('.twitter-icon').show();
      modalContainer.find('.twitter-icon a').attr('href', personTwitter);
    } else {
      modalContainer.find('.twitter-icon').hide();
    }
    if (personLinkedIn) {
      modalContainer.find('.linkedin-icon').show();
      modalContainer.find('.linkedin-icon a').attr('href', personLinkedIn);
    } else {
      modalContainer.find('.linkedin-icon').hide();
    }
    modalContainer.find('.color-box-headline--gray').text(personName);
    modalContainer.find('.person-title').text(personTitle);
    modalContainer.find('.bio-content').html(personBio);
    modalContainer.find('.person-headshot img').attr('src', personHeadshot);
    modalContainer.modal();
  });


  /*
  ==============================
  CARDS
  ==============================
  */
  // var allCards = document.querySelectorAll('.card');
  // for (var i = 0; i < allCards.length; i++) {
  //   // add mouseenter event on all cards
  //   allCards[i].addEventListener('mouseenter', function(e) {
  //     // get all children of the hovered element's parent
  //     var allSiblings = this.parentElement.children;
  //     // add .is-hovered class to the hovered element
  //     this.classList.add('is-hovered');
  //     // loop thru all children of the element's parent
  //     for (var j = 0; j < allSiblings.length; j++) {
  //       // test for .is-hovered class
  //       if (!allSiblings[j].classList.contains('is-hovered')) {
  //         // add .is-faded if a sibling element
  //         allSiblings[j].classList.add('is-faded');
  //       }
  //     }
  //   });

    // add mouseleave event on all cards
    // allCards[i].addEventListener('mouseleave', function(e) {
    //   // get all children of the hovered element's parent
    //   var allSiblings = this.parentElement.children;
    //   // remove .is-hovered class to the hovered element
    //   this.classList.remove('is-hovered');
    //   // loop thru all children of the element's parent
    //   for (var j = 0; j < allSiblings.length; j++) {
    //     // remove .is-faded class from all children of the element's parent
    //     allSiblings[j].classList.remove('is-faded');
    //   }
    // });
  // }

  /*
  ==============================
  GLOBAL SEARCH
  ==============================
  */
  $('#global-search-form').on('submit', function(e) {
    e.preventDefault();
    getSearchPosts();
  });
  
  function getSearchPosts() {
    $('.search-modal-container .modal-body').html('Loading...');
    var keyword = $('#global-search-input').val();
    var searchPostType = $('#global-search-post-type').val();
    var prettyPostTypeName = $('#global-search-post-type').find(':selected').text();
    var searchQuery = window.location.origin + '?post_type=' + searchPostType + '&s=' + keyword + '&post_parent__not_in=[0]';
    $.ajax({
      type: "POST",
      url: searchQuery,
      success: function(data) {
        var searchResults = $($.parseHTML(data)).find('#post-list');
        var resultsHTML = searchResults.html()
        var resultsLength = searchResults.children().length;
        if (resultsLength > 0) {
          $('.search-modal-container .modal-body').html(resultsHTML);
        } else {
          $('.search-modal-container .modal-body').html('There are no ' + prettyPostTypeName.toLowerCase());
        }
      },
      error: function() {
        console.log('duh!');
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
    $('.slider').on('init', function() {
      console.log('lets rock');
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

  if (document.querySelectorAll('.client-thumbnail-slider')) {
    $('.client-thumbnail-slider').slick({
      slidesToShow: 7,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [
        {
          breakpoint: 1281,
          settings: {
            slidesToShow: 5,
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 601,
          settings: {
            slidesToShow: 1,
            centerMode: true,
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
  

})();

if (window.MktoForms2) {
  MktoForms2.whenReady(function (form) {
    
    var pageURL = document.documentURI;
    $('input[name="sourceURL"]').attr('value', pageURL);  
    
    var cook = getCookie('ref');

    if (cook) {
      $('input[name="LeadSource"]').attr('value', cook);
      $('input[name="Secondary_Lead_Source__c"]').attr('value', cook);
    } else {
      $('input[name="LeadSource"]').attr('value', 'Web');
      $('input[name="Secondary_Lead_Source__c"]').attr('value', 'Web');
    }
  });
};

setCookie();

function setCookie() {
  if (getParameterByName('ref')) {
    var param = getParameterByName('ref');
    var now = new Date();
    now.setTime(now.getTime()+(30*24*60*60*1000));
    var expires = "; expires=" + now.toGMTString() + ";";

    if (param) {
      document.cookie = "ref=" + param + expires + "path=/";
    }
  }
}

function getCookie(name) {
  var dc = document.cookie;
  var prefix = name + "=";
  var begin = dc.indexOf("; " + prefix);
  if (begin == -1) {
      begin = dc.indexOf(prefix);
      if (begin != 0) return null;
  }
  else
  {
      begin += 2;
      var end = document.cookie.indexOf(";", begin);
      if (end == -1) {
      end = dc.length;
      }
  }
  // because unescape has been deprecated, replaced with decodeURI
  //return unescape(dc.substring(begin + prefix.length, end));
  return decodeURI(dc.substring(begin + prefix.length, end));
}

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
  var results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
};