<?php
  $number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
?>

<section class="page-sections pad-y-most">
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
        $image_frame_class = get_sub_field('image_frame');
        $section_link = get_sub_field('section_call_to_action_link');
        $image_link = get_sub_field('is_image_linked');
        $image_link_location = get_sub_field('image_link');
        $section_class = 'reverse';
        if ($count % 2 == 0) {
          $section_class = 'swap-order';
        }
        if ($count > 3) {
          $count = 0;
        }
        $current_iteration = $number_formatter->format($count + 2);
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
            <?php

              if (!get_sub_field('is_animation')) {

                if ($image_frame_class === 'browser-window') { echo '<div class="browser-window">'; }
              
                echo '<div class="img-container">';
                  if ($image_link_location) {
                    echo '<a href="' . $image_link_location . '">';
                  }
                  echo '<img src="' . get_sub_field('section_image') . '" alt="' . get_sub_field('section_title') . '">';
                  if ($image_link_location) {
                    echo '</a>';
                  }
                echo '</div>';
                
                if ($image_frame_class) { echo '</div>'; }

              } else {

                $picked_animation = get_sub_field('choose_animation');
                echo '<div>' . do_shortcode('[custom_animation tag="' . $picked_animation . '"]') . '</div>';

              }
            ?>
          </div>
        </div>
        <?php else : 
          $custom_page = get_sub_field('pick_your_page')[0];
          $custom_page_ID = get_sub_field('pick_your_page')[0]->ID;
          $cta_text = 'Learn More';
          $cta_link = get_the_permalink($custom_page_ID);
          $thumb_id = get_post_thumbnail_id(get_sub_field('pick_your_page')[0]->ID);
          $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
          $thumb_url = $thumb_url_array[0];
          $promoted_headline = $custom_page->post_title;
          $promoted_body = $custom_page->post_excerpt;
          $promoted_class = 'page-section-promoted-item';
          $button_class = 'btn-primary';
          if (get_field('hero_image', $custom_page_ID)) {
            $thumb_url = get_field('hero_image', $custom_page_ID);
          }
          if (get_field('hero_title', $custom_page_ID)) {
            $promoted_headline = get_field('hero_title', $custom_page_ID);
          }
          if (get_field('hero_button_text', $custom_page_ID)) {
            $cta_text = get_field('hero_button_text', $custom_page_ID);
          }
          if ($custom_page->post_type === 'client-story') {
            $thumb_url = get_field('client_testimonial_image', $custom_page_ID);
            $promoted_body = get_field('highlighted_quote', $custom_page_ID);
            $promoted_class = 'client-story-quote';
            $company_logo = get_field('client_logo', $custom_page_ID);
            $button_class = 'btn-white--outline';
          }
        ?>
        <div class="<?php echo $promoted_class; ?>" style="background-image: linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo $thumb_url; ?>);">
          <div class="site-width">
            <?php if ($custom_page->post_type === 'client-story') : ?>
              <img src="<?php echo $company_logo; ?>" alt="" class="promoted-item-company-logo">
              <blockquote>
                <p class="quote"><?php echo $promoted_body; ?></p>
                <?php
                  if (get_field('person_headshot', $custom_page_ID)) :
                    echo '<div class="person-details-container has-person-headshot">';
                      echo '<div class="person-headshot">';
                        echo '<img src="' . get_field('person_headshot', $custom_page_ID) . '" alt="">';
                      echo '</div>';
                  else :
                    echo '<div class="person-details-container">';
                  endif;                
                ?>
                <div class="person-details-content">
                  <p class="person-name"><?php echo get_field('person_name', $custom_page_ID); ?></p>
                  <p class="person-title"><?php echo get_field('person_title', $custom_page_ID); ?></p>
                  <p class="person-company"><?php echo get_field('person_company', $custom_page_ID); ?></p>
                </div>
              </blockquote>
              <a href="<?php echo $cta_link; ?>" class="<?php echo $button_class; ?>">Learn More</a>
            <?php else : ?>
              <div class="color-boxes">
                <h2 class="color-box-headline--brand"><?php echo $promoted_headline; ?></h2>
              </div>
              <div class="two-third-only">
                <p><?php echo $promoted_body; ?></p>
                <a href="<?php echo $cta_link; ?>" class="<?php echo $button_class; ?>"><?php echo $cta_text; ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
      </li>
      <?php
        endwhile;
      endif;
    ?>
  </ul>
</section>