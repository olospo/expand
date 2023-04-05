<?php /* Template Name: Contact */
get_header();

$mapDesktop = get_field('desktop_map');
$mapMobile = get_field('mobile_map');

while ( have_posts() ) : the_post(); ?>

<?php // get_template_part( 'inc/hero' ); ?>

<section class="map">
  <div class="container">
    <div class="map_container">
    <img src="<?php bloginfo('template_directory'); ?>/img/expand_map.png" alt="map" />
    <a href="#London" id="London" class="map-marker" data-target="London">
      <span aria-hidden="true"></span>
    </a>
    <a href="#New-York" id="New-York" class="map-marker" data-target="New-York">
      <span aria-hidden="true"></span>
    </a>
    <a href="#Singapore" id="Singapore" class="map-marker" data-target="Singapore">
      <span aria-hidden="true"></span>
    </a>
    </div>
  </div>
</section>

<section class="map_offices">
  <div class="container">
    <div class="offices">
    <div class="office" id="London">
      <div class="content">
        <h3>Worldwide headquarters</h3>
        <address>
          70 Mark Lane<br />
          14th Floor<br />
          London<br />
          EC3R 7NQ
        </address>
        <a href="tel:+44 (0)20 7337 2100" class="phone">+44 (0)20 7337 2100</a>
      </div>
    </div>
    <div class="office" id="New-York">
      <div class="content">
        <h3>USA</h3>
        <address>
          10 Hudson Yards<br />
          New York<br />
          NY, 10001
        </address>
        <a href="tel:+1 (212) 913 9268" class="phone">+1 (212) 913 9268</a>
      </div>
    </div>
    <div class="office" id="Singapore">
      <div class="content">
        <h3>Singapore</h3>
        <address>
          R79 Robinson Road<br />
          Level 27 CapitaSky<br />
          Singapore 068897<br />
          Singapore
        </address>
        <a href="tel:+65 6429 2500" class="phone">+65 6429 2500</a>
      </div>
    </div>
    </div>
  </div>
</section>

<section class="image_offices">
  <div class="office_image active"></div>
  <div class="office_image newyork" id="New-York"></div>
  <div class="office_image london" id="London"></div>
  <div class="office_image singapore" id="Singapore"></div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>