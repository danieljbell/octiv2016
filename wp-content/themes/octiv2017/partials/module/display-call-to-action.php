<?php
/*
==============================
CALL TO ACTION
==============================
*/

if (is_singular('integration')) {
  $section_class = 'brand-callout pad-b-most';
}
?>

<?php
  if (!$section_class) {
    echo '<section id="call-to-action">';
  } else {
    echo '<section id="call-to-action" class="' . $section_class . '">';
  }
?>
  <div class="site-width has-text-center">
    <hr>
    <div class="pad-y-more">
      <?php
        if (get_field('cta_heading_text')) :
          echo '<h2>' . get_field('cta_heading_text') . '</h2>';
        else :
          echo '<h2>Ready to Streamline Your Companies Workflows?</h2>';
        endif;
      ?>
      <?php
        if (get_field('cta_sub_heading_text')) :
          echo '<p>' . get_field('cta_sub_heading_text') . '</p>';
        else :
          echo '<p>Contact us today at <a href="tel:844-936-2848" class="no-style-text-link">844-936-2848</a> to learn more about how Octiv can help you.</p>';
        endif;
      ?>
      <?php
        if (get_field('has_custom_cta_link')) :
          echo '<a href="' . get_field('custom_cta_link_location') . '" class="btn-primary">' . get_field('custom_cta_link_text') . '</a>';
        else :
          echo '<button class="btn-primary rad-modal">Request A Demo</button>';
        endif;
      ?>
    </div>
  </div>  
</section>