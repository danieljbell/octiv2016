<?php 
  $number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
?>

<?php get_header(); ?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="notch">
    <div class="site-width">
      <div class="box--light font-bump has-text-center">
        <?php echo the_content(); ?>
      </div>
    </div>
  </section>

  <section class="page-sections mar-y-most">
    <div class="site-width">
      <ul class="page-section-list">
        <?php
          $count = 0;
          if (have_rows('page_section')) :
            while (have_rows('page_section')) : the_row();
            if (!get_sub_field('is_promoted_item')) {
              $count++;
            }
            $section_title = get_sub_field('section_title');
            $section_content = get_sub_field('section_content');
            $section_link = get_sub_field('section_call_to_action_link');
            $section_class = 'reverse';
            if ($count % 2 == 0) {
              $section_class = 'swap-order';
            }
            if ($count > 4) {
              $count = 1;
            }
            $current_iteration = $number_formatter->format($count + 1);
          ?>
          <li class="page-section-item">
            <?php if (!get_sub_field('is_promoted_item')) : ?>
            <div class="site-width">
              <div class="half vertical-align <?php echo $section_class; ?>">
                <div>
                  <div class="color-boxes">
                    <h2 class="color-box-headline--brand-<?php echo $current_iteration; ?>"><?php echo $section_title; ?></h2>
                  </div>
                  <p><?php echo $section_content; ?></p>
                  <?php if ($section_link) : ?>
                    <a href="<?php echo $section_link; ?>" class="btn-brand-<?php echo $current_iteration; ?>--outline"><?php echo get_sub_field('section_call_to_action_title'); ?></a>
                  <?php endif; ?>
                </div>
                <div class="browser-window">
                  <div>
                    <?php
                      if (get_sub_field('section_browser_window')) {
                        echo '<img src="' . get_sub_field('section_browser_window') . '" alt="' . get_sub_field('section_title') . '">';
                      } else {
                        echo '<img src="' . get_sub_field('section_image') . '" alt="' . get_sub_field('section_title') . '">';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php else : 
              $custom_page = get_sub_field('pick_your_page')[0];
              $custom_page_ID = get_sub_field('pick_your_page')[0]->ID;
              $cta_link = get_the_permalink($custom_page_ID);
              $thumb_id = get_post_thumbnail_id(get_sub_field('pick_your_page')[0]->ID);
              $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
              $thumb_url = $thumb_url_array[0];
            ?>
            <div class="page-section-promoted-item" style="background-image: linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo $thumb_url; ?>);">
              <div class="site-width">
                <div class="color-boxes">
                  <h2 class="color-box-headline--brand"><?php echo $custom_page->post_title; ?></h2>
                </div>
                <p><?php echo $custom_page->post_excerpt; ?></p>
                <a href="<?php echo $cta_link; ?>" class="btn-primary">Learn More</a>
              </div>
            </div>
            <?php endif; ?>
          </li>
          <?php
            endwhile;
          endif;
        ?>
      </ul>
    </div>
  </section>

  <?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>