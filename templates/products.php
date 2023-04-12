<?php /* Template Name: Products */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

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
    <div class="square_background">
    
    </div>
  </div>
</section>

<section class="tabbed_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Differentiated Methodology</h3>
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

<section class="product_section">
  <div class="container">
    
    <div class="product twelve columns">
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
    
    <div class="product twelve columns">
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
    
    <div class="product twelve columns">
      <div class="content six columns">
        <h3>Working Groups and Forums</h3>
        <p>Want to know what your peers are thinking?</p>
        <p>These events are an opportunity for member participants to meet with peers and discuss hot topics or challenges they might be facing, in a controlled and confidential environment:</p>
        <ul>
          <li>Tech and Ops Roundtables</li>
          <li>IT Regulatory Risk Working Group</li>
          <li>Fraud, Financial Crime and AML eForums → Market Data Forums</li>
          <li>CIO and COO Forums</li>
        </ul>
      </div>
    </div>
    
  </div>
</section>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>