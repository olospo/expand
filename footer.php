<?php /* Footer */ ?>

<footer class="main">
  <div class="container">
    <div class="eight columns">
      <div class="logo">
        <img src="<?php bloginfo('template_directory'); ?>/img/bcg.svg" alt="BCG logo" class="bcg" loading="lazy" />
      </div>
      <div class="logo_wrap">
      <h4>Expand Research LLP</h4>
        <address>
          Registered Office: 80 Charlotte Street London W1T 4DF 
        </address>
        <p>Registered in England and Wales: OC365360</p>
        <?php $email = get_field('contact_email','options'); 
        if( $email ) { ?>
        <p class="email"><img src="<?php bloginfo('template_directory'); ?>/img/email-icon.svg" alt="Email Icon" loading="lazy" /><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
        <?php } ?> 
        
      <h5>Follow us</h5>
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
    <div class="footer_links four columns">
      <h4>Expand</h4>
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
    </div>
  </div>
</footer>

<footer class="copyright">
  <div class="container">
    <div class="end_links twelve columns">   
      <strong>Copyright &copy; Expand Research LLP <?php echo date("Y"); ?></strong><br />Design: <a href="https://www.thinkmarsh.com/" target="_blank">ThinkMarshStudio</a> | Development: <a href="https://www.olospo.co.uk/" target="_blank">Olospo</a>
    </div>
  </div>
</footer>

<a href="#" class="back_to_top">Back to Top</a>
<?php wp_footer(); ?>
</body>
</html>