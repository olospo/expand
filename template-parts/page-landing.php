<?php /* Single Product */
get_header();

$intro = get_field('description');
$eLogo = get_field('e_logo');
$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

while ( have_posts() ) : the_post(); ?>

<!-- Hero -->
<section class="offering hero">
  <div class="container">
    <div class="intro ten columns">
      <span class="kicker"><?php the_title(); ?></span>
      <h1>Identifying untapped opportunities and reducing inefficiencies</h1>
      <p><?php echo $intro; ?></p>
    </div>  
  </div>
</section>

<!-- Offering Image -->
<section class="offering image">
  <div class="background" style="background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php echo esc_url( $featured_image_url ); ?>') center center no-repeat; background-size: cover;">
    <div class="container">
      <?php if (!empty($eLogo)): ?>
        <img src="<?php echo $eLogo; ?>" alt="<?php the_title(); ?> Logo" class="elogo"
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Modules -->
<section class="offering modules">
  <div class="container">
    <div class="intro">
    <h2>Our <?php the_title(); ?> Services</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="row">
      <article style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="service-card one-third column small-margin">
        <a href="market-data-benchmark">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Market Data Benchmark</h4>
          <p>BCG Expand helps organisations cut Market Data costs with tailored, benchmark-driven insights.</p>
          <span class="button">Explore</span>        
        </div>
        </a>      
      </article>
      <article style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="service-card one-third column small-margin">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Market Data Advisory </h4>
          <p>BCG Expand provides expert, data-led advice and bespoke support to optimise Market Data spend.</p>
          <span class="button">Explore</span>        
        </div>
        </a>      
      </article>
      <article style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="service-card one-third column small-margin">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Market Data Sizing</h4>
          <p>BCG Expand offers detailed, customisable Market Data sizing and spend analysis for better planning and growth.</p>
          <span class="button">Explore</span>         
        </div>
        </a>      
      </article>
      <article style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="service-card one-third column small-margin">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Market Data Catalogue</h4>
          <p>BCG Expand delivers a single platform, Explore, for Market Data discovery, governance, and smarter procurement.</p>
          <span class="button">Explore</span>        
        </div>
        </a>      
      </article>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/flexible/product_filter'); // Application/Animated Icons Section ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>