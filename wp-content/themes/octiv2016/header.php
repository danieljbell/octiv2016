<?
// Redirect deleted blog pages to the resource pages
if(is_404() && $_GET['ref']=="tb"){
    $postid = get_ID_by_slug(get_requested_slug());
    if($postid!=null) {
    	$newpageurl = get_permalink($postid);
    } else {
    	$newpageurl = "https://octiv.com/resources/?ref=tb";
    }
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$newpageurl);
    exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <base href="<?php echo site_url(); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P7LZ6FP');</script>
    <!-- End Google Tag Manager -->



    <?php wp_head(); ?>
    <?php if ( is_front_page() ) : ?>
        <meta property="og:image:width" content="700" />
        <meta property="og:image:height" content="466" />
    <?php endif; ?>

</head>
<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7LZ6FP"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php get_template_part('partials/display', 'icons'); ?>

 <?php if( current_user_can('activate_plugins') || current_user_can('edit_support') || current_user_can('contributor') ) :
    echo '<div style="position: fixed; bottom: 0; z-index: 999;"><a href="' . site_url() . '/wp-admin" class="btn-primary mar-r mar-b mar-l">Admin</a>';
    echo '<a href="' . site_url() . '/wp-admin/post.php?post=' . $post->ID . '&action=edit" class="btn-primary">Edit</a>';
    echo '</div>';
    endif; ?>


<?php get_template_part('partials/display', 'eyebrow'); ?>
  <header class="site-width" role="banner">
    <div class="logo-container">
      <a href="/" title="Homepage" class="site-logo"></a>
    </div>
    <button id="menu-toggle">Menu</button>
    <div class="site-navigation-container">
      <nav>
        <ul>
          <li class="menu-item">
            <a href="/platform" title="Platform">Platform</a>
            <!-- <ul class="sub-menu">
              <li class="sub-menu-item"><a href="/platform/features">Features</a></li>
              <li class="sub-menu-item"><a href="/platform/integrations">Integrations</a></li>
            </ul> -->
            <?php
              // echo '
              // <button id="nav-platform">Platform</button>
              // <div class="callout">
              //   <div class="site-width">
              //     <div class="half">
              //       <div>
              //         <a href="/platform/integrations">Integrations</a>
              //       </div>
              //       <div>
              //         <a href="/platform/catalog">Catalog</a>
              //       </div>
              //       <div>
              //         <a href="/platform/use-cases">Use Cases</a>
              //       </div>
              //     </div>
              //   </div>
              //   <div class="brand-two-callout">
              //     <div class="site-width centered">
              //       <h2>Octiv Offers Best in Cloud Technology</h2>
              //     </div>
              //     <div class="platform-slider">
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-pen">
              //           </svg>
              //           Authoring in any environment
              //         </a>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-workflow-icon">
              //           </svg>
              //           Streamlined, Collaborative Workflows
              //         </a>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-integrate">
              //           </svg>
              //           Integrating with Existing Systems
              //         </a>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-repo">
              //           </svg>
              //           Store and Access in any Repository
              //         </a>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="">
              //           </svg>
              //           feature 5
              //         </a>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="">
              //           </svg>
              //           feature 6
              //         </a>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="">
              //           </svg>
              //           feature 7
              //         </a>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="">
              //           </svg>
              //           feature 8
              //         </a>
              //       </div>
              //     </div>
              //   </div>
              // </div>
              // ';
            ?>
          </li>
          <li class="menu-item">
            <a href="/solutions" title="Solutions">Solutions</a>
              <?php
    						$args = array(
    							'post_type' => 'solutions',
                  'order' => 'ASC',
                  'orderby' => 'menu_order'
    						);
    						$solutions_query = new WP_Query($args);
    						if ($solutions_query->have_posts()) :
    							echo '<ul class="sub-menu">';
    							while ($solutions_query->have_posts()) :
    								$solutions_query->the_post();
    								echo '<li class="sub-menu-item"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
    							endwhile;
    							echo '</ul>';
    						endif;
    						wp_reset_query();
    					?>
            <?php
              // echo '
              // <button id="nav-solution">Solutions</button>
              // <div class="callout">
              //   <div class="site-width">
              //     <h2 class="centered">Solutions by Role &amp; Function</h2>
              //     <p class="centered">Octiv streamlines the workflow for teams that support sales and legal documents.</p>
              //     <div class="third">
              //       <div>
              //         <a href="/solutions/octiv-for-cios">
              //           <svg>
              //             <use xlink:href="#icon-CIOs">
              //           </svg>
              //         </a>
              //         <h4>For CIOs</h4>
              //         <p>Octiv helps CIOs <a href="/solutions/octiv-for-cios/#unify-standardize">unify &amp; standardize</a> a range of <a href="/solutions/octiv-for-cios/#document-workflows">document workflows</a> that leverage <a href="/solutions/octiv-for-cios/#current-applications">current applications</a> and <a href="/solutions/octiv-for-cios/#data">data</a>.</p>
              //       </div>
              //       <div>
              //         <a href="/solutions/octiv-for-sales/">
              //           <svg>
              //             <use xlink:href="#icon-handshake">
              //           </svg>
              //         </a>
              //         <h4>For Sales</h4>
              //         <p>Octiv helps Sales reduce time spent creating <a href="/solutions/octiv-for-sales/#proposals">proposals</a>, <a href="/solutions/octiv-for-sales/#quotes">quotes</a>, <a href="/solutions/octiv-for-sales/#sows">SOWs</a> and other common <a href="/solutions/octiv-for-sales/#documents">documents</a>.</p>
              //       </div>
              //       <div>
              //         <a href="/solutions/octiv-for-legal/">
              //           <svg>
              //             <use xlink:href="#icon-legal">
              //           </svg>
              //         </a>
              //         <h4>For Legal</h4>
              //         <p>Octiv helps Legal streamline the workflow for <a href="/solutions/octiv-for-legal/#review">review</a>, <a href="/solutions/octiv-for-legal/#edit">edit</a> and <a href="/solutions/octiv-for-legal/#approval">approval</a> of commercial <a href="/solutions/octiv-for-legal/#documents">documents</a>.</p>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg style="max-width: 85px;">
              //             <use xlink:href="#icon-finance">
              //           </svg>
              //         </a>
              //         <h4>For Finance</h4>
              //         <p>Lorem <a href="#">ipsum dolor</a> sit <a href="#">amet</a>, consectetur <a href="#">adipisicing elit</a>. Unde, <a href="#">minus</a>.</p>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg style="max-width: 115px;">
              //             <use xlink:href="#icon-people">
              //           </svg>
              //         </a>
              //         <h4>For HR</h4>
              //         <p>Lorem <a href="#">ipsum dolor</a> sit <a href="#">amet</a>, consectetur <a href="#">adipisicing elit</a>. Unde, <a href="#">minus</a>.</p>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg style="max-width: 85px;">
              //             <use xlink:href="#icon-finance">
              //           </svg>
              //         </a>
              //         <h4>For Procurement</h4>
              //         <p>Lorem <a href="#">ipsum dolor</a> sit <a href="#">amet</a>, consectetur <a href="#">adipisicing elit</a>. Unde, <a href="#">minus</a>.</p>
              //       </div>
              //     </div>
              //     <hr>
              //     <br>
              //     <div class="half">
              //       <div>
              //         <h4>Solutions for Industry Challenges</h4>
              //         <p>Octiv’s enables organizations to support a variety of industry use cases. Octiv speeds up <a href="#">financial services</a> products to market, creates competitive advantage for <a href="#">manufacturers</a> and automates proposals in <a href="#">media and entertainment</a>.</p>
              //         <a href="#" class="btn-arrow">Learn More</a>
              //       </div>
              //       <div>
              //         <h4>How Do You Go To Market?</h4>
              //         <p>Octiv’s supports commercial processes and workflows for how you go-to-market. Whether you have a <a href="#">long-cycles sales</a> workflow, high-volume, <a href="#">transactional</a> workflow or <a href="#">channel and distributor</a> workflows, Octiv can support your staff to closed won deals.</p>
              //         <a href="#" class="btn-arrow">Learn More</a>
              //       </div>
              //     </div>
              //   </div>
              // </div>
              // ';
            ?>
          </li>
          <li class="menu-item">
            <a href="/why-octiv" title="Why Octiv">Why Octiv</a>
            <?php
              // echo '
              // <button id="nav-why-octiv">Why Octiv</button>
              // <div class="callout">
              //   <div class="site-width centered">
              //     <h2>Clients Love Octiv. And It\'s Mutual.</h2>
              //     <div class="sixth">
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-time-giver">
              //           </svg>
              //         </a>
              //         <p>We are <a href="#">time-givers</a>.</p>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-puzzle">
              //           </svg>
              //         </a>
              //         <p>We make the complex, <a href="#">simple</a>.</p>
              //       </div>
              //       <div>
              //         <a href="/support">
              //           <svg>
              //             <use xlink:href="#icon-headset">
              //           </svg>
              //         </a>
              //         <p>We offer world-class <a href="/support">support</a>.</p>
              //       </div>
              //       <div>
              //         <a href="/platform/integrations">
              //           <svg>
              //             <use xlink:href="#icon-handshake">
              //           </svg>
              //         </a>
              //         <p>We work well with your <a href="/platform/integrations">partners</a>.</p>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-lock">
              //           </svg>
              //         </a>
              //         <p>We are <a href="#">secure</a> and reliable.</p>
              //       </div>
              //       <div>
              //         <a href="#">
              //           <svg>
              //             <use xlink:href="#icon-workflow-icon">
              //           </svg>
              //         </a>
              //         <p>We eat, sleep and breath <a href="#">document workflows</a>.</p>
              //       </div>
              //     </div>
              //   </div>
              // </div>
              // ';
            ?>
          </li>
          <li class="menu-item">
            <a href="/resources" title="Resources">Resources</a>
            <ul class="sub-menu">
              <li class="sub-menu-item"><a href="/resources/blog">Blog</a></li>
              <li class="sub-menu-item"><a href="/resources/client-stories">Client Stories</a></li>
              <li class="sub-menu-item"><a href="/resources/webinars">Webinars</a></li>
              <li class="sub-menu-item"><a href="/resources/whitepapers">Whitepapers</a></li>
            </ul>
            <?php
              // echo '
              // <button id="nav-resources">Resources</button>
              // <div class="callout">
              //   <div class="site-width">
              //     <div class="half">
              //       <div>
              //         <h2>Upcoming Events</h2>
              //         <p>Fool me once, shame on you. Fool Chuck Norris once and he will roundhouse kick you in the face.</p>
              //         <?php
              //           $today = date('Ymd');
              //           $args = array(
              //             'post_type' => 'events',
              //             'posts_per_page' => 6,
              //             'order' => 'ASC',
              //             'orderby' => 'meta_value',
              //             'meta_query' => array(
              //             array(
              //                   'key'		=> 'event_start_date',
              //                   'compare'	=> '>=',
              //                   'value'		=> $today,
              //               )
              //             ),
              //           );
              //           $event_query = new WP_Query($args);
              //           if ($event_query->have_posts()) :
              //             echo '<ul class="half no-bul">';
              //             while ($event_query->have_posts()) :
              //               $event_query->the_post();
              //               $post_terms = get_the_terms($post->ID, 'event_type');
              //               $event_start = get_field('event_start_date');
              //               $event_start = substr($event_start, 0, 4) . '-'. substr($event_start, 4, 2) . '-' . substr($event_start, 6);
              //               $date = date_create($event_start);
              //               $date = date_format($date,"M d");
              //               echo '<li class="nav-event">';
              //               echo '<div class="nav-event-date">' . $date . '</div>';
              //               echo '<div>';
              //                 echo '<strong style="display: block; margin-bottom: -0.25em; font-size: 0.75em; text-transform: uppercase;">' . $post_terms[0]->name . '</strong>';
              //                 echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
              //               echo '</div>';
              //               echo '</li>';
              //             endwhile;
              //             echo '</ul>';
              //           endif;
              //           wp_reset_query();
              //         ?>
              <?php
        //         echo '
        //         <div class="half-only centered">
        //           <a href="/events" class="btn-primary-outline">View All Events</a>
        //         </div>
        //       </div>
        //       <div>
        //         <h2>Learn About Octiv</h2>
        //         <p>Fool me once, shame on you. Fool Chuck Norris once and he will roundhouse kick you in the face.</p>
        //         <ul class="half no-bul nav-resources">
        //           <li>
        //             <span>
        //               <svg class="blog-icon">
        //                 <use xlink:href="#icon-blog">
        //               </svg>
        //             </span>
        //             <div>
        //               <h4><a href="/resources/blog" style="box-shadow: none;">Blog</a></h4>
        //               <p>Something cool about our <a href="/resources/blog">blog</a>.</p>
        //             </div>
        //           </li>
        //           <li>
        //             <span>
        //               <svg class="client-story-icon">
        //                 <use xlink:href="#icon-client-story">
        //               </svg>
        //             </span>
        //             <div>
        //               <h4><a href="/resources/client-stories" style="box-shadow: none;">Client Stories</a></h4>
        //               <p>Something cool about our <a href="/resources/client-stories">client stories</a>.</p>
        //             </div>
        //           </li>
        //           <li>
        //             <span>
        //               <svg class="webinar-icon">
        //                 <use xlink:href="#icon-webinar">
        //               </svg>
        //             </span>
        //             <div>
        //               <h4><a href="/resources/webinars" style="box-shadow: none;">Webinars</a></h4>
        //               <p>Something cool about our <a href="/resources/webinars">webinars</a>.</p>
        //             </div>
        //           </li>
        //           <li>
        //             <span class="whitepaper-icon">
        //               <svg>
        //                 <use xlink:href="#icon-whitepapers">
        //               </svg>
        //             </span>
        //             <div>
        //               <h4><a href="/resources/whitepapers" style="box-shadow: none;">Whitepapers</a></h4>
        //               <p>Something cool about our <a href="/resources/whitepapers">whitepapers</a>.</p>
        //             </div>
        //           </li>
        //         </ul>
        //       </div>
        //       <div class="half-only centered">
        //         <a href="/resources" class="btn-primary-outline">View All Resources</a>
        //       </div>
        //     </div>
        //   </div>
        //  </div>
        //         ';
              ?>
          </li>
          <li class="menu-item">
            <a href="/company" class="active" title="Company">Company</a>
            <ul class="sub-menu">
              <li class="sub-menu-item"><a href="/company/#leadership">Leadership</a></li>
              <li class="sub-menu-item"><a href="/company/#board-of-directors">Board of Directors</a></li>
              <li class="sub-menu-item"><a href="/company/careers">Careers</a></li>
              <li class="sub-menu-item"><a href="/press-releases">Press</a></li>
              <li class="sub-menu-item"><a href="/brand-assets">Brand Assets</a></li>
            </ul>
            <?php
              // echo '
              // <button id="nav-company">Company</button>
              // <div class="callout">
              //   <div class="site-width">
              //     <div class="half">
              //       <div class="centered">
              //         <h2>Our People</h2>
              //         <div class="third">
              //           <div><a href="/company/#leadership">Leadership</a></div>
              //           <div><a href="/company/#board-of-directors">Board of Directors</a></div>
              //           <div><a href="/company/careers">Careers</a></div>
              //         </div>
              //       </div>
              //       <div class="centered">
              //         <h2>About Octiv</h2>
              //         <div class="third">
              //           <div><a href="/company">Overview</a></div>
              //           <div><a href="/press-releases">Press</a></div>
              //           <div><a href="/company/contact-us">Contact Us</a></div>
              //         </div>
              //       </div>
              //     </div>
              //   </div>
              // </div>
              // ';
            ?>
          </li>
          <li class="menu-item">
            <a href="/contact-us" title="Contact Us">Contact Us</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</div>

<main class="page-body" id="page-body">
