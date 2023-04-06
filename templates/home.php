<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="square_section white">
  <div class="container">
    <div class="square_background"></div>
    <div class="square_content">
      <div class="content">
        <p>We provide industry intelligence to financial services organisations of all types to empower them to grow, compete and operate with increased effectiveness</p>
      </div>
    </div>
  </div>
</section>

<?php // get_template_part( 'inc/text' ); ?>

<?php get_template_part( 'inc/stats' ); ?>

<section class="square_section">
  <div class="container">
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title">Best in class</h3>
        </div>
        <p>Our customised research assists firms in future- proofing their business by enabling them to benchmark themselves against their peers, gather market intelligence about new and innovative strategies and gain an understanding of what best in class looks like</p>
      </div>
    </div>
    <div class="square_background">
    
    </div>
  </div>
</section>

<section class="tabbed_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Our Unique Approach</h3>
    </div>
    <div class="tab_menu twelve columns">
      <button class="w3-bar-item w3-button tablink active" onclick="openTab(event,'Data')">Data Collection</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Normalisation')">Normalisation</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Comparison')">Comparison</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Action')">Action</button>
    </div> 
    <article id="Data" class="tab twelve columns">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </article>
    
    <article id="Normalisation" class="tab twelve columns" style="display:none">
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </article>
    <article id="Comparison" class="tab twelve columns" style="display:none">
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </article>
    <article id="Action" class="tab twelve columns" style="display:none">
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </article>
  </div>
</section>

<section class="our_products">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Our Products</h3>
    </div>
    <div class="row">
      <article class="one-third column">
        <div class="content">
          <span class="type">Product</span>
          <h4>Functional Effectiveness</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <span class="type">Product</span>
          <h4>Business Performance Benchmarks</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <span class="type">Product</span>
          <h4>Working Groups & Forums</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="careers_cta">
  <div class="container">
    <div class="cta_background"></div>
    <div class="cta_content">
      <div class="content">
      <h4>We're building tomorrow</h4>
      <p>Flourish in an environment where creative thinking is encouraged. Become a part of our unique, diverse and entrepreneurial environment</p>
      <p><a href="#" class="button">Apply now</a><br />
      <a href="#" class="button">Explore our culture</a></p>
      </div>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>