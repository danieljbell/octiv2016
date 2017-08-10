<?php
/*
==============================
EYEBROW
==============================
*/
?>

<section class="eyebrow">
  <div class="site-width">
    <div class="half-force">
      <div class="eyebrow-phone-number no-mar-b">
        <a href="tel:844-936-2848">844-936-2848</a>
      </div>
      <?php
        wp_nav_menu(
          array(
            'menu' => 'eyebrow_quick_links',
            'container_class' => 'eyebrow-quick-links no-mar-b'
          )
        );
      ?>
    </div>
  </div>
</section>