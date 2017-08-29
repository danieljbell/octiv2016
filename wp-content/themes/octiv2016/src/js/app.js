$(document).ready(function() {

  $('#documents .document-outputs a').on('click', function(e) {
    e.preventDefault();
  });


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
$('.site-logo').on('contextmenu', function(e) {
  $('.need-logo').modal();
  e.preventDefault();
});


/*
==============================
RAD MODAL
==============================
*/
$('.rad-modal-button').on('click', function(e) {
  e.preventDefault();
  $('.rad-modal').modal();
});


/*
==============================
DATASHEET MODAL
==============================
*/
if ($('body').hasClass('single-features')) {
  var modalContainer = $('.datasheet-modal');

  $('.datasheet-modal-button').on('click', function(e) {
    e.preventDefault();
    modalContainer.modal();
  });
}



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
    if (this.computedName !== "Request A Demo") {
      this.parentElement.children[4].children[0].style.backgroundColor = "transparent";
      this.parentElement.children[4].children[0].style.color = "#000000";
    }
  });
  headerNavItems[i].addEventListener('mouseleave', function() {
    if (this.children.length > 1) {
      if (window.innerWidth > 600) {
        this.children[1].style.display = "none";
      }
    }
    this.parentElement.children[4].children[0].style.backgroundColor = "#ed4c06";
    this.parentElement.children[4].children[0].style.color = "#ffffff";
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
  autoplay : true,
  autoplaySpeed : 6000,
  adaptiveHeight : true,
  // initialSlide: 1,
  arrows : false,
  dots : true,
  mobileFirst : true,
  draggable: true,
  responsive : [
    {
      breakpoint: 768,
      settings: {
        draggable: false,
        focusOnSelect: true
      }
    }
  ]
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
  draggable : false,
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
if (!$('body').hasClass('postid-2731')) {
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
}


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
      elem.css({
        'transform' : 'translateY(0px)'
      });
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
  $('.fixed-hero-section .fancy-links a').on('click', function(e) {
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
if (!$('body').hasClass('single-post')) {
  $('body').scrollspy({
    target: '.sticky-sidebar',
    offset: 54
  });
}



/*
==============================
REMOVE STYLES FOR CONTACT FORM
==============================
*/

if (window.MktoForms2) {
  MktoForms2.whenReady(function (form) {
    //set the first result as local variable
    var mktoLeadFields = mktoLead.result[0];
    
    //map your results from REST call to the corresponding field name on the form
    var prefillFields = { 
      "Email" : mktoLeadFields.email,
      "FirstName" : mktoLeadFields.firstName,
      "LastName" : mktoLeadFields.lastName,
      "Company" : mktoLeadFields.company,
      "Phone" : mktoLeadFields.phone,
      "State" : mktoLeadFields.state,
      "LinkedIn_Company_Size__c" : mktoLeadFields.LinkedIn_Company_Size__c
    };
    
    //pass our prefillFields objects into the form.vals method to fill our fields
    form.vals(prefillFields);

    var pageURL = document.documentURI;
    var formObj = $('.mktoForm');

    // Remove styles
    removeStyles(formObj);
    $(window).resize(function(){
      removeStyles(formObj);
    });

    // Add styles
    if (!$('body').attr('class').match(/parent-pageid-65|page-id-219|single-releases|page-template-webinar|single-events|page-template-landing-page/)) {
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
      $('input[name="Secondary_Lead_Source__c"]').attr('value', cook);
    } else {
      $('input[name="LeadSource"]').attr('value', 'Web');
      $('input[name="Secondary_Lead_Source__c"]').attr('value', 'Web');
    }

    function removeStyles(formObj) {
      if ($('#mktoForms2BaseStyle')) {
        $('#mktoForms2BaseStyle').remove();
      }
      if ($('#mktoForms2ThemeStyle')) {
        $('#mktoForms2ThemeStyle').remove();
      }
      if (formObj.find('.mktoOffset')) {
        formObj.find('.mktoOffset').remove();
      }
      if (formObj.find('.mktoGutter')) {
        formObj.find('.mktoGutter').remove();
      }
      if (formObj.find('.mktoClear')) {
        formObj.find('.mktoClear').remove();
      }
      if (formObj.find('style')) {
        formObj.find('style').remove();
      }
      if (formObj.find('.mktoHasWidth')) {
        formObj.find('.mktoHasWidth').attr('style', '');
      }
      if (formObj.find('.mktoButtonWrap')) {
          formObj.find('.mktoButtonWrap').attr('style', '').parent('.mktoButtonRow').addClass('centered');
      }
      if (formObj.find('.mktoInset')) {
        formObj.find('.mktoInset').attr('style', '');
      }
      formObj.attr('style', '');
    }

  });
}

if ($('#catalog-screenshots').length) {
  $('#catalog-screenshots').on('click', 'img', function() {
    if (!this.classList.contains('video-thumbnail')) {
      var imagePath = this.currentSrc;
      var imageTitle = this.alt;
      $('.empty-modal').find('.modal-content').html(function() {
        return '<h3 class="centered">' + imageTitle + '</h3><br><img src="' + imagePath + '">';
      });
    } else {
      $('.empty-modal').find('.modal-content').html(function() {
        var featureVideoForm = document.querySelector('#video-form').innerHTML;
        this.innerHTML = featureVideoForm;
      });
    }
    $('.empty-modal').modal();
  });
  $('.modal .close').on('click', function() {
    console.dir($('.empty-modal .modal-content').html(function() {
      return '';
    }));
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

if (getParameterByName('play')) {
  var paramValue = getParameterByName('play');
  if (paramValue === 'true') {
    $('.empty-modal').find('.modal-content').html('<div class="centered third-only"><div><h2>Meet Sara</h2><p>Her proposal is due by 5. See how Octiv offers a better way for all her documents to be created, shared, signed and stored.</p></div></div><div class="video-outer"><div class="video-inner"><iframe class="brand-video-frame" src="https://fast.wistia.net/embed/iframe/858lahq4et?playbar=true&smallPlayButton=true&volumeControl=true&fullscreenButton=true&controlsVisibleOnLoad=false&autoplay=true" name="wistia_embed" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></div></div>').parents('.empty-modal').modal();
    var originalURL = document.location.pathname;
    window.history.replaceState( {} , 'bar', originalURL );
  }
}

if (getParameterByName('rad')) {
  var paramValue = getParameterByName('rad');
  if (paramValue === 'true') {
    $('.rad-modal').modal();
    var originalURL = document.location.pathname;
    window.history.replaceState( {} , 'bar', originalURL );
  }
}

$('body').on('keydown', function(e) {
  if (e.keyCode === 27) {
    $('.empty-modal').find('iframe').attr('src', '');
  };
});

/*
================================
OPEN RELEASE SCREENSHOT IN MODAL
================================
*/
if ($('body').hasClass('single-releases')) {
  $('.accordian button').on('click', function() {
    var modal = $('.empty-modal');
    var $this = $(this);
    var imgSRC = $this.data('img');
    var imgText = $this.data('img-text');
    modal.find('.modal-content').html('<h3 class="centered">' + imgText + '</h3><img src="' + imgSRC + '">');
    modal.modal();
  });
}

// end document.ready
});
