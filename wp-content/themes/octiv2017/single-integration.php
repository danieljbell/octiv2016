<?php get_header(); ?>

<?php
  if (get_field('integration_video_id')) {
    $has_video = true;
  }
?>

<?php $customer_success = get_field('client_stories'); ?>

<style>
  .hero {
    background-image: 
      linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0)),
      linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0)),
      url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg),
      linear-gradient(<?php echo get_field('integration_color'); ?>, <?php echo get_field('integration_color'); ?>) !important;
  }
  .plus-sign {
    color: <?php echo get_field('integration_color'); ?>;
  }
</style>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php
    if (!$has_video) {
      get_template_part('partials/module/display', 'breadcrumbs');
    }
  ?>

  <?php if ($has_video) : ?>
    <section class="notch">
      <div class="site-width">
        <div class="two-third-only">
          <div class="box--light">
            <div class="color-boxes">
              <h2 class="color-box-headline--brand-two">See Octiv + <?php echo get_the_title(); ?> in Action</h2>
            </div>
            <div class="two-third-only">
              <p class="has-text-center"><?php echo strip_tags(get_the_excerpt()); ?></p>
              <a href="#0" class="launch-video-modal" data-modal-type="<?php echo get_sub_field('gated_or_ungated'); ?>" data-modal-id="<?php echo get_sub_field('marketo_form_id'); ?>" data-modal-headline="<?php echo get_sub_field('modal_headline'); ?>" data-modal-body="<?php echo get_sub_field('modal_body'); ?>" data-video-provider="<?php echo get_sub_field('video_provider'); ?>" data-video-id="<?php echo get_sub_field('video_id'); ?>">
                <img src="<?php echo get_field('integration_video_thumbnail'); ?>" alt="" style="width: 100%;">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="post-content">
    <div class="site-width">
      <div class="two-third-only">
        <article>
          <h3 id="why">Why Octiv &amp; <?php echo get_the_title(); ?></h3>
          <?php echo get_the_content(); ?>
          
          <h3 id="key-capabilities" class="pad-t">Key Capabilities</h3>
          <?php
            if( have_rows('key_capabilities') ):
              echo '<ul>';
              while ( have_rows('key_capabilities') ) : the_row();
                  echo '<li>' . get_sub_field('key_capability') . '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
          <h3 id="technical-requirements" class="pad-t">Technical Requirements</h3>
          <?php
            if( have_rows('technical_requirements') ):
              echo '<ul>';
              while ( have_rows('technical_requirements') ) : the_row();
                  echo '<li>' . get_sub_field('technical_requirement') . '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
          <?php 
            if ($customer_success) :
          ?>
          <h3 id="customer-success" style="margin-bottom: 0.5rem;">See Success Stories with <?php echo get_the_title(); ?></h3>
          <ul class="customer-success-thumbnails fourth">
            <?php
              foreach($customer_success as $post) :
                setup_postdata($post);
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img src="' . $thumb_url . '" style="border: 1px solid #ccc;"></a></li>';
                wp_reset_postdata();
              endforeach;
            ?>
          </ul>
          <?php endif; ?>
          <h3 id="about" class="pad-t">About <?php echo get_the_title(); ?></h3>
          <p><?php echo get_field('integration_description'); ?></p>
          <p>For more information about <?php echo get_the_title(); ?>, please visit their <a href="<?php echo get_field('integration_link'); ?>" target="_blank" rel="noopener noreferrer">website</a>.</p>
        </article>
      </div>
    </div>
  </section>
  <section class="related-integrations">
    <div class="site-width">
      <hr>
      <h2 class="has-text-center mar-b">Other Integrations You Might Find Interesting</h2>
      <?php
        $args = array(
          'post_type' => 'integration',
          'posts_per_page' => 3
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          echo '<div class="third">';
            while ($query->have_posts()) :
              $query->the_post();
                echo do_shortcode('[get_card_v3 title="false" has_cta_text="false"]');
            endwhile;
          echo '</div>';
        endif;
        wp_reset_query();
      ?>
    </div>
  </section>
  <?php get_template_part('partials/module/display', 'powers-documents'); ?>
</main>

<?php if (get_field('has_integration_video')) : ?>
  <div id="video-html" style="display: none;">
    <div class="video-outer">
      <div class="video-inner">
        <iframe src="https://www.youtube.com/embed/<?php echo get_field('integration_video_id'); ?>?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php get_footer(); ?>





<?php
            /*
            ==============================
            <?php if (get_field('integration_video_id')) : ?>
              <div class="mar-y-more box--light integration-video-container" style="padding: 2rem; border: 1px solid #ccc; border-radius: 3px; box-shadow: 2px 2px 30px rgba(0,0,0,0.1);">
                <?php if ($_GET['demo_auth']) : ?>
                <div class="video-outer">
                  <div class="video-inner">
                    <iframe src="https://www.youtube.com/embed/<?php echo get_field('integration_video_id'); ?>?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>
                  </div>
                </div>
                <?php else : ?>
                  <div class="half">
                    <div class="">
                      <img src="<?php echo get_field('integration_video_thumbnail'); ?>" alt="" style="width: 100%;" class="video-thumbnail">
                    </div>
                    <div>
                      <h4>See Octiv + <?php echo get_the_title(); ?> in Action</h4>
                      <p>Fill out the form below to view a brief demonstration.</p>
                      <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
                      <form id="mktoForm_<?php echo get_field('integration_video_marketo_form_id'); ?>"></form>
                      <script>
                        MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo get_field('integration_video_marketo_form_id'); ?>, function(form) {
                          form.onSuccess(function(values, followUpUrl) {
                            form.getFormElem().hide();
                            var videoContainer = document.querySelector('.integration-video-container');
                            var videoHTML = document.querySelector('#video-html');
                            videoContainer.innerHTML = videoHTML.innerHTML;
                            return false;
                          });
                        });
                      </script>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            ==============================
            */
            
          ?>