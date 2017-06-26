<?php get_header(); ?>

<?php
  // gemme dem URL params
  $has_reg = $_GET['reg'];
  $has_first_name = $_GET['first_name'];
  $terms = wp_get_post_terms($post->ID, 'event_type');
?>

<?php if ($terms[0]->slug === 'online') : ?>
  <?php if (has_post_thumbnail()) : ?>
  <?php if (get_field('webinar_type') === 'product') : ?>
    <div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)), radial-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0)), linear-gradient(rgba(51,171,64,0.6),rgba(51,171,64,0.6)), url(<?php echo the_post_thumbnail_url(); ?>);">
  <?php elseif (get_field('webinar_type') === 'thought-leadership') : ?>
    <div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)), radial-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0)), linear-gradient(rgba(66,176,216,0.6),rgba(66,176,216,0.6)), url(<?php echo the_post_thumbnail_url(); ?>);">
  <?php else : ?> 
    <div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)), radial-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0)), url(<?php echo the_post_thumbnail_url(); ?>);">
  <?php endif; ?>
    
  <?php else : ?>
  <?php if (get_field('webinar_type') === 'client') : ?>
    <div class="fixed-hero-section" style="background-image: radial-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0)), linear-gradient(rgba(185,73,245,0.6),rgba(185,73,245,0.6)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg); background-size: cover, cover, 300px;">
  <?php else : ?>
    <div class="fixed-hero-section">
  <?php endif; ?>
  <?php endif; ?>
    <div class="site-width white-text centered">
      <section>
        <div class="two-third-only">
          <div>
            <h1><?php echo get_the_title(); ?></h1>
            <?php if (get_the_excerpt()) {
              echo '<p class="font-bump" style="margin-bottom: 0;">' . wp_strip_all_tags(get_the_excerpt(), true) . '</p>';
            } ?>
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php get_template_part('partials/display', 'breadcrumbs'); ?>

  <section>
    <div class="site-width">
      <div class="two-third-reversed-stack">
        <div>
          <div class="box">
          <?php if ($has_reg) : ?>
            <div class="centered">
              <h2>Thanks<?php if ($has_first_name) { echo ' ' . $has_first_name; } ?>!</h2>
              <p>We hope you enjoy the webinar!</p>
              <?php
                if (!get_field('webinar_id')) {
                  echo '<p>You will receive a confirmation email shortly and a reminder to attend email the day of the event.</p>';
                }
              ?>
            </div>
            <?php else : ?>
              <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
              <form id="mktoForm_<?php echo get_field('marketo_form_id'); ?>"></form>
              <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo get_field('marketo_form_id'); ?>, function(form) {
                var thing = document.querySelector('label[for="subscriptionNewsletter"]');
                thing.parentElement.classList.add('checkbox-wrap');

                form.onSuccess(function(values, followUpUrl) {
                  // Get the form field values
                  var vals = form.vals();

                  // Update the redirect url with form fields
                  followUpUrl = location.href + '?reg=true&first_name=' + vals.FirstName;

                  // Redirect the page with form field
                  location.href = followUpUrl;

                  // Return false to prevent the submission handler continuing with its own processing
                  return false;
                });
              });</script>
            <?php endif; ?>
          </div>
        </div>
        <div>
          <?php if ($has_reg && get_field('webinar_id')) : ?>
            <div class="video-outer" style="margin-bottom: 2rem;">
              <div class="video-inner">
                <?php
                  if (get_field('webinar_source') === 'youtube') {
                    echo '<iframe src="https://www.youtube.com/embed/' . get_field('webinar_id') . '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>';
                  } else if (get_field('webinar_source') === 'wistia') {
                    echo '<iframe src="//fast.wistia.net/embed/iframe/' . get_field('webinar_id') . '?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>';
                  } else {
                    echo '<iframe src="//www.brainshark.com/salesmanagement/vu?pi=' . get_field('webinar_id') . '" frameborder="0" width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>';
                  }
                ?>
              </div>
            </div>
          <?php endif; ?>
          <h4>Overview</h4>
          <?php echo get_field('overview'); ?>
          <br>
          <h4>Date &amp; Time</h4>
          <?php
            $event_start = get_field('event_start_date');
            $event_start = substr($event_start, 0, 4) . '-'. substr($event_start, 4, 2) . '-' . substr($event_start, 6);
            $start_date = date_create($event_start);
            $start_date_year = date_format($start_date,"Y");
            $start_date_month = date_format($start_date,"F");
            $start_date_day = date_format($start_date,"j");
          ?>
          <p><?php echo $start_date_month . ' ' . $start_date_day . ', ' . $start_date_year; ?><br><?php echo get_field('event_start_time') . ' - ' . get_field('event_end_time'); ?></p>
          <br>
          <h4>Speakers</h4>
          <ul class="half no-bul speakers">
            <?php
              if (have_rows('speakers')) :
                while (have_rows('speakers')) :
                  the_row(); ?>
                <li class="speaker">
                  <div>
                    <img src="<?php print_r(the_sub_field('speaker_headshot')); ?>" alt="<?php echo the_sub_field('speaker_name'); ?>'s Headshot" class="speaker-headshot">
                  </div>
                  <div>
                    <div>
                      <h5><?php echo the_sub_field('speaker_name'); ?></h5>
                      <p><em><?php echo the_sub_field('speaker_title'); ?></em></p>
                      <p><?php echo the_sub_field('speaker_company'); ?></p>
                    </div>
                    <?php if (get_sub_field('speaker_twitter') || get_sub_field('speaker_linkedin')) : ?>
                      <ul class="speaker-social no-bull">
                        <?php if (get_sub_field('speaker_twitter')) : ?>
                          <li>
                            <a href="<?php echo the_sub_field('speaker_twitter'); ?>" title="<?php echo the_sub_field('speaker_name'); ?>'s Twitter">
                              <img src="./wp-content/themes/octiv2016/dist/img/twitter.svg" alt="Twitter">
                            </a>
                          </li>
                        <?php endif; ?>
                        <?php if (get_sub_field('speaker_linkedin')) : ?>
                          <li>
                            <a href="<?php echo the_sub_field('speaker_linkedin'); ?>" title="<?php echo the_sub_field('speaker_name'); ?>'s LinkedIn">
                              <img src="./wp-content/themes/octiv2016/dist/img/linkedin.svg" alt="LinkedIn">
                            </a>
                          </li>
                        <?php endif; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </li>
            <?php
                endwhile;
              endif;
            ?>
          </ul>
          <?php if ($has_reg) :  // testing for webinar id for post event ?>
            <?php
              if (have_rows('q&a')) :
                echo '<div class="question-answer"><h4>Q&amp;A</h4><dl class="accordian">';
                while (have_rows('q&a')) :
                  the_row();
            ?>
            <dt><?php echo get_sub_field('question'); ?></dt>
            <dd><?php echo get_sub_field('answer'); ?></dd>
            <?php
                endwhile;
                echo '</dl></div>';
              endif;
            ?>
          <?php endif; ?>
        </div>   
      </div>
    </div>
  </section>

<?php else : ?>
  
  <?php if (has_post_thumbnail()) : ?>
    <div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), radial-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0)), url(<?php echo the_post_thumbnail_url(); ?>);">
  <?php else : ?>
    <div class="fixed-hero-section">
  <?php endif; ?>
    <div class="site-width white-text centered">
      <section>
        <div class="two-third-only">
          <div>
            <h1><?php echo get_the_title(); ?></h1>
            <?php
              $event_start = get_field('event_start_date');
              $event_start = substr($event_start, 0, 4) . '-'. substr($event_start, 4, 2) . '-' . substr($event_start, 6);
              $start_date = date_create($event_start);
              $start_date_year = date_format($start_date,"Y");
              $start_date_month = date_format($start_date,"F");
              $start_date_day = date_format($start_date,"j");
              if (get_field('event_end_date')) {
                $event_end = get_field('event_end_date');
                $event_end = substr($event_end, 0, 4) . '-'. substr($event_end, 4, 2) . '-' . substr($event_end, 6);
                $end_date = date_create($event_end);
                $end_date_day = date_format($end_date,"j");
              }
              echo '<p class="font-bump">' . $start_date_month . ' ' . $start_date_day . '-' . $end_date_day . ', ' . $start_date_year . '</p>';
            ?>
            <?php
              if (get_field('event_venue')) :
                echo '<p class="font-bump">' . get_field('event_venue') . '</p>';
              endif;
            ?>
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php get_template_part('partials/display', 'breadcrumbs'); ?>

  <section class="fat-section" id="event-agenda">
    <div class="site-width">
      <div class="fourth-3-fourth">
        <div class="sticky-sidebar" id="sticky-sidebar">
          <h4>Agenda By Day</h4>
          <hr>
          <ul class="day-selector-container">
          <?php
            $i = 0;
            if (have_rows('schedule')) {
              while (have_rows('schedule')) {
                $i++;
                the_row();
                echo '<li>';
                  echo '<input type="checkbox" id="day-' . $i . '" checked>';
                  echo '<label for="day-' . $i . '">Day ' . $i . '</label>';
                echo '</li>';
              }
            }
          ?>
          </ul>
        </div>
        <div class="sticky-listing">
          <ul class="event-day-list">
            <?php
              $i = 0;
              if (have_rows('schedule')) {
                while (have_rows('schedule')) {
                  $i++;
                  the_row();
                  echo '<li class="day-' . $i . '">';
                    echo '<h2>Day ' . $i . '<span class="event-day-date">' . get_sub_field('event_day') . '</span></h2>';
                    if (have_rows('event_agenda')) {
                      echo '<ul class="day-' . $i . '-event-list">';
                        while (have_rows('event_agenda')) {
                          the_row();
                          echo '<li class="event-item">';
                            echo '<h3>' . get_sub_field('event_title') . '</h3>';
                            echo '<p class="event-time">' . get_sub_field('event_start') . ' - ' . get_sub_field('event_end') . '</p>';
                            if (get_sub_field('event_description')) {
                              echo '<p>' . get_sub_field('event_description') . '</p>';
                            }
                            if (get_sub_field('event_link')) {
                              echo '<a href="' . get_sub_field('event_link') . '" title="Learn More About ' . get_sub_field('event_title') . '" class="btn-arrow">Learn More</a>';
                            }
                          echo '</li>';
                        }
                      echo '</ul>';
                    }
                  echo '</li>';
                }
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="fat-section brand-callout">
    <div class="site-width">
      <div>asdfdsa</div>
    </div>
  </section>

<?php endif ; ?>

<?php get_footer(); ?>
