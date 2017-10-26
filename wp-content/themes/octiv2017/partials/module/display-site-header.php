<?php
/*
==============================
SITE HEADER
==============================
*/
?>
<header class="site-header">
  <div class="site-width">
    <ul class="site-header-top-items">
      <li class="site-header-top-item site-header-logo-container">
        <a href="/" title="Home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/Octiv-Logo.svg" alt="Octiv Logo" class="site-header-logo"></a>
      </li>
      <li class="site-header-top-item site-header-nav-container">
        <nav>
          <ul class="top-level-navigation">
            <?php
              $site_header_items = wp_get_nav_menu_items('site-header');
              $item_iteration = 0;
              foreach ($site_header_items as $item) {
                if ($item->menu_item_parent === '0') {
                  $item_iteration++; ?>
                  <li class="top-level-navigation-item item-<?php echo $item_iteration; ?>"><a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></li>
            <?php
                }
              }
            ?>
          </ul>
        </nav>
      </li>
      <li class="site-header-top-item site-header-rad-container">
        <button id="site-head-rad" class="btn-primary rad-modal" data-modal="rad">Request a Demo</button>
      </li>
      <li class="site-header-top-item site-header-menu-toggle">
        <button class="btn-primary">Menu</button>
      </li>
    </ul>
  </div>
</header>