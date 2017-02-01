<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
	'http' => array(
		'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
	)
));
?>

<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="video-overlay"></div>
	<video class="hero-video" src="<?php echo get_stylesheet_directory_URI(); ?>/dist/video/hero-video.mp4" autoplay loop></video>
	<div class="site-width pos-rel" style="z-index: 2;">
	    <div class="half white-text">
	        <div>
	            <h1><span style="display: block;">Octiv Powers Documents</span> <span style="color: #ed4c06; font-weight: normal; font-style: italic;">for</span> <span class="typed">Global Leaders</span></h1>
	            <p class="fancy-links">Streamline and automate <a href="#workflows">document workflows</a> that connect <a href="#connections">systems and data</a> for a better <a href="#user-experience">end-user experience</a>. Octiv powers <a href="#documents">documents</a> for sales, legal, finance &amp; human resources - freeing your teams to be <a href="#productive">more productive</a>.</p>
	        </div>
	    </div>
	</div>
</div>


<section class="callout">
	<div class="site-width">
		<h2 class="centered">How Octiv unifies your document workflow</h2>
		<div class="two-third-only" style="margin-bottom: 0;">
			<div style="margin-bottom: 0;">
				<p class="centered">Octiv is a cloud platform that streamlines the creation, collaboration and delivery of mobile-responsive, online documents. Document workflows can be automated to eliminate time-consuming, manual steps and interactions with multiple source data systems.</p>
			</div>
		</div>
		<br>
		<br>
		<div id="workflow-comparison" class="twentytwenty-container">
			<img src="<?php echo get_stylesheet_directory_URI(); ?>/dist/img/comparison-before.png" alt="">
			<img src="<?php echo get_stylesheet_directory_URI(); ?>/dist/img/comparison-after.png" alt="">
		</div>
	</div>
</section>

<style>
	.twentytwenty-handle {
		background-color: #ed4c06;
	}
	.twentytwenty-wrapper {
		position: relative;
	}
	.twentytwenty-wrapper:before {
		content: 'Before';
		position: absolute;
		transform: translateY(-2rem);
		font-size: 1.4rem;
	}
	.twentytwenty-wrapper:after {
		content: 'After';
		position: absolute;
		top: 0;
		right: 0;
		transform: translateY(-2rem);
		font-size: 1.4rem;
	}
</style>

<section id="workflows" class="fat-section">
	<div class="site-width">
		<div class="half-stack">
			<div class="workflows-visual">
				<div class="timeline">
					<div class="build button">
						<span class="centered">
							<?php echo file_get_contents('./wp-content/uploads/2017/01/wrench.svg', false, $context); ?>
						</span>
					</div>
					<div class="integrate button">
						<span class="centered">
							<?php echo file_get_contents('./wp-content/uploads/2017/01/plug.svg', false, $context); ?>
						</span>
					</div>
					<div class="publish button">
						<span class="centered">
							<?php echo file_get_contents('./wp-content/uploads/2017/01/doc-gen.svg', false, $context); ?>
						</span>
					</div>
				</div>
			</div>
			<div class="workflows-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/wrench.svg', false, $context); ?>
				</div>
				<div>
					<h2>Build &amp; Automate Document Workflows</h2>
					<p>Document Workflows are defined as the steps, tasks, effort and information required to create any type of document - from sales quotes and proposals to NDAs and master services agreements. Documents can be authored in any environment such as Word, Excel or Google Docs. Octiv then translates the document to HTML5, integrates information and data, and enables online editing, collaboration, mark-up or redlining.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="site-width">
	<hr>
</div>

<section id="connections" class="fat-section">
	<div class="site-width">
		<div class="half">
			<div class="connections-visual">
				<div class="octiv-badge">
					<svg viewBox="0 0 126.1 126.1"><use xlink:href="#icon-octiv-mark"></svg>
				</div>
				<div class="top-badge">
					<a href="/platform/integrations/crm/salesforce" title="Salesforce"><?php echo file_get_contents('./wp-content/uploads/2017/01/salesforce.svg', false, $context); ?></a>
				</div>
				<div class="top-right-badge">
					<a href="/platform/integrations/file-storage/box" title="box.com"><?php echo file_get_contents('./wp-content/uploads/2017/01/box.svg', false, $context); ?></a>
				</div>
				<div class="right-badge">
					<a href="/platform/integrations/esignature/docusign" title="Docusign"><?php echo file_get_contents('./wp-content/uploads/2017/01/docusign.svg', false, $context); ?></a>
				</div>
				<div class="bottom-right-badge">
					<a href="/platform/integrations/crm/microsoft-dynamics" title="Microsoft Dynamics"><?php echo file_get_contents('./wp-content/uploads/2017/01/dynamics.svg', false, $context); ?></a>
				</div>
				<div class="bottom-badge">
					<a href="/platform/integrations/cpq/oracle-cpq" title="Oracle CPQ"><?php echo file_get_contents('./wp-content/uploads/2017/01/oracle.svg', false, $context); ?></a>
				</div>
				<div class="bottom-left-badge">
					<a href="/platform/integrations/finance/financialforce" title="FinancialForce"><?php echo file_get_contents('./wp-content/uploads/2017/01/FinancialForce-Mark.svg', false, $context); ?></a>
				</div>
				<div class="left-badge">
					<a href="/platform/integrations/email/cirrus-insight" title="Dropbox"><?php echo file_get_contents('./wp-content/uploads/2017/01/cirrus-insight.svg', false, $context); ?></a>
				</div>
				<div class="top-left-badge">
					<a href="/platform/integrations/sso/okta" title="Okta"><?php echo file_get_contents('./wp-content/uploads/2017/01/okta.svg', false, $context); ?></a>
				</div>
			</div>
			<div class="connections-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/plug.svg', false, $context); ?>
				</div>
				<div>
					<h2>Connect Systems, Data &amp; Teams</h2>
					<p>Octiv APIs enable integrations with dozens of systems that leverage your current applications and data to create a unified workflow for generating documents.</p>
					<p>Octiv workflows connect the systems, data and teams that are essential to the creation, collaboration and delivery of dozens of types of business documents. Octiv integrates with authoring tools such as Word, Excel and Google Docs; applications such as CRM, CPQ and ECM; and teams from across the enterprise that depend on business documents to get work done.</p>
					<a href="/platform/integrations" class="btn-arrow">Learn More</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="user-experience" class="fat-section">
	<div class="site-width">
		<div class="half-stack">
			<div class="ux-visual"></div>
			<div class="ux-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/signature.svg', false, $context); ?>
				</div>
				<div>
					<h2>A Better End-User Experience</h2>
					<p>Octiv reduces the friction for end users through ease of consumption, online editing, collaboration, mark-up or redlining. By streamlining workflows, Octiv reduces the number of time-consuming steps as well as interactions with technology and teams.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="documents" class="fat-section">
	<div class="site-width">
		<div class="half">
			<div class="documents-visual">
				<div class="octiv-badge">
					<svg viewBox="0 0 126.1 126.1"><use xlink:href="#icon-octiv-mark"></svg>
				</div>
				<div class="document-inputs">
					<div class="badge-img"><svg viewBox="0 0 62.4 39.6"><use xlink:href="#icon-image"></svg></div>
					<div class="badge-line-chart"><svg viewBox="0 0 51.73 51.73"><use xlink:href="#icon-line-chart"></svg></div>
					<div class="badge-table"><svg viewBox="0 0 59.2 40.4"><use xlink:href="#icon-table"></svg></div>
					<div class="badge-video"><svg viewBox="0 0 60.7 34.2"><use xlink:href="#icon-video"></svg></div>
					<div class="badge-bar-chart"><svg viewBox="0 0 58.3 51"><use xlink:href="#icon-bar-chart"></svg></div>
					<div class="badge-pie-chart"><svg viewBox="0 0 60.6 60.6"><use xlink:href="#icon-pie-chart"></svg></div>
					<div class="badge-content"><svg viewBox="0 0 60.1 41.4"><use xlink:href="#icon-content"></svg></div>
				</div>
				<div class="document-outputs">
					<div class="badge-proposals"><a href="#"><span>Proposals</span></a></div>
					<div class="badge-quotes"><a href="#"><span>Quotes</span></a></div>
					<div class="badge-rfps"><a href="#"><span>RFPs</span></a></div>
					<div class="badge-sows"><a href="#"><span>SOWs</span></a></div>
					<div class="badge-ndas"><a href="#"><span>NDAs</span></a></div>
					<div class="badge-ndas2"><a href="#"><span>Invoices</span></a></div>
					<div class="badge-msas"><a href="#"><span>MSAs</span></a></div>
				</div>
			</div>
			<div class="documents-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/doc-gen.svg', false, $context); ?>
				</div>
				<div>
					<h2>Octiv Powers Your Documents</h2>
					<p>Business runs on information, and often that information is created, shared and used in a document. From presentations and proposals to contracts and invoices to offer letters and performance appraisals - Octiv makes the documents you use easier to create and better to use.</p>
					<p style="margin-bottom: 0.25rem;"><strong>Explore Our Solutions:</strong></p>
					<ul class="third" style="list-style-type: none; padding: 0;">
						<?php
						$args = array(
							'post_type' => 'solutions',
							'order' => 'ASC',
							'order_by' => 'name'
						);
						$solutions_query = new WP_Query($args);
						if ($solutions_query->have_posts()) :
							while ($solutions_query->have_posts()) :
								$solutions_query->the_post();
								$icon = get_field('page_icon', $post->ID, true);
								echo '<li style="font-size: 0.8em;">';
									echo '<a href="' . get_the_permalink() . '">';
										echo '<div>' . file_get_contents($icon[url], false, $context) . '</div>';
										echo '<span>' . get_the_title() . '</span>';
									echo '</a>';
								echo '</li>';
							endwhile;
						endif;
						wp_reset_query();
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="site-width">
	<hr>
</div>

<section id="productive">
	<div class="site-width">
		<div class="half-stack">
			<div class="productive-visual">
			</div>
			<div class="productive-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/time-giver.svg', false, $context); ?>
				</div>
				<div>
					<h2>More Productive Teams</h2>
					<p>Your teams use dozens of types of documents and create thousands of documents per year. That can mean hundreds of thousands of hours and millions of dollars in man hours - on documents. Octiv simplifies how your teams create, share and manage documents - giving them time back to be more productive.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php // Commercial & Enterprise sections
	// echo '
	// <section id="commercial" style="overflow-x: hidden;" class="fat-section">
	// 	<div class="site-width">
	// 		<div class="half-stack">
	// 			<div class="pos-rel commercial-visual flow-1">
	// 				<div class="step-1 workflow-box workflow-brand"><hr><hr></div>
	// 				<div class="step-2 workflow-box workflow-brand-5"><hr><hr></div>
	// 				<div class="step-3 workflow-box workflow-brand-3"><hr><hr></div>
	// 				<div class="step-4 workflow-circle workflow-brand-2"><hr></div>
	// 				<div class="step-5 workflow-box rotated workflow-brand-4"><hr><hr></div>
	// 				<div class="step-6 workflow-circle callout"></div>
	// 				<div class="step-6 workflow-box callout"><hr></div>
	// 			</div>
	// 			<div class="commercial-content">
	// 				<div>
	// 					<svg viewBox="0 0 100 108.3">
	// 						<use xlink:href="#icon-commercial">
	// 					</svg>
	// 				</div>
	// 				<div>
	// 					<h2>Commercial Teams</h2>
	// 					<p>Octiv simplifies the experience for commercial teams. Octiv supports high-volume, transactional workflows, complex, long-cycle workflows and channel/distributor workflows.</p>
	// 					<a href="#" class="btn-arrow">Learn More</a>
	// 				</div>
	// 			</div>
	// 		</div>
	// 	</div>
	// </section>
	//
	// <div class="site-width">
	// 	<hr>
	// </div>
	//
	// <section id="enterprise" class="fat-section">
	// 	<div class="site-width">
	// 		<div class="half">
	// 			<div class="enterprise-visual"></div>
	// 			<div class="enterprise-content">
	// 				<div>
	// 					<svg viewBox="0 0 100 99.7">
	// 						<use xlink:href="#icon-enterprise">
	// 					</svg>
	// 				</div>
	// 				<div>
	// 					<h2>Enterprise Teams</h2>
	// 					<p>Octiv is enterprise-ready. Enterprise document workflows often span multiple applications and repositories and can also span numerous teams, geographies and languages. Octiv offers enterprises a way to unify and standardize document workflows that maximize existing IT investments while enhancing interoperability. Eliminate process steps, save time and create new efficiencies with Octiv.</p>
	// 					<a href="#" class="btn-arrow">Learn More</a>
	// 				</div>
	// 			</div>
	// 		</div>
	// 	</div>
	// </section>
	// ';
?>

<?php get_template_part('partials/display', 'client-testimonials'); ?>

<?php get_template_part('partials/display', 'basic-contact-us'); ?>



<style>

@media screen and (max-width: 767px) {
	.home .fixed-hero-section .half > div:first-child {
		width: 100%;
	}
}
</style>

<?php get_footer(); ?>
