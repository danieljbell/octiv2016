$(document).ready(function() {

  $('#documents .document-outputs a').on('click', function(e) {
    e.preventDefault();
  });

  $('#connections .connections-visual a').on('click', function(e) {
    e.preventDefault();
  });

/*
==============================
COMMERCIAL FLOW SWITCHING
==============================
*/
if ($('#commercial .commercial-visual').length) {
  var commercialVisual = $('.commercial-visual');
  setInterval(function(){
    if (commercialVisual.hasClass('flow-1')) {
      commercialVisual.removeClass('flow-1').addClass('flow-2');
    } else if (commercialVisual.hasClass('flow-2')) {
      commercialVisual.removeClass('flow-2').addClass('flow-3');
    } else {
      commercialVisual.removeClass('flow-3').addClass('flow-1');
    }
  }, 3300);
}


/*
==============================
TYPED FOR HOMEPAGE
==============================
*/
if ($('.typed').length) {
  $(".typed").typed({
    strings: ["Publishing Moguls", "Tech Innovators", "Market Makers", "Real Estate Titans", "Global Leaders"],
    typeSpeed: 30,
    backSpeed: 15,
    startDelay: 2000,
    backDelay: 3000,
    loop: true,
    loopCount: false
  });
}

/*
==============================
TWENTY TWENTY FOR HOMEPAGE
==============================
*/
if ($('.twentytwenty-container').length) {
  $(window).load(function() {
      $("#workflow-comparison").twentytwenty({
        'default_offset_pct' : 0.05
      });
    });
}

/*
==============================
SCROLLING EVENTS FOR HOMEPAGE
==============================
*/
if ($('body').hasClass('home')) {
  var workflowsWaypoint = new Waypoint({
    element: document.querySelector('#workflows'),
    handler: function(element, direction) {
        $('.workflows-visual').toggleClass('in-view');
    },
    offset: '65%'
  });
  var connectionsWaypoint = new Waypoint({
    element: document.querySelector('#connections'),
    handler: function(element, direction) {
        $('.connections-visual').toggleClass('in-view');
    },
    offset: '65%'
  });
  var documentsWaypoint = new Waypoint({
    element: document.querySelector('#documents'),
    handler: function(element, direction) {
        $('.documents-visual').toggleClass('in-view');
    },
    offset: '65%'
  });


    // Smooth Scrolling
    $('.home .fixed-hero-section a').on('click', function(e) {
      e.preventDefault();
      var target = $(this.hash);
      $('html, body').animate({
          scrollTop: target.offset().top
      }, 300);
    });
}

/*
========================================
KEYBOARD SHORTCUT FOR GLOBAL SEARCH
========================================
*/
$(document).keydown(function(e) {
  if (e.altKey && (e.metaKey || e.ctrlKey) && e.keyCode == 83) {
    $('.global-search').modal();
  }
});

/*
==============================
ON CLICK OF THE SEARCH BUTTON
==============================
*/
$('#search-button').on('click', function(e) {
  $('.global-search').modal();
  e.preventDefault();
});

// On submit of the search form
$('#global-search-form').submit(function(e) {
  var $this = $(this);
  var results = $('#global_search_results');

  results.empty();

  var data = {
    action: 'global_search',
    term: $this.find('#search_term').val(),
    type: $this.find('#search_type').val(),
    text: $this.find('#search_type option:selected').text(),
    parent: $this.find('#search_type option:selected').attr('data-parent')
  };

  e.preventDefault();

  $.ajax({
    url: ajax_url,
    data: data,
    success: function(response) {



      var html = '';
      for(var i = 0; i < response.length; i++) {
        html += '<li><a href="' + response[i].permalink + '">' + response[i].title + '</a></li>';
      }
      results.append(html);
      var isIphone = /(iPhone)/i.test(navigator.userAgent);
      var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);

      if(isIphone && isSafari){
        $('.global-search .modal-dialog').css({
          'overflow-y' : 'scroll'
        });
      }
    },
    error: function(response) {
      var results = $('#global_search_results');

      results.empty();

      var html = '<strong>Sorry, nothing returned for ' + data.term + ' in ' + data.text + '.</strong>';

      results.append(html);
    }
  });

});


/*
==============================
RIGHT CLICK ON THE LOGO
==============================
*/
$('#site-logo').on('contextmenu', function(e) {
  $('.need-logo').modal();
  e.preventDefault();
});


/*
==============================
NAVIGATION
==============================
*/
var menuToggle = document.querySelector('#menu-toggle');
menuToggle.addEventListener('click', function() {
  if (document.body.classList.contains('menu-open')) {
    document.body.classList.remove('menu-open');
  } else {
    document.body.classList.add('menu-open');
  }
});

var headerNavItems = document.querySelectorAll('.site-navigation-container .menu-item');

for (var i = 0; i < headerNavItems.length; i++) {
  headerNavItems[i].addEventListener('mouseover', function(i) {
    if (this.children.length > 1) {
      if (window.innerWidth > 600) {
        this.children[1].style.display = "block";
      }
    }
    if (this.computedName !== "Contact Us") {
      this.parentElement.children[5].children[0].style.backgroundColor = "transparent";
      this.parentElement.children[5].children[0].style.color = "#000000";
    }
  });
  headerNavItems[i].addEventListener('mouseleave', function() {
    if (this.children.length > 1) {
      if (window.innerWidth > 600) {
        this.children[1].style.display = "none";
      }
    }
    this.parentElement.children[5].children[0].style.backgroundColor = "#ed4c06";
    this.parentElement.children[5].children[0].style.color = "#ffffff";
  });
}

/*
=====================================
ACCORDIAN
=====================================
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
SLIDERS
==============================
*/
// BASIC FULL WIDTH SLIDER
$('.slider').slick({
  // autoplay : true,
  // autoplaySpeed : 8000,
  // adaptiveHeight : true,
  arrows : true,
  prevArrow : '<button type="button" class="slick-prev slick-arrow">&lt;</button>',
  nextArrow : '<button type="button" class="slick-next slick-arrow">&gt;</button>',
  appendArrows : $('.slider-buttons'),
  dots : true,
  mobileFirst : true
});
// SLIDER FOR MULTIPLE ELEMENTS AT LARGER BREAKPOINTS
$('.multi-slider').slick({
  autoplay : true,
  autoplaySpeed : 6000,
  dots : true,
  slidesToShow: 3,
  responsive : [
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        infinite: true
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        infinite: true
      }
    }
  ]
})
// SLIDER WITH NAVIGATION SLIDER
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  // autoplay : true,
  // autoplaySpeed : 1000,
  adaptiveHeight : true,
  pauseOnHover : true,
  pauseOnFocus : true,
  pauseOnDotsHover : true,
  prevArrow : '<button type="button" class="slick-prev slick-arrow">&lt;</button>',
  nextArrow : '<button type="button" class="slick-next slick-arrow">&gt;</button>',
  // arrows: false,
  // fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 7,
  slidesToScroll: 1,
  // autoplay : true,
  // autoplaySpeed : 1000,
  pauseOnHover : true,
  pauseOnFocus : true,
  pauseOnDotsHover : true,
  asNavFor: '.slider-for',
  // dots: true,
  centerMode: true,
  focusOnSelect: true,
  responsive : [
    {
      breakpoint: 1281,
      settings: {
        slidesToShow: 5,
        infinite: true
      }
    },
    {
      breakpoint: 1080,
      settings: {
        slidesToShow: 3,
        infinite: true
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        infinite: true
      }
    },
    {
      breakpoint: 568,
      settings: {
        slidesToShow: 1,
        infinite: true
      }
    }
  ]
});

$('.centered-slider').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay : true,
  arrows : true,
  appendArrows : $('.centered-slider-buttons'),
  prevArrow : '<button type="button" class="slick-prev slick-arrow">&lt;</button>',
  nextArrow : '<button type="button" class="slick-next slick-arrow">&gt;</button>',
  autoplaySpeed : 4300,
  centerMode: true,
  // variableWidth: true,
  centerPadding: '54px',
  focusOnSelect: true,
  responsive : [
    {
      breakpoint: 1281,
      settings: {
        slidesToShow: 3,
        infinite: true
      }
    },
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 1,
        infinite: true
      }
    }
  ]
});

/*
==============================
FOCUS CARDS ANIMATION
==============================
*/
$('.card').hover(function() {
  if (document.body.classList.contains('single-integration') && $(this).parent().hasClass('slick-track')) {
    // $(this).css({'opacity': '1', 'filter':'blur(0px)'}).siblings().css({'opacity': '0.5'});
  } else {
    $(this).toggleClass('is-scaled').siblings().toggleClass('is-faded');
  }
});


/*
==============================
SUPPORT TICKET LAUNCH MODAL
==============================
*/
$('#submit-ticket').on('click', function(e){
  var modalContent = $('.submit-modal');
  modalContent.modal();
  e.preventDefault();
});


/*
==============================
GET TH TEXT FOR ARIA-LABELS
==============================
*/
var colHeads;

$('thead').each(function(i, obj) {
  colHeads = $(this).find('tr th');
});

$('tbody').each(function() {
  $(this).find('tr').each(function() {
    $(this).find('td').each(function(i) {
      $(this).attr('aria-label', colHeads[i%4].innerText);
    })
  })
});


/*
==============================
TABS
==============================
*/
$(".tabs").accessibleTabs({
  tabhead:'h6',
  currentInfoText: '',
  autoAnchor: true,
  fx:"show",
  fxspeed:null
});


/*
==============================
STICKY SIDEBAR
==============================
*/
if ($('.sticky-sidebar').length) {
  (function($) {

  var elem = $('.sticky-sidebar'),
      elemTop = elem.offset().top,
      stickyHeight = elem.children('.sidebar-links').outerHeight(true),
      nextElem = elem.parents('section').next(),
      nextElemOffset;

  if (nextElem[0]) {
    nextElemOffset = nextElem.offset().top;
  } else {
    nextElem = elem.parents('main').next();
    nextElemOffset = nextElem.offset().top;
  }

  $('body').on('classChange classUpdate', function() {
    elem = $('.sticky-sidebar');
    elemTop = elem.offset().top;
    stickyHeight = elem.children('.sidebar-links').outerHeight(true);
    nextElem = elem.parents('section').next();
    nextElemOffset;

    if (nextElem[0]) {
      nextElemOffset = nextElem.offset().top;
    } else {
      nextElem = elem.parents('main').next();
      nextElemOffset = nextElem.offset().top;
    }
  })

  $(window).resize(function() {
    elemTop = elem.offset().top;
  });

  if (window.scrollY > (elemTop - 54)) {
    elem.addClass('sticky');
  };

  $(window).scroll(function() {
    scrollY = $(this).scrollTop();

    // Scroll past breadcrumb add class sticky
    if (scrollY > (elemTop - 54)) {
      elem.addClass('sticky');
    }

    // Scroll past sibling container transform element by scrolling
    if (scrollY > (nextElemOffset - stickyHeight - (18 * 8))) {
      elem.css({
        'transform' : 'translateY(-' + (scrollY - (nextElemOffset - elem[0].offsetHeight - elem[0].offsetTop)) + 'px)'
      });
    }

    // Remove transform if scroll is less than sibling
    if (scrollY < (nextElemOffset - stickyHeight - (18 * 8))) {
      elem.css({
        'transform' : 'translateY(0px)'
      });
    }

    // Remove sticky if scroll above breadcrumb
    if (scrollY < (elemTop - 54)) {
      elem.removeClass('sticky');
    }



  });

})(jQuery);
}




/*
==================================
SMOOTH SCROLLING FOR SIDEBAR LINKS
==================================
*/
$('.nav.sidebar-links a').on('click', function(e) {
  e.preventDefault();
  var target = $(this.hash);
  $('html, body').animate({
      scrollTop: target.offset().top
  }, 300);
});


if ($('.single-integration').length || $('.single-solutions').length || $('.page-template-platform-page').length || $('.page-template-solutions-parent-page').length || $('.page-template-page-section-layout').length) {
  $('.fixed-hero-section a').on('click', function(e) {
    e.preventDefault();
    var target = $(this.hash);
    $('html, body').animate({
        scrollTop: target.offset().top
    }, 300);
  });
}


/*
==============================
SCROLLSPY FOR SIDEBAR
==============================
*/
$('body').scrollspy({
  target: '.sticky-sidebar',
  offset: 54
});



/*
==============================
REMOVE STYLES FOR CONTACT FORM
==============================
*/

if (window.MktoForms2) {
  MktoForms2.whenReady(function (form) {
    var pageURL = document.documentURI;
    var formObj = $('.mktoForm');

    // Remove styles
    removeStyles(formObj);
    $(window).resize(function(){
      removeStyles(formObj);
    });

    // Add styles
    if ($('body').hasClass('home') || $('body').hasClass('single-integration') || $('body').hasClass('single-solutions')) {
      formObj.find('.mktoFormRow').addClass('third');
      formObj.find('select').addClass('fancy');
      formObj.find('.mktoButtonRow').addClass('centered');
    }

    formObj.find('.mktoButton').addClass('btn-primary');

    // Send page URL to Marketo
    $('input[name="sourceURL"]').attr('value', pageURL);
    var cook = getCookie('ref');

    if (cook) {
      $('input[name="LeadSource"]').attr('value', cook);
    } else {
      $('input[name="LeadSource"]').attr('value', 'Web');
    }

    function removeStyles(formObj) {
      $('#mktoForms2BaseStyle').remove();
      $('#mktoForms2ThemeStyle').remove();
      formObj.find('.mktoOffset').remove();
      formObj.find('.mktoGutter').remove();
      formObj.find('.mktoClear').remove();
      formObj.attr('style', '');
      formObj.find('style').remove();
      formObj.find('.mktoHasWidth').attr('style', '');
      formObj.find('.mktoButtonWrap').attr('style', '').parent('.mktoButtonRow').addClass('centered');
      formObj.find('.mktoInset').attr('style', '');
    }

  });
}

if ($('#catalog-screenshots').length) {
  $('#catalog-screenshots').on('click', 'img', function() {
    var imagePath = this.currentSrc;
    var imageTitle = this.alt;
    $('.empty-modal').find('.modal-content').html(function() {
      return '<h3 class="centered">' + imageTitle + '</h3><br><img src="' + imagePath + '">';
    });
    $('.empty-modal').modal();
  });
}

if ($('.browser-window').length) {
  $('.browser-window').on('click', 'img', function() {
    var imagePath = this.currentSrc;
    var imageTitle = this.alt;
    $('.empty-modal').find('.modal-content').html(function() {
      return '<h3 class="centered">' + imageTitle + '</h3><br><br><div class="browser-window"><div style="padding: 0;"><img src="' + imagePath + '"></div></div>';
    });
    $('.empty-modal').modal();
  });
}

if ($('.list-is-collpased')) {
  $('ul.list-is-collapsed').each(function(){
    if( $(this).find('li').length > 4){
      $('li', this).eq(3).nextAll().hide().addClass('toggleable');
      $(this).append('<li class="list-toggle"><span>More</span></li>');
      $('body').addClass('has-collapsed-lists').trigger('classChange');
    }
    $(this).on('click','.list-toggle', toggleShow);
  });


  function toggleShow(){
    $('body').trigger('classUpdate');
    var opened = $(this).hasClass('less');
    $(this).html(opened ? '<span>More</span>' : '<span>Less</span>').toggleClass('less', !opened);
    $(this).siblings('li.toggleable').slideToggle();
  }
}


/*
==============================
MARKETO COOKIES
==============================
*/
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
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}





// end document.ready
});
