<?php get_header(); ?>

<?php
  $feature_status = get_field('status');
?>

<?php if( $feature_status[0] == 'roadmap' ) : ?>
  <div class="fixed-hero-section" style="background-color: #33ab40;">
    <div class="site-width" style="color: #fff;">
      <h1><?php the_title(); ?></h1>
      <p style="margin-bottom: 0;"><em>Note: This is on the roadmap.</em></p>
    </div>
  </div>
<?php elseif( $feature_status[0] == 'beta' ) : ?>
  <div class="fixed-hero-section" style="background-color: #42b0d8;">
    <div class="site-width" style="color: #fff;">
      <h1><?php the_title(); ?></h1>
      <p style="margin-bottom: 0;"><em>Note: This is a beta feature and is not available to the general public.</em></p>
    </div>
  </div>
<?php else : ?>
  <div class="fixed-hero-section">
    <div class="site-width white-text">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
<?php endif; ?>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div>
        <h4><?php
        $taxonomy = get_the_terms($post->ID, 'feature_type');
        print_r($taxonomy[0]->name);
        ?></h4>
        <hr>
        <?php
          $args = array(
            'post_type' => 'features',
            'tax_query' => array(
          		array(
          			'taxonomy' => 'feature_type',
          			'field'    => 'slug',
          			'terms'    => $taxonomy[0]->name,
          		),
          	),
          );
          $query = new WP_Query( $args );
          if ($query->have_posts()) :
            echo '<ul class="sidebar-links">';
            while ($query->have_posts()) :
              $query->the_post();
              if ($post->ID === $wp_query->post->ID) {
                echo '<li><strong class="brand-font">' . get_the_title() . '</strong></li>';
              } else {
                echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
              }
            endwhile;
            echo '</ul>';
          endif;
          wp_reset_query();
        ?>
      </div>
      <div class="half">
        <div>
          <?php the_content(); ?>
        </div>
        <?php
          if (have_rows('screenshots')) :
            echo '<div>';
              echo '<div class="slider" id="catalog-screenshots">';
            while (have_rows('screenshots')) :
              the_row();
              echo '<div class="centered">';
                echo '<h3>' . get_sub_field('screenshot_title') . '</h3><br>';
                echo '<img src="' . get_sub_field('screenshot_image') . '" alt="' . get_sub_field('screenshot_title') . '">';
              echo '</div>';
            endwhile;
              echo '</div>';
              echo '<p class="centered" style="font-size: 0.85em;">Click the image for a larger view</p>';
            echo '</div>';
          endif;
        ?>
      </div>
  </div>
</section>

<style>
  p + ul {
    margin-top: -1rem;
  }
  /*h3 ~ ul {
    margin-top: 0;
  }*/
  .slick-slide {
    box-shadow: none !important;
  }
  .slider img {
    width: 100%;
    margin: 0;
  }
  .slider .slick-slide {
    color: initial;
    padding: 0;
  }
  @media screen and (max-width: 600px) {
    .fourth-3-fourth > div:first-child {
      display: none;
    }
  }
  @media screen and (max-width: 1279px) {
    main .fourth-3-fourth > div:first-child {
      display: none;
    }
    main .fourth-3-fourth > div:nth-child(2) {
      width: 100%;
    }
  }
</style>

<?php if( get_field('status') == 'beta' ) : ?>
  <section class="brand-two-callout">
    <div class="site-width centered">
      <h4>Interested in using this beta feature?</h4>
      <p>Contact your account manager today.</p>
      <a href="#" class="btn-white-outline">Contact</a>
    </div>
  </section>
  <style>
    #site-footer>.site-width:first-of-type {
      border-top: 0;
    }
  </style>
<?php endif; ?>

<?php get_footer(); ?>
