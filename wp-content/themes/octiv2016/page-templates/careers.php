<?php
/*
==============================
TEMPLATE NAME: Careers
==============================
*/

get_header();

$rand_num = mt_rand(1,4);

?>

<?php if (!isset($_GET['gh_jid'])) : ?>

	<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url('/wp-content/themes/octiv2016/dist/img/indy-skyline.jpg');">
		<div class="site-width centered white-text">
			<div class="two-third-only">
				<div>
					<h1>Careers</h1>
					<p class="font-bump">At Octiv, our customers are our top priority. Join us to serve some of the most innovative companies in the world.</p>
				</div>
			</div>
		</div>
	</div>

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
			<?php
			$args = array(
		    'post_type'      => 'employee-testimonial',
		    'orderby'        => 'rand',
		    'posts_per_page' => 3
		  );
		  $query = new WP_Query($args);
		  if ($query->have_posts()) :
		    while ($query->have_posts()) : $query->the_post(); ?>
			<div class="career-slide">
				<p><?php echo get_field('employee_quote'); ?></p>
				<p><img src="<?php echo get_field('employee_headshot')[url] ?>" alt="<?php echo get_the_title(); ?>'s Headshot" style="border-radius: 50%; box-shadow: 0 0 15px rgba(0,0,0,0.25); max-width: 75px; float: left; margin-right: 1rem;"> <strong><?php echo get_the_title(); ?></strong><br><?php echo get_field('employee_title'); ?></p>
			</div>
			<?php
		    endwhile;
		  endif;
		  wp_reset_query();
			?>	
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

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
	<div class="site-width white-text">
		<h1 class="centered">Careers</h1>
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
