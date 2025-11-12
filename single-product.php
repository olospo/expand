<?php /* Single Product */
get_header();

$intro = get_field('description');
$eLogo = get_field('e_logo');
$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

while ( have_posts() ) : the_post(); ?>

<!-- Offering / Supporting Content / Quantitative Measures -->
<section class="offering hero">
  <div class="container">
    <div class="intro ten columns">
      <span class="kicker"><?php the_title(); ?></span>
      <h1>Identifying untapped opportunities and reducing inefficiencies</h1>
      <p><?php echo $intro; ?></p>
    </div>  
  </div>
</section>

<section class="offering image">
  <div class="background" style="background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php echo esc_url( $featured_image_url ); ?>') center center no-repeat; background-size: cover;">
    <div class="container">
      <?php if (!empty($eLogo)): ?>
        <img src="<?php echo $eLogo; ?>" alt="<?php the_title(); ?> Logo" class="elogo"
      <?php endif; ?>
    </div>
    
  </div>
</section>

<!-- Modules -->
<section class="offering modules our_products">
  <div class="container">
    <div class="intro">
    <h2>Our <?php the_title(); ?> Services</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="row">
      <article style="background: url('https://expand.local/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="one-third column visible">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Cost Optimisation</h4>
          <p>Firms leverage our benchmarking to reduce overspend, rationalize vendors, and identify duplicative or underutilized products.</p>
          <span class="button">Select This Pathway</span>        
        </div>
        </a>      
      </article>
      <article style="background: url('https://expand.local/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="one-third column visible">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Peer Benchmarking</h4>
          <p>Understand how peers of similar scale and operating model allocate their market data spend and structure their vendor relationships.</p>
          <span class="button">Select This Pathway</span>        
        </div>
        </a>      
      </article>
      <article style="background: url('https://expand.local/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="one-third column visible">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Vendor Strategy & Negotiation Support</h4>
          <p>Empower internal stakeholders with independent, granular insights into vendor pricing, adoption trends, and service satisfaction to enhance strategic negotiations.</p>
          <span class="button">Select This Pathway</span>        
        </div>
        </a>      
      </article>
    </div>
  </div>
</section>

<div class="hidden">
<!-- Problem -->
  <section class="offering problem filterable" id="problemSection">
    <div class="container">
      <h2>The Problem</h2>
      <div class="grid grid-1">
        <div class="card green">
          <ul class="list-check">
            <h3>Cost Optimisation</h3>
            <li><span class="tick">✔</span> Fragmented market data environments create cost inefficiencies and usage blind spots</li>
            <li>✔ Limited visibility into peer pricing and vendor usage patterns</li>
            <li>✔ Pressure from Procurement and the Business to reduce costs without sacrificing functionality (do more with less!)</li>
            <li>✔ Complex license structures and compliance risk from misuse</li>
            <li>✔ High user dissatisfaction with certain high-cost tools remains unaddressed</li>
          </ul>
        </div>
      </div>
    </div>
  </section> 
</div>

<?php get_template_part( 'inc/flexible/product_filter'); // Application/Animated Icons Section ?>



<!-- Impact 
<section class="offering impact filterable" id="impactSection">
  <div class="container">
    <h2>Impact</h2>
    <div class="metrics">
      <div class="metric green">
        <span class="unit">$12M</span>
        <span class="description">Identified and realized Research and Analytics savings</span>
      </div>
      <div class="metric green">
        <span class="unit">$10M</span>
        <span class="description">Reduction secured on an enterprise deal with a key Market Data vendor</span>
      </div>
      <div class="metric green">
        <span class="unit">$1M</span>
        <span class="description">Saved on Bloomberg Data License spend</span>
      </div>
      <div class="metric green">
        <span class="unit">$1M</span>
        <span class="description">Saved through full removal of a credit risk product</span>
      </div>
    </div>
    <div class="grid grid-2">
      <div class="card"><strong>Case A — Global Investment Bank</strong>
      <ul>
        <li>Expand identified $13.5m in potential savings in Research and Analytics, and highlighted key vendors and products to target for removal.</li>
        <li>The client used this information to realise $12m in savings, including $5m through immediate cancellation</li>
      </ul>
    </div>
      <div class="card"><strong>Case B — Large Global Asset Manager </strong>
      <ul>
        <li>Used benchmarking to challenge vendor pricing, leading to a 12% reduction in total market data spend and improved contract terms.</li>
      </ul>
    </div>  
  </div>
</section> -->

<!-- Approach 
<section class="offering approach filterable" id="approachSection">
  <div class="container">
    <h2>Approach</h2>
    <div class="grid grid-3">
      <div class="card blue">
        <h3>Benchmark model</h3>
        <p>Our proprietary benchmark model estimates expected market data costs for firms of a given size, using relevant business metrics and industry peer averages.</p>
      </div>
      <div class="card blue">
        <h3>Benchmark data</h3>
        <ul class="list-check">
          <p>Our benchmark data is collected from the clients' inventory extracts, standardized using our industry-leading taxonomy, and validated with each client.</p>
        </ul>
      </div>
      <div class="card blue">
        <h3>Benchmark delivery</h3>
        <p>Deliver robust, peer-aligned benchmarks across spend and usage.</p>
      </div>
    </div>
  </div>
</section> -->

<!-- Diagnostic -->
  
<!-- Insights 
<section class="offering insights" id="insightsSection">
  <div class="container">
    <h2>Insights</h2>
    <div class="grid grid-3" id="insightsGrid">
      <article class="card" data-tag="benchmarking">
        <h3>Rebalancing RTB vs. CTB</h3>
        <p style="color:var(--muted)">A practical playbook for shifting spend while safeguarding reliability and enabling modernization.</p>
        <a class="button">Download Brief</a>
      </article>
      <article class="card" data-tag="automation">
        <h3>Automation Waves: Sequencing for impact</h3>
        <p style="color:var(--muted)">Metrics that matter, how to avoid pilot purgatory, and why change failure rate is a first‑class KPI.</p>
        <a class="button">Watch 10‑min Talk</a>
      </article>
      <article class="card" data-tag="client-intel">
        <h3>Client Intelligence 2025</h3>
        <p style="color:var(--muted)">Signals from buy‑side counterparties—where service, latency, and resilience now rank.</p>
        <a class="button">Access Highlights</a>
      </article>
    </div>
  </div>
</section> -->

<!-- Testimonials 
<section class="offering testimonials">
  <div class="container">
    <h2>What Leaders Say</h2>
    <div class="grid grid-2">
      <blockquote class="card">
        <p>"It’s been a great engagement and partnership from the BCG Expand team with a lot of great materials and discussions."</p>
        <cite>Global Head of Market Data, Tier 1 Bank</cite>
      </blockquote>
      <blockquote class="card">
        <p>“We didn’t realize how much we were overspending until we saw what our peers were doing. The data gave us a clear mandate to act.”</p>
        <cite>COO, Mid-sized Asset Manager</cite>
      </blockquote>
    </div>
  </div>
</section> -->


<!-- Contact 
<section class="offering contact">
  <div class="container">
    <h2>Contact Us</h2>
    <div class="grid grid-3">
      <article class="card">
        <h3>Experts</h3>
        <p><strong>Eddie Molloy</strong><br />Director – Global Commercial Lead – Third-party Fees Practice<br/><a href="mailto:eddie.molloy@bcgexpand.com">eddie.molloy@bcgexpand.com</a></p>
      </article>
    </div>
  </div>
</section> -->

<!-- Modules 
<section class="offering modules our_products">
  <div class="container">
    <h2>Modules</h2>
    <div class="row">
      <article style="background: url('https://expand.local/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="six columns visible">
        <a href="#">        
        <div class="content">
          <span class="type">Module</span>
          <h4>Value Pathways — Module</h4>
          <p>All five pathways with detailed levers, metrics, and vignettes.</p>
          <span class="button">Open Value Pathways Module</span>        
        </div>
        </a>      
      </article>
      <article style="background: url('https://expand.local/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="six columns visible">
        <a href="#">        
        <div class="content">
          <span class="type">Module</span>
          <h4>BCG Exhibits — (Licensed)</h4>
          <p>Licensed exhibits with accessible lightbox and attribution.</p>
          <span class="button">Open BCG Exhibits Module</span>        
        </div>
        </a>      
      </article>
    </div>
  </div>
</section> -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>