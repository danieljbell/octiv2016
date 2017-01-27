<?php
/*
==============================
TEMPLATE NAME: Contact Us
==============================
*/
?>

<?php get_header(); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text">
    <h1>Contact Us</h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <p>Something about contacting us and filling out the form below. Now for some Chuck Norris jokes to fill space. Chuck Norris will attain statehood in 2009. His state flower will be the Magnolia. Chuck Norris doesn't churn butter. He roundhouse kicks the cows and the butter comes straight out. Police label anyone attacking Chuck Norris as a Code 45-11.... A suicide. Chuck Norris is the only man to ever defeat a brick wall in a game of tennis.</p>
    <div class="tabs">
      <h6 id="sales">Sales</h6>
      <div class="tabbody">
        <br>
        <h4 class="centered">Fill out the form below or call 317.550.0148 to request a call with one of our experts.</h4>
        <br>
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
					<form id="mktoForm_1008"></form>
				<script>
					MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1008, function(form) {
						//Add an onSuccess handler
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
      <h6 id="support">Support</h6>
      <div class="tabbody">
        <?php get_template_part('partials/display', 'support-form'); ?>
      </div>
      <h6 id="press">Press</h6>
      <div class="tabbody">
        press something
      </div>
      <!-- <h6>Partner</h6>
      <div class="tabbody">
        partner something
      </div>
      <h6>Careers</h6>
      <div class="tabbody">
        careers something
      </div> -->
    </div>
  </div>
</section>

<section style="background-image: url(/wp-content/uploads/2016/06/company-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <div class="site-width white-text">
    <div class="half">
      <div>
        <div class="video-outer">
          <div class="video-inner">
            <iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCbBbYVFTyjh95bPIy_3BmXsU_h3YtBwzY&q=Octiv,Indianapolis+IN" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div>
        <h2>Company Headquarters</h2>
        <p>54 Monument Circle, Suite 200<br>Indianapolis, IN 46204</p>
        <div class="half">
          <div>
            <img src="<?php echo get_template_directory_URI(); ?>/dist/img/phone.png" alt="Phone Number" style="max-width: 40px;">
            <p><strong>Main Phone Line</strong><br>317.550.0148</p>
            <p>1 - Sales<br>2 - Support<br>3 - Billing</p>
          </div>
          <div>
            <img src="<?php echo get_template_directory_URI(); ?>/dist/img/email.svg" alt="Email" style="max-width: 75px;">
            <p><strong>Main Email</strong></p>
            <p><a href="mailto:sales@octiv.com">sales@octiv.com</a><br><a href="mailto:press@octiv.com">press@octiv.com</a><br><a href="mailto:partners@octiv.com">partners@octiv.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  #site-footer > .site-width:first-of-type {
    border: 0;
  }
  .white-text a {
    color: #fff;
  }
</style>


<?php get_footer(); ?>
