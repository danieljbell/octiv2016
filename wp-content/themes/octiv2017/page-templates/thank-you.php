<?php
/*
=========================
TEMPLATE NAME: Thank You
=========================
*/

$first_name = $_GET['first_name'];

?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="third">
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 1
        );

        $blog = new WP_Query($args);

        if ($blog->have_posts()) :
          while ($blog->have_posts()) :
            $blog->the_post();
            echo do_shortcode('[get_card thumb="true" excerpt="true" tag="blog"]');
          endwhile;
        endif;

        $args = array(
          'post_type' => 'page',
          'post_parent__in' => array(65,74),
          'posts_per_page' => 2,
        );

        $whitepaper = new WP_Query($args);

        if ($whitepaper->have_posts()) :
          while ($whitepaper->have_posts()) :
            $whitepaper->the_post();
            if ($post->post_parent === 65) {
              $tag = 'whitepapers';
            }
            if ($post->post_parent === 74) {
              $tag = 'client-stories';
            }
            echo do_shortcode('[get_card thumb="true" excerpt="custom" tag="' . $tag . '"]');
          endwhile;
        endif;

      ?>
    </div>
  </div>
</section>

<section>
  <div class="site-width">
    <script>
      var thing = getParameterByName('first_name');
      window.history.replaceState( {} , 'bar', '/thank-you' );

      function getParameterByName(name, url) {
          if (!url) url = window.location.href;
          name = name.replace(/[\[\]]/g, "\\$&");
          var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
              results = regex.exec(url);
          if (!results) return null;
          if (!results[2]) return '';
          return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
    </script>
  </div>
</section>

<?php get_footer(); ?>