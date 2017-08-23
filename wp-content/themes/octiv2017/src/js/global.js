(function() {

  /*
  ==============================
  MENU TOGGLE
  ==============================
  */
  var headerMenuToggle = document.querySelector('#site-header-menu-toggle');
  headerMenuToggle.addEventListener('click', function() {
    this.classList.toggle('is-active');
    var body = document.body;
    if (body.classList.contains('site-header-menu-is-open')) {
      body.classList.remove('site-header-menu-is-open');
      return
    } else {
      body.classList.add('site-header-menu-is-open');
    }
  })

  /*
  ==============================
  MODALS
  ==============================
  */

  // OPEN MODAL
var thing = document.querySelectorAll('[data-modal]');
console.dir(thing);

  var radButton = document.querySelectorAll('.rad-modal');
  for (var i = 0; i < radButton.length; i++) {
    radButton[i].addEventListener('click', function(e) {
      var body = document.body;
      var modalTarget = this.dataset.modal;
      modalTarget = 'modal-open--' + modalTarget;

      e.preventDefault();
      if (body.classList.contains('modal-open')) {
        body.classList.remove('modal-open', modalTarget);
        return
      } else {
        body.classList.add('modal-open', modalTarget);
      }
    });
  }

  // CLOSE MODAL
  var allCloseModalButtons = document.querySelectorAll('.close-modal');
  for (var i = 0; i < allCloseModalButtons.length; i++) {
    allCloseModalButtons[i].addEventListener('click', function() {
      document.body.classList.remove('modal-open');
    });
  }

  window.addEventListener('keydown', function(e) {
    if (e.keyCode === 27) {
      if (document.body.classList.contains('modal-open')) {
        document.body.classList.remove('modal-open');
      }
    }
  });

  // LOGO MODAL
  var siteHeaderLogo = document.querySelector('.site-header-logo');
  siteHeaderLogo.addEventListener('contextmenu', function() {
    document.body.classList.add('modal-open');
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
  BROWSER WINDOW
  ==============================
  */
  var allBrowserWindows = document.querySelectorAll('.browser-window');
  for (var i = 0; i < allBrowserWindows.length; i++) {
    allBrowserWindows[i].addEventListener('click', function() {
      document.body.classList.add('modal-open');
    });
  }

  /*
  ===========================================
  REMOVE STYLE ELEMENT FROM MARKETO FORM ELEM
  ===========================================
  */
  MktoForms2.whenReady(function() {
    var allMktoForms = MktoForms2.allForms();
    for (var i = 0; i < allMktoForms.length; i++) {
      var formElem = allMktoForms[i].getFormElem();
      if (formElem[0].querySelector('style')) {
        formElem[0].querySelector('style').remove();
      }
    }
    var modalNewsletterBox = document.querySelectorAll('label[for="subscriptionNewsletter"]');
    for (var i = 0; i < modalNewsletterBox.length; i++) {
      modalNewsletterBox[i].parentElement.classList.add('mktoFlexWrap');
    }
  });
  

})();