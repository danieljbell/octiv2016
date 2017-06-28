<?php get_header(); ?>

<?php $rand_num = mt_rand(1,4); ?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
	<div class="site-width white-text centered">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="breadcrumb">
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div class="site-width">','</div>');
		}
	?>
</div>

<section class="white-bg">
	<div class="site-width">
		<h3><?php the_excerpt(); ?></h3>
		<?php the_content(); ?>
		<p class="pad-y centered">-30-</p>
		<h3>About <?php bloginfo( 'name' ); ?></h3>
		<p>Octiv provides a document generation platform designed to create efficiencies in creating documents like proposals, quotes, contracts, presentations and more. Octiv integrates data from back-office systems to streamline workflows, save time and accelerate the document creation and delivery process. Founded in 2010, Octiv services more than 400 organizations including enterprises such as General Electric and Siemens, and high-growth companies such as Lindamood-Bell and G/O Digital. To learn more, visit <a href="/">octiv.com</a>.</p>
		<?php
			if ( have_rows('additional_boilerplate') ) :
			while ( have_rows('additional_boilerplate') ) : the_row();
				echo '<h3>About ' . get_sub_field('company') . '</h3>';
				echo '<p>' . get_sub_field('boilerplate') . '</p>';
			endwhile;
			endif;
		?>
		<p><strong>Media Contact</strong><br>Sharmin Kent<br>317-493-0743<br><a href="mailto:sharmin@octiv.com">Sharmin@Octiv.com</a></p>
	</div>
</section>

<?php get_footer(); ?>
