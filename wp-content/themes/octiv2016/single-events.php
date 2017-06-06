<?php get_header(); ?>

<?php
  // gemme dem URL params
  $has_reg = $_GET['reg'];
  $has_first_name = $_GET['first_name'];
?>

<?php if (get_field('webinar_type')) : ?>
  <div class="fixed-hero-section">
    <div class="site-width white-text">
      <h1><?php echo get_the_title(); ?></h1>
    </div>
  </div>

  <?php get_template_part('partials/display', 'breadcrumbs'); ?>

  <section>
    <div class="site-width">
      <div class="two-third">
        <div>
          <?php if ($has_reg) : ?>
            <div class="video-outer">
              <div class="video-inner">
                <iframe src="https://www.youtube.com/embed/9F5ByZqkscE?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autohide=1&amp;VQ=HD720" frameborder="0" width="100%" height="100%"></iframe>
              </div>
            </div>
          <?php endif; ?>
          <h4>Overview</h4>
          <?php echo get_field('overview'); ?>
          <br>
          <h4>Date &amp; Time</h4>
          <?php $event_start = get_field('event_start_date');
              $event_start = substr($event_start, 0, 4) . '-'. substr($event_start, 4, 2) . '-' . substr($event_start, 6);
              $start_date = date_create($event_start);
              $start_date_year = date_format($start_date,"Y");
              $start_date_month = date_format($start_date,"F");
              $start_date_day = date_format($start_date,"j"); ?>
          <p><?php echo $start_date_month . ' ' . $start_date_day . ', ' . $start_date_year; ?></p>
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
            <!-- <li class="speaker">
              <div>
                <img src="//fillmurray.com/100/100" alt="" class="speaker-headshot">
              </div>
              <div>
                <div>
                  <h5>Tom Marvel</h5>
                  <p><em>Product Manager</em>Octiv</p>
                </div>
                <ul class="speaker-social no-bull">
                  <li><a href="#0"><img src="./wp-content/themes/octiv2016/dist/img/twitter.svg" alt=""></a></li>
                  <li><a href="#0"><img src="./wp-content/themes/octiv2016/dist/img/linkedin.svg" alt=""></a></li>
                </ul>
              </div>
            </li>
            <li class="speaker">
              <div>
                <img src="//placecage.com/100/100" alt="" class="speaker-headshot">
              </div>
              <div>
                <div>
                  <h5>Amanda Lester</h5>
                  <p><em>Product Marketing Manager</em>Octiv</p>
                </div>
                <ul class="speaker-social no-bull">
                  <li><a href="#0"><img src="./wp-content/themes/octiv2016/dist/img/twitter.svg" alt=""></a></li>
                  <li><a href="#0"><img src="./wp-content/themes/octiv2016/dist/img/linkedin.svg" alt=""></a></li>
                </ul>
              </div>
            </li> -->
          </ul>
          <?php if ($has_reg) :  // testing for webinar id for post event ?>
            <div class="question-answer">
              <h4>Q&amp;A</h4>
              <dl class="accordian">
    						<dt>some question</dt>
    						<dd>some answer</dd>
                <dt>some question</dt>
    						<dd>some answer</dd>
                <dt>some question</dt>
    						<dd>some answer</dd>
              </dl>
            </div>
          <?php endif; ?>
        </div>
        <div>
          <?php if ($has_reg) : ?>
            <div class="box centered">
          <?php else : ?>
            <div class="box">
          <?php endif; ?>
          <?php if ($has_reg) : ?>
              <h2>Thanks<?php if ($has_first_name) { echo ' ' . $has_first_name; } ?>!</h2>
              <p>We hope you enjoy the webinar!</p>
            <?php else : ?>
              <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
              <form id="mktoForm_1041"></form>
              <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1041, function(form) {
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
      </div>
    </div>
  </section>

<?php else : ?>
  I'm an event
<?php endif ; ?>

<?php get_footer(); ?>
