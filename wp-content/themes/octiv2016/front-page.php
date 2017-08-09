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

<?php $rand_num = mt_rand(1,4); ?>

<div class="fixed-hero-section">
	<div class="slider">
		<div style="position: relative; background-image: radial-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0)), linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/uploads/2017/06/homepage.jpg);">
			<section>
				<div class="site-width centered" style="position: relative; z-index: 5;">
					<h1 class="white-text">Octiv Powers Documents</h1>
					<div class="white-text two-third-only font-bump">
						<div>
							<p class="fancy-links">Create digital documents in minutes, share them online, sign from anywhere and store your documents securely in the cloud. Save more time and boost productivity.</p>
						</div>
					</div>
					<button class="rad-modal-button btn-primary">Learn How</button>
				</div>
			</section>
		</div>
		<div style="background-image: radial-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0)), linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php echo '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg' ?>);">
			<section>
				<div class="site-width centered">
					<h1 class="white-text">Experience Octiv in Action</h1>
					<div class="white-text two-third-only font-bump">
						<div class="pad-x">
							<p>Demo our document generation solution and create a personalized document based on your interests.</p>
						</div>
					</div>
					<a href="/experience" class="btn-primary">Create Document Now</a>
				</div>
			</section>
		</div>
		<div style="background-image: radial-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0)), linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url(/wp-content/uploads/2017/06/guided-tour.jpg);">
			<section>
				<div class="site-width centered">
					<h1 class="white-text">See How Octiv Works</h1>
					<div class="white-text two-third-only font-bump">
						<div>
							<p>Take our guided tour to see what makes Octiv a document generation industry leader.</p>
						</div>
					</div>
					<a href="/tour" class="btn-primary">Take the Tour Now</a>
				</div>
			</section>
		</div>
		<div style="background-image: linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.35)), radial-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0)), url(/wp-content/uploads/2017/08/2017-08-sales-hacker-event-bg.jpg)">
			<section>
				<div class="site-width centered">
					<h1 class="white-text">Close deals faster with winning sales proposals.</h1>
					<div class="half-only white-text">
						<div class="font-bump">
							<p>Join us on August 23 at the Sales Hacker Virtual Summit to learn how you can build your own army of unstoppable sales reps.</p>
						</div>
					</div>
					<a href="http://armyofsalesreps.com" class="btn-primary">Register Now</a>
				</div>
			</section>
		</div>
		<div style="background-image: linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.35)), radial-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0)), url(/wp-content/uploads/2017/06/Hero-Background-1920x530-1.png)">
			<section>
				<div class="site-width centered">
					<h1 class="white-text">The Case for Digital Document Generation</h1>
					<div class="half-only white-text">
						<div class="font-bump">
							<p>See why digital document generation is helping sales teams meet their clients’ needs with speed and accuracy.</p>
						</div>
					</div>
					<a href="/resources/downloads/case-digital-document-generation" class="btn-primary">Download Now</a>
				</div>
			</section>
		</div>
	</div>
</div>

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
					<p>The Octiv platform transforms how you use documents: from paper-based workflows to digital-first documents. Digital documents are easier to create, easier to edit, easier to share, easier to sign and manage. Octiv streamlines document workflows with dynamic HTML5 templates, integrations with source systems, and online document collaboration. Documents requiring a signature can be signed using our native integration with DocuSign.</p>
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
					<a href="/tour" class="btn-arrow">See How Octiv Works</a>
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
					<a href="/tour" class="btn-arrow">See How Octiv Boosts Productivity</a>
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
