<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<?php get_header(); ?>

<main>
  
  <?php echo get_template_part('partials/module/display', 'hero'); ?>

  <?php echo get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <div class="site-width mar-b-most">
    <div class="two-third">
      <section class="single-post-content">
        <?php echo the_content(); ?>  
      </section>
      <aside class="single-post-sidebar">
        asdf
      </aside>
    </div>
    
  </div>

  <?php echo get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

<?php get_footer(); ?>