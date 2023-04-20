<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero home">
  <div class="video-upload" style="background: linear-gradient(rgba(0, 0, 0, 0.70), rgba(0, 0, 0, 0.70));">
    <video data-object-fit="cover" playsinline muted autoplay loop  id="homeVideo" poster="<?php bloginfo('template_directory'); ?>/video/home.jpg">
      <source src="<?php bloginfo('template_directory'); ?>/video/home.webm" type="video/webm" preload="auto">
      <source src="<?php bloginfo('template_directory'); ?>/video/home.mp4" type="video/mp4" preload="auto">
    </video>
    <div class="poster" style="background: url('<?php bloginfo('template_directory'); ?>/video/home.jpg') center center no-repeat; background-size: cover"></div>
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

<section class="stat_section">
  <div class="container">
    <div class="stats four">
      <div class="stat grey">
        <span class="unit" data-count="22">22</span>
        <span class="description">Years</span>
      </div>
      <div class="stat green">
        <span class="unit" data-count="200" data-postfix="+">200</span>
        <span class="description">Firms engaged each year</span>
      </div>
      <div class="stat white">
        <span class="unit" data-count="50" data-postfix="+">50</span>
        <span class="description">Benchmarks</span>
      </div>
      <div class="stat grey">
        <span class="unit" data-count="5.1" data-postfix="TB">5.1</span>
        <span class="description">Mapped Client Data</span>
      </div> 
    </div>
  </div>
</section>

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
    <article id="Data" class="tab ten columns offset-by-one">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/data_collection.png" height="333px" width="600px" alt="Data Collection icon">
        </div>
        <div class="content">
          <p>Expand collects raw data from clients rather than relying on filling in complex templates. This not only reduces the effort needed to participate, but also allows us to ensure database integrity as well as alignment in scope and definitions.</p>
        </div>
      </div>
    </article>
    
    <article id="Normalisation" class="tab ten columns offset-by-one" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/normalisation.png" height="308px" width="600px" alt="Normalisation icon">
        </div>
        <div class="content">
          <p>Expand leverages years of experience to ensure unparalleled relevancy of comparisons. Peer groups can be tailored, and other complexity and scaling measures are captured and verified to create truly bespoke indicators of performance.</p>
        </div>
      </div>
    </article>
    <article id="Action" class="tab ten columns offset-by-one" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/action.png" height="297px" width="600px" alt="Action icon">
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
          <p>Want to understand cost and capability?</p>
          <p>Here is an extensive product portfolio designed to support firms in assessing specific functional areas relative to peers, including:</p>
          <ul>
            <li>Technology</li>
            <li>Operations</li>
            <li>Corporate Functions</li>
            <li>External Fees</li>
          </ul>
        </div>
        </a>
      </article>
      
      <article class="one-third column">
        <a href="<?php echo get_site_url(); ?>/products#Business">
        <div class="content">
          <span class="type">Product</span>
          <h4>Business Performance Benchmarks</h4>
          <p>Want to know the health of your business?</p>
          <p>These products provide independent and impartial benchmarks of firms’ overall performance relative to peers, including:</p>
          <ul>
            <li>Revenues</li>
            <li>Volumes</li>
            <li>Client Intelligence</li>
          </ul> 
        </div>
        </a>
      </article>
      
      <article class="one-third column">
        <a href="<?php echo get_site_url(); ?>/products#Working">
        <div class="content">
          <span class="type">Product</span>
          <h4>Working Groups & Forums</h4>
          <p>Want to know what your peers are thinking?</p>
          <p>These events are an opportunity for member participants to meet with peers and discuss hot topics or challenges they might be facing, in a controlled and confidential environment:</p>
          <ul>
            <li>Tech and Ops Roundtables</li>
            <li>IT Regulatory Risk Working Group</li>
            <li>Fraud, Financial Crime and AML eForums</li>
            <li>Market Data Forums</li>
            <li>CIO and COO Forums</li>
          </ul>
        </div>
        </a>
      </article>
      
    </div>
  </div>
</section>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>