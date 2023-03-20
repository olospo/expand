<?php /* Footer */ ?>

<footer class="main">
  <div class="container">
    <div class="eight columns">
      <div class="logo">
        <img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="A Productions Logo" loading="lazy"/>
      </div>
      <div class="logo_wrap">
      <h5>A Productions Ltd</h5>
      <?php if( have_rows('office_address','options') ): ?>
        <?php while( have_rows('office_address','options') ): the_row(); 
          $address = get_sub_field('address','options');
        ?>
        <address>
          <?php echo $address; ?>
        </address>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
      <div class="logo_links">
        <ul class="contact">
          <li><a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a></li>
          <li><a href="mailto:<?php the_field('email','options'); ?>"><?php the_field('email','options'); ?></a></li>
          
        </ul>
        <div class="cyber_group">
          <a href="https://www.cybergroupstudios.com" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/cyber_group.png" alt="Cyber Group Studios" width="198px" height="26px" />
          A Cyber Group Company</a>
        </div>
      </div>
    </div>
    <aside class="four columns">
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
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
      
    </aside>
  </div>
</footer>

<footer class="copyright">
  <div class="container">
    <div class="end_links twelve columns">
      <strong>&copy; A Productions Ltd <?php echo date("Y"); ?></strong> - Website by <a href="https://www.olospo.co.uk" target="_blank">Olospo</a>
    </div>
  </div>
</footer>

<a href="#" class="back_to_top">Back to Top</a>
<?php wp_footer(); ?>
</body>
</html>