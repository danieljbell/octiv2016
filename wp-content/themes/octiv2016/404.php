<?php get_header(); ?>

<?php $rand_num = mt_rand(1,4); ?>

<div class="fixed-hero-section centered" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
	<div class="site-width white-text">
			<h1>404</h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<div class="half">
			<div>
				<h2>Oops!</h2>
				<p>We're still updating the new Octiv site, and the page you're trying to reach doesn't exist or has moved. Check out the <a href="/gettinderbox">letter from the Octiv CEO</a> to learn more about our new brand. Feel free to reach out with any questions you have.</p>
			</div>
			<div>
				<h2>Contact Us</h2>
			  <div class="half">
			  	<div class="centered">
			  	    <div class="brand-callout pad-y mar-b">
			  	    	<img src="<?php echo get_stylesheet_directory_URI(); ?>/dist/img/phone.png" alt="Phone" style="max-width: 45px; margin: 0 auto;">
			  	    </div>
			  	    <h4>Call Us</h4>
			  	    <p><strong>317-550-0148</strong><br>Press 2 for support</p>
			  	</div>
			  	<div class="centered">
			  	    <div class="brand-callout pad-y mar-b">
			  	    	<img src="<?php echo get_stylesheet_directory_URI(); ?>/dist/img/email.svg" alt="Email" style="max-width: 85px;  margin: 0 auto;">
			  	    </div>
			  	    <h4>Email Us</h4>
			  	    <p><a href="mailto:support@octiv.com">support@octiv.com</a></p>
			  	</div>
			  </div>
			</div>
		</div>
	</div>
</section>



<?php get_footer(); ?>
