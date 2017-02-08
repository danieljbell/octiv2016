<?php
/*
==============================
TEMPLATE NAME: Platform Page
==============================
*/
get_header();

$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
	'http' => array(
		'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
	)
));
?>

<div class="fixed-hero-section">
	<div class="video-overlay"></div>
	<video class="hero-video" src="<?php echo get_stylesheet_directory_URI(); ?>/dist/video/platform-video.mp4" autoplay loop></video>
	<div class="site-width white-text centered pos-rel" style="z-index: 2;">
		<div class="half">
			<div style="margin-right: auto; margin-bottom: 0;">
				<h1 style="margin-bottom: 0.5rem;">The Octiv Platform Powers Document Workflows for a Range of Use Cases</h1>
				<div class="fancy-links">
          <?php the_content(); ?>
        </div>
			</div>
		</div>
	</div>
</div>

<?php // get_template_part('partials/display', 'breadcrumbs'); ?>

<?php
$count = 0;
  if (have_rows('page_section')) :
    $total = count(get_field('page_section'));
    while (have_rows('page_section')) :
      $count++;
      the_row();
      $section_title = get_sub_field('section_title');
      $section_title = preg_replace('/&| |,/', '-', $section_title);
      $section_title = preg_replace('/---|--/', '-', $section_title);
      $section_title = strtolower($section_title);
			$visual_type = get_sub_field('visual_type');
			$overlay = get_sub_field('section_background_overlay');
			if ($visual_type[0] === 'Background') {
				if ($overlay != 1) {
					echo '<section class="fat-section white-text" id="' . $section_title . '" style="background-image: url(' . get_sub_field('section_background') . ');">';
				} else {
					echo '<section class="fat-section" id="' . $section_title . '" style="background-image: linear-gradient(to bottom, rgba(255,255,255,1) 5%, rgba(255,255,255,0) 20%, rgba(255,255,255,0) 80%, rgba(255,255,255,1) 95%), linear-gradient(to right, rgba(255,255,255,0) 35%, rgba(255,255,255,0.85) 60%), url(' . get_sub_field('section_background') . '); background-size: cover; background-repeat: no-repeat;">';
				}
			} else {
				echo '<section class="fat-section" id="' . $section_title . '">';
			}
        echo '<div class="site-width">';
          if ($count % 2 == 0) {
						echo '<div class="half">';
          } else {
						echo '<div class="half-stack">';
          }
						if ($visual_type[0] != 'Background') {
							echo '<div class="section-visual browser-window">';
								echo '<div style="padding: 0;"><img src="' . get_sub_field('section_browser_window') . '" alt="' . get_sub_field('section_title') . '"></div>';
							echo '</div>';
						} else {
							echo '<div class="section-visual"></div>';
						}
            echo '<div class="section-content">';
							echo '<div class="section-icon">';
								if (get_sub_field('section_icon')) {
									$icon_file = get_sub_field('section_icon', true);
									echo file_get_contents($icon_file[url], false, $context);
								}
							echo '</div>';
              echo '<div>';
                echo '<h2>' . get_sub_field('section_title') . '</h2>';
                echo '<p>' . get_sub_field('section_content') . '</p>';
								if (get_sub_field('section_call_to_action_title')) {
									if ($visual_type[0] != 'Background') {
										echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow">' . get_sub_field('section_call_to_action_title') . '</a>';
									} else {
										echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow">' . get_sub_field('section_call_to_action_title') . '</a>';
									}
								}
              echo '</div>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</section>';
      if ($count < $total) :
				if ($visual_type[0] != 'Background') {
					echo '<div class="site-width"><hr></div>';
				}
      endif;
    endwhile;
  endif;
?>

<section class="solutions-container" style="background-color: #f0f0f0; background-image: linear-gradient(#f0f0f0, #eee);">
	<div class="site-width">
		<h2 class="centered">Octiv Drives Productivity &amp; Performance Outcomes</h2>
		<p class="centered">Explore Use Cases:</p>
		<br>
		<div class="third">
			<?php
				$args = array(
					'post_type' => 'solutions',
					'order' => 'ASC',
					'order_by' => 'menu_order'
				);
				$solutions_query = new WP_Query($args);
				if ($solutions_query->have_posts()) :
					while ($solutions_query->have_posts()) :
						$solutions_query->the_post();
						$icon = get_field('page_icon', $post->ID, true);
						echo '<div class="card" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(' . wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) . ');">';
							echo '<a href="' . get_the_permalink() . '">';
								echo '<div>';
									echo '<div class="card-icon">';
										echo file_get_contents($icon[url], false, $context);
									echo '</div>';
									echo '<div class="card-content">';
										echo '<h4>' . get_the_title() . '</h4>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</a>';
					endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
	</div>
</section>

<style>
.fixed-hero-section {
	padding: 2rem 0;
}

.fat-section.white-text {
	background-size: cover;
	background-position: left center;
	color: #fff;
	margin-top: -1rem;
}
main .half-stack,
main .half {
	-webkit-align-items: center;
			-ms-flex-align: center;
					align-items: center;
}
.section-icon svg {
	width: 100%;
	max-width: 75px;
	fill: #42b0d8;
}
@media screen and (max-width: 600px) {
	.fixed-hero-section {
		padding: 0;
	}
	.section-icon {
		display: none;
	}
}

.fixed-hero-section .two-third-only > div,
.fixed-hero-section .two-third-only > div p {
	margin-bottom: 0;
}
.solutions-container .card {
	color: #fff;
	text-shadow: 2px 2px 3px rgba(0,0,0,0.85);
	background-size: cover;
	background-position: center;
	overflow: hidden;
}
.solutions-container svg {
	width: 100%;
	fill: #fff;
	-webkit-filter: drop-shadow(2px 2px 5px rgba(0,0,0,0.65));
					filter: drop-shadow(2px 2px 5px rgba(0,0,0,0.65));
	max-width: 75px;
	max-height: 75px;
}
.solutions-container a,
.solutions-container a.btn-arrow {
	color: #fff;
}
.solutions-container a.btn-arrow:hover {
	text-shadow: none;
}
.solutions-container .card a > div {
	padding: 2rem 1rem;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-flex-direction: row;
			-ms-flex-direction: row;
					flex-direction: row;
	-webkit-align-items: center;
			-ms-flex-align: center;
					align-items: center;
	-webkit-justify-content: center;
			-ms-flex-pack: center;
					justify-content: center;
}
.solutions-container .card-icon {
	margin-right: 1rem;
}
.solutions-container .card-content > div {
	display: none;
}
#site-footer .site-width:first-of-type {
	border: 0;
}
</style>

<?php get_footer(); ?>
