<?php get_header(); ?>

<?php
  $boilerplate = get_field('boilerplate', 'option', false);
  $contact_name = get_field('contact_name', 'option');
  $contact_phone_number = get_field('contact_phone_number', 'option');
  $contact_phone_number_link = $contact_phone_number;
  $contact_email_address = get_field('contact_email_address', 'option');
?>


<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section class="pad-b-most">
    <div class="site-width">
      <div class="two-third-only">
        <article>
          <?php the_content(); ?>
          <hr>
          <h3>About Octiv</h3>
          <p><?php echo $boilerplate; ?></p>
          <p></p>
          <p><strong>Media Contact</strong><br><?php echo $contact_name; ?><br><a href="tel:<?php echo $contact_phone_number; ?>"><?php echo $contact_phone_number; ?></a><br><a href="mailto:<?php echo $contact_email_address; ?>"><?php echo $contact_email_address; ?></a></p>
        </article>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>

<?php
/*
==============================
<aside>
  <h4>Other Recent Press Releases</h4>
  <hr style="margin: 0;">
  <?php
    $args = array(
      'post_type' => 'press-releases',
      'posts_per_page' => 5
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
      echo '<ul class="press-sidebar-links">';
      while ($query->have_posts()) : $query->the_post();
        echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
      endwhile;
      echo '</ul>';
      echo '<div class="has-text-center">';
        echo '<a href="/press-releases" class="btn-brand--outline" title="View All Press Releases">View All Press Releases</a>';
      echo '</div>';
    endif;
  ?>
</aside>
==============================
*/
?>