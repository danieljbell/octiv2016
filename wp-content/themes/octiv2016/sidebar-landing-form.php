<div class="newsletter-signup">
	<h2><?php echo get_field('sidebar_title'); ?></h2>
	<p><?php echo get_field('sidebar_description'); ?></p>
	<?php
		if ($post->ID === 1787) :
			echo '<a href="https://cc.readytalk.com/r/4adm49bfrohw&eom" class="btn-primary">Register Here</a>';
		elseif ($post->ID === 2279) :
			echo '<div class="centered"><a onclick="ga(\'send\', \'event\', \'Downloads\', \'Ungated WP\', \'UDW Whitepaper\', \'0\');" href="/wp-content/uploads/2017/02/Unified-Document-Workflows.pdf" class="btn-primary">Read Now</a></div>
			<style>
				.newsletter-signup h2 {
					text-align: center;
				}
			</style>
			';
		else : ?>
		<script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
		<form id="mktoForm_1041"></form>
		<script>
			MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1041, function(form) {
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
							} else {
								// Get the form field values
								var vals = form.vals();

								// Update the redirect url with form fields
								if (window.location.pathname === '/resources/whitepapers/top-17-sales-trends-for-2017/') {

									followUpUrl = 'http://go.octiv.com/proposals/create_and_view?api_key=08cd2775273e71f701f517da229a1006f1f143ac&amp;proposal[template_id]=32543&amp;proposal[name]=17%20Sales%20Trends%20for%202017%20for%20' + vals.Company + '&amp;first_name=' + vals.FirstName + '&amp;last_name=' + vals.LastName;
								}

								if (window.location.pathname === '/resources/whitepapers/2016-state-of-sales/') {
									followUpUrl = 'http://go.octiv.com/proposals/create_and_view?api_key=08cd2775273e71f701f517da229a1006f1f143ac&amp;proposal[template_id]=28276&amp;proposal[name]=The%202016%20State%20of%20Sales%20for%20' + vals.Company + '&amp;first_name=' + vals.FirstName + '&amp;last_name=' + vals.LastName;
								}

								if (window.location.pathname === '/resources/whitepapers/4-essentials-building-better-sales-marketing-team/') {
									followUpUrl = 'http://go.octiv.com/proposals/create_and_view?api_key=08cd2775273e71f701f517da229a1006f1f143ac&amp;proposal[template_id]=28397&amp;proposal[name]=The%20Essentials%20of%20Building%20a%20Better%20Sales%20and Marketing%20Team%20for%20' + vals.Company + '&amp;first_name=' + vals.FirstName + '&amp;last_name=' + vals.LastName;
								}

								if (window.location.pathname === '/resources/whitepapers/9-top-sales-trends-2016/') {
									followUpUrl = 'http://go.octiv.com/proposals/create_and_view?api_key=08cd2775273e71f701f517da229a1006f1f143ac&amp;proposal[template_id]=28396&amp;proposal[name]=The%209%20Top%20Sales%20Trends%20for%202016%20for%20' + vals.Company + '&amp;first_name=' + vals.FirstName + '&amp;last_name=' + vals.LastName;
								}

								if (window.location.pathname === '/resources/whitepapers/saas-buyer-journey-timeline/') {
									followUpUrl = '/resources/whitepapers/saas-buyer-journey-timeline/view';
								}

								// Redirect the page with form field
								location.href = followUpUrl;

								// Return false to prevent the submission handler continuing with its own processing
								return false;
								form.submitable(true);
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
						}


					});
			});
		</script>
		<?php
		endif;
	?>
</div>
