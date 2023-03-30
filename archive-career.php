<?php /* Archive */
get_header(); ?>

<section class="text_section">
  <div class="container">
    <div class="ten columns offset-by-one">
      <p>As a trusted advisor to senior executives across the world’s leading financial services firms, providing unique data-driven business intelligence to help them to operate more effectively, we have a breadth and depth of opportunities to offer you a rewarding and varied career path.</p>
    </div>
  </div>
</section>

<section class="square_section green">
  <div class="container">
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title">Expand+ BCG</h3>
        </div>
        <p>Expand is a wholly-owned subsidiary of the Boston Consulting Group, headquartered in London and with offices in Singapore and New York. Our enthusiastic and committed team has a friendly, diverse small company feel with regular social events and a highly collaborative, professional, supportive and entrepreneurial working culture.</p>
      </div>
    </div>
    <div class="square_background">
    
    </div>
  </div>
</section>

<section class="page">
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
              
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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

<section class="our_products">
  <div class="container">
    <div class="title six columns">
      <h3 class="split_title">Our Values</h3>
      <p>Expand embraces diversity, innovation and creativity and recognizes values and core competencies that apply to everyone. These values underpin the very work that we do.</p>
    </div>
    <div class="row">
      <article class="one-third column">
        <div class="content">
          <h4>Integrity</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Respect for the individual</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Ambassador of the firm</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
    </div>
  </div>
</section>

<?php get_footer(); ?>

