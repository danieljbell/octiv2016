if ($('body').hasClass('home')) {
  $('.slider').on('init', function() {
    $('body').addClass('slider-ready')
  });
}

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
        var currentBodyPadding = parseInt(initialBodyPadding.slice(0, 2)) + stickyNav.offsetHeight + 'px';
        document.body.style.minHeight = 'calc(100% + ' + currentBodyPadding + ')';
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
  // function initMobileMenu() {

  //   function itemClicked(e) {
  //     e.stopPropagation();
  //     e.preventDefault();
  //     $this = $(this);
  //     $this.parent().toggleClass('active');
  //     $this.next().slideToggle();
  //   }

  //   if (window.innerWidth < 1050) {
  //     var allTopLevelLinks = document.querySelectorAll('.site-header .menu-item-has-children > a');
  //     for (var i = 0; i < allTopLevelLinks.length; i++) {
  //       allTopLevelLinks[i].addEventListener('click', itemClicked, {
  //         capture: true
  //       });
  //     }
  //   }
  // }

  // initMobileMenu();
  // window.addEventListener('resize', initMobileMenu);

  

  /*
  ==============================
  EXTRA PADDING FOR NOTCH PAGES
  ==============================
  */
  var hasNotch = $('main .notch');
  if (hasNotch && !(document.querySelector('.home'))) {
    hasNotch.siblings('.hero').addClass('has-notch');
  }
  

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

  var lostPageSearch = $('#lost-page-search');
  lostPageSearch.on('submit', function(e) {
    e.preventDefault();
    var searchTerm = $(this).children('input').val();
    $('#global-search-input').val(searchTerm);
    getSearchPosts();
    $('.search-modal-container').modal();
  })

  // TINDERBOX REFERAL
  if (getParameterByName('ref') === 'tinderbox') {
    $('.rebrand-modal').modal();
    var initialPath = window.location.pathname;
    window.history.replaceState( {} , 'bar', initialPath );
  }

  // BIO MODAL
  var bioModalButtons = $('.launch-bio-modal');
  bioModalButtons.on('click', function(e) {
    bioModal(e.target);
  });
  if (getParameterByName('bio')) {
    var activeBio = getParameterByName('bio');
    var searchedBio = document.querySelector('[data-parameter=' + activeBio + ']');
    bioModal(searchedBio);
  }

  function bioModal(elem) {
    var personName = elem.dataset.name;
    var personSlug = elem.dataset.parameter;
    var personTitle = elem.dataset.title;
    var personBio = elem.dataset.bio;
    var personHeadshot = elem.dataset.headshot;
    var personLinkedIn = elem.dataset.linkedin;
    var personTwitter = elem.dataset.twitter;
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
    var initialPath = window.location.pathname;
    var currentBio = initialPath + '?bio=' + personSlug;
    window.history.replaceState( {} , 'bar', currentBio );  
  }


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
    var animationContainer = $('.search-modal-container .modal-body .searching-animation');
    var resultsContainer = $('.search-modal-container .modal-body .search-results');
    var keyword = $('#global-search-input').val();
    var searchPostType = $('#global-search-post-type').val();
    var prettyPostTypeName = $('#global-search-post-type').find(':selected').text();
    var pageCount = 99;
    var offset = 0;
    var searchQuery = window.location.protocol + '//' + window.location.host + '?post_type=' + searchPostType + '&posts_per_page=' + pageCount + '&s=' + keyword;
    animationContainer.show();
    $('.search-modal-container .modal-body .search-results').html('');
    $.ajax({
      type: "GET",
      url: searchQuery,
      success: function(data) {
        var searchResults = $($.parseHTML(data)).find('#post-list');
        var resultsHTML = searchResults.html()
        var resultsLength = searchResults.children().length;
        animationContainer.hide();
        offset += pageCount;
        if (resultsLength > 0) {
          resultsContainer.html(resultsHTML);
          // resultsContainer.append('<div class="has-text-center"><button class="btn-brand--outline">Load More</button></div>');
        } else {
          resultsContainer.html('There are no ' + prettyPostTypeName.toLowerCase());
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
      autoplay: true,
      autoplaySpeed: 5000,
      dots: true,
      draggable: false,
      adaptiveHeight: true
    });
  }

  if (document.querySelector('.animated-integrations-list')) {
    $('.animated-integrations-list').slick( {
      vertical: true,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 600,
      arrows: false,
      cssEase: 'cubic-bezier(0.15, 0.11, 0.13, 1.42)'
    })
    // $('.animated-integrations-list').slick('slickPause');
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
  

  /*
  ==============================
  DYNAMIC VIDEO MODALS
  ==============================
  */
  var videoLaunchModals = $('.launch-video-modal');

  if ($('.launch-video-modal').length > 0) {

    videoLaunchModals.on('click', launchVideoModal);

    function launchVideoModal(e) {
      e.preventDefault();

      var $this = $(this);
      var modalContainer = $('.video-modal');
      var modalType = $this.data('modal-type');
      var modalID = $this.data('modal-id');
      var modalHeadline = $this.data('modal-headline');
      var modalBody = $this.data('modal-body');
      var videoProvider = $this.data('video-provider');
      var videoID = $this.data('video-id');
      window.videoSrc = 'https://www.youtube.com/embed/' + videoID + '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720&autoplay=1';
      
      if (!window.modalHasReg) {
        window.modalHasReg = false;
      }

      if (videoProvider === 'wistia') {
        videoSrc = 'https://fast.wistia.net/embed/iframe/' + videoID + '?playbar=true&smallPlayButton=true&volumeControl=true&fullscreenButton=true&controlsVisibleOnLoad=false&autoplay=true';
      }

      // ungated videos load immediately
      if (!modalType) {
        modalContainer.find('.video-outer').show();
        modalContainer.find('iframe').attr('src', videoSrc);
      }

      // gated video actions
      if (modalType) {
        modalContainer.find('.video-outer').hide();
        modalContainer.find('.form-container').show();
        modalContainer.find('.form-container form').attr('id', 'mktoForm_' + modalID);

        if (window.modalHasReg == true) {
          modalContainer.find('.video-outer').show();
          modalContainer.find('.form-container').hide();
          modalContainer.find('iframe').attr('src', videoSrc);
        }
        
        if (!document.querySelector('#createdMktoForm')) {
          var formScript = document.createElement('script');
          formScript.setAttribute('id', 'createdMktoForm');
          formScript.innerHTML = 
            'MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", ' + modalID + ', function(form) {' +
              'form.onSuccess(function(values, followUpUrl) {' +
                'form.getFormElem().hide();' +
                'window.modalHasReg = true;' +
                '$(".video-modal iframe").attr("src", videoSrc);' +
                '$(".video-modal .video-outer").show();' +
                'return false;' +
              '});' +
            '});';
          modalContainer.find('.form-container').append(formScript);
        }

      }

      

      // update text and hide if not present
      modalContainer.find('h2').show().text(modalHeadline);
      modalContainer.find('p').show().text(modalBody);
      if (!modalHeadline) {
        modalContainer.find('h2').hide();  
      }
      if (!modalBody) {
        modalContainer.find('p').hide();  
      }

      modalContainer.modal();

      modalContainer.on('hide.bs.modal', function(e) {
        modalContainer.find('iframe').attr('src', '');
        modalContainer.find('.form-container').hide();
      })
    }

  }

})();

if (window.MktoForms2) {
  MktoForms2.whenReady(function (form) {

    //set the first result as local variable
    var mktoLeadFields = mktoLead.result[0];
    
    //map your results from REST call to the corresponding field name on the form
    var prefillFields = { 
      "Email" : mktoLeadFields.email,
      "FirstName" : mktoLeadFields.firstName,
      "LastName" : mktoLeadFields.lastName,
      "Title" : mktoLeadFields.title,
      "Company" : mktoLeadFields.company,
      "Phone" : mktoLeadFields.phone,
      "State" : mktoLeadFields.state,
      "LinkedIn_Company_Size__c" : mktoLeadFields.LinkedIn_Company_Size__c
    };
    
    //pass our prefillFields objects into the form.vals method to fill our fields
    form.vals(prefillFields);

    // Blacklisted Email Domains
    var invalidDomains = ["@gmail.","@yahoo.","@hotmail.","@aol.","@att.","@comcast.","@live.","@outlook.","@yandex.","@icloud."];
    //Add an onValidate handler
    form.onValidate(function(values, followUpUrl) {
      // Verify Email is Business Domain
      var email = form.vals().Email;
      if(email){
        if(!isEmailGood(email)) {
          form.submitable(false);
          var emailElem = form.getFormElem().find("#Email");
          form.showErrorMessage("Must be Business email.", emailElem);
        } else{
          form.submitable(true);
        }
      }
    function isEmailGood(email) {
      for(var i=0; i < invalidDomains.length; i++) {
        var domain = invalidDomains[i];
        if (email.indexOf(domain) != -1) {
          return false;
        }
      }
      return true;
    }
    });
    
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

function capitalize(s) {
  return s && s[0].toUpperCase() + s.slice(1);
}