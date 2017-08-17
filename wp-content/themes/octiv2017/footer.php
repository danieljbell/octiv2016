<div class="modal-container modal-rad">
  <button id="close-modal" class="close-modal">Close <span class="close-icon">+</span></button>
  <div class="modal-content">
    <div class="half vertical-align">
      <div class="light-callout">
        <div class="modal-header">
          <h2>Request A Demo</h2>
          <p>Please complete the form to speak with a Octiv representative about our products and services.</p>
        </div>
        <p>Once the form is submitted, we'll contact you within one to two business days to find out more about your needs.</p>
        <p>Want to speak with us right now? Call <a href="tel:844-936-2848">844.936.2848</a>, we're happy to help.</p>
        <p>For general inquiries, please visit the <a href="/company/contact-us">Contact Us</a> page. Customer, please visit our <a href="/support">Support portal</a>.</p>
      </div>
      <div>
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_1334"></form>
        <script>
          MktoForms2.whenReady( function(form) {
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
            }
          );
          MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1334, function(form) {
            var selectBoxes = form.getFormElem()[0].querySelectorAll('form select');
            for (var i = 0; i < selectBoxes.length; i++) {
              selectBoxes[i].classList.add('fancy');
            }
            var modalNewsletterBox = document.querySelectorAll('label[for="subscriptionNewsletter"]');
            for (var i = 0; i < modalNewsletterBox.length; i++) {
              modalNewsletterBox[i].parentElement.classList.add('mktoFlexWrap');
              var ast = modalNewsletterBox[i].querySelectorAll('.mktoAsterix');
              if (ast) {
                for (var j = 0; j < ast.length; j++) {
                  ast[j].remove();
                }
              }
            }
            // Blacklisted Email Domains
            var invalidDomains = ["@gmail.","@yahoo.","@hotmail.","@live.","@aol.","@outlook."];
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
            form.onSuccess(function(values, followUpUrl) {
              // Get the form field values
              var vals = form.vals();
              // Update the redirect url with form fields
              followUpUrl = window.location.origin + '/thank-you/?first_name=' + vals.FirstName;
              // Redirect the page with form field
              location.href = followUpUrl;
              // Return false to prevent the submission handler continuing with its own processing
              return false;
            });
          });
        </script>
      </div>
    </div>
  </div>
</div>


<?php wp_footer(); ?>

</body>
</html>