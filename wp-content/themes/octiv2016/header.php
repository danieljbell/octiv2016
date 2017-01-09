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



    <?php wp_head(); ?>
    <?php if ( is_front_page() ) : ?>
        <meta property="og:image:width" content="700" />
        <meta property="og:image:height" content="466" />
    <?php endif; ?>

</head>
<body <?php body_class(); ?>>

  <?php get_template_part('partials/display', 'icons'); ?>

 <?php if( current_user_can('activate_plugins') || current_user_can('edit_support') || current_user_can('contributor') ) :
    echo '<div style="position: fixed; bottom: 0; z-index: 999;"><a href="' . site_url() . '/wp-admin" class="btn-primary mar-r mar-b mar-l">Admin</a>';
    echo '<a href="' . site_url() . '/wp-admin/post.php?post=' . $post->ID . '&action=edit" class="btn-primary">Edit</a>';
    echo '</div>';
    endif; ?>


<?php get_template_part('partials/display', 'eyebrow'); ?>
  <header class="site-width" role="banner">
    <div>
      <?php // Logo
        if (is_front_page()) :
          echo '<svg viewBox="0 0 100 21.9" id="site-logo"><use xlink:href="#icon-octiv-logo"></svg>';
        else :
          echo '<a href="/" title="Homepage"><svg viewBox="0 0 100 21.9" id="site-logo"><use xlink:href="#icon-octiv-logo"></svg></a>';
        endif;
      ?>
    </div>
    <div class="site-navigation-container">
      <button id="menu-toggle">Menu</button>
      <nav>
        <ul>
          <li>
            <button id="nav-platform">Platform</button>
            <div class="callout">
              <div class="site-width">
                <div class="half">
                  <div>
                    <h2>Octiv Powers Unified Document Workflows for a Range of Applications</h2>
                    <p>Build and automate <a href="/#workflows">document workflows</a> that <a href="/#connections">connect systems and data</a> for a better <a href="/#user-experience">end-user experience</a>. Integrate and standardize the processes, systems and data required to create and manage mission-critical <a href="/#documents">sales and legal documents</a> for <a href="/#commercial">commercial</a> and <a href="/#enterprise">enterprise</a> teams. Octiv integrates with CPQ, ERP, CRM and other systems in a single, streamlined workflow.</p>
                    <a href="#" class="btn-arrow">Learn More</a>
                  </div>
                  <div>
                    <h2>Octiv Offers Best in Cloud Technology</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cumque.</p>
                    <ul class="half">
                      <li><a href="#">Native HTML5 Octiv Docs</a></li>
                      <li><a href="#">Mobile-Responsive UI</a></li>
                      <li><a href="#">AWS for Ultimate Scalability</a></li>
                      <li><a href="#">Industry-Best Salesforce Integration</a></li>
                      <li><a href="#">Industry-Best Security</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="brand-two-callout">
                <div class="site-width centered">
                  <h2>Octiv Offers Best in Cloud Technology</h2>
                </div>
                <div class="platform-slider">
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-pen">
                      </svg>
                      Authoring in any environment
                    </a>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-workflow-icon">
                      </svg>
                      Streamlined, Collaborative Workflows
                    </a>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-integrate">
                      </svg>
                      Integrating with Existing Systems
                    </a>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-repo">
                      </svg>
                      Store and Access in any Repository
                    </a>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="">
                      </svg>
                      feature 5
                    </a>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="">
                      </svg>
                      feature 6
                    </a>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="">
                      </svg>
                      feature 7
                    </a>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="">
                      </svg>
                      feature 8
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <button id="nav-solution">Solution</button>
            <div class="callout">
              <div class="site-width">
                <h2 class="centered">Solutions by Role &amp; Function</h2>
                <p class="centered">Octiv streamlines the workflow for teams that support sales and legal documents.</p>
                <div class="fourth">
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-CIOs">
                      </svg>
                    </a>
                    <h4>For CIOs</h4>
                    <p>Lorem <a href="#">ipsum dolor</a> sit <a href="#">amet</a>, consectetur <a href="#">adipisicing elit</a>. Quod, <a href="#">rem</a>?</p>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-handshake">
                      </svg>
                    </a>
                    <h4>For Sales</h4>
                    <p>Lorem <a href="#">ipsum dolor</a> sit <a href="#">amet</a>, consectetur <a href="#">adipisicing elit</a>. Officia, <a href="#">rerum</a>.</p>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-legal">
                      </svg>
                    </a>
                    <h4>For Legal</h4>
                    <p>Lorem <a href="#">ipsum dolor</a> sit <a href="#">amet</a>, consectetur <a href="#">adipisicing elit</a>. Nihil, <a href="#">temporibus</a>!</p>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-finance">
                      </svg>
                    </a>
                    <h4>For Finance</h4>
                    <p>Lorem <a href="#">ipsum dolor</a> sit <a href="#">amet</a>, consectetur <a href="#">adipisicing elit</a>. Unde, <a href="#">minus</a>.</p>
                  </div>
                </div>
                <hr>
                <br>
                <div class="half">
                  <div>
                    <h4>Solutions for Industry Challenges</h4>
                    <p>Octiv’s enables organizations to support a variety of industry use cases. Octiv speeds up <a href="#">financial services</a> products to market, creates competitive advantage for <a href="#">manufacturers</a> and automates proposals in <a href="#">media and entertainment</a>.</p>
                    <a href="#" class="btn-arrow">Learn More</a>
                  </div>
                  <div>
                    <h4>How Do You Go To Market?</h4>
                    <p>Octiv’s supports commercial processes and workflows for how you go-to-market. Whether you have a <a href="#">long-cycles sales</a> workflow, high-volume, <a href="#">transactional</a> workflow or <a href="#">channel and distributor</a> workflows, Octiv can support your staff to closed won deals.</p>
                    <a href="#" class="btn-arrow">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <button id="nav-why-octiv">Why Octiv</button>
            <div class="callout">
              <div class="site-width centered">
                <h2>Clients Love Octiv. And It's Mutual.</h2>
                <div class="sixth">
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-time-giver">
                      </svg>
                    </a>
                    <p>We are <a href="#">time-givers</a>.</p>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-puzzle">
                      </svg>
                    </a>
                    <p>We make the complex, <a href="#">simple</a>.</p>
                  </div>
                  <div>
                    <a href="/support">
                      <svg>
                        <use xlink:href="#icon-headset">
                      </svg>
                    </a>
                    <p>We offer world-class <a href="/support">support</a>.</p>
                  </div>
                  <div>
                    <a href="/platform/integrations">
                      <svg>
                        <use xlink:href="#icon-handshake">
                      </svg>
                    </a>
                    <p>We work well with your <a href="/platform/integrations">partners</a>.</p>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-lock">
                      </svg>
                    </a>
                    <p>We are <a href="#">secure</a> and reliable.</p>
                  </div>
                  <div>
                    <a href="#">
                      <svg>
                        <use xlink:href="#icon-workflow-icon">
                      </svg>
                    </a>
                    <p>We eat, sleep and breath <a href="#">document workflows</a>.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <button id="nav-resources">Resources</button>
            <div class="callout">
              <div class="site-width">
                <div class="half">
                  <div>
                    <h2>Upcoming Events</h2>
                    <p>Fool me once, shame on you. Fool Chuck Norris once and he will roundhouse kick you in the face.</p>
                    <?php
                      $args = array(
                        'post_type' => 'events'
                      );
                      $event_query = new WP_Query($args);
                      if ($event_query->have_posts()) :
                        echo '<ul class="half no-bul">';
                        while ($event_query->have_posts()) :
                          $event_query->the_post();
                          $post_terms = get_the_terms($post->ID, 'event_type');
                          echo '<li>';
                          echo '<strong style="display: block; margin-bottom: -0.25em; font-size: 0.75em; text-transform: uppercase;">' . $post_terms[0]->name . '</strong>';
                          echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                          echo '</li>';
                        endwhile;
                        echo '</ul>';
                      endif;
                      wp_reset_query();
                    ?>
                  </div>
                  <div>
                    <h2>Learn About Octiv</h2>
                    <p>Fool me once, shame on you. Fool Chuck Norris once and he will roundhouse kick you in the face.</p>
                    <ul class="half no-bul">
                      <li>
                        <span>
                          <svg>
                            <use xlink:href="#icon-blog">
                          </svg>
                        </span>
                        <h4>Blog</h4>
                        <p>Something cool about our <a href="#">blog</a>.</p>
                      </li>
                      <li>
                        <span>
                          <svg>
                            <use xlink:href="#icon-client-story">
                          </svg>
                        </span>
                        <h4>Client Stories</h4>
                        <p>Something cool about our <a href="#">client stories</a>.</p>
                      </li>
                      <li>
                        <span>
                          <svg>
                            <use xlink:href="#icon-webinar">
                          </svg>
                        </span>
                        <h4>Webinars</h4>
                        <p>Something cool about our <a href="#">webinars</a>.</p>
                      </li>
                      <li>
                        <span>
                          <svg>
                            <use xlink:href="#icon-whitepapers">
                          </svg>
                        </span>
                        <h4>Whitepapers</h4>
                        <p>Something cool about our <a href="#">whitepapers</a>.</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <button id="nav-company">Company</button>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</div><?php // close #site-top ?>

<main class="page-body" id="page-body">
