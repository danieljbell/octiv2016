<?php
/*
==============================
TEMPLATE NAME: Product-Page
==============================
*/
get_header();
?>

<div class="fixed-hero-section product-hero">
	<div class="site-width">
		<div class="centered two-third-only white-text">
			<h1 class="font-bump">The Sales Productivity Platform</h1>
			<p class="font-bump">Changing the way people do business.</p>
			<button class="btn-primary" style="max-width: 321px;" id="product-video">See 2 Minute Demo Video</button>
		</div>
	</div>
</div>

<section id="product-screenshots">
	<div class="site-width">
		<img src="<?php echo get_template_directory_URI(); ?>/dist/img/product-hero-large.svg" alt="Laptop Screenshot">
		<img src="<?php echo get_template_directory_URI(); ?>/dist/img/product-hero-medium.svg" alt="Tablet Screenshot">
		<img src="<?php echo get_template_directory_URI(); ?>/dist/img/product-hero-small.svg" alt="Phone Screenshot">
	</div>
</section>

<section>
	<div class="site-width">
		<p class="font-bump centered">The sales productivity platform does more than facilitate connection. It revolutionizes the way sales assets – including presentations, proposals, and contracts – are created, distributed, and tracked.</p>
	</div>
</section>

<section class="product-high-level">
	<div class="site-width">
		<div class="two-third-reversed">
			<div class="product-image-container">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/product-productive.jpg" alt="Productive">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/productive.svg" alt="Signature" class="product-icon-productive">
			</div>
			<div>
				<h2>Productive</h2>
				<h6 style="font-weight: 200; margin-bottom: 1rem;"><em>Close deals faster.</em></h6>
				<p>Our platform streamlines the creation and distribution of complex sales assets—reducing cycle time, increasing volume and driving pipeline momentum. Teams spend less time generating proposals, contracts and presentations, and more time selling.</p>
			</div>
		</div>
		<br class="hide-md">
		<br class="hide-md">
		<br class="hide-md">
		<br class="hide-md">
		<br class="hide-md">
		<div class="two-third-reversed-stack">
			<div class="product-image-container">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/product-clear.jpg" alt="Clear">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/clear-owner.svg" alt="Signature" class="product-icon-clear-owner">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/clear-signer.svg" alt="Signature" class="product-icon-clear-signer">
			</div>
			<div>
				<h2>Clear</h2>
				<h6 style="font-weight: 200; margin-bottom: 1rem;"><em>Understand how deals are progressing.</em></h6>
				<p>Through real-time analytics, our platform delivers visibility into customer behavior, interactions and engagement with every proposal, contract and presentation. Reps have the information and insight they need to move deals forward.</p>	
			</div>
		</div>
		<br class="hide-md">
		<div class="two-third-reversed">
			<div class="product-image-container">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/product-flexible.jpg" alt="Flexible">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/flexible.svg" alt="Interface" class="product-icon-flexible">
			</div>
			<div>
				<h2>Flexible</h2>
				<h6 style="font-weight: 200; margin-bottom: 1rem;"><em>Optimize the sales software ecosystem.</em></h6>
				<p>Our platform integrates data from CRMs, CPQs and more, synthesizing it into usable information, and dynamically employing it through logic-based workflows. Teams quickly access and adjust information across platforms and devices.</p>
			</div>
		</div>
		<br class="hide-md">
		<br class="hide-md">
		<br class="hide-md">
		<br class="hide-md">
		<div class="two-third-reversed-stack">
			<div class="product-image-container">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/product-consistent.jpg" alt="Consistent">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/consistent-presentation.svg" alt="Consistent" class="product-icon-consistent-presentation">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/consistent-proposal.svg" alt="Consistent" class="product-icon-consistent-proposal">
			</div>
			<div>
				<h2>Consistent</h2>
				<h6 style="font-weight: 200; margin-bottom: 1rem;"><em>Create a better brand experience.</em></h6>
				<p>Our platform consolidates up-to-date, approved brand assets, collateral and templates—reducing reps’ guesswork and maximizing brand impact. Sales and marketing teams design and deliver consistent, sophisticated documents and assets.</p>	
			</div>
		</div>
	</div>
</section>

<section id="features" class="product-features">
	<div class="site-width">
		<h2 class="centered">Features</h2>
		<br />
		<br />
		<div class="third">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/doc-gen.svg" alt="Document">
				<div>
					<h4>Document Generation</h4>
					<ul>
						<li>Presentation, quote, proposal, and contract</li>
						<li>Themes for online and download documents</li>
						<li>Best in class WYSIWYG editor TinyMCE</li>
						<li>Point and click dynamic logic</li>
						<li>Lock editing for sections, pages, &amp; paragraphs</li>
						<li>Variable data</li>
					</ul>
				</div>
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/cloud.svg" alt="Cloud Storage">
				<div>
					<h4>Asset Management and Search</h4>
					<ul>
						<li>Images, HTML, Office Docs, PDF, Text and Forms</li>
						<li>Unlimited storage</li>
						<li>Cloud assets (Google Drive, Dropbox)</li>
					</ul>
				</div>
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/computer-check.svg" alt="Computer" class="product-feature-icon-computer-check">
				<div>
					<h4>User Administration and Application</h4>
					<ul>
						<li>Mobile responsive docs and app</li>
						<li>Role based permissions</li>
						<li>Tasks and messaging</li>
						<li>Localization of language and currency</li>
					</ul>
				</div>
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/eSig.svg" alt="Electronic Signature" class="product-feature-icon-esig">
				<div>
					<h4>Electronic Signature</h4>
					<ul>
						<li>eSign act of 2000 compliant</li>
						<li>Single signer with conditional acceptance support</li>
					</ul>
				</div>
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/CRM.svg" alt="CRM" class="product-feature-icon-crm">
				<div>
					<h4>Integrations + API</h4>
					<ul>
						<li>Salesforce, MS Dynamics CRM, Netsuite</li>
						<li>DocuSign, Adobe Sign</li>
						<li>Webhooks</li>
					</ul>
				</div>
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/reporting.svg" alt="Pie Chart" class="product-feature-icon-reporting">
				<div>
					<h4>Reporting and Alerts</h4>
					<ul>
						<li>Document, asset, user, and template</li>
						<li>Customer report designer</li>
						<li>Conditional alerts on recipient activity</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/display', 'client-testimonials'); ?>

<section>
	<div class="site-width">
		<h2 class="centered">Integrations</h2>
		<br />
		<br />
		<p class="centered">As the leader in sales productivity, Octiv provides a comprehensive partner community to bring together the technology, integrations and expertise companies need to sell smarter and close deals faster.</p>
		<div class="sixth integrations">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/salesforce.svg" alt="Salesforce" class="integration-salesforce">
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/dynamics.svg" alt="Microsoft Dynamics" class="integration-dynamics">
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/docusign.svg" alt="Docusign" class="integration-docusign">
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/box.svg" alt="Box" class="integration-box">
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/formstack.svg" alt="Formstack" class="integration-formstack">
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/steelbrick.svg" alt="Steelbrick" class="integration-steelbrick">
			</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/display', 'newsletter-section'); ?>

<?php get_footer(); ?>