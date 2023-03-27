<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<?php get_template_part( 'inc/text' ); ?>

<?php get_template_part( 'inc/stats' ); ?>

<section class="squares">
  <div class="container">
    
  </div>
</section>

<section class="tabbed_section">
  <div class="container">
    <div class="title twelve columns">
      <h3>Our Framework</h3>
    </div>
    <div class="tab_menu twelve columns">
      <button class="w3-bar-item w3-button tablink active" onclick="openTab(event,'London')">London</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Paris')">Paris</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Tokyo')">Tokyo</button>
    </div> 
    <article id="London" class="tab twelve columns">
      <h2>Data Collection</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </article>
    
    <article id="Paris" class="tab twelve columns" style="display:none">
      <h2>Monitoring</h2>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </article>
    
    <article id="Tokyo" class="tab twelve columns" style="display:none">
      <h2>Comparison</h2>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </article>
  </div>
</section>

<section class="our_products">
  <div class="container">
    <div class="title twelve columns">
      <h3>Our Products</h3>
    </div>
    <div class="row">
      <article class="one-third column">
        <div class="content">
          <h4>Functional Effectiveness</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Functional Effectiveness</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Functional Effectiveness</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="careers_cta">
    <div class="cta_background">
      
    </div>
    <div class="cta_content">
      <div class="content">
      <h4>We're building tomorrow</h4>
      <p>Flourish in an environment where creative thinking is encouraged. Become a part of our unique, diverse and entrepreneurial environment</p>
      </div>
    </div>

</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>