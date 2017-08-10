<?php
/*
==============================
SITE HEADER
==============================
*/
?>
<section class="site-header">
  <div class="site-header-main-container">
    <div class="site-width">
      <ul class="site-header-list">
        <li class="hamburger-container">
          <button id="site-header-menu-toggle">Menu</button>
        </li>
        <li class="site-header-logo-container">
          <a href="/" title="Home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/Octiv-Logo.svg" alt="Octiv Logo" class="site-header-logo"></a>
        </li>
        <li class="site-header-rad-button-container">
          <button id="site-head-rad" class="btn-primary">Request A Demo</button>
        </li>
      </ul>
    </div>
  </div>
  <?php
    wp_nav_menu(
      array(
        'menu' => 'site-header',
        'container_class' => 'site-header-mega-menu',
        'menu_class' => 'menu site-width'
      )
    );
  ?>
</section>
