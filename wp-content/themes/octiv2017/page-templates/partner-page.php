<?php 
/*
==============================
Template Name: Partner Page
==============================
*/

$rand_num = mt_rand(1,4);
$hero_bg = 'url(/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg)';
$page_hero_title = get_the_title();
$page_hero_body = strip_tags(get_the_excerpt());
$number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
?>

<?php get_header(); ?>

<section class="hero" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg), <?php echo $hero_bg; ?>;">
  <div class="site-width">
    <div class="color-boxes">
      <h1 class="color-box-headline--brand-two"><?php echo $page_hero_title; ?></h1>
    </div>
    <h2 class="mar-b"><?php echo $page_hero_body; ?></h2>
    <ul class="button-group">
      <li>
        <a href="#0" class="btn-primary">Become A Partner</a>
      </li>
      <li>
        <a href="https://partners.octiv.com" class="btn-white--outline" target="_blank" rel="noopener noreferrer">Partner Login</a>
      </li>
    </ul>
  </div>
</section>

<section class="pad-y-most single-integration--key-capabilities">
  <div class="site-width">
    <div class="half">
      <?php
        $count = 0;
        if (have_rows('partner_section')) :
          while (have_rows('partner_section')) : the_row();
          $count++;
          if ($count > 3) {
            $count = 0;
          }
          $current_iteration = $number_formatter->format($count + 2);
      ?>
        <div class="has-text-center">
          <div class="single-integration--icon-container">
            <img src="<?php echo get_sub_field('partner_icon'); ?>" alt="<?php echo get_sub_field('partner_title'); ?> Icon">
          </div>
          <div class="color-boxes">
            <h3 class="color-box-headline--brand-<?php echo $current_iteration; ?>"><?php echo get_sub_field('partner_title');?></h3>
          </div>
          <p><?php echo get_sub_field('partner_copy'); ?></p>
          <a href="#0" class="btn-brand-<?php echo $current_iteration; ?>--outline">Link</a>
        </div>    
      <?php      
          endwhile;
        endif;
      ?>
    </div>
  </div>
</section>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

<?php get_footer(); ?>