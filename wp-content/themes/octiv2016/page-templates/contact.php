<?php
/*
==============================
TEMPLATE NAME: Contact Us
==============================
*/

$rand_num = mt_rand(1,4);
?>

<?php get_header(); ?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
	<div class="site-width centered white-text two-third-only">
		<div>
			<h1><?php the_title(); ?></h1>
			<p class="font-bump"><a href="tel:844-936-2848" style="color: #fff;">844.936.2848</a></p>
		</div>
	</div>
</div>

<section>
  <div class="site-width">
    <div class="two-third">
			<div class="content-container">
				<?php echo the_content(); ?>
				<br class="hide-md">
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
						for (var i = 0; i < selectBoxes.length; i++) {
							selectBoxes[i].classList.add('fancy');
						}
						var newsletterBox = document.querySelector('label[for="subscriptionNewsletter"]');
						if (newsletterBox) {
							newsletterBox.querySelector('.mktoAsterix').remove();
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
</section>

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
	.fixed-hero-section .font-bump {
		margin-bottom: 3rem;
	}
	.mktoFormRow:first-of-type > div:last-child > .mktoFieldWrap {
		display: flex;
		flex-direction: row;
	}
	.mktoFormRow:first-of-type > div:last-child > .mktoFieldWrap label{
		order: 1;
	}
	@media screen and (max-width: 768px) {
		.content-container .video-outer {
			display: none;
		}
		.content-container,
		.box {
			margin-top: 0;
		}
		.content-container {
			padding: 0;
		}
		.fixed-hero-section .font-bump {
			margin-bottom: -2rem;
		}
	}
</style>


<?php get_footer(); ?>
