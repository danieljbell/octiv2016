<?php
$is_external = get_field('external_event');
$external_link = get_field('external_event_link');

if ($external_link) {
  header("Location: $external_link");
}
?>

<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<?php
  // page request variables
  $has_reg = $_GET['reg'];
  $has_first_name = $_GET['first_name'];

  $overview = null;
  $learning_topics = null;
  $event_start_date = null;
  $today = date('Ymd');

  if (get_field('overview')) {
    $overview = get_field('overview');
  }
  if (get_field('learning_topics')) {
    $learning_topics = get_field('learning_topics');
  }
  if (get_field('event_start_date')) {
    $event_start_date = get_field('event_start_date');
  }
?>

<?php get_header(); ?>

<main>
 
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="pad-y-most">
    <div class="site-width">
      <div class="two-third reverse">
        <article>
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
          <?php
            if ($overview) {
              echo '<h4>Overview:</h4>';
              echo '<p>' . strip_tags($overview) . '</p>';
            }
            if ($learning_topics) {
              echo '<h4>What You Will Learn:</h4>';
              echo '<ul>';
              while (have_rows('learning_topics')) : the_row();
                $learning_topic = get_sub_field('learning_topic');
                echo '<li>' . $learning_topic . '</li>';
              endwhile;
              echo '</ul>';
            }
          ?>
          <?php
            if ($event_start_date < $today) {
              echo '<h4>Date Recorded:</h4>';
            } else {
              echo '<h4>Date &amp; Time</h4>';
            }
            $event_start = get_field('event_start_date');
            $event_start = substr($event_start, 0, 4) . '-'. substr($event_start, 4, 2) . '-' . substr($event_start, 6);
            $start_date = date_create($event_start);
            $start_date_year = date_format($start_date,"Y");
            $start_date_month = date_format($start_date,"F");
            $start_date_day = date_format($start_date,"j");
            echo '<p>' . $start_date_month . ' ' . $start_date_day . ', ' . $start_date_year; ?><br><?php echo get_field('event_start_time') . ' - ' . get_field('event_end_time') . '</p>';
          ?>
          <h4>Speakers:</h4>
          <ul class="half speakers-list mar-t">
            <?php
              if (have_rows('speakers')) :
                while (have_rows('speakers')) :
                  the_row(); ?>
                <li class="speaker-item">
                  <div class="person-headshot">
                    <img src="<?php print_r(the_sub_field('speaker_headshot')); ?>" alt="<?php echo the_sub_field('speaker_name'); ?>'s Headshot">
                  </div>
                  <div class="speaker-details">
                    <div>
                      <h5 class="speaker-name"><?php echo the_sub_field('speaker_name'); ?></h5>
                      <p class="speaker-title"><em><?php echo the_sub_field('speaker_title'); ?></em></p>
                      <p class="speaker-company"><?php echo the_sub_field('speaker_company'); ?></p>
                    </div>
                    <?php if (get_sub_field('speaker_twitter') || get_sub_field('speaker_linkedin')) : ?>
                      <ul class="speaker-social no-bull">
                        <?php if (get_sub_field('speaker_twitter')) : ?>
                          <li class="twitter-icon">
                            <a href="<?php echo the_sub_field('speaker_twitter'); ?>" title="<?php echo the_sub_field('speaker_name'); ?>'s Twitter">
                              <?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/twitter-icon.svg', false, $context); ?>
                            </a>
                          </li>
                        <?php endif; ?>
                        <?php if (get_sub_field('speaker_linkedin')) : ?>
                          <li class="linkedin-icon">
                            <a href="<?php echo the_sub_field('speaker_linkedin'); ?>" title="<?php echo the_sub_field('speaker_name'); ?>'s LinkedIn">
                              <?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/linkedin-icon.svg', false, $context); ?>
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
        </article>
        <aside>
          <div class="box--light">
            <?php if ($has_reg) : ?>
              <div class="has-text-center">
                <h2>Thanks, <?php if ($has_first_name) { echo ' ' . $has_first_name; } ?>!</h2>
                <p>We hope you enjoy the webinar!</p>
                <?php
                  if (!get_field('webinar_id')) {
                    echo '<p>You will receive a confirmation email shortly and a reminder to attend email the day of the event.</p>';
                  }
                ?>
              </div>
              <?php else : ?>
                <div class="has-text-center">
                  <h2>Register Now!</h2>
                  <p>Fill out the form below to register.</p>
                </div>
                <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
                <form id="mktoForm_<?php echo get_field('marketo_form_id'); ?>"></form>
                <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo get_field('marketo_form_id'); ?>, function(form) {

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
        </aside>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>