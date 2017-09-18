<?php get_header(); ?>

<?php
  $rand_num = mt_rand(1,4);
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
  <div class="fixed-hero-section centered" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
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
            if (get_field('promoted_item')) {
              $args = array(
                'post_type' => 'any',
                'post__in' => get_field('promoted_item')
              );
              $query = new WP_Query($args);
              if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                  echo '<div class="ad-container" style="background-color: #42b0d8; background-image: linear-gradient(rgba(255,255,255,0.1), rgba(0,0,0,0.1));">'; ?>
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('cover_image'); ?>" alt="<?php the_title(); ?>"></a>
                    <p><strong>Free Download:</strong><br><?php the_title(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn-white-outline">Download Now</a>
                <?php
                  echo '</div>';
                endwhile;
              endif;
              wp_reset_query();
            }
          endif;
          wp_reset_query();
        ?>
      </div>
      <?php
        if (have_rows('screenshots')) :
          echo '<div class="half">';
            echo '<div>';
              the_content();
            echo '</div>';
            echo '<div>';
              if (get_field('has_feature_video')) :
                echo '<div class="box mar-b">';
                  echo '<img src="' . get_field('feature_video_thumbnail') . '" alt="video-thumbnail" class="feature-video-image mar-b">';
                  echo '<h3 class="centered">See ' . get_the_title() . ' in Action</h3>';
                  echo '<div class="feature-video-container">';
                    echo '<p class="centered">Fill out the form below to view a brief demonstration.</p>'; ?>
                    <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
                    <form id="mktoForm_<?php echo get_field('feature_video_marketo_form_id'); ?>"></form>
                    <script>
                      MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo get_field('feature_video_marketo_form_id'); ?>, function(form) {
                        form.onSuccess(function(values, followUpUrl) {
                          form.getFormElem().hide();
                          var videoContainer = document.querySelector('.feature-video-container');
                          var videoHTML = document.querySelector('#video-html');
                          document.querySelector('.feature-video-image').remove();
                          videoContainer.innerHTML = videoHTML.innerHTML;
                          return false;
                        });
                      });
                    </script>
              <?php
                echo '</div>';
                echo '</div>';
                echo '<br />';
                else :
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
              endif;
          echo '</div>';
        else :
          echo '<div>';
            the_content();
          echo '</div>';
        endif;
      ?>
  </div>
</section>

<?php if(get_field('has_datasheet')) : ?>
  <div class="site-width">
    <hr>
  </div>
  <section class="fat-section">
    <div class="site-width">
      <div class="centered">
        <h2><?php echo get_field('datasheet_headline'); ?></h2>
        <p><?php echo get_field('datasheet_subheadline'); ?></p>
        <button class="datasheet-modal-button btn-primary">Get the Full Datasheet</button>
      </div>
    </div>
  </section>
<?php else : ?>
  <div class="site-width">
    <hr>
  </div>
  <?php get_template_part('partials/display', 'recent-resources'); ?>
<?php endif; ?>

<?php if (get_field('has_feature_video')) : ?>
  <div id="video-html">
    <div class="video-outer mar-t">
      <div class="video-inner">
        <iframe src="https://www.youtube.com/embed/<?php echo get_field('feature_video_id'); ?>?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>
      </div>
    </div>
  </div>
<?php endif; ?>

<style>
  .datasheet-promo {
    display: flex;
    align-items: center;
  }
  .datasheet-promo-image {
    flex-shrink: 0;
    margin-right: 1.5rem;
  }
  .datasheet-promo-content {

  }
  .datasheet-promo-content p {
    margin-bottom: 0;
  }
  label[for="subscriptionNewsletter"] .mktoAsterix {
    display: none;
  }
  main p + ul {
    margin-top: -1rem;
    margin-bottom: 1rem;
  }
  main ul {
    margin-bottom: 1rem;
  }
  main ul li {
    padding-bottom: 0;
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
  #video-html,
  #video-form {
    display: none;
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
