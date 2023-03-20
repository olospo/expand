<?php /* Template Name: Contact */
get_header();

$mapDesktop = get_field('desktop_map');
$mapMobile = get_field('mobile_map');


while ( have_posts() ) : the_post(); ?>

<section class="hero contact">
  <div class="map" style="background: #333333 url('<?php echo esc_url($mapDesktop['url']); ?>') center center no-repeat; background-size: cover;"></div>
  <div class="map mobile" style="background: #333333 url('<?php echo esc_url($mapMobile['url']); ?>') top center no-repeat; background-size: cover;"></div>
  <div class="offices">
    <div class="office">
      <div class="content">
        <h5>Colston Street Studio</h5>
        <address>
          15 Colston Street<br />
          Bristol UK<br />
          BS1 5AP
        </address>
        <a href="tel:<?php the_field('phone_number','options'); ?>" class="phone"><?php the_field('phone_number','options'); ?></a><br />
        <a href="mailto:<?php the_field('email','options'); ?>" class="email"><?php the_field('email','options'); ?></a><br />
        <a href="https://www.google.com/maps/dir//15 Colston Street, Bristol, UK, BS1 5AP" class="button">Directions</a>
      </div>
    </div>
    <div class="office">
      <div class="content">
        <h5>Old Market Street Studio</h5>
        <address>
          52 Old Market Street<br />
          Bristol UK<br />
          BS2 0ER
        </address>
        <a href="tel:<?php the_field('phone_number','options'); ?>" class="phone"><?php the_field('phone_number','options'); ?></a><br />
        <a href="mailto:<?php the_field('email','options'); ?>" class="email"><?php the_field('email','options'); ?></a><br />
        <a href="https://www.google.com/maps/dir//52 Old Market Street, Bristol, UK, BS2 0ER" class="button">Directions</a>
      </div>
    </div>
  </div>
  
</section>

<section class="page contact">
  <div class="container flex">
    <div class="content eight columns">
      <h2>Get in touch</h2>
      <?php the_content(); ?>
    </div>
    <aside class="social four columns">
      <h2>Contact details</h2>
        <ul class="contact">
          <li><a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a></li>
          <li><a href="mailto:<?php the_field('email','options'); ?>"><?php the_field('email','options'); ?></a></li>
        </ul>
      <h2>Social Media</h2>
      <ul class="social">
        <?php if(get_field('facebook_link','options')): ?>
        <li><a href="<?php the_field('facebook_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.svg" alt="Facebook" loading="lazy"/></a></li>
        <?php endif; ?>
        <?php if(get_field('twitter_link','options')): ?>
        <li><a href="<?php the_field('twitter_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.svg" alt="Twitter" loading="lazy"/></a></li>
        <?php endif; ?>
        <?php if(get_field('linkedin_link','options')): ?>
        <li><a href="<?php the_field('linkedin_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin.svg" alt="LinkedIn" loading="lazy"/></a></li>
        <?php endif; ?>
        <?php if(get_field('vimeo_link','options')): ?>
        <li><a href="<?php the_field('vimeo_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/vimeo.svg" alt="Vimeo" loading="lazy"/></a></li>
        <?php endif; ?>
        <?php if(get_field('instagram_link','options')): ?>
        <li><a href="<?php the_field('instagram_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/instagram.svg" alt="Instagram" loading="lazy"/></a></li>
        <?php endif; ?>
      </ul>
    </aside>
  </div>
</section>

<?php get_template_part( 'inc/cta_careers' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>