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
	<div class="slider">
		<div style="position: relative; background-image: url(/wp-content/themes/octiv2016//dist/img/home-video-hero.jpg);">
			<section>
				<div class="video-overlay"></div>
				<video class="hero-video" src="<?php echo get_stylesheet_directory_URI(); ?>/dist/video/hero-video.mp4" autoplay loop></video>
				<div class="site-width centered white-text" style="position: relative; z-index: 5;">
					<h1><span style="display: block;">Octiv Powers Documents</span> <span style="color: #ed4c06; font-weight: normal; font-style: italic;">for</span> <span class="typed">Global Leaders</span></h1>
					<div class="two-third-only font-bump">
						<div class="font-bump">
							<p class="fancy-links">Streamline and automate <a href="#workflows">document workflows</a> that connect <a href="#connections">systems and data</a> for a better <a href="#user-experience">end-user experience</a>. Octiv powers <a href="#documents">documents</a> for sales and legal - freeing your teams to be <a href="#productive">more productive</a>.</p>
						</div>
					</div>
					<button class="rad-modal-button btn-primary">Learn How</button>
				</div>
			</section>
		</div>
		<div style="background-image: linear-gradient(rgba(0,0,0,0.15),rgba(0,0,0,0.15)), radial-gradient(rgba(185,73,245,1) 10%,rgba(185,73,245,0)), url(/wp-content/uploads/2017/06/Hero-Background-1920x530.png)">
			<section>
				<div class="site-width centered">
					<div class="half-only" style="color: #fff; text-shadow: 3px 3px 6px rgba(0,0,0,0.15);">
						<div class="font-bump">
							<h1>From Here to the Bottom Line</h1>
							<p class="font-bump">This is the third in a three-part series on the future of work. Your approach to the future of work could impact your bottom line. Are you ready?</p>
						</div>
					</div>
					<a href="/resources/downloads/future-work-bottom-line" class="btn-primary">Download the Infographic Now</a>
				</div>
			</section>
		</div>
		<div style="background-image: radial-gradient(rgba(66,176,216,0.5),rgba(66,176,216,0)), url(/wp-content/uploads/2017/05/home-page-bg.jpg);">
			<section>
				<div class="site-width centered">
					<div class="font-bump">
						<div class="half-only" style="color: #fff; text-shadow: 3px 3px 6px rgba(0,0,0,0.15);">
							<h1>The Future of Work is Here</h1>
							<div style="margin-bottom: 1rem;">
								<p class="font-bump">Register for our live webinar and learn how to future-proof your business.</p>
								<ul class="webinar-speakers">
									<li class="speaker">
										<img src="/wp-content/uploads/2016/10/david-kerr.jpg" alt="">
										<div class="person-info">
											<strong>David Kerr</strong>Octiv
										</div>
									</li>
									<li class="speaker">
										<img src="/wp-content/uploads/2017/06/matt-reid.jpg" alt="">
										<div class="person-info">
											<strong>Matt Reid</strong>Velocify
										</div>
									</li>
									<li class="speaker">
										<img src="/wp-content/uploads/2017/06/david-ball.jpg" alt="">
										<div class="person-info">
											<strong>David Ball</strong>DocuSign
										</div>
									</li>
									<li class="speaker">
										<img src="/wp-content/uploads/2017/06/mt-ray.jpg" alt="">
										<div class="person-info">
											<strong>MT Ray</strong>High Alpha
										</div>
									</li>
								</ul>
								<style>
									.webinar-speakers {
										list-style-type: none;
										padding-left: 0;
										display: flex;
										flex-wrap: wrap;
										justify-content: space-around;
									}
									.webinar-speakers img {
										max-width: 85px;
										border-radius: 50%;
										border: 3px solid #fff;
										box-shadow: 0 0 15px rgba(0,0,0,0.5);
									}
									.speaker {
										margin: 0 1rem;
									}
									.person-info {
										margin-top: 0.5rem;
										font-size: 0.75em;
									}
									.person-info strong {
										text-transform: uppercase;
										display: block;
										font-size: 1.2em;
										line-height: 1;
									}
								</style>
							</div>
						</div>
					</div>
					<a href="/resources/webinars/future-of-work/" class="btn-primary">Register Now</a>
				</div>
			</section>
		</div>
		<div style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), radial-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0)), url(/wp-content/uploads/2017/06/g2-high-performer-bg.jpg)">
			<section>
				<div class="site-width centered">
					<div class="half-only" style="color: #fff; text-shadow: 3px 3px 6px rgba(0,0,0,0.15);">
						<div class="font-bump">
							<h1>Octiv Named High Performer by G2 Crowd</h1>
							<p class="font-bump">The Summer 2017 Grid Report in Proposal Software is out now - see where Octiv topped the charts!</p>
							<img src="https://octiv.com/wp-content/uploads/2017/06/g2-high-performer-badge.png" alt="g2-badge" style="max-width: 150px;">
						</div>
					</div>
					<a href="http://lp.octiv.com/WC-2017-06-01-G2-Crowd-Campaign_Get-Report.html" class="btn-primary">Get the Report</a>
				</div>
			</section>
		</div>
	</div>
</div>

<!-- <div class="fixed-hero-section">
	<div class="slider">
		<div>
			<div class="video-overlay"></div>
			<video class="hero-video" src="<?php echo get_stylesheet_directory_URI(); ?>/dist/video/hero-video.mp4" autoplay loop></video>
			<div class="site-width pos-rel" style="z-index: 2;">
			    <div class="half white-text">
			        <div>
			            <h1><span style="display: block;">Octiv Powers Documents</span> <span style="color: #ed4c06; font-weight: normal; font-style: italic;">for</span> <span class="typed">Global Leaders</span></h1>
			            <p class="fancy-links">Streamline and automate <a href="#workflows">document workflows</a> that connect <a href="#connections">systems and data</a> for a better <a href="#user-experience">end-user experience</a>. Octiv powers <a href="#documents">documents</a> for sales, legal, finance &amp; human resources - freeing your teams to be <a href="#productive">more productive</a>.</p>
									<button class="rad-modal-button btn-primary">Learn How</button>
			        </div>
			    </div>
			</div>
		</div>
		<div>Slide Two</div>
		<div>Slide Three</div>
	</div>
</div> -->

<div class="brand-video site-width box centered">
	<h2>Meet Sara</h2>
	<div class="two-third-only">
		<div>
			<div class="two-third-only">
				<div>
					<p>Her proposal is due by 5. See how Octiv offers a better way for all her documents to be created, shared, signed and stored.</p>
				</div>
			</div>
			<div class="video-outer">
				<div class="video-inner">
					<iframe src="https://fast.wistia.net/embed/iframe/hjy779ahf2?playbar=true&smallPlayButton=true&volumeControl=true&fullscreenButton=true&controlsVisibleOnLoad=false" name="wistia_embed" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

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
					<p>Sales quotes and proposals, NDAs and master services agreements, offer letters and employment agreements: documents are time-consuming and require multiple interactions with people and technology. The Octiv platform transforms how you use documents: from paper-based workflows to digital-first documents. Digital documents are easier to create, easier to edit, easier to share, easier to sign and manage. Octiv streamlines document workflows with dynamic HTML5 templates, integrations with source systems, and online document collaboration. Documents requiring a signature can be signed using our native integration with DocuSign.</p>
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
					<a href="/platform/integrations/salesforce-crm/" title="Salesforce"><?php echo file_get_contents('./wp-content/uploads/2017/01/salesforce.svg', false, $context); ?></a>
				</div>
				<div class="top-right-badge">
					<a href="/platform/integrations/box-file-storage/" title="box.com"><?php echo file_get_contents('./wp-content/uploads/2017/01/box.svg', false, $context); ?></a>
				</div>
				<div class="right-badge">
					<a href="/platform/integrations/docusign-esignature/" title="Docusign"><?php echo file_get_contents('./wp-content/uploads/2017/01/docusign.svg', false, $context); ?></a>
				</div>
				<div class="bottom-right-badge">
					<a href="/platform/integrations/microsoft-dynamics-crm/" title="Microsoft Dynamics"><?php echo file_get_contents('./wp-content/uploads/2017/01/dynamics.svg', false, $context); ?></a>
				</div>
				<div class="bottom-badge">
					<a href="/platform/integrations/oracle-cpq-cloud/" title="Oracle CPQ"><?php echo file_get_contents('./wp-content/uploads/2017/01/oracle.svg', false, $context); ?></a>
				</div>
				<div class="bottom-left-badge">
					<a href="/platform/integrations/financial-force-finance/" title="FinancialForce"><?php echo file_get_contents('./wp-content/uploads/2017/01/FinancialForce-Mark.svg', false, $context); ?></a>
				</div>
				<div class="left-badge">
          <a href="/platform/integrations/cirrus-insight-email/" title="Cirrus Insight"><?php echo file_get_contents('./wp-content/uploads/2017/01/cirrus-insight.svg', false, $context); ?></a>
				</div>
				<div class="top-left-badge">
					<a href="/platform/integrations/okta-sso/" title="Okta"><?php echo file_get_contents('./wp-content/uploads/2017/01/okta.svg', false, $context); ?></a>
				</div>
			</div>
			<div class="connections-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/plug.svg', false, $context); ?>
				</div>
				<div>
					<h2>Connect Systems &amp; Data</h2>
					<p>Octiv connects the systems and data that your teams use every day - CRM, CPQ, ERP, ATS, HCM. By integrating these systems Octiv eliminates steps in the document workflow. Less “paper" steps means more time back to your teams. Octiv also improves how you collaborate in documents and how you deliver them to your recipient.</p>
					<a href="/platform/integrations" class="btn-arrow">View Our Integrations</a>
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
					<p>Octiv improves how users create documents, how they share with internal collaborators and how they edit and approve documents for publishing. By reducing time and effort to work with documents, users get more work done. Octiv eliminates or reduces interactions with technology to create and publish business documents.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="productive" class="fat-section">
	<div class="site-width">
		<div class="half">
			<div class="productive-visual">
			</div>
			<div class="productive-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/time-giver.svg', false, $context); ?>
				</div>
				<div>
					<h2>More Productive Teams</h2>
					<p>Your teams use dozens of types of documents and create thousands of documents per year. That can mean hundreds of thousands of hours and millions of dollars in man hours - on documents. Octiv means less paper and more time for your teams to be more productive.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="site-width">
	<hr>
</div>

<section id="documents" class="fat-section">
	<div class="site-width">
		<div class="half-stack">
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
					<div class="badge-ndas"><a href="#"><span>Presentations</span></a></div>
					<div class="badge-ndas2"><a href="#"><span>Invoices</span></a></div>
					<div class="badge-msas"><a href="#"><span>Contracts</span></a></div>
				</div>
			</div>
			<div class="documents-content">
				<div>
					<?php echo file_get_contents('./wp-content/uploads/2017/01/doc-gen.svg', false, $context); ?>
				</div>
				<div>
					<h2>Octiv Powers Your Documents</h2>
					<p>Business runs on information, and often that information is created, shared and used in a document. From presentations and proposals to contracts and invoices to offer letters and performance appraisals - Octiv makes the documents you use easier to create and better to use.</p>
					<p style="margin-bottom: 1rem;"><strong>Explore Our Solutions:</strong></p>
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
										echo '<div style="max-width: 35px; max-height: 35px;">' . file_get_contents($icon[url], false, $context) . '</div>';
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

<?php get_template_part('partials/display', 'client-testimonials'); ?>

<?php get_template_part('partials/display', 'basic-contact-us'); ?>

<?php get_footer(); ?>
