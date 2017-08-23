<?php
/*
==============================
Template Name: Page Builder
==============================
*/
?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<?php
  if( have_rows('page_section') ):
    while ( have_rows('page_section') ) : the_row();
      if( have_rows('container') ) :
        while ( have_rows('container') ) : the_row();
          if ( get_row_layout() == 'text_only' ) :
            ?>
            <section>
              <div class="site-width">
                <div class="<?php echo get_sub_field('columns'); ?>">
                  <div>
                    <?php echo get_sub_field('text'); ?>
                  </div>
                </div>
              </div>
            </section>
            <?php            
          endif;
          if ( get_row_layout() == 'image_gallery' ) :
            ?>
          <section>
            <div class="site-width">
              <div class="<?php echo get_sub_field('columns'); ?> vertical-align">
                <?php 
                  $images = get_sub_field('images');
                  $size = 'full';
                  if( $images ): ?>
                      <?php foreach( $images as $image ): ?>
                        <div>
                          <img src="<?php echo $image[url]; ?>" alt="">
                        </div>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
              </div>
            </div>
          </section>
            <?php            
          endif;
        endwhile;
      endif;
    endwhile;
  endif;
?>

<style>
  img {
    width: 100%;
  }
</style>

<?php get_footer(); ?>