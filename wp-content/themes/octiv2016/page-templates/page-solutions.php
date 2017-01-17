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
      <svg fill="#fff" style="filter: drop-shadow(0px 0px 8px rgba(0,0,0,1)); margin-bottom: 1.5rem;">
        <?php
        /*
        ========================================
        NOT RELIABLE CODE, SHOULD BE REWORKED
        ========================================
        */
          if (is_page('1956')) {
            echo '<use xlink:href="#icon-handshake">';
          } else {
            echo '<use xlink:href="#icon-CIOs">';
          }
        ?>
      </svg>
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
$count = 0;
  if (have_rows('page_section')) :
    $total = count(get_field('page_section'));
    while (have_rows('page_section')) :
      $count++;
      the_row();
      $section_title = get_sub_field('section_title');
      $section_title = preg_replace('/&| /', '-', $section_title);
      $section_title = preg_replace('/---/', '-', $section_title);
      $section_title = strtolower($section_title);
      echo '<section class="fat-section" id="' . $section_title . '">';
        echo '<div class="site-width">';
          if ($count % 2 == 0) {
            echo '<div class="half">';
          } else {
            echo '<div class="half-stack">';
          }
            echo '<div class="section-visual">col 1</div>';
            echo '<div class="section-content">';
              echo '<div class="section-icon">';
                echo file_get_contents(get_sub_field('section_icon', true)[url]);
              echo '</div>';
              echo '<div>';
                echo '<h2>' . get_sub_field('section_title') . '</h2>';
                echo '<p>' . get_sub_field('section_content') . '</p>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</section>';
      if ($count < $total) :
        echo '<div class="site-width"><hr></div>';
      endif;
    endwhile;
  endif;
?>

<style>
  .fixed-hero-section {
    background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);
    background-repeat: no-repeat;
    background-size: cover;
  }
  .section-icon svg {
    width: 100%;
    max-width: 75px;
    fill: #42b0d8;
  }
  @media screen and (max-width: 600px) {
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
</style>

<script>
(function() {
  var links = document.querySelectorAll('main .fancy-links a');
  links.forEach(function(link, i) {
    var initialText = link.innerText;
    var replaceText = initialText.replace('&', '-');
    replaceText = replaceText.replace(/ /g, '-');
    replaceText = replaceText.replace('---', '-');
    replaceText = replaceText.toLowerCase();
    links[i].href = '#' + replaceText;
  });
})();
</script>

<?php get_footer(); ?>
