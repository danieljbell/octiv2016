<?php
/*
==============================
Template Name: Company Page
==============================
*/

get_header();

$rand_num = mt_rand(1,4);
?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url('/wp-content/themes/octiv2016/dist/img/indy-skyline.jpg');">
	<div class="site-width centered pos-rel" style="z-index: 2;">
		<h1 class="white-text">Company</h1>
		<div class="two-third-only white-text">
			<div class="font-bump">
				<p>Meet the people behind the platform.</p>
			</div>
		</div>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<div class="half-only">
			<div>
				<h2>About Octiv</h2>
        <p>Since its founding in 2010, Octiv's team has been dedicated to providing sales teams a better way to create the documents they need to close deals. Today, Octiv streamlines document workflows for teams across organizations including sales, legal and information technology. Octiv's industry-leading technology enables companies to use the information they have in CRM, CPQ, ERP and other back-office systems to create, collaborate on and deliver documents online.</p>
				<p>Octiv is passionate about giving time back to teams by connecting systems and data to deliver a better end-user experience. Awards and recognition of our market-leading product and teams include TechPoint Mira Awards, G2 Crowd, Glassdoor and Best Places to Work in Indiana. Through an HTML5-based platform, powerful integrations and world-class support and services teams, Octiv helps companies move at the speed of business.</p>
				<p>Octiv is also passionate about community. Our company culture of hard work and commitment is evident in every interaction with our team, our product and in the community organizations and causes we support.</p>
      </div>
		</div>
		<div class="sixth centered">
			<div>
				<a href="http://www.indianachamber.com/index.php/media-center/press-releases/49-press-releases/2014-press-releases/2878-2014-best-places-to-work-in-indiana-companies-named-indiana-chamber-announces-rankings-may-1" target="_blank" style="display: inline-block;"><img src="/wp-content/uploads/2016/07/best-places.jpg" alt="Best Place to Work"></a>
			</div>
			<div>
				<a href="http://www.glassdoor.com/Reviews/TinderBox-Reviews-E663752.htm" target="_blank" style="display: inline-block;"><img src="/wp-content/uploads/2016/07/glassdoor.jpg" alt="GlassDoor Reviews"></a>
			</div>
			<div>
				<a href="https://www.g2crowd.com/products/tinderbox/reviews" target="_blank" style="display: inline-block;"><img src="/wp-content/uploads/2016/07/g2-crowd.jpg" alt="G2 Crowd"></a>
			</div>
			<div>
				<a href="http://techpoint.org/2015/05/tinderbox-wins-emerging-tech-company-year/" target="_blank" style="display: inline-block;"><img src="/wp-content/uploads/2016/07/mura-awards.jpg" alt="Mira Awards"></a>
			</div>
			<div>
				<a href="http://gettinderbox.com/tinderbox-became-breakthrough-docusign-partner/" target="_blank" style="display: inline-block;"><img src="/wp-content/uploads/2016/07/docusign.jpg" alt="Docusign"></a>
			</div>
			<div>
				<a href="http://www.topworkplaces.com/frontend.php/regional-list/company/indystar/tinderbox" target="_blank" style="display: inline-block;"><img src="/wp-content/uploads/2016/07/indystar.jpg" alt="Indy Star"></a>
			</div>
		</div>
		<div class="two-third-only centered">
			<div>
				<h2>Want to join our growing team?</h2>
				<p>View our career opportunities now!</p>
				<p><a href="/company/careers" class="btn-primary">View All Opportunities</a></p>
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



<section id="leadership">
	<div class="site-width">
		<h2 class="centered">Leadership<br>&nbsp;</h2>
		<div class="third">
			<?php
			 if (have_rows('company_leadership')) :
          while (have_rows('company_leadership')) :
            the_row();
          		echo '<div>';
	          		echo '<div class="centered">';
	          			echo '<img src="' . get_sub_field('leader_headshot') . '" alt="' . get_sub_field('leader_name') . '">';
	          			echo '<p><strong>' . get_sub_field('leader_name') . '</strong><br>' . get_sub_field('leader_title') . '<br><a href="' . get_sub_field('leader_linkedin_url') . '" title="' . get_sub_field('leader_name')  . '\'s Linkedin" target="_blank" rel="noopener noreferrer"><img src="/wp-content/themes/octiv2016/dist/img/linkedin.svg" alt="LinkedIn"></a></p>';
	          		echo '</div>';
          		echo '</div>';
          endwhile;
        endif;
      ?>
		</div>
	</div>
</section>

<section class="callout" id="board-of-directors" style="background-color: #f0f0f0; background-image: linear-gradient(#f0f0f0, #eee);">
	<div class="site-width">
		<h2 class="centered">Board of Directors<br>&nbsp;</h2>
		<div class="third">
			<?php
			 if (have_rows('board_leadership')) :
          while (have_rows('board_leadership')) :
            the_row();
          		echo '<div>';
	          		echo '<div class="centered">';
	          			echo '<img src="' . get_sub_field('leader_headshot') . '" alt="' . get_sub_field('leader_name') . '">';
	          			echo '<p><strong>' . get_sub_field('leader_name') . '</strong><br>' . get_sub_field('leader_title') . '<br><a href="' . get_sub_field('leader_linkedin_url') . '" title="' . get_sub_field('leader_name')  . '\'s Linkedin" target="_blank" rel="noopener noreferrer"><img src="/wp-content/themes/octiv2016/dist/img/linkedin.svg" alt="LinkedIn"></a></p>';
	          		echo '</div>';
          		echo '</div>';
          endwhile;
        endif;
      ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
