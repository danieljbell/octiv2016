<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<div class="modal-container empty-modal">
  <button class="close-modal">Close <span class="close-icon">+</span></button>
  <div class="modal-content">
    asdfasdf
  </div>
</div>

<div class="modal-container modal-rad">
  <button class="close-modal">Close <span class="close-icon">+</span></button>
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

<footer class="site-footer">
  <div class="site-width footer-utility-links">
    <ul class="social-links">
      <li><a href="https://www.linkedin.com/company-beta/10866770/" title="Octiv's LinkedIn Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/linkedin-icon.svg', false, $context); ?></a></li>
      <li><a href="http://twitter.com/octivinc" title="Octiv's Twitter Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/twitter-icon.svg', false, $context); ?></a></li>
      <li><a href="https://www.instagram.com/octivinc/" title="Octiv's Instagram Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/instagram-icon.svg', false, $context); ?></a></li>
      <li><a href="http://facebook.com/OctivInc" title="Octiv's Facebook Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/facebook-icon.svg', false, $context); ?></a></li>
    </ul>
    <div class="site-footer-logo">
      <a href="/" title="Home"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/Octiv-Logo.svg', false, $context); ?></a>
    </div>
    <div class="newsletter-subscription-container">
      <button id="newsletter-subscription" class="btn-white--outline">Get Our Newsletter</button>
    </div>
  </div>
  <div class="site-width footer-admin-links">
    <div>
      <a href="tel:844-936-2848" class="footer-phone-number"><strong>844-936-2848</strong></a>
      <address>
        54 Monument Circle,<br>Suite 700<br>Indianapolis, IN 46204
      </address>
    </div>
    <?php
        wp_nav_menu(
          array(
            'menu' => 'site-footer',
          )
        );
      ?>
  </div>
  <div class="sub-footer-container">
    <div class="site-width">
      <?php
        wp_nav_menu(
          array(
            'menu' => 'sub-footer-links',
          )
        );
      ?>
      <p>&copy; <?php echo date("Y"); ?> Octiv, Inc. All Rights Reserved.</p>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>

</body>
</html>