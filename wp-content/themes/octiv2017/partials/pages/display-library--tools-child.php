<?php 
  if (get_field('remove_header')) {
    get_header('blank');
  }
?>

<script>
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
  
</script>

<?php the_content(); ?>

<?php
  if (get_field('remove_footer')) {
    get_footer('blank');
  }
?>