$(document).ready(function() {

  console.log(window.innerHeight / 2);
  console.log(window.innerHeight / 3);
  console.log(window.innerHeight / 4);

  $('#documents .document-outputs a').on('click', function(e) {
    e.preventDefault();
  })

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
    strings: ["Medical Corporations", "Industrial Giants", "Publishing Moguls", "Sophisticated Companies"],
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
        'default_offset_pct' : 0.95
      });
    });
}

/*
==============================
SCROLLING EVENTS FOR HOMEPAGE
==============================
*/
if ($('body').hasClass('home')) {
  // Set up variables
    var windowScroll = $(this).scrollTop();
    var workflowsContainer = $('#workflows');
    var connectionsContainer = $('#connections');
    var documentsContainer = $('#documents');

    // Spin out connections for keyboard tabbing
    connectionsContainer.find('.connections-visual > div:nth-child(2) a').focus(function() {
      connectionsContainer.find('.connections-visual').addClass('in-view');
    })

    // Get coordinates
    var workflowsContainerPos = workflowsContainer.offset().top;
    var connectionsContainerPos = connectionsContainer.offset().top;
    var documentsContainerPos = documentsContainer.offset().top;

    // If resize, refresh coordinates
    $(window).resize(function() {
      workflowsContainerPos = workflowsContainer.offset().top;
      connectionsContainerPos = connectionsContainer.offset().top;
      documentsContainerPos = documentsContainer.offset().top;
    });

    // Let's get to scrolling
    $(window).scroll(function() {
      // Refresh the windowScroll variable
      windowScroll = $(this).scrollTop();

      if (window.innerWidth > 600) {
        // Bring in the fancies for workflows
        if (windowScroll > (workflowsContainerPos + (window.innerHeight / 4))) {
          workflowsContainer.find('.workflows-visual').addClass('in-view');
        } else if (windowScroll < (workflowsContainerPos - 200)) {
          workflowsContainer.find('.workflows-visual').removeClass('in-view');
        }

        // Bring in the fancies for connections
        if (windowScroll > (connectionsContainerPos + (window.innerHeight / 4))) {
          connectionsContainer.find('.connections-visual').addClass('in-view');
        } else if (windowScroll < (connectionsContainerPos - 200)) {
          connectionsContainer.find('.connections-visual').removeClass('in-view');
        }

        // Bring in the fancies for documents
        if (windowScroll > (documentsContainerPos + (window.innerHeight / 4))) {
          documentsContainer.find('.documents-visual').addClass('in-view');
        } else if (windowScroll < (documentsContainerPos - 200)) {
          documentsContainer.find('.documents-visual').removeClass('in-view');
        }
      } else {
        // Bring in the fancies for workflows
        if (windowScroll > (workflowsContainerPos - (window.innerHeight / 4))) {
          workflowsContainer.find('.workflows-visual').addClass('in-view');
        } else if (windowScroll < (workflowsContainerPos - 200)) {
          workflowsContainer.find('.workflows-visual').removeClass('in-view');
        }

        // Bring in the fancies for connections
        if (windowScroll > (connectionsContainerPos - (window.innerHeight / 4))) {
          connectionsContainer.find('.connections-visual').addClass('in-view');
        } else if (windowScroll < (connectionsContainerPos - 200)) {
          connectionsContainer.find('.connections-visual').removeClass('in-view');
        }

        // Bring in the fancies for documents
        if (windowScroll > (documentsContainerPos - (window.innerHeight / 4))) {
          documentsContainer.find('.documents-visual').addClass('in-view');
        } else if (windowScroll < (documentsContainerPos - 200)) {
          documentsContainer.find('.documents-visual').removeClass('in-view');
        }
      }

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

// Clicking any button
$('.site-navigation-container nav button').on('click', function() {
  var $this = $(this);

  if ($this.hasClass('active')) {
    $this.removeClass('active');
    $this.next().removeClass('active');
    if (window.innerWidth > 600) {
        document.body.classList.remove('menu-open');
    }
  } else {
    $this.parent().siblings().find('button').removeClass('active');
    $this.parent().siblings().find('.callout').removeClass('active');
    $this.next().addClass('active');
    $this.addClass('active');
    document.body.classList.add('menu-open');
  }
});

// Clicking the menu toggle on smaller devices
$(document).on('click', '#menu-toggle', function() {
  document.body.classList.toggle('menu-open');
  if (!$('.site-navigation-container nav button').hasClass('active') && (window.innerWidth > 600)) {
    $('.site-navigation-container #nav-platform')
      .addClass('active')
      .next()
        .addClass('active');
  }
});

$(document).on('keyup', function(e) {
  if (e.keyCode === 27) {
    closeNav();
  }
});

function closeNav(elem) {
  var $this = $('.site-navigation-container nav button');
  if ($this.hasClass('active')) {
    $this.removeClass('active');
    $this.next().removeClass('active');
    if (window.innerWidth > 600) {
        document.body.classList.remove('menu-open');
    }
  }
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
  adaptiveHeight : true,
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
  autoplay : true,
  autoplaySpeed : 6000,
  adaptiveHeight : true,
  arrows: false,
  // fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 7,
  slidesToScroll: 1,
  autoplay : true,
  autoplaySpeed : 6000,
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

$('.platform-slider').slick({
  slidesToShow: 7,
  slidesToScroll: 1,
  autoplay : true,
  arrows : false,
  autoplaySpeed : 2000,
  centerMode: true,
  variableWidth: true,
  centerPadding: '10%',
  focusOnSelect: true,
  responsive : [
    {
      breakpoint: 1281,
      settings: {
        slidesToShow: 3,
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

  $(window).resize(function() {
    elemTop = elem.offset().top;
    console.log($(this));
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
        'transform' : 'translateY(' + (-(scrollY - (nextElemOffset - stickyHeight - (18 * 8)))) + 'px)'
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
$('.sidebar-links a').on('click', function(e) {
  e.preventDefault();
  var target = $(this.hash);
  $('html, body').animate({
      scrollTop: target.offset().top
  }, 300);
});


if ($('.single-integration').length) {
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
MktoForms2.whenReady(function (form) {
  var pageURL = document.documentURI;
  var formObj = $('.mktoForm');

  // Remove styles
  removeStyles(formObj);
  $(window).resize(function(){
    removeStyles(formObj);
  });

  // Add styles
  formObj.find('.mktoFormRow').addClass('third');
  formObj.find('select').addClass('fancy');
  formObj.find('.mktoButton').addClass('btn-primary');
  formObj.find('.mktoButtonRow').addClass('centered');

  // Send page URL to Marketo
  $('input[name="sourceURL"]').attr('value', pageURL);

  function removeStyles(formObj) {
    $('#mktoForms2BaseStyle').remove();
    $('#mktoForms2ThemeStyle').remove();
    formObj.find('.mktoOffset').remove();
    formObj.find('.mktoGutter').remove();
    formObj.find('.mktoClear').remove();
    formObj.attr('style', '');
    formObj.find('style').remove();
    formObj.find('.mktoHasWidth').attr('style', '');
    formObj.find('.mktoButtonWrap');
    formObj.find('.mktoInset').attr('style', '');
  }
});




// end document.ready
});
