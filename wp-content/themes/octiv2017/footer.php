<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<?php get_template_part('partials/module/display', 'modals'); ?>

<footer class="site-footer">
  <div class="site-width footer-utility-links">
    <ul class="social-links">
      <li><a href="https://www.linkedin.com/company-beta/10866770/" title="Octiv's LinkedIn Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/linkedin-icon.svg', false, $context); ?></a></li>
      <li><a href="http://twitter.com/octivinc" title="Octiv's Twitter Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/twitter-icon.svg', false, $context); ?></a></li>
      <li><a href="https://www.instagram.com/octivinc/" title="Octiv's Instagram Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/instagram-icon.svg', false, $context); ?></a></li>
      <li><a href="http://facebook.com/OctivInc" title="Octiv's Facebook Page"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/facebook-icon.svg', false, $context); ?></a></li>
    </ul>
    <div class="site-footer-logo">
      <a href="/" title="Home"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/Octiv-Logo.svg', false, $context); ?></a>
    </div>
    <div class="newsletter-subscription-container">
      <a href="http://lp.octiv.com/SubscriptionManagement.html" class="btn-white--outline">Get Our Newsletter</a>
    </div>
  </div>
  <div class="site-width footer-admin-links">
    <div>
      <a href="tel:844-936-2848" class="footer-phone-number"><strong>844-936-2848</strong></a>
      <address>
        54 Monument Circle,<br>Suite 700<br>Indianapolis, IN 46204
      </address>
    </div>
    <?php
        wp_nav_menu(
          array(
            'menu' => 'site-footer',
          )
        );
      ?>
  </div>
  <div class="sub-footer-container">
    <div class="site-width">
      <?php
        wp_nav_menu(
          array(
            'menu' => 'sub-footer-links',
          )
        );
      ?>
      <p>&copy; <?php echo date("Y"); ?> Octiv, Inc. All Rights Reserved.</p>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>

<?php if (is_page_template('page-templates/brand-assets.php')) : ?>
  <script>
    $('aside a').on('click', function(e) {
      e.preventDefault();
      var target = $(this.hash);
      $('html, body').animate({
          scrollTop: target.offset().top - (document.querySelector('.site-header').offsetHeight)
      }, 300);
    });
  </script>
<?php endif; ?>

<?php
    /*
    ==============================
    MAJOR SYSTEM ALERT
    ==============================
    */
    $args = array(
      'post_type' => 'alerts'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post(); ?>

        <script>
          $('.empty-modal .modal-content').html('<?php 
            echo '<div class="modal-header light-callout">';
              echo '<div class="modal-header--brand">';
                echo '<div class="color-boxes">';
                  echo '<h4 class="color-box-headline--gray">' . get_the_title() . '</h4>';
                echo '</div>';
              echo '</div>';
              echo '<div class="modal-header--content has-text-center">';
                echo get_the_content();
              echo '</div>';
            echo '</div>';
            ?>');
          $('.empty-modal').modal();
        </script>

<?php endwhile;
    endif;
    wp_reset_query();
  ?>

</body>
</html>