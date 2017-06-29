<?php
  $user = 'octiv';
  $pass = 'D@n13lR0cks!';
  $context = stream_context_create(array(
    'http' => array(
      'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
    )
  ));
  $get_page_icon = get_field('page_icon');
  $page_icon_url = $get_page_icon[url];
  $page_icon = file_get_contents($page_icon_url, false, $context);
?>

<?php get_header(); ?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);">
  <div class="site-width white-text centered">
    <h1><?php echo the_title(); ?></h1>
    <div class="font-bump two-third-only" style="margin-top: 0.5rem;">
      <div class="font-bump fancy-links">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<?php
  if (have_rows('page_section')) :
    echo '
      <section class="fat-section" style="padding-bottom: 3rem;">
        <div class="site-width">
          <div class="half">
    ';
    while (have_rows('page_section')) :
      the_row();
      $section_title = get_sub_field('section_title');
      $section_title = preg_replace('/&| |,/', '-', $section_title);
      $section_title = preg_replace('/---|--/', '-', $section_title);
      $section_title = strtolower($section_title);
      $icon_file = get_sub_field('section_icon', true);
      echo '
        <div class="section-content" id="' . $section_title . '">
          <div class="section-icon">
          ' . file_get_contents($icon_file[url], false, $context) . '
          </div>
          <div>
            <h2>' . get_sub_field('section_title') . '</h2>
            <p>' . get_sub_field('section_content') . '</p>
          </div>
        </div>
      ';
    endwhile;
    echo '
          </div>
        </div>
      </section>
    ';
  endif;
?>

<div class="client-testimonial">
  <?php get_template_part('partials/display', 'client-testimonial'); ?>
</div>

<section class="callout solutions-container" style="background-color: #f0f0f0; background-image: linear-gradient(#f0f0f0, #eee);">
  <div class="site-width">
    <h2 class="centered">Explore Octiv’s Platform Components</h2>
    <br>
    <br>
    <?php
      $terms = get_terms( array(
        'taxonomy' => 'feature_type',
        'orderby' => 'id',
        'hide_empty' => false,
      ) );
      echo '<div class="fourth">';
        foreach ( $terms as $term ) {
          $term_array = get_field('page_icon', $term->taxonomy . '_' . $term->term_id);
          $term_icon_url = $term_array[url];
          echo '<div class="card" style="position: relative;"><a href="/platform/features/#' . $term->slug . '">' . file_get_contents($term_icon_url, false, $context) . '<span>' . $term->name . '</span></a></div>';
        }
      echo '</div>';
    ?>
  </div>
</section>

<?php get_template_part('partials/display', 'recent-resources'); ?>

<div class="site-width">
  <hr>
</div>

<?php get_template_part('partials/display', 'basic-contact-us'); ?>

<style>
.section-icon svg {
  width: 100%;
  max-width: 75px;
  max-height: 75px;
  fill: #42b0d8;
}
.fat-section .section-content:nth-of-type(2) .section-icon svg {
  fill: #33ab40;
}
.fat-section .section-content:nth-of-type(3) .section-icon svg {
  fill: #b949f5;
}
.fat-section .section-content:nth-of-type(4) .section-icon svg {
  fill: #ed4c06;
}
@media screen and (max-width: 600px) {
  .section-content  {
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column;
  }
  .section-icon {
    margin-bottom: 0.5rem;
    text-align: center;
  }
  .section-icon svg {
    max-width: 125px;
  }
}

.solutions-container svg {
  width: 100%;
  fill: #000;
  max-width: 35px;
  max-height: 35px;
  min-width: 35px;
  margin-right: 0.5rem;
}
.solutions-container .card {
  padding: 2rem;
}
.solutions-container a {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  color: #000;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  padding: 2rem;
}
.solutions-container .card:hover a,
.solutions-container .card a:focus {
  color: #ffffff;
  outline: none;
  background-color: #ed4c06;
}
.solutions-container .card:hover svg,
.solutions-container .card a:focus svg {
  fill: #ffffff;
}
</style>

<script>
(function() {
  var links = document.querySelectorAll('main .fancy-links a');
  for (var i = 0; i < links.length; i++) {
    var initialText = links[i].innerText;
    var replaceText = initialText.replace('&', '-');
    replaceText = replaceText.replace(/ /g, '-');
    replaceText = replaceText.replace('and', '-');
    replaceText = replaceText.replace('---', '-');
    replaceText = replaceText.toLowerCase();
    links[i].href = '#' + replaceText;
  }
})();
</script>

<?php get_footer(); ?>
