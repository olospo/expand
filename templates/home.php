<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero home">
  <div class="video-upload" style="background: linear-gradient(rgba(0, 0, 0, 0.70), rgba(0, 0, 0, 0.70));">
    <video data-object-fit="cover" playsinline muted autoplay loop  id="homeVideo" poster="<?php echo $image['url']; ?>">
      <source src="<?php bloginfo('template_directory'); ?>/video/home.webm" type="video/webm">
      <source src="<?php bloginfo('template_directory'); ?>/video/home.mp4" type="video/mp4">
    </video>
    <div class="poster" style="background: url('<?php echo $image['url']; ?>') center center no-repeat; background-size: cover"></div>
    <div class="icon"><img src="<?php bloginfo('template_directory'); ?>/img/insight_driven_benchmarking_colour.svg" /></div>
  </div>
</section>

<section class="square_section white large">
  <div class="container">
    <div class="square_background" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_mark-lane.jpg') center center no-repeat; background-size:cover;"></div>
    <div class="square_content">
      <div class="content">
        <p>We provide industry intelligence to financial services organisations of all types to empower them to grow, compete and operate with increased effectiveness</p>
      </div>
    </div>
  </div>
</section>

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
    <div class="square_background" style="background: url('<?php bloginfo('template_directory'); ?>/img/home_skyscrapers.jpg') center center no-repeat; background-size:cover;">
    
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
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Action')">Action</button>
    </div> 
    <article id="Data" class="tab eight columns offset-by-two">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/icon.png" alt="Placeholder icon">
        </div>
        <div class="content">
          <p>Expand collects raw data from clients rather than relying on filling in complex templates. This not only reduces the effort needed to participate, but also allows us to ensure database integrity as well as alignment in scope and definitions.</p>
        </div>
      </div>
    </article>
    
    <article id="Normalisation" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/icon_two.png" alt="Placeholder icon">
        </div>
        <div class="content">
          <p>Expand leverages years of experience to ensure unparalleled relevancy of comparisons. Peer groups can be tailored, and other complexity and scaling measures are captured and verified to create truly bespoke indicators of performance.</p>
        </div>
      </div>
    </article>
    <article id="Action" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/icon_two.png" alt="Placeholder icon">
        </div>
        <div class="content">
          <p>Expand’s unique insights provide senior stakeholders and decision makers with clear and actionable intelligence about competitiveness, performance, and opportunities. Helping clients make strategic, well-thought-out decisions to drive positive business outcomes.</p>
        </div>
      </div>
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
        <a href="<?php echo get_site_url(); ?>/products#Functional">
        <div class="content">
          <span class="type">Product</span>
          <h4>Functional Effectiveness</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
        </a>
      </article>
      
      <article class="one-third column">
        <a href="<?php echo get_site_url(); ?>/products#Business">
        <div class="content">
          <span class="type">Product</span>
          <h4>Business Performance Benchmarks</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
        </a>
      </article>
      
      <article class="one-third column">
        <a href="<?php echo get_site_url(); ?>/products#Working">
        <div class="content">
          <span class="type">Product</span>
          <h4>Working Groups & Forums</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
        </a>
      </article>
      
    </div>
  </div>
</section>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>