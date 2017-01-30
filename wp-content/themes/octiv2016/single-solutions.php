<?php
  $user = 'octiv';
  $pass = 'D@n13lR0cks!';
  $context = stream_context_create(array(
    'http' => array(
      'header'  => "Authorization: Basic " . base64_encode("$username:$password")
    )
  ));
  $get_page_icon = get_field('page_icon');
  $page_icon_url = $get_page_icon[url];
  $page_icon = file_get_contents($page_icon_url, false, $context);
?>

<?php get_header(); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text centered">
      <?php
        $icon = get_field('page_icon', true);
        print_r($icon);
        echo '<div style="max-width: 175px; margin-bottom: 1rem;">';
          echo $page_icon;
        echo '</div>';
      ?>
      <h1><?php echo the_title(); ?></h1>
      <div class="font-bump two-third-only" style="margin-top: 0.5rem;">
        <div class="font-bump fancy-links">
          <?php the_content(); ?>
        </div>
      </div>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<?php
  if (have_rows('page_section')) :
    echo '
      <section class="fat-section">
        <div class="site-width">
          <div class="half">
    ';
    while (have_rows('page_section')) :
      the_row();
      $section_title = get_sub_field('section_title');
      $section_title = preg_replace('/&| |,/', '-', $section_title);
      $section_title = preg_replace('/---|--/', '-', $section_title);
      $section_title = strtolower($section_title);
      $icon_file = get_sub_field('section_icon', true);
      echo '
        <div class="section-content" id="' . $section_title . '">
          <div class="section-icon">
          ' . file_get_contents($icon_file[url]) . '
          </div>
          <div>
            <h2>' . get_sub_field('section_title') . '</h2>
            <p>' . get_sub_field('section_content') . '</p>
          </div>
        </div>
      ';
    endwhile;
    echo '
          </div>
        </div>
      </section>
    ';
  endif;

// $count = 0;
//   if (have_rows('page_section')) :
//     $total = count(get_field('page_section'));
//     while (have_rows('page_section')) :
//       $count++;
//       the_row();
//       $section_title = get_sub_field('section_title');
//       $section_title = preg_replace('/&| |,/', '-', $section_title);
//       $section_title = preg_replace('/---|--/', '-', $section_title);
//       $section_title = strtolower($section_title);
// 			$visual_type = get_sub_field('visual_type');
// 			$overlay = get_sub_field('section_background_overlay');
// 			if ($visual_type[0] === 'Background') {
// 				if ($overlay != 1) {
// 					echo '<section class="fat-section white-text" id="' . $section_title . '" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(' . get_sub_field('section_background') . ');">';
// 				} else {
// 					echo '<section class="fat-section white-text" id="' . $section_title . '" style="background-image: url(' . get_sub_field('section_background') . ');">';
// 				}
// 			} else {
// 				echo '<section class="fat-section" id="' . $section_title . '">';
// 			}
//         echo '<div class="site-width">';
//           if ($count % 2 == 0) {
// 						echo '<div class="half">';
//           } else {
// 						echo '<div class="half-stack">';
//           }
// 						if ($visual_type[0] != 'Background') {
// 							echo '<div class="section-visual browser-window">';
// 								echo '<div style="padding: 0;"><img src="' . get_sub_field('section_browser_window') . '" alt="' . get_sub_field('section_title') . '"></div>';
// 							echo '</div>';
// 						} else {
// 							echo '<div class="section-visual"></div>';
// 						}
//             echo '<div class="section-content">';
// 							echo '<div class="section-icon">';
// 								if (get_sub_field('section_icon')) {
// 									$icon_file = get_sub_field('section_icon', true);
// 									echo file_get_contents($icon_file[url]);
// 								}
// 							echo '</div>';
//               echo '<div>';
//                 echo '<h2>' . get_sub_field('section_title') . '</h2>';
//                 echo '<p>' . get_sub_field('section_content') . '</p>';
// 								if (get_sub_field('section_call_to_action_title')) {
// 									if ($visual_type[0] != 'Background') {
// 										echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow">' . get_sub_field('section_call_to_action_title') . '</a>';
// 									} else {
// 										echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow" style="color: #fff; text-shadow: none;">' . get_sub_field('section_call_to_action_title') . '</a>';
// 									}
// 								}
//               echo '</div>';
//             echo '</div>';
//           echo '</div>';
//         echo '</div>';
//       echo '</section>';
//       if ($count < $total) :
// 				if ($visual_type[0] != 'Background') {
// 					echo '<div class="site-width"><hr></div>';
// 				}
//       endif;
//     endwhile;
//   endif;
?>

<section class="callout solutions-container" style="background-color: #f0f0f0; background-image: linear-gradient(#f0f0f0, #eee);">
  <div class="site-width">
    <h2 class="centered">See What Octiv Can Do</h2>
    <br>
    <br>
    <?php
      $terms = get_terms( array(
        'taxonomy' => 'feature_type',
        'orderby' => 'id',
        'hide_empty' => false,
      ) );
      echo '<div class="third">';
        foreach ( $terms as $term ) {
          echo '<div class="card"><div class="centered"><a href="/platform/features/#' . $term->slug . '">' . $term->name . '</a></div></div>';
        }
      echo '</div>';
    ?>
  </div>
</section>

<style>
  #site-footer .site-width:nth-of-type(1) {
    border-top: 0;
  }
  .fixed-hero-section {
    background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);
    background-repeat: no-repeat;
    background-size: cover;
  }
  .fixed-hero-section svg {
    fill: #ffffff;
    filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.75));
  }
  .section-icon svg {
    width: 100%;
    max-width: 75px;
    fill: #42b0d8;
  }
  /*main .half-stack,
	main .half {
		align-items: center;
	}*/
  .fat-section .section-content:nth-of-type(2) .section-icon svg {
    fill: #33ab40;
  }
  .fat-section .section-content:nth-of-type(3) .section-icon svg {
    fill: #b949f5;
  }
  .fat-section .section-content:nth-of-type(4) .section-icon svg {
    fill: #ed4c06;
  }
  @media screen and (max-width: 600px) {
    .section-content  {
      flex-direction: column;
    }
    .section-icon {
      margin-bottom: 0.5rem;
      text-align: center;
    }
    .section-icon svg {
      max-width: 125px;
    }
  }

  /*.solutions-container .card {
		color: #fff;
		text-shadow: 2px 2px 3px rgba(0,0,0,0.85);
		background-size: cover;
		background-position: center;
		overflow: hidden;
	}
	.solutions-container svg {
		width: 100%;
		fill: #fff;
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
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: center;
	}
	.solutions-container .card-icon {
		margin-right: 1rem;
	}
	.solutions-container .card-content > div {
		display: none;
	}*/
</style>

<script>
(function() {
  var links = document.querySelectorAll('main .fancy-links a');
  for (var i = 0; i < links.length; i++) {
    var initialText = links[i].innerText;
    var replaceText = initialText.replace('&', '-');
    replaceText = replaceText.replace(/ /g, '-');
    replaceText = replaceText.replace('---', '-');
    replaceText = replaceText.toLowerCase();
    links[i].href = '#' + replaceText;
  }
})();
</script>

<?php get_footer(); ?>
