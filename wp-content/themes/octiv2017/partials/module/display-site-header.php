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
          <button id="site-header-menu-toggle" class="hamburger hamburger--slider-r" type="menu">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </li>
        <li class="site-header-logo-container">
          <a href="/" title="Home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/Octiv-Logo.svg" alt="Octiv Logo" class="site-header-logo"></a>
        </li>
        <li class="site-header-rad-button-container">
          <button id="site-head-rad" class="btn-primary rad-modal" data-modal="rad">Request a Demo</button>
        </li>
      </ul>
    </div>
  </div>
  <div class="site-header-mega-menu">
    <div class="site-width">
      <button id="site-head-rad" class="btn-primary rad-modal mar-b" data-modal="rad">Request a Demo</button>
    </div>
    <?php
      wp_nav_menu(
        array(
          'menu' => 'site-header',
          'container' => 'nav',
          'container_class' => 'site-header-mega-menu-admin-links',
          'menu_class' => 'menu site-width'
        )
      );
    ?>
    <div class="site-width mega-menu-promo">
      <hr>
      <ul class="mega-menu-promo-list third">
      <?php 
        $mega_menu_items = wp_get_nav_menu_items('mega-menu-promo');
        foreach ($mega_menu_items as $item) {
          echo '<li class="card card--sidebar">';
            print_r(wp_get_attachment_url( get_post_thumbnail_id($item->ID) ));
            echo '<div class="card-content">';
              echo '<h4><a href="' . $item->url . '">' . $item->title . '</a></h4>';
              echo '<a href="' . $item->url . '" class="btn-arrow">Learn More <span class="arrow">></span></a>';
            echo '</div>';
          echo '</li>';
        }
      ?>
      </ul>
    </div>
  </div>
</section>