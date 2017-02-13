<?php
/*
==============================
TEMPLATE NAME: Contact Us
==============================
*/
?>

<?php get_header(); ?>

<div class="fixed-hero-section" style="background-color: #fff; background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/uploads/2016/06/company-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
	<div class="site-width centered white-text two-third-only">
		<div>
			<h1><?php the_title(); ?></h1>
			<p class="font-bump">317.550.0148</p>
		</div>
	</div>
</div>

<section>
  <div class="site-width">
    <div class="two-third">
			<div class="content-container">
				<?php echo the_content(); ?>
				<p>Press inquiries? Email us at <a href="mailto:press@octiv.com">press@octiv.com</a>.</p>
				<p>Have a support issue? Access our <a href="/support/?submitTicket=true">support portal</a> now.</p>
				<br class="hide-md">
				<div class="video-outer">
          <div class="video-inner">
            <iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCbBbYVFTyjh95bPIy_3BmXsU_h3YtBwzY&q=Octiv,Indianapolis+IN" allowfullscreen></iframe>
          </div>
        </div>
			</div>
			<div class="box">
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
					<form id="mktoForm_1008"></form>
				<script>
					MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1008, function(form) {
						var selectBoxes = form.getFormElem()[0].querySelectorAll('form select');
						for (var i = 0; i < selectBoxes.length; i++) {
							selectBoxes[i].classList.add('fancy');
						}
					});
				</script>
			</div>
		</div>
  </div>
</section>

<style>
  .content-container,
  .box {
    margin-top: -6rem;
  }
	.content-container {
		background-color: #fff;
		padding: 2rem;
		border-radius: 5px;
	}
	.fixed-hero-section .font-bump {
		margin-bottom: 3rem;
	}
	@media screen and (max-width: 768px) {
		.content-container .video-outer {
			display: none;
		}
		.content-container,
		.box {
			margin-top: 0;
		}
		.content-container {
			padding: 0;
		}
		.fixed-hero-section .font-bump {
			margin-bottom: -2rem;
		}
	}
</style>


<?php get_footer(); ?>
