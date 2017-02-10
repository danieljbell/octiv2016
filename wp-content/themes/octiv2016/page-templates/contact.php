<?php
/*
==============================
TEMPLATE NAME: Contact Us
==============================
*/
?>

<?php get_header(); ?>

<div class="fixed-hero-section" style="background-color: #fff; background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/uploads/2016/06/company-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
	<div class="site-width centered white-text two-third-only">
		<div>
			<h1><?php the_title(); ?></h1>
			<br class="hide-md">
		</div>
	</div>
</div>

<section>
  <div class="site-width">
    <div class="two-third">
			<div class="content-container">
				<?php echo the_content(); ?>
				<a href="/support/?submitTicket=true" class="btn-primary">Need to contact support?</a>
				<br>
				<br>
				<div class="video-outer">
          <div class="video-inner">
            <iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCbBbYVFTyjh95bPIy_3BmXsU_h3YtBwzY&q=Octiv,Indianapolis+IN" allowfullscreen></iframe>
          </div>
        </div>
			</div>
			<div class="box">
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
					<form id="mktoForm_1008"></form>
				<script>
					MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1008, function(form) {
						var selectBoxes = form.getFormElem()[0].querySelectorAll('form select');
						// selectBoxes[0].querySelectorAll('form select');
						for (var i = 0; i < selectBoxes.length; i++) {
							selectBoxes[i].classList.add('fancy');
						}
					});
				</script>
			</div>
		</div>
  </div>
</section>

<!-- <section>
  <div class="site-width">
    <br>
    <br>
    <div class="tabs">
      <h6 id="sales">Sales</h6>
      <div class="tabbody">
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
        <br>
      </div>
      <h6 id="support">Support</h6>
      <div class="tabbody">
        <?php get_template_part('partials/display', 'support-form'); ?>
      </div>
      <h6 id="press">Press</h6>
      <div class="tabbody centered">
        <br>
        <h4>Press inquiries?</h4>
        <p>Email us at <a href="mailto:press@octiv.com">press@octiv.com</a>.</p>
      </div>
    </div>
  </div>
</section> -->

<!-- <section style="background-image: url(/wp-content/uploads/2016/06/company-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
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
</section> -->

<style>
  .content-container,
  .box {
    margin-top: -6rem;
  }
	.content-container {
		background-color: #fff;
		padding: 2rem;
		border-radius: 5px;
	}
	@media screen and (max-width: 600px) {
		.content-container,
		.box {
			margin-top: 0;
		}
		.content-container {
			padding: 0;
		}
	}
</style>

<script>

</script>


<?php get_footer(); ?>
