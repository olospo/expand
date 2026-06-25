<?php /* Footer */ ?>

<footer class="main">
    <div class="container footer-grid">

        <div class="footer-brand">
            <a href="https://www.bcg.com" target="_blank" rel="noopener">
                <img src="<?php bloginfo('template_directory'); ?>/img/bcg.svg" alt="BCG logo" class="bcg" loading="lazy" />
            </a>
            <h4 class="expand">BCG Expand</h4>
            <p class="tagline">Benchmarking and data insights for financial institutions.</p>
            <address>
                Registered Office: 80 Charlotte Street London W1T 4DF
            </address>
            <p>Registered in England and Wales: OC365360</p>
            <?php $email = get_field('contact_email','options'); ?>
            
            <?php if ($email) : ?>
                <p class="email">
                    <a href="mailto:<?php echo esc_attr($email); ?>"><i class="fa-regular fa-envelope"></i> <?php echo esc_html($email); ?></a>
                </p>
            <?php endif; ?>
            <p class="email">
                <a href="https://www.linkedin.com/company/bcgexpand" target="_blank"><i class="fa-brands fa-square-linkedin"></i> Visit BCG Expand on LinkedIn</a>
            </p>
            
        </div>

        <div class="footer_links footer-company">
            <h4>Company</h4>
            <?php wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_class'     => 'menu',
                'container'      => false,
                'fallback_cb'    => false
            )); ?>
        </div>     
        <div class="footer_links footer-products">
            <h4>Products and services</h4>
            <?php wp_nav_menu(array(
                'theme_location' => 'product-footer',
                'menu_class'     => 'menu footer-products-menu',
                'container'      => false,
                'fallback_cb'    => false
            )); ?>
        </div>
    </div>
</footer>

<footer class="copyright">
  <div class="container">
    <div class="end_links twelve columns">   
      <div class="left six columns"><strong>Copyright &copy; Expand Research LLP <?php echo date("Y"); ?></strong></div>
      <div class="right six columns">Design: <a href="https://www.thinkmarsh.com/" target="_blank">ThinkMarshStudio</a> | Website: <a href="https://www.olospo.co.uk/" target="_blank">Olospo</a></div>
    </div>
  </div>
</footer>

<a href="#" class="back_to_top">Back to Top</a>

<?php wp_footer(); ?>
</body>
</html>