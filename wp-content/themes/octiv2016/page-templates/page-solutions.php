<?php
/*
========================================
Template Name: Solutions Child Page
========================================
*/

get_header();

?>

<div class="fixed-hero-section">
  <div class="site-width white-text centered">
      <?php
        $icon = get_field('page_icon', $post->ID, true);
        echo '<div style="max-width: 175px; margin-bottom: 1rem;">' . file_get_contents($icon[url]) . '</div>';
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
    -webkit-filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.75));
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
      -webkit-flex-direction: column;
          -ms-flex-direction: column;
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
