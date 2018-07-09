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
        <!--<a href="/" title="Home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/Octiv-Logo.svg" alt="Octiv Logo" class="site-header-logo"></a>-->
		  <a href="/" title="Home"><img src="http://octiv.com/wp-content/uploads/2018/06/Octiv-Logo_powerdbyConga.png" alt="Octiv  Powered by Conga Logo" class="site-header-logo"></a>
        <!-- <div class="free-trial-container"><a href="/free-trial">Free Trial</a></div> -->
      </li>
      <li class="site-header-top-item site-header-nav-container">
        <?php
          wp_nav_menu(
            array(
              'menu' => 'site-header',
              'container' => 'nav',
              'items_wrap' => '<ul id="%1$s" class="%2$s top-level-navigation">%3$s</ul>',
            )
          );

        ?>
      </li>
      <li class="site-header-top-item site-header-rad-container">
        <button id="site-head-rad" class="btn-primary rad-modal" data-modal="rad">Request a Demo</button>
      </li>
      <li class="site-header-top-item site-header-menu-toggle hamburger-container">
        <button class="hamburger hamburger--slider-r" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </li>
    </ul>
  </div>
</header>