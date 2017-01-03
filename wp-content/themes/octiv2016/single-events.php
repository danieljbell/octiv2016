<?php get_header(); ?>
<?php // CONFERENCE LAYOUT ?>
  <?php
    // test for industry conference in term slug
    $term = get_the_terms($post->ID, 'event_type');
    if ($term[0]->slug === 'industry-conference') :
  ?>

  <div class="fixed-hero-section">
    <div class="site-width white-text centered">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>

  <?php get_template_part('partials/display', 'breadcrumbs'); ?>



  <?php
  $schedule_heading = get_field('schedule_heading');
    if (have_rows('schedule')) :
      echo '<section><div class="site-width">';
      if ($schedule_heading) : 
        echo '<h2 style="padding: 1rem 0 2rem;" class="centered">' . $schedule_heading . '</h2>';
      endif;
      echo '<div class="slider">';
      while (have_rows('schedule')) :
        echo '<div>';
        the_row();
        if (have_rows('day')) :
          echo '<div class="fourth-3-fourth">';
          while (have_rows('day')) :
            the_row();
                echo '<div>time';
                echo '</div>';
                echo '<div>';
                  echo '<h3>' . get_sub_field('event_title') . '</h3>';
                  echo '<h4>' . get_sub_field('event_location') . '</h4>';
                  echo '<p>' . get_sub_field('event_description') . '<p>';
                echo '</div>';
          endwhile;
          echo '</div>';
        endif;
        echo '</div>';
      endwhile;
      echo '</div></div></section>';
    endif;
  ?>

  <?php
    if (get_field('event_connect')) :
      echo '<section class="brand-two-callout">';
        echo '<div class="site-width">';
          echo '<div class="half">';
            echo '<div>';
              echo '<h2>' . get_field('event_connect_title') . '</h2>';
              echo '<p>' . get_field('event_connect_description') . '</p>';
            echo '</div>';
            echo '<div>';
              echo '<iframe src="' . get_field('event_connect_form') . '" width="100%" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</section>';
    endif;
  ?>

  <?php
  $count = 0;
    if (have_rows('special_event')) :
      while (have_rows('special_event')) :
        $count++;
        the_row();
          echo '<section class="dark-callout"';
            if (get_sub_field('special_event_background')) :
              echo 'style="background-image: url(' . get_sub_field('special_event_image') . ');"';
            endif;
          echo '>';
            echo '<div class="site-width">';
              if ($count % 2 == 0) {
                echo '<div class="half">';
              } else {
                echo '<div class="half-stack">';
              }
                echo '<div class="white-text">';
                  echo '<h2>' . get_sub_field('special_event_title') . '</h2>';
                  echo '<p>' . get_sub_field('special_event_location') . '&nbsp;|&nbsp;' . get_sub_field('special_event_date') . '&nbsp;|&nbsp;' . get_sub_field('special_event_time') . '</p>';
                  echo '<p>' . get_sub_field('special_event_description') . '</p>';
                echo '</div>';
                echo '<div class="box" style="color: #000;">';
                  echo '<iframe src="' . get_sub_field('special_event_form') . '" width="100%" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          echo '</section>';
      endwhile;
    endif;
  ?>

  <?php
    if (get_field('cta_title')) :
      echo '<section class="callout" style="border-top: 1px solid #ccc;">';
        echo '<div class="site-width centered">';
          echo '<h2>' . get_field('cta_title') . '</h2>';
          echo '<p>' . get_field('cta_subtitle') . '</p>';
          echo '<a href="' . get_field('cta_subtitle') . '" class="btn-primary">' . get_field('cta_button_text') . '</a>';
        echo '</div>';
      echo '</section>';
    endif;
  ?>

  <style>
    .fixed-hero-section {
      background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);
      background-repeat: no-repeat;
      background-size: 110%;
      padding: 0 0;
    }
    @media screen and (min-width: 767px) {
      .fixed-hero-section {
        background-position: center;
        background-size: cover;
        padding: 6rem 0; 
      }
    }

    .slider .slick-slide {
      box-shadow: none;
      color: #000;
    }
    .slider p {
      font-size: 1rem;
    }
    .slider .slick-slide h4 {
      font-size: 1.4rem;
      margin-bottom: 0;
    }
  </style>


  <?php endif; ?>

<?php // CLIENT WEBINAR LAYOUT ?>
  <?php
    // test for webinar in term slug
    $term = get_the_terms($post->ID, 'event_type');
    if ($term[0]->slug === 'webinar') :
    $webinar_source = get_field('webinar_source', $queried_object);
  ?>
    <div class="fixed-hero-section">
      <div class="site-width white-text">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
    
    <?php get_template_part('partials/display', 'breadcrumbs'); ?>



    <?php if ($webinar_source) : ?>
      <section>
        <div class="site-width">
          <div class="fourth-3-fourth">
            <div class="sticky-sidebar">
              <h4>Webinars</h4>
              <hr>
              <?php
                $args = array(
                  'post_type' => 'events', 
                  'posts_per_page' => 3,
                  'post__not_in' => array($post->ID)
                );
                if ( have_posts() ) :
                  while ( have_posts() ) :
                    the_post();
                      echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
                  endwhile;
                endif;
                wp_reset_query();
              ?>    
            </div>
            <div>
              <div class="video-outer">
                <div class="video-inner">
                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $webinar_source?>?rel=0&showinfo=0&modestbranding=1&autohide=1&vq=hd720" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <br>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>
    <?php else : ?>
      <section>
        <div class="site-width">
          <div class="two-third">
            <div>
              <?php the_post_thumbnail(); ?>
              <br>
              <?php the_content(); ?>
            </div>
            <div>
              <?php get_sidebar('landing-form'); ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

  <?php endif; ?>

<?php get_footer(); ?>