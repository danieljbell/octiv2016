<?php
/*
========================================
Template Name: Blank Page Remove Params
========================================
*/

$has_reg = $_GET['reg'];
$parent_page = '/?page_id=' . $post->post_parent;

if (!$has_reg || $has_reg != 'true') {
  header("Location: $parent_page");
}

?>

<?php get_header(); ?>

<?php the_content(); ?>

<?php get_footer(); ?>

<script>
  window.onload = getStarted();

  function getStarted() {
    window.history.replaceState( null , null, window.location.pathname );
  }
</script>