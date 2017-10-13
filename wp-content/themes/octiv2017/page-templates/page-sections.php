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

<?php get_template_part('partials/module/display', 'page-sections'); ?>
  
<?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>