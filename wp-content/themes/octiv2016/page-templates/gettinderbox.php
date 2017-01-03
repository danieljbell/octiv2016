<?php 
/*
==============================
Template Name: GetTinderBox
==============================
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TinderBox is now Octiv</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sales Productivity for Sophisticated Companies"/>
	<meta name="robots" content="noodp"/>
	<link rel="canonical" href="https://octiv.com/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Octiv - Sales Productivity for Sophisticated Companies" />
	<meta property="og:description" content="TinderBox is now Octiv" />
	<meta property="og:image" content="https://octiv.com/wp-content/uploads/2016/07/Octiv-Twitter.jpg" />
	<meta property="og:image:width" content="700" />
	<meta property="og:image:height" content="466" />
	<meta property="og:url" content="https://octiv.com/" />
	<meta property="og:site_name" content="Octiv" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="TinderBox is now Octiv" />
	<meta name="twitter:title" content="Octiv - Sales Productivity for Sophisticated Companies" />
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/4.1.1/normalize.css">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:100,300,700|Source+Sans+Pro:300,700' rel='stylesheet' type='text/css'>
  <style>
  	* {
  		box-sizing: border-box;
  	}
		body {
			background-color: #000;
			background-image: url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg);
			background-size: 300px;
			font: 18px/1.6em "Merriweather", Georgia, sans-serif;
		}
		h1 {
			font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
		}
		a {
			color: #ed4c06;
			font-weight: bold;
		}
		img {
			display: block;
		}
		.wrapper {
			background-color: #fff;
			color: #333;
			box-shadow: 0 0 40px rgba(0,0,0,0.9);
			width: 100%;
			max-width: 768px;
			margin: 0 auto;
			padding: 1rem;
			background-image: url(https://octiv.com/wp-content/themes/octiv2016/img/logo-mark.svg);
	    background-repeat: no-repeat;
	    background-position: calc(100% + 20px) calc(100% - 12px);
	    background-size: 120px;
		}
		.logos {
			position: relative;
			margin-bottom: 2rem;
		}
		.tinderbox {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			max-width: 250px;
			animation-delay: 3s;
			display: block;
		}
		.octiv {
			margin-top: 1rem;
			display: block;
			width: 100%;
			max-width: 250px;
			margin-bottom: 1rem;
			opacity: 0;
			animation-delay: 3.5s;
		}
		.signature {
			max-width: 200px;
			margin-top: 2rem;
		}
		.box {
			background-color: #f0f0f0;
			border: 1px solid #ccc;
			padding: 2rem;
		}
		.box h3 {
			text-align: center;
			margin-top: 0;
		}
		.video-outer {
			padding: 56.25% 0 0 0;
	    position: relative;
		}
		.video-inner {
	    height: 100%;
	    left: 0;
	    position: absolute;
	    top: 0;
	    width: 100%;
		}
		iframe {
			width: 100% !important;
	    height: 100% !important;
	    box-shadow: 0 0 15px rgba(0,0,0,0.15);
		}
		footer {
			font-size: 14px;
			line-height: 1.4em;
			position: relative;
			margin: 2rem 0 -1rem;
		}
		footer img {
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
		}
		footer span {
			display: block;
		}
		a button {
			border: 1px solid #ed4c06;
			border-radius: 5px;
			background-color: transparent;
			display: block;
			margin: 2rem auto 0;
			transition: all 200ms ease-in-out;
			padding: 1rem;
			color: #ed4c06;
		}
		a button:hover {
			background-color: #ed4c06;
			color: #fff;
		}
		button a {
			text-decoration: none;
			font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
			display: inline-block;
			padding: 0.5rem 1rem;
			font-size: 1.25rem;
		}
		button:hover a {
			color: #fff;
		}
		@media (min-width: 768px) {
			body {
				padding: 3rem 0;
				font-size: 16px;
				line-height: 1.6em;
			}
			.wrapper {
				padding: 2rem;
			}
			.octiv {
				margin-top: 0;
				display: block;
			}
			footer span {
				display: inline;
			}
		}
		.animated {
		  animation-duration: 1.5s;
		  animation-fill-mode: both;
		}
		@keyframes fadeOut {
		  from {
		    opacity: 1;
		  }

		  to {
		    opacity: 0;
		  }
		}

		.fadeOut {
		  animation-name: fadeOut;
		}
		@keyframes fadeIn {
		  from {
		    opacity: 0;
		  }

		  to {
		    opacity: 1;
		  }
		}

		.fadeIn {
		  animation-name: fadeIn;
		}
  </style>
</head>
<body>
	<div class="wrapper">
		<div class="logos">
			<img src="https://octiv.com/wp-content/themes/octiv2016/img/TinderBox-Logo-Dark.svg" alt="TinderBox Logo" class="tinderbox animated fadeOut" />
			<a href="/"><img src="https://octiv.com/wp-content/themes/octiv2016/img/Octiv-Logo.svg" alt="Octiv Logo" class="octiv animated fadeIn" /></a>
		</div>
		<h1>Letter from the CEO</h1>
		<p>We have now started a new chapter in our company's story. When we founded TinderBox in 2010, we set out to solve a problem every salesperson faces: creating, sending and tracking proposals to move prospects through the sales cycle. Our flagship product gave hundreds of sales teams the power to personalize sales proposals, gain insight into buyer behavior and close deals more efficiently.</p>
		<p>Over the years we expanded our offerings to address more of the sales process, helping sales and marketing teams create presentations, quotes and contracts. As our client base becomes more progressive and forward-thinking, we've improved and refined our products and services to exceed their expectations.</p>
		<p>The sales productivity ecosystem has grown since our founding, as have our team and our commitment to improving the buyer experience. After consulting with our team, our partners and our most engaged customers, we decided it was time to recraft our brand identity and lead a new era of sales productivity.</p>
		<div class="box">
			<h3>Now we are Octiv.</h3>
			<div class="video-outer">
				<div class="video-inner">
					<iframe src="https://fast.wistia.net/embed/iframe/vmlhujsh3f" frameborder="0"></iframe>
				</div>
			</div>
			<a href="/" style="text-decoration: none;"><button>Visit Octiv.com</button></a>
		</div>
		<p><strong>Octiv represents the many parts of the sales process that must combine to create a harmonious whole.</strong> It's our sales and marketing teams working in time with Client Health and Client Success to provide a satisfying customer experience. It's the sense of community that each member of our team brings to our offices every day. It's our commitment to helping companies introduce the same kind of harmony to their own businesses.</p>
		<p>Our growth has propelled us toward more than a new brand identity: <strong> we also celebrate the expansion of our global headquarters on historic Monument Circle, the appointment and promotion of several critical leadership team members, doubling our revenue in 2015 and staff growth of 30 percent this year.</strong> Each of these accomplishments is the result of our customers' commitment to Octiv and our team's commitment to offering the best sales productivity experience on the market.</p>
		<p>The sales productivity platform our customers use today will only get better; customers will maintain the ability to automate workflows, create and send sales documents, collaborate with team members and gain valuable insights in real time. We will continue to refine the platform and transition the application to our new brand identity over time. To learn more about the schedule and how these changes affect you and your team, <a href="/releases/fall-16/octiv-rebrand-faq/">click here</a>.</p>
		<p>This is just the beginning of Octiv's journey. Stay tuned for more news about our product, people and platform.</p>
		<img src="https://octiv.com/wp-content/uploads/2016/07/Dustin-Sapp-Sig.svg" alt="Dustin's Signature" class="signature">
		<p><strong>Dustin Sapp</strong><br>CEO<br>Octiv</p>
		<footer>
			<p><a href="/">Octiv.com</a><br>54 Monument Circle, Suite 200, <span>Indianapolis, IN 46204</span></p>
		</footer>
	</div>

<!-- Google Analytics -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-11921089-5','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<!-- END Google Analytics -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>
<script>
// document.addEventListener("DOMContentLoaded", function(event) { 
// 	TweenMax.to('.tinderbox', 1, {
// 		width:'150px', 
// 		left: '75%',
// 		opacity: 0.5,
// 		ease:Power1.easeInOut, 
// 		delay: 3});
// 	TweenMax.to('.octiv', 1, {
// 		opacity: 1,
// 		ease:Power1.easeInOut, 
// 		delay: 3.5});
// });
</script>
</body>
</html>