<?php /* Archive */
get_header(); ?>

<section class="hero careers">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <div class="ten columns offset-by-one">
      <h1>Careers</h1>
      <?php the_field('careers_hero_text','options'); ?>
    </div>
  </div>
</section>

<section class="careers_archive">
  <div class="container">
    <div class="twelve columns">
      <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
        <?php get_template_part('inc/career'); ?>
      <?php endwhile; ?>
      <div class="twelve columns">
      <?php numeric_posts_nav(); ?>
      </div>
      <?php else : ?>
        <article class="standard no_positions">
          <div class="item_content eight columns offset-by-two">
            <div class="content">
              <h3>Unfortunately, we do not have any open positions at the moment.</h3>
              
              <p>Keep an eye on our social media channels for updates.</p>
              <ul class="social">
                <?php if(get_field('facebook_link','options')): ?>
                <li><a href="<?php the_field('facebook_link','options'); ?>" aria-label="Facebook"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.svg" alt="Facebook" loading="lazy"/></a></li>
                <?php endif; ?>
                <?php if(get_field('twitter_link','options')): ?>
                <li><a href="<?php the_field('twitter_link','options'); ?>" aria-label="Twitter"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.svg" alt="Twitter" loading="lazy"/></a></li>
                <?php endif; ?>
                <?php if(get_field('linkedin_link','options')): ?>
                <li><a href="<?php the_field('linkedin_link','options'); ?>" aria-label="LinkedIn"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin.svg" alt="LinkedIn" loading="lazy"/></a></li>
                <?php endif; ?>
                <?php if(get_field('vimeo_link','options')): ?>
                <li><a href="<?php the_field('vimeo_link','options'); ?>" aria-label="Vimeo"><img src="<?php bloginfo('template_directory'); ?>/img/vimeo.svg" alt="Vimeo" loading="lazy"/></a></li>
                <?php endif; ?>
                <?php if(get_field('instagram_link','options')): ?>
                <li><a href="<?php the_field('instagram_link','options'); ?>" aria-label="Instagram"><img src="<?php bloginfo('template_directory'); ?>/img/instagram.svg" alt="Instagram" loading="lazy"/></a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </article>
      <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/cta_contact' ); ?>

<?php get_footer(); ?>

