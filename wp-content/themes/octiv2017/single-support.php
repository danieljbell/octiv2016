<?php
  $url = $_SERVER['REQUEST_URI'];
  $parsed_url = explode( '/', $url );
  $support_category = $parsed_url[2];
  $support_cat_string = explode( '-', $support_category);
  $formatted_cat = ucwords(strtolower($support_cat_string[0] . ' ' . $support_cat_string[1] . ' ' . $support_cat_string[2]));
  $support_topic = $parsed_url[3];
  $support_topic_string = explode( '-', $support_topic );
  $formatted_topic = ucwords(strtolower($support_topic_string[0] . ' ' . $support_topic_string[1]));
  $article_name = $parsed_url[count($parsed_url)-2];
  $article_name_string = explode( '-', $article_name );
  $term_list = wp_get_post_terms($post->ID, 'type', array("fields" => "all"));
?>

<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <?php 
    if ( is_single( 917 ) || $support_topic === '') : 
      get_template_part('partials/pages/display', 'support--parent-page');
    else :
      get_template_part('partials/pages/display', 'support--child-page');
    endif;
  ?>

  <section class="has-text-center pad-t-most mar-y-most">
    <div class="site-width">
      <hr style="margin-top: 0;">
      <h3>Can't find what you're looking for?<br>&nbsp;</h3>
      <button class="btn-primary" id="submit-ticket">Submit a Ticket</button>
    </div>
  </section>

</main>

<?php get_footer(); ?>