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
              <a href="#0" class="launch-video-modal" data-modal-type="gated" data-modal-id="<?php echo get_field('integration_video_marketo_form_id'); ?>" data-modal-headline="<?php echo get_field('modal_headline'); ?>" data-modal-body="<?php echo get_field('modal_body'); ?>" data-video-provider="youtube" data-video-id="<?php echo get_field('integration_video_id'); ?>">
                <img src="<?php echo get_field('integration_video_thumbnail'); ?>" alt="" style="width: 100%;">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="post-content pad-y-most">
    <div class="site-width">
      <article>
        <div class="two-third-only pad-b-most">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-three">Why Octiv &amp; <?php echo get_the_title(); ?></h2>
          </div>
          <?php echo get_the_content(); ?>
        </div>
        <div class="pad-b-most pad-t-most">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-four">Key Capabilities</h2>
          </div>
          <?php
            if( have_rows('key_capabilities') ):
              echo '<ul class="single-integration--key-capabilities fourth">';
              while ( have_rows('key_capabilities') ) : the_row();
                  echo '<li class="has-text-center">';
                    echo '<div class="single-integration--icon-container">';
                      echo '<img src="/wp-content/uploads/2017/01/yellow-invoices.svg">';
                    echo '</div>';
                    echo '<p>' . get_sub_field('key_capability') . '</p>';
                  echo '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
        </div>
        <div class="two-third-only pad-b-most pad-t-most">
          <div class="color-boxes">
            <h3 class="color-box-headline--brand-five">Technical Requirements</h2>
          </div>
          <?php
            if( have_rows('technical_requirements') ):
              echo '<ul>';
              while ( have_rows('technical_requirements') ) : the_row();
                  echo '<li>' . get_sub_field('technical_requirement') . '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
        </div>
        
        <?php 
          if ($customer_success) :
        ?>
        <div class="pad-b-most pad-t-most">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-two">See Success Stories with <?php echo get_the_title(); ?></h2>
          </div>
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
        </div>
        <?php endif; ?>
        <div class="pad-b-most pad-t-most two-third-only">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-three">About <?php echo get_the_title(); ?></h2>
          </div>
          <p><?php echo get_field('integration_description'); ?></p>
          <p>For more information about <?php echo get_the_title(); ?>, please visit their <a href="<?php echo get_field('integration_link'); ?>" target="_blank" rel="noopener noreferrer">website</a>.</p>
        </div>
      </article>
    </div>
  </section>
  <?php get_template_part('partials/module/display', 'powers-documents'); ?>
</main>

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