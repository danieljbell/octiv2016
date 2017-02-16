<!-- START MODAL CONTENT -->
<div class="modal fade need-logo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content">
    		<h2>Looking for our Logo?</h2>
    		<p>Below you'll find all of our brand assets and logos. If you have a special request or need help with anything, please reach out to us at <a href="mailto:marketing@octiv.com?subject=Need%20help%20with%20Octiv%20logos">marketing@octiv.com</a>.</p>
				<a href="<?php site_url(); ?>/wp-content/uploads/2016/07/Octiv-Brand-Assets.zip" class="btn-primary">Click to download .zip of assets</a>
    </div>
  </div>
</div>

<div class="modal fade global-search" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content">
        <h2>What Can We Help You Find?</h2>
        <p>Use the textbox below to search for what you need.</p>
        <?php echo do_shortcode('[global_search]'); ?>
    </div>
  </div>
</div>


<div class="modal fade empty-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content">
  		<div class="video-outer">
  			<div class="video-inner">
  				<iframe style="width: 100% !important; height: 100% !important;" src="" name="wistia_embed" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
  			</div>
	    </div>
    </div>
  </div>
</div>

<?php if ( is_page_template( 'page-templates/product-page.php' ) || is_page_template( 'page-templates/page-resources.php' ) || is_front_page() || is_post_type_archive('press-releases') ) : ?>
	<?php if ( $_GET['ref'] === 'tb' ) : ?>
		<div class="modal fade letter-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg">
		  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <div class="modal-content">
		  		<?php echo get_post(590)->post_content; ?>
		    </div>
		  </div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if ( is_singular( 'support' ) || is_post_type_archive( 'support' ) ) : ?>
	<div class="modal fade submit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg">
	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <div class="modal-content">
	    	<h2>Submit a "Help Me" ticket</h2>
	    	<p>Please fill out the form below to submit a ticket to our support team.</p>
	    	<?php get_template_part('partials/display', 'support-form'); ?>
	    </div>
	  </div>
	</div>
<?php endif; ?>

<?php
/*
==============================
EMPTY MODAL FOR SALESHERO
==============================
*/
if ($post->ID === 1501) : ?>
<div class="modal fade empty-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content centered"></div>
  </div>
</div>
<?php endif; ?>
<!-- END MODAL CONTENT -->
