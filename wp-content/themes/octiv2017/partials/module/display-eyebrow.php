<?php
/*
==============================
EYEBROW
==============================
*/
?>

<section class="eyebrow">
  <div class="site-width">
    <div class="eyebrow-phone-number no-mar-b">
      <a href="tel:844-936-2848" title="Call Us Today: 844-936-2848"><img src="<?php echo get_stylesheet_directory_URI(); ?>/dist/img/phone-icon.svg" alt="Phone Icon" class="eyebrow-phone-icon">844-936-2848</a>
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
</section>