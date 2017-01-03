<?php get_header(); ?>

<?php if( get_field('status') == 'roadmap' ) : ?>
  <div class="fixed-hero-section" style="background-color: #33ab40;">
    <div class="site-width" style="color: #fff;">
      <h1><?php the_title(); ?></h1>
      <p style="margin-bottom: 0;">Note: This is on the roadmap.</p>
    </div>
  </div>
<?php elseif( get_field('status') == 'beta' ) : ?>
  <div class="fixed-hero-section" style="background-color: #42b0d8;">
    <div class="site-width" style="color: #fff;">
      <h1><?php the_title(); ?></h1>
      <p style="margin-bottom: 0;">Note: This is a beta feature and is not available to the general public.</p>
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
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4><?php the_title(); ?></h4>
        <hr>
        <?php
          if( have_rows('catalog_features') ):
            echo '<ul class="nav sidebar-links">';
              while ( have_rows('catalog_features') ) : the_row();
                  echo '<li><a href="#' . str_replace(' ', '-', strtolower(get_sub_field('feature_title'))) . '">' . get_sub_field('feature_title') . '</a></li>';
              endwhile;
            echo '</ul>';
          endif;
        ?>
      </div>
      <div class="sticky-listing">
        <div class="half">
          <div class="box">
            <h4>Problem</h4>
            <?php 
              echo get_field( 'catalog_problem' ); 
            ?>
          </div>
          <div class="box">
            <h4>Solution</h4>
            <?php 
              echo get_field( 'catalog_solution' ); 
            ?>
          </div>
        </div>
        <?php
          if( have_rows('catalog_features') ):
              while ( have_rows('catalog_features') ) : the_row();
                echo '<section style="padding-top: 0;">';
                echo '<div class="half"><div>';
                echo '<h3 id="' . str_replace(' ', '-', strtolower(get_sub_field('feature_title'))) . '">' . get_sub_field('feature_title') . '</h3>';
                echo '<p>' . get_sub_field('feature_description') . '</p>';
                echo '</div>';
                echo '<div>';
                if (get_sub_field('feature_image')) {
                  echo '<img src="' . get_sub_field('feature_image') . '" alt="image" />';
                }
                echo '</div>';
                echo '</section>';
              endwhile;
          endif;
        ?>
      </div>
  </div>
</section>

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