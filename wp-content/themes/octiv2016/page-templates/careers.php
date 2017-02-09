<?php
/*
==============================
TEMPLATE NAME: Careers
==============================
*/

get_header();
?>

<?php if (!isset($_GET['gh_jid'])) : ?>

	<div class="slider">
		<div style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/stock-car.jpg);">
			<div class="site-width white-text">
				<p>Be Extraordinary</p>
				<h4>Performance</h4>
				<p>We believe in hard work. Our customers are our focus, and we strive to deliver the best, most extraordinary products and services in the world.</p>
			</div>
		</div>
		<div style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('<?php echo get_stylesheet_directory_uri(); ?>/dist/img/holiday-party-2015.jpg');">
			<div class="site-width white-text">
				<div>
					<p>Be Extraordinary</p>
					<h4>Celebration</h4>
					<p>We believe in celebrating the successes of our customers and our teamates, and the successes of the Indianapolis tech community.</p>
				</div>
			</div>
		</div>
		<div style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('<?php echo get_stylesheet_directory_uri(); ?>/dist/img/indy-skyline.jpg');">
			<div class="site-width white-text">
				<div>
					<p>Be Extraordinary</p>
					<h4>Community</h4>
					<p>We believe in making our community even more extraordinary. Our commitment to our community is strong, and it fuels everything we do.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="site-width pos-rel slider-buttons"></div>

	<?php get_template_part('partials/display', 'breadcrumbs'); ?>

	<section>
		<div class="site-width">
			<div class="half-stack">
				<div>
					<img src="/wp-content/uploads/2016/07/team-togetherness.jpg" alt="Team">
				</div>
				<div>
					<h2>Come join our growing team</h2>
					<p>Octiv was founded to provide sales teams a better way to create the assets they need to close deals. We’re passionate about bringing insight, analytics and automation to sales and have earned our position as an industry leader by empowering hundreds of companies around the world to create, deliver and track sales materials online.</p>
					<a href="/company/careers/#openings" class="btn-primary">View all Opportunities</a>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="site-width">
			<div class="fourth lined-grid">
				<div>
					<img src="/wp-content/uploads/2016/07/stock-options.png" alt="">
					<p>Stock options for every employee</p>
				</div>
				<div>
					<img src="/wp-content/uploads/2016/07/vacation-time.png" alt="">
					<p>Unlimited vacation time</p>
				</div>
				<div>
					<img src="/wp-content/uploads/2016/07/parental-leave.png" alt="" class="icon-parental">
					<p>Paid parental leave</p>
				</div>
				<div>
					<img src="/wp-content/uploads/2016/07/downtown-parking.png" alt="" class="icon-parking">
					<p>Downtown parking stipend</p>
				</div>
				<div>
					<img src="/wp-content/uploads/2016/07/quarterly-bonus.png" alt="">
					<p>Uncapped quarterly bonuses</p>
				</div>
				<div>
					<img src="/wp-content/uploads/2016/07/insurance.png" alt="">
					<p>Comprehensive insurance offerings</p>
				</div>
				<div>
					<img src="/wp-content/uploads/2016/07/401k.png" alt="">
					<p>401(k) plan</p>
				</div>
				<div>
					<img src="/wp-content/uploads/2016/07/company-offsites.png" alt="" class="icon-offsites">
					<p>Quarterly company offsites</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="multi-slider employee-testimonials">
				<div class="career-slide">
					<p>What I love most about Octiv is our shared sense of purpose. We’re all focused on the same goals: creating an amazing product, helping our customers become more successful, and supporting each other every day.</p>
					<p><img src="/wp-content/uploads/2016/10/sharmin-kent.jpg" alt="Sharmin" style="border-radius: 50%; box-shadow: 0 0 15px rgba(0,0,0,0.25); max-width: 75px; float: left; margin-right: 1rem;"> <strong>Sharmin Kent</strong><br>Content and Communications Manager</p>
				</div>
				<div class="career-slide">
					<p>The products we build aren’t just useful for our customers – they’re also visually appealing. Joining form and function is just one of the things that sets us apart from other companies in our space.</p>
					<p><img src="/wp-content/uploads/2016/10/joe-heth.jpg" alt="Joe" style="border-radius: 50%; box-shadow: 0 0 15px rgba(0,0,0,0.25); max-width: 75px; float: left; margin-right: 1rem;"><strong>Joe Heth</strong><br>Lead Architect</p>
				</div>
				<div class="career-slide">
					<p>Love working at Octiv because of the people. It's a fun experience coming into the office every day and getting to see my coworkers and team members.</p>
					<p><img src="/wp-content/uploads/2016/10/tom-marvel.jpg" alt="Tom" style="border-radius: 50%; box-shadow: 0 0 15px rgba(0,0,0,0.25); max-width: 75px; float: left; margin-right: 1rem;"><strong>Tom Marvel</strong><br>Product Manager</p>
				</div>
			</div>
	</section>

	<section>
		<div class="site-width centered">
			<h2 class="mar-b">Don’t take our word for it…</h2>
			<div class="fourth pad-t">
				<div>
					<a href="http://www.indianachamber.com/index.php/media-center/press-releases/49-press-releases/2014-press-releases/2878-2014-best-places-to-work-in-indiana-companies-named-indiana-chamber-announces-rankings-may-1" target="_blank"><img style="max-width: 55px;" src="/wp-content/uploads/2016/07/best-places.png" alt=""></a>
				</div>
				<div>
					<a href="http://www.glassdoor.com/Reviews/TinderBox-Reviews-E663752.htm" target="_blank"><img style="max-width: 148px;" src="/wp-content/uploads/2016/07/glassdoor.png" alt=""></a>
				</div>
				<div>
					<a href="http://techpoint.org/2015/05/tinderbox-wins-emerging-tech-company-year/" target="_blank"><img style="max-width: 150px;" src="/wp-content/uploads/2016/07/mura.png" alt=""></a>
				</div>
				<div>
					<a href="http://www.topworkplaces.com/frontend.php/regional-list/company/indystar/tinderbox" target="_blank"><img style="max-width: 171px;" src="/wp-content/uploads/2016/07/IndyStar.png" alt=""></a>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="site-width">
			<hr>
		</div>
	</section>

	<section id="openings">
		<div class="site-width">
			<h2 class="centered">Current Openings</h2>
			<div id="grnhse_app"></div>
		</div>
	</section>

<?php else : ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1>Careers</h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<div id="grnhse_app"></div>
	</div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
