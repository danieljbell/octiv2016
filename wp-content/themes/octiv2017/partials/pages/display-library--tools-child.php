<script>
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
</script>

<?php get_header(); ?>

<?php the_content(); ?>

<?php get_footer(); ?>