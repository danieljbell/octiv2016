<?php
$url = $_SERVER['REQUEST_URI'];
$parsed_url = explode( '/', $url );
$support_category = $parsed_url[2];
$support_cat_string = explode( '-', $support_category);
$formatted_cat = ucwords(strtolower($support_cat_string[0] . ' ' . $support_cat_string[1] . ' ' . $support_cat_string[2]));
$support_topic = $parsed_url[3];
$support_topic_string = explode( '-', $support_topic );
$formatted_topic = ucwords(strtolower($support_topic_string[0] . ' ' . $support_topic_string[1]));

$article_name = $parsed_url[count($parsed_url)-2];
$article_name_string = explode( '-', $article_name );

get_header();
$rand_num = mt_rand(1,4);
$term_list = wp_get_post_terms($post->ID, 'type', array("fields" => "all")); ?>
<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
	<div class="site-width white-text centered">
		<div>
			<h1><?php the_title(); ?></h1>
		</div>
		<?php if ( is_single(917) || $support_topic === '' ) : ?>
		<div></div>
		<?php else : ?>
			<div>
				<p>Last updated <?php echo the_modified_time('F j, Y'); ?></p>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<?php 
	if ( is_single( 917 ) || $support_topic === '') : 
		get_template_part('partials/display', 'support-parent-page');
	else :
		get_template_part('partials/display', 'support-child-page');
	endif;
?>
	
<section class="callout centered">
	<div class="site-width">
		<h3>Can't find what you're looking for?<br>&nbsp;</h3>
		<button class="btn-primary" id="submit-ticket">Submit a Ticket</button>
	</div>
</section>
<style>
	.support-form label {
		font-weight: bold;
		font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
	}
	.support-form fieldset {
		border: 0;
		padding: 0;
	}
	.support-form legend {
		color: #000;
		font-size: 1rem;
	}
	.support-form .explination {
		font-size: 0.85em;
	}
	.support-form fieldset label,
	.support-form input,
	.support-form textarea {
		font-weight: normal;
	}
	.support-form fieldset label {
		width: 100%;
	}
	.support-form input[type="file"],
	.support-form select,
	.support-form select:focus,
	.support-form select:active {
		box-shadow: none;
	}
	.fsHidden {
		display: none;
	}
</style>
<?php get_footer(); ?>