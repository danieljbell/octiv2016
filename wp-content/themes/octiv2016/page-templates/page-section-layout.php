<?php
/*
===================================
TEMPLATE NAME: Page Section Layout
===================================
*/
?>

<?php get_header(); ?>

<?php
	if ($post->post_title === "Why Octiv") :
		echo '
			<div class="fixed-hero-section">
				<div class="site-width white-text centered">
					<div class="two-third-only">
						<div class="font-bump">
							<h1 style="margin-bottom: 0.5rem;">Clients Love Octiv. And It\'s Mutual</h1>
							<div class="font-bump fancy-links">
								' . get_the_content() . '
							</div>
						</div>
					</div>
				</div>
			</div>
		';
	else :
		echo '
			<div class="fixed-hero-section">
				<div class="site-width white-text centered">
					<div class="two-third-only">
						<div class="font-bump">
							<h1 style="margin-bottom: 0.5rem;">' . get_the_title() . '</h1>
							<div class="font-bump fancy-links">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		';
	endif;
?>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

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
					echo '<section class="fat-section white-text" id="' . $section_title . '" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(' . get_sub_field('section_background') . ');">';
				} else {
					echo '<section class="fat-section white-text" id="' . $section_title . '" style="background-image: url(' . get_sub_field('section_background') . ');">';
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
									echo file_get_contents($icon_file[url]);
								}
							echo '</div>';
              echo '<div>';
                echo '<h2>' . get_sub_field('section_title') . '</h2>';
                echo '<p>' . get_sub_field('section_content') . '</p>';
								if (get_sub_field('section_call_to_action_title')) {
									if ($visual_type[0] != 'Background') {
										echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow">' . get_sub_field('section_call_to_action_title') . '</a>';
									} else {
										echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow" style="color: #fff; text-shadow: none;">' . get_sub_field('section_call_to_action_title') . '</a>';
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

<style>
.fixed-hero-section {
  padding: 2rem 0;
}

.fat-section.white-text {
  background-size: cover;
  background-position: center;
  color: #fff;
  margin-top: -1rem;
}
main .half-stack,
main .half {
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
.fat-section:nth-of-type(2) .section-icon svg {
  fill: #33ab40;
}
.fat-section:nth-of-type(3) .section-icon svg {
  fill: #b949f5;
}
.fat-section:nth-of-type(4) .section-icon svg {
  fill: #ed4c06;
}
.fat-section:nth-of-type(5) .section-icon svg {
  fill: #fac500;
}

.fixed-hero-section .two-third-only > div,
.fixed-hero-section .two-third-only > div p {
  margin-bottom: 0;
}
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
