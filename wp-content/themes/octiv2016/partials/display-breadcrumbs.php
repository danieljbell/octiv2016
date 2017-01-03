<?php if (!is_category()) : ?>
	<?php if (!is_author()) : ?>
		<div class="breadcrumb">
			<?php if ( function_exists('yoast_breadcrumb') )
				{yoast_breadcrumb('<div class="site-width">','</div>');}
			?>
		</div>
	<?php else : ?>
		<div class="breadcrumb">
			<div class="site-width">
				<ul>
					<li><a href="/" title="Home">Home</a></li>
					<li><a href="/author" title="All Authors">Authors</a></li>
					<li><?php print_r(get_queried_object()->display_name); ?></li>
				</ul>
			</div>
		</div>
	<?php endif; ?>
<?php else : ?>
	<div class="breadcrumb">
		<div class="site-width">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/resources">Resources</a></li>
				<li><?php single_cat_title(); ?></li>
			</ul>
		</div>
	</div>
<?php endif; ?>
