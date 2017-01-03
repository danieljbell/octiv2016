<section class="brand-two-callout inline-newsletter cta">
	<div class="site-width">
		<div class="two-third">
			<div>
				<?php if ( is_front_page() || is_page_template( 'page-templates/product-page.php' ) || is_page_template( 'page-templates/page-resources.php' ) ) : ?>
					<h4>Sign up to our newsletter for news and insights to sell smarter.</h4>
				<?php endif; ?>
				<?php if (is_singular('releases')) : ?>
					<h4>Want to stay current with release updates?</h4>
				<?php endif; ?>
			</div>
			<div>
				<?php if (is_front_page()) : ?>
					<iframe src="https://go.pardot.com/l/18292/2016-07-15/4z9c2h" frameborder="0" width="100%" height="75"></iframe>
				<?php elseif (is_page_template( 'page-templates/product-page.php' )) : ?>
					<iframe src="https://go.pardot.com/l/18292/2016-07-15/4z9c8r" frameborder="0" width="100%" height="75"></iframe>
				<?php elseif (is_page_template('page-templates/page-resources.php')) : ?>
					<iframe src="https://go.pardot.com/l/18292/2016-07-15/4z9c8w" frameborder="0" width="100%" height="85"></iframe>
				<?php elseif (is_singular('releases')) : ?>
					<iframe src="https://go.pardot.com/l/18292/2016-07-15/4z9cd1" frameborder="0" width="100%" height="75"></iframe>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>