<section id="revamp" class="fat-section">
	<div class="site-width">
		<div class="centered">
			<h2>Ready to Streamline Your Company's Workflows?</h2>
			<p>Contact us today at <a href="tel:844-936-2848" style="color: #000;">844.936.2848</a> to learn more about how Octiv can help you.</p>
			<script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
				<form id="mktoForm_1008"></form>
			<script>
				MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1008, function(form) {

					// Select Newsletter Asterix and Remove it from the DOM
					var newsletterBox = document.querySelector('label[for="subscriptionNewsletter"]');
					newsletterBox.querySelector('.mktoAsterix').remove();

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
			<style>
				.mktoFormRow.third:first-of-type > div:last-child > .mktoFieldWrap {
					display: flex;
					flex-direction: row;
				}
				.mktoFormRow.third:first-of-type > div:last-child > .mktoFieldWrap label{
					order: 1;
				}
				/*label[for="subscriptionNewsletter"] {
					margin-top: 1.75rem;
					padding-left: 1.25rem;
				}
				label[for="subscriptionNewsletter"] + div {
					margin-top: -1.25rem;
					margin-bottom: 1rem;
				}
				@media screen and (min-width: 1280px) {
					label[for="subscriptionNewsletter"] {
						margin-top: 1rem;
					}
					label[for="subscriptionNewsletter"] + div {
						display: block;
						margin-top: -3.5rem;
						margin-bottom: 2.5rem;
					}
				}*/
			</style>
		</div>
	</div>
</section>
