<?php
/*
===================================
TEMPLATE NAME: Page Sections
===================================
*/
$number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);

?>

<?php get_header(); ?>

<main>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section class="page-sections pad-y-most">
  <ul class="page-section-list">
    <?php
      if (have_rows('page_section')) :
        while (have_rows('page_section')) : the_row();
          get_template_part('partials/module/display', 'page-sections');
        endwhile;
      endif;
    ?>
  </ul>
</section>
  
<?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>