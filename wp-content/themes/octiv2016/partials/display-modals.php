<!-- START MODAL CONTENT -->
<div class="modal fade rad-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content">
      <h2>Request A Demo</h2>
      <p>Fill out the form below to schedule time to speak with one of our sales experts.</p>
      <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
          <form id="mktoForm_1141"></form>
        <script>
          MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1141, function(form) {
            var selectBoxes = form.getFormElem()[0].querySelectorAll('form select');
            for (var i = 0; i < selectBoxes.length; i++) {
              selectBoxes[i].classList.add('fancy');
            }
            var modalNewsletterBox = document.querySelectorAll('label[for="subscriptionNewsletter"]');
            for (var i = 0; i < modalNewsletterBox.length; i++) {
              modalNewsletterBox[i].parentElement.classList.add('mktoFlexWrap');
              var ast = modalNewsletterBox[i].querySelectorAll('.mktoAsterix');
              if (ast) {
                for (var i = 0; i < ast.length; i++) {
                  ast[i].remove();
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

<div class="modal fade need-logo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content">
    		<h2>Looking for our Logo?</h2>
    		<p>Below you'll find all of our brand assets and logos. If you have a special request or need help with anything, please reach out to us at <a href="mailto:marketing@octiv.com?subject=Need%20help%20with%20Octiv%20logos">marketing@octiv.com</a>.</p>
				<a href="<?php site_url(); ?>/wp-content/uploads/2016/07/Octiv-Brand-Assets.zip" class="btn-primary">Click to download .zip of assets</a>
    </div>
  </div>
</div>

<div class="modal fade global-search" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content">
        <h2>What Can We Help You Find?</h2>
        <p>Use the textbox below to search for what you need.</p>
        <?php echo do_shortcode('[global_search]'); ?>
    </div>
  </div>
</div>


<div class="modal fade empty-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content">
      <?php if (is_singular('features')) : ?>
      <h2><?php echo get_field('datasheet_headline'); ?></h2>
      <p><?php echo get_field('datasheet_headline'); ?></p>
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_1145"></form>
        <script>
          MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1145, function(form) {
            form.onSuccess(function(values, followUpUrl) {

              // Update the redirect url with form fields
              followUpUrl = <?php echo '\'' . get_field('datasheet_url') . '\''; ?>;

              // Redirect the page with form field
              location.href = followUpUrl;

              // Return false to prevent the submission handler continuing with its own processing
              return false;
            });
          });
        </script>
        <style>
        .mktoFormRow:first-of-type > div:last-child > .mktoFieldWrap {
          display: flex;
          flex-direction: row;
        }
        .mktoFormRow:first-of-type > div:last-child > .mktoFieldWrap label{
          order: 1;
        }
        @media screen and (min-width: 767px) {
          .mktoFormRow:first-of-type > div:last-child > .mktoFieldWrap {
            margin-top: 1rem;
          }
        }
        </style>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if ( is_page_template( 'page-templates/product-page.php' ) || is_page_template( 'page-templates/page-resources.php' ) || is_front_page() || is_post_type_archive('press-releases') ) : ?>
	<?php if ( $_GET['ref'] === 'tinderbox' ) : ?>
		<div class="modal fade letter-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg">
		  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <div class="modal-content">
		  		<?php echo get_post(590)->post_content; ?>
		    </div>
		  </div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if ( is_singular( 'support' ) || is_post_type_archive( 'support' ) ) : ?>
	<div class="modal fade submit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg">
	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <div class="modal-content">
	    	<h2>Submit a "Help Me" ticket</h2>
	    	<p>Please fill out the form below to submit a ticket to our support team.</p>
	    	<?php get_template_part('partials/display', 'support-form'); ?>
	    </div>
	  </div>
	</div>
<?php endif; ?>

<?php
/*
==============================
EMPTY MODAL FOR SALESHERO
==============================
*/
if ($post->ID === 1501) : ?>
<div class="modal fade empty-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content centered"></div>
  </div>
</div>
<?php endif; ?>
<!-- END MODAL CONTENT -->
