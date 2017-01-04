<?php
	$queried_object = get_queried_object();
	$content_type = get_field('content_type', $queried_object);
?>

<?php if ($content_type === 'text') : ?>
	<section>
		<div class="site-width">
			<div class="two-third">
				<div>
					<?php the_content(); ?>
					<br>
					<div class="box">
						<h2>Did this article help?</h2>
						<p>Please provide us your feedback below.</p>
						<?php get_template_part('partials/display', 'support-article-feedback'); ?>
					</div>
				</div>
				<div>
					<?php get_sidebar('support'); ?>
				</div>
			</div>
		</div>
	</section>
<?php elseif ($content_type === 'video') : ?>
	<?php $video_source = get_field('video_id', $queried_object); ?>
	<section>
			<div class="site-width">
				<div class="two-third">
					<div>
						<div class="video-outer" style="margin-bottom: 1rem;">
							<div class="video-inner">
								<?php echo '<iframe src="//fast.wistia.net/embed/iframe/' . $video_source . '?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>'; ?>
							</div>
						</div>
						<?php the_content(); ?>
						<div class="box">
							<h2>Did this article help?</h2>
							<p>Please provide us your feedback below.</p>
							<?php get_template_part('partials/display', 'support-article-feedback'); ?>
						</div>
					</div>
					<div>
						<?php get_sidebar('support'); ?>
					</div>
				</div>
			</div>
		</section>
<?php endif; ?>
