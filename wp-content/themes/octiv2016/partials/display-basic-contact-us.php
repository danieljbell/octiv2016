<section id="revamp" class="fat-section">
	<div class="site-width">
		<div class="half">
			<div>
				<h2>Ready to Streamline Your Company's Workflows?</h2>
				<p>Contact us today to learn more about how Octiv can help you.</p>
				<script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
					<form id="mktoForm_1008"></form>
				<script>
					MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1008, function(form) {
						// Blacklisted Email Domains
						var invalidDomains = ["@gmail.","@yahoo.","@hotmail.","@live.","@aol.","@outlook."];

						//Add an onSuccess handler
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
									// Get the form field values
									var vals = form.vals();

									// Update the redirect url with form fields
									followUpUrl = window.location.origin + '/thank-you/?first_name=' + vals.FirstName;

									// Redirect the page with form field
									location.href = followUpUrl;

					        // Return false to prevent the submission handler continuing with its own processing
					        return false;
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
					});
				</script>
			</div>
			<div class="pos-rel">
				<img src="<?php echo get_stylesheet_directory_URI(); ?>/dist/img/computer-frame.png" alt="computer" style="pointer-events: none; position: relative; z-index:2;">
				<div class="video-outer" style="position: absolute;top: 13px;left: 25px;width: calc(100% - 50px);">
					<div class="video-inner">
						<iframe style="width: 100% !important; height: 100% !important;" src="//fast.wistia.net/embed/iframe/vmlhujsh3f?playbar=false&smallPlayButton=false&volumeControl=false&fullscreenButton=false&controlsVisibleOnLoad=false" name="wistia_embed" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
