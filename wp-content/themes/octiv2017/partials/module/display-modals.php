<?php
/*
==============================
DISPLAY MODALS
==============================
*/
?>

<div class="rad-modal-container modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
    <div class="modal-content half vertical-align">
      <div class="modal-header light-callout">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <h4 class="color-box-headline--gray">Request a Demo</h4>
          </div>
          <p>Please complete the form to speak with an Octiv representative about our products and services.</p>
        </div>
        <div class="modal-header--content">
          <p>Once the form is submitted, we'll contact you within one to two business days to find out more about your needs.</p>
          <p>Want to speak with us right now? Call <a href="tel:844-936-2848" title="Call Us Today: 844-936-2848">844-936-2848</a>, we're happy to help.</p>
          <p>For general inquiries, please visit the <a href="/company/contact-us/">Contact Us</a> page. Customers, please visit our <a href="/support">Support</a> page.</p>
        </div>
      </div>
      <div class="modal-body">
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

<div class="logo-modal-container modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
    <div class="modal-content vertical-align">
      <div class="modal-header light-callout">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <h4 class="color-box-headline--gray">Looking for Our Logo?</h4>
          </div>
          <p>Below you'll find all of our brand assets and logos.</p>
        </div>
        <div class="modal-header--content has-text-center">
          <a href="/wp-content/uploads/2016/07/Octiv-Brand-Assets.zip" class="btn-primary mar-b">Download .zip of brand assets</a>
          <p>If you have a special request or need help with anything, please reach out to us at <a href="mailto:marketing@octiv.com">marketing@octiv.com</a>.</p>
        </div>
      </div>
    </div>
  </div>
</div>