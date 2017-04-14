</main>

<section id="site-footer" style="padding-bottom: 0;">
	<div class="site-width">
		<div class="two-third-reversed">
			<div style="margin-bottom: 0;">
				<a href="/" title="Homepage" class="site-logo footer-logo"></a>
				<p><a href="tel:844-936-2848" style="color: inherit;">844.936.2848</a></p>
				<p>54 Monument Circle, Suite 200<br>Indianapolis, IN 46204</p>
			</div>
			<div class="fourth">
				<div>
					<h5><a href="/platform" style="color: #555;">Platform</a></h5>
					<ul>
						<li><a href="/platform/features">Features</a></li>
						<li><a href="/platform/integrations">Integrations</a></li>
						<li><a href="/releases">Releases</a></li>
						<li><a href="/support">Support</a></li>
					</ul>
				</div>
				<div>
					<h5><a href="/solutions" style="color: #555;">Solutions</a></h5>
					<?php
						$args = array(
							'post_type' => 'solutions',
							'order' => 'ASC',
							'order_by' => 'name'
						);
						$solutions_query = new WP_Query($args);
						if ($solutions_query->have_posts()) :
							echo '<ul>';
							while ($solutions_query->have_posts()) :
								$solutions_query->the_post();
								echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
							endwhile;
							echo '</ul>';
						endif;
						wp_reset_query();
					?>
				</div>
				<!-- <div>
					<h5>Why Octiv</h5>
					<ul>
						<li><a href="/why-octiv">Overview</a></li>
						<li><a href="#">Vs. Savo</a></li>
						<li><a href="#">Vs. Qvidian</a></li>
						<li><a href="#">Vs. Seismic</a></li>
					</ul>
				</div> -->
				<div>
					<h5><a href="/resources" style="color: #555;">Resources</a></h5>
					<ul>
						<li><a href="/resources/blog">Blog</a></li>
						<li><a href="/resources/client-stories">Client Stories</a></li>
						<li><a href="/resources/webinars">Webinars</a></li>
						<li><a href="/resources/whitepapers">Whitepapers</a></li>
					</ul>
				</div>
				<div>
					<h5><a href="/company" style="color: #555;">Company</a></h5>
					<ul>
						<li><a href="/company/#leadership">Leadership</a></li>
						<li><a href="/company/#board-of-directors">Board of Directors</a></li>
						<li><a href="/company/careers">Careers</a></li>
						<li><a href="/press-releases">Press</a></li>
						<li><a href="/contact-us">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="site-width">
		<hr>
		<div class="half" style="padding-top: 0.5rem;">
			<div style="margin-bottom: 0;">
				<ul class="inline">
					<li style="width: 100%; max-width: 25px;"><a href="http://twitter.com/octivinc" target="_blank" title="Twitter"><img src="./wp-content/themes/octiv2016/dist/img/twitter.svg" alt=""></a></li>
					<li style="width: 100%; max-width: 25px;"><a href="http://facebook.com/OctivInc" target="_blank" title="Facebook"><img src="./wp-content/themes/octiv2016/dist/img/facebook.svg" alt=""></a></li>
					<li style="width: 100%; max-width: 25px;"><a href="http://linkedin.com/company/octiv" target="_blank" title="LinkedIn"><img src="./wp-content/themes/octiv2016/dist/img/linkedin.svg" alt=""></a></li>
					<li><a href="/company/privacy">Privacy</a></li>
					<li><a href="/company/terms-conditions">Terms &amp; Conditions</a></li>
				</ul>
			</div>
			<div class="footer-copyright" style="margin-bottom: 0;">
				<p class="text-right">&copy; <?php echo get_the_date('Y'); ?> Octiv, Inc. All Rights Reserved.</p>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/display', 'modals'); ?>

<?php wp_footer(); ?>

<?php if (is_page( 571 )) : ?>
<!-- Snowplow starts plowing -->
<script type="text/javascript">

    ;(function(p,l,o,w,i,n,g){if(!p[i]){p.GlobalSnowplowNamespace=p.GlobalSnowplowNamespace||[];
    p.GlobalSnowplowNamespace.push(i);p[i]=function(){(p[i].q=p[i].q||[]).push(arguments)
    };p[i].q=p[i].q||[];n=l.createElement(o);g=l.getElementsByTagName(o)[0];n.async=1;
    n.src=w;g.parentNode.insertBefore(n,g)}}(window,document,"script","//d26x5ounzdjojj.cloudfront.net/2.5.3/sp.js","snowplow"));

    window.snowplow('newTracker', 'co', 'collector.thebigwillow.work', {
      appId: 'Lcb2b08dcf743499d',
      platform: 'web',
      contexts: {
        webPage: true
      }
    });
    window.snowplow('enableActivityTracking', 30, 30);
    window.snowplow('enableLinkClickTracking');
    window.snowplow('trackPageView');
</script>
<!-- Snowplow stop plowing -->

<?php endif; ?>


<?php
$queried_object = get_queried_object();
$inline_script = get_field('script', $queried_object);
	if ($inline_script) :
		echo '<script>' . $inline_script . '</script>';
	endif;
?>

<?php if ( is_page_template( 'page-templates/page-resources.php' ) ) : ?>
	<script>
		function getParameterByName(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		var ref = getParameterByName('ref');

		if (ref === 'tinderbox') {
			var modalContent = $('.letter-modal');
			modalContent.modal();
		};
	</script>
<?php endif; ?>

<?php if ( is_front_page() ) : ?>
	<script>
		function getParameterByName(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		var ref = getParameterByName('ref');

		if (ref === 'tinderbox') {
			var modalContent = $('.letter-modal');
			modalContent.modal();
		};

	</script>
<?php endif; ?>

<?php if ( is_post_type_archive('press-releases') ) : ?>
	<script>
		function getParameterByName(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		var ref = getParameterByName('ref');

		if (ref === 'tinderbox') {
			var modalContent = $('.letter-modal');
			modalContent.modal();
		};

	</script>
<?php endif; ?>


<?php if ( is_singular( 'support' ) || is_post_type_archive( 'support' ) ) : ?>
	<script>
		function getParameterByName(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		var submitTicket = getParameterByName('submitTicket');

		if (submitTicket === 'true') {
			var modalContent = $('.submit-modal');
			modalContent.modal();
	    window.history.pushState( {} , 'bar', '/support' );
		}
	</script>

	<?php
		/*
		==============================
		MAJOR SYSTEM ALERT
		==============================
		*/
		$args = array(
			'post_type' => 'alerts'
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) :
			while ($query->have_posts()) :
				$query->the_post(); ?>

				<script>
					$('.empty-modal .modal-content').html('<?php echo "<div class=\"centered\"><div class=\"half-only\"><div style=\"margin-bottom: 0;\">" . "<h3>" . get_the_title() . "</h3>" . "<div>" . get_the_content() . "</div>" . "</div></div></div>"; ?>');
					$('.empty-modal').modal();
				</script>

<?php endwhile;
		endif;
		wp_reset_query();
	?>


<?php endif; ?>

<?php if ($post->post_parent === 144) : ?>
	<script src="https://boards.greenhouse.io/embed/job_board/js?for=octiv"></script>
<?php endif; ?>

<?php // ADD NEW SLIDER INSTANCE FOR EVENT CHILD PAGES
	if ($post->post_parent === 1496) : ?>
<script>
	$(document).ready(function() {

	  $(".owl-carousel-events").owlCarousel({
      loop:true,
	    responsiveClass:true,
	    items:1,
	    dots: true,
	    autoHeight:true
	  });

	});
</script>
<?php endif; ?>

<?php // ADD URL PARAM FUNCTIONALITY FOR #SALESHERO
	if ($post->ID === 1501) : ?>
<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
<script>
	/*
	==============================
	FANCY NAME MANIPULATION
	==============================
	*/
	$('#field45619509').on('keyup', function() {
		var heroName = $(this).val();
		$('#label45624030').html('Why Is ' + heroName + ' Your #SalesHero?');
	});



	/*
	=============================================
	THE BELOW IS EXECUTED WHEN THE PAGE RETURNS
	=============================================
	*/
	function getParameterByName(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		var submitFirstName = getParameterByName('your_first_name');
		var heroFirstName = getParameterByName('hero_first_name');
		var heroLastName = getParameterByName('hero_last_name');
		var heroTwitter = getParameterByName('hero_twitter_handle');

		if (submitFirstName != null) {
			var modalContent = $('.empty-modal');
			var modalTwitterHTML =
				'<h2>Thanks ' + submitFirstName + ' for nominating ' + heroFirstName + '!</h2>' +
				'<p style="margin-bottom: 0;">Don&#39;t forget to share the love on social using #SalesHero</p>' +
				'<div class="post-sharing">' +
				'<a href="http://twitter.com/intent/tweet?url=https://octiv.com/saleshero/&amp;text=I just nominated @' + heroTwitter + ' as my %23SalesHero. Nominate your hero now!" target="_blank"><img src="/wp-content/uploads/2016/07/twitter.png" alt="Twitter" style="max-width: 25px;"></a>' +
				'<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://octiv.com/saleshero&amp;title=Nominate Your %23SalesHero Today!" target="_blank"><img src="/wp-content/uploads/2016/07/linkedin.png" alt="LinkedIn" style="max-width: 25px;"></a>' +
				'<a href="http://www.facebook.com/sharer.php?s=100&p[url]=https://octiv.com/saleshero&p[images][0]=https://octiv.com/wp-content/uploads/2016/09/search-functionality.jpg&p[title]=%23SalesHero&p[summary]=Nominate%20Your%20%23SalesHero%20Today!" target="_blank"><img src="https://octiv.com/wp-content/uploads/2016/07/Facebook.png" alt="Facebook"></a>' +
				'</div>';
			var modalNoTwitterHTML =
				'<h2>Thanks ' + submitFirstName + ' for nominating ' + heroFirstName + '!</h2>' +
				'<p>Don&#39;t forget to share the love on social using #SalesHero</p>' +
				'<div class="post-sharing">' +
				'<a href="http://twitter.com/intent/tweet?url=https://octiv.com/saleshero/&amp;text=I just nominated ' + heroFirstName + ' ' + heroLastName + ' as my %23SalesHero. Nominate your hero now!" target="_blank"><img src="/wp-content/uploads/2016/07/twitter.png" alt="Twitter" style="max-width: 25px;"></a>' +
				'<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://octiv.com/saleshero&amp;title=Nominate Your %23SalesHero Today!" target="_blank"><img src="/wp-content/uploads/2016/07/linkedin.png" alt="LinkedIn" style="max-width: 25px;"></a>' +
				'<a href="http://www.facebook.com/sharer.php?s=100&p[url]=https://octiv.com/saleshero&p[images][0]=https://octiv.com/wp-content/uploads/2016/09/search-functionality.jpg&p[title]=%23SalesHero&p[summary]=Nominate%20Your%20%23SalesHero%20Today!" target="_blank"><img src="https://octiv.com/wp-content/uploads/2016/07/Facebook.png" alt="Facebook"></a>' +
				'</div>';

			if (heroTwitter != '') {
				$('.empty-modal .modal-content').append(modalTwitterHTML);
			} else {
				$('.empty-modal .modal-content').append(modalNoTwitterHTML);
			};

			modalContent.modal();
		};
</script>
<?php endif; ?>

</body>
</html>
