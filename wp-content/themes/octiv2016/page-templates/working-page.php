<?php
/*
==============================
TEMPLATE NAME: Working-Page
==============================
*/
get_header();
?>
<div class="site-width centered white-text">
	<h1><?php the_title(); ?></h1>
</div>
<div class="breadcrumb">
	<?php if ( function_exists('yoast_breadcrumb') )
		{yoast_breadcrumb('<div class="site-width">','</div>');}
	?>
</div>
<div class="owl-carousel-no-nav">
	<figure style="background-image: url(//unsplash.it/800/350); background-size: cover; background-position: 50%; height: 350px;">
		<div class="slider-gradient">
			<p>Thing 1</p>
		</div>
	</figure>
	<figure style="background-image: url(//unsplash.it/900/350); background-size: cover; background-position: 50%; height: 350px;">
		<div class="slider-gradient">
			<p>Thing 2</p>
		</div>
	</figure>
	<figure style="background-image: url(//unsplash.it/1000/350); background-size: cover; background-position: 50%; height: 350px;">
		<div class="slider-gradient">
			<p>Thing 3</p>
		</div>
	</figure>
	<figure style="background-image: url(//unsplash.it/1100/350); background-size: cover; background-position: 50%; height: 350px;">
		<div class="slider-gradient">
			<p>Thing 4</p>
		</div>
	</figure>
	<figure style="background-image: url(//unsplash.it/1200/350); background-size: cover; background-position: 50%; height: 350px;">
		<div class="slider-gradient">
			<p>Thing 5</p>
		</div>
	</figure>
</div>
<section>
	<div class="site-width">
		<div class="half-stack">
			<div>
				<img src="http://gettinderbox.com/wp-content/uploads/2016/03/team-togetherness.jpg" alt="Team">
			</div>
			<div>
				<h2>Come join our growing team</h2>
				<p>TinderBox was founded to provide sales teams a better way to create the assets they need to close deals. We’re passionate about bringing insight, analytics and automation to sales and have earned our position as an industry leader by empowering hundreds of companies around the world to create, deliver and track sales materials online.</p>
				<button class="btn-primary"><a href="#">View all opportunities</a></button>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="site-width">
		<div class="half-force centered icon-grid">
			<div class="half">
				<div>
					<img src="http://gettinderbox.com/wp-content/uploads/2016/03/stock-options.png" alt="">
					<p>Stock options for every employee</p>
				</div>
				<div>
					<img src="http://gettinderbox.com/wp-content/uploads/2016/03/vacation-time.png" alt="">
					<p>Unlimited vacation time</p>
				</div>
				<div>
					<img style="max-width: 55px;" src="http://gettinderbox.com/wp-content/uploads/2016/03/parental-leave.png" alt="">
					<p>Paid parental leave</p>
				</div>
				<div>
					<img src="http://gettinderbox.com/wp-content/uploads/2016/03/downtown-parking.png" alt="">
					<p>Downtown parking stipend</p>
				</div>
			</div>
			<div class="half">
				<div>
					<img src="http://gettinderbox.com/wp-content/uploads/2016/03/quarterly-bonus.png" alt="">
					<p>Uncapped quarterly bonuses</p>
				</div>
				<div>
					<img src="http://gettinderbox.com/wp-content/uploads/2016/03/insurance.png" alt="">
					<p>Comprehensive insurance offerings</p>
				</div>
				<div>
					<img src="http://gettinderbox.com/wp-content/uploads/2016/03/401k.png" alt="">
					<p>401(k) plan</p>
				</div>
				<div>
					<img style="max-width: 60px;" src="http://gettinderbox.com/wp-content/uploads/2016/03/company-offsites.png" alt="">
					<p>Quarterly company offsites</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="site-width centered">
		<h2 class="mar-b">Don’t take our word for it…</h2>
		<div class="fourth pad-t">
			<div>
				<a href="http://www.indianachamber.com/index.php/media-center/press-releases/49-press-releases/2014-press-releases/2878-2014-best-places-to-work-in-indiana-companies-named-indiana-chamber-announces-rankings-may-1" target="_blank"><img src="http://gettinderbox.com/wp-content/uploads/2015/10/best-places.png" alt="" style="max-width: 55px;"></a>
			</div>
			<div>
				<a href="http://www.glassdoor.com/Reviews/TinderBox-Reviews-E663752.htm" target="_blank"><img src="http://gettinderbox.com/wp-content/uploads/2015/10/glassdoor.png" alt="" style="max-width: 148px;"></a>
			</div>
			<div>
				<a href="http://techpoint.org/2015/05/tinderbox-wins-emerging-tech-company-year/" target="_blank"><img src="http://gettinderbox.com/wp-content/uploads/2015/10/mura.png" alt="" style="max-width: 150px;"></a>
			</div>
			<div>
				<a href="http://www.topworkplaces.com/frontend.php/regional-list/company/indystar/tinderbox" target="_blank"><img src="http://gettinderbox.com/wp-content/uploads/2015/10/IndyStar.png" alt="" style="max-width: 171px;"></a>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="site-width">
		<hr>
	</div>
</section>

<section>
	<div class="site-width">
		<h2 class="centered">Current Openings</h2>
	</div>
</section>
<?php get_footer(); ?>