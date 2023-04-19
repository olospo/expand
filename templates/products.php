<?php /* Template Name: Products */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero home" >
  <div class="video-upload" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_products.jpg') center center no-repeat; background-size:cover;">
  </div>
</section>

<section class="square_section green">
  <div class="container">
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title">KPI Catalogue</h3>
        </div>
        <p>Expand’s products are based on proprietary raw data, collected from our clients, spanning numerous metrics and KPIs suitable for a broad array of use cases. Take a look at our comprehensive KPI Catalogue to explore the depth and granularity of our peer-to-peer comparisons.</p>
      </div>
    </div>
    <div class="square_background" style="background: url('<?php bloginfo('template_directory'); ?>/img/about_solutions.jpg') center center no-repeat; background-size:cover;"></div>
  </div>
</section>

<section class="tabbed_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Differentiated Methodology</h3>
    </div>
    <div class="tab_menu twelve columns">
      <button class="w3-bar-item w3-button tablink active" onclick="openTab(event,'Data')">Data Collection</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Data Mapping')">Data Mapping</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Normalisation')">Normalisation</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Actionable')">Actionable Insights</button>
    </div> 
    <article id="Data" class="tab eight columns offset-by-two">
      <div class="contain">
        <div class="content">
          <p>Expand collects raw data from clients rather than relying on filling in complex templates. This not only reduces the effort needed to participate, but also allows us to ensure database integrity as well as alignment in scope and definitions.</p>
        </div>
      </div>
    </article>
    
    <article id="Data Mapping" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="content">
        <p>Benchmark data is collected via MIS extracts, is reviewed, and mapped by Expand analysts to a standard taxonomy and verified by the client. This ensures minimal work for participants while allowing for the strongest like-for-like comparisons</p>
        </div>
      </div>
    </article>
    <article id="Normalisation" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="content">
        <p>Expand leverages years of experience to ensure unparalleled relevancy of comparisons. Peer groups can be tailored, and other complexity and scaling measures are captured and verified to create truly bespoke indicators of performance.</p>
        </div>
      </div>
    </article>
    <article id="Actionable" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="content">
        <p>Expand’s unique insights provide senior stakeholders and decision makers with clear and actionable intelligence about competitiveness, performance, and opportunities. Helping clients make strategic, well-thought-out decisions to drive positive business outcomes. </p>
        </div>
      </div>
    </article>
  </div>
</section>

<section class="product_section">
  <div class="container">
    
    <div id="Functional" class="product twelve columns" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_fe.jpg') center center no-repeat; background-size:cover;">
      <div class="content six columns">
        <h3>Functional Effectiveness</h3>
        <p>Want to understand cost and capability?</p>
        <p>Here is an extensive product portfolio designed to support firms in assessing specific functional areas relative to peers, including:</p>
        <ul>
          <li>Technology</li>
          <li>Operations</li>
          <li>Corporate Functions</li>
          <li>External Fees</li>
        </ul>
      </div>
    </div>
    
    <div id="Business" class="product twelve columns" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_bp.jpg') center center no-repeat; background-size:cover;">
      <div class="content six columns">
        <h3>Business Performance</h3>
        <p>Want to know the health of your business?</p>
        <p>These products provide independent and impartial benchmarks of firms’ overall performance relative to peers, including:</p>
        <ul>
          <li>Revenues</li>
          <li>Volumes</li>
          <li>Client Intelligence</li>
        </ul>
      </div>
    </div>
    
    <div id="Working" class="product twelve columns" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_wg.jpg') center center no-repeat; background-size:cover;">
      <div class="content six columns">
        <h3>Working Groups and Forums</h3>
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
    </div>
    
  </div>
</section>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>