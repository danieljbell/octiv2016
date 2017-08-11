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
          <button id="site-head-rad" class="btn-primary rad-modal">Request A Demo</button>
        </li>
      </ul>
    </div>
  </div>
  <div class="site-header-mega-menu">
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
    <div class="site-width site-header-mega-menu-query">
      <hr>
      <ul class="third">
        <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
          );
          $query = new WP_Query( $args );
          if ($query->have_posts()) :
            while ($query->have_posts()) :
              $query->the_post();
                echo '<li>' . get_the_title() . '</li>';
            endwhile;
          endif;
          wp_reset_query();
        ?>
      </ul>
    </div>
  </div>
</section>
