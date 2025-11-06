<?php /* Single Product */
get_header();
while ( have_posts() ) : the_post(); ?>

<!-- Navigation -->

<section class="offering nav">
  <div class="container">
    <div class="twelve columns">
      <!-- <a href="#problem" data-nav="problem" class="active">Problem</a>
      <a href="#impact" data-nav="impact">Impact</a>
      <a href="#approach" data-nav="approach">Approach</a>
      <a href="#value" data-nav="value">Value Pathways</a>
      <a href="#sectors" data-nav="sectors">Sectors</a>
      <a href="#diagnostic" data-nav="diagnostic">Quick Diagnostic</a>
      <a href="#roi" data-nav="roi">ROI</a>
      <a href="#insights" data-nav="insights">Insights</a>
      <a href="bcg-exhibits-module.html" target="_blank" rel="noopener" data-nav="exhibits">BCG Exhibits</a>
      <a href="#packages" data-nav="packages">Engage</a>
      <a href="#testimonials" data-nav="testimonials">Testimonials</a>
      <a href="#contact" data-nav="contact">Contact</a>
      <a class="cta" href="#contact">Book a Diagnostic</a> -->
    </div>
  </div>
</section>

<!-- Offering / Supporting Content / Quantitative Measures -->
<section class="offering hero">
  <div class="container">
    <div class="intro eight columns">
      <span class="kicker"><?php the_title(); ?></span>
      <h1>Identifying untapped opportunities and reducing inefficiencies</h1>
      <p>We identify untapped opportunities and reduce inefficiencies across your market data cost base, with benchmark-driven insights tailored to your institutional footprint.</p>
      
      <a class="button alt" href="#diagnostic">Benchmark Your Operations</a>
      <a class="button alt" href="value-pathways-module.html" target="_blank" rel="noopener">Open Value Pathways Module</a>
    </div>  
  </div>
</section>



<section class="square_section green">
  <div class="container">
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title <?php if( $custom ) { echo $split; } ?>">Who we work with</h3>
        </div>
        <p>CIOs, CTOs, COOs, Heads of Technology & Operations, and Transformation Leaders in financial services seeking to optimize spend, efficiency, and scale while enabling front-office growth.</p>
      </div>
    </div>
    <div class="square_background" style="background: url('https://expand.local/wp-content/uploads/2023/10/expand_bp.jpg') center center no-repeat; background-size:cover;"></div>
  </div>
</section>

<!-- Problem -->
<section class="offering problem filterable" id="problemSection">
  <div class="container">
    <h2>The Problem</h2>
    <div class="grid grid-1">
      <div class="card blue">
        <ul class="list-check">
          <h3>Cost Optimisation</h3>
          <li><span class="tick">✔</span> Fragmented market data environments create cost inefficiencies and usage blind spots</li>
          <li>✔ Limited visibility into peer pricing and vendor usage patterns</li>
          <li>✔ Pressure from Procurement and the Business to reduce costs without sacrificing functionality (do more with less!)</li>
          <li>✔ Complex license structures and compliance risk from misuse</li>
          <li>✔ High user dissatisfaction with certain high-cost tools remains unaddressed</li>
        </ul>
      </div>
      <div class="card purple">
        <ul class="list-check">
          <h3>Peer Benchmarking</h3>
          <li>✔ Limited visibility into peer pricing and vendor usage patterns</li>
          <li>✔ Pressure from Procurement and the Business to reduce costs without sacrificing functionality (do more with less!)</li>
          <li>✔ Complex license structures and compliance risk from misuse</li>
          <li>✔ High user dissatisfaction with certain high-cost tools remains unaddressed </li>
        </ul>
      </div>
      <div class="card green">
        <ul class="list-check">
          <h3>Vendor Strategy & Negotiation Support</h3>
          <li>✔ Fragmented market data environments create cost inefficiencies and usage blind spots</li>
          <li>✔ Limited visibility into peer pricing and vendor usage patterns</li>
          <li>✔ Pressure from Procurement and the Business to reduce costs without sacrificing functionality (do more with less!)</li>
          <li>✔ Complex license structures and compliance risk from misuse</li>
          <li>✔ High user dissatisfaction with certain high-cost tools remains unaddressed </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Impact -->
<section class="offering impact filterable" id="impactSection">
  <div class="container">
    <h2>Impact</h2>
    <div class="metrics blue">
      <div class="metric blue">
        <span class="unit" data-count="12" data-prefix="$" data-postfix="M">12</span>
        <span class="description">Identified and realized Research and Analytics savings</span>
      </div>
      <div class="metric blue">
        <span class="unit" data-count="10" data-prefix="$" data-postfix="M">10</span>
        <span class="description">Reduction secured on an enterprise deal with a key Market Data vendor</span>
      </div>
      <div class="metric blue">
        <span class="unit" data-count="1" data-prefix="$" data-postfix="M">1</span>
        <span class="description">Saved on Bloomberg Data License spend</span>
      </div>
      <div class="metric blue">
        <span class="unit" data-count="1" data-prefix="$" data-postfix="M">1</span>
        <span class="description">Saved through full removal of a credit risk product</span>
      </div>
    </div>
    <div class="metrics purple">
      <div class="metric purple">
        <span class="unit" data-count="15" data-postfix=" Years">15</span>
        <span class="description">Supported vendor negotiation cycles with pricing and usage benchmarks</span>
      </div>
      <div class="metric purple">
        <span class="unit" data-count="0">0</span>
        <span class="description">Locked in below-benchmark spend with leading Market Data vendor </span>
      </div>
      <div class="metric purple">
        <span class="unit" data-count="10" data-prefix="$" data-postfix="M">10</span>
        <span class="description">Reduction secured on an enterprise deal with a key Market Data vendor</span>
      </div>
    </div>
    <div class="metrics green">
      <div class="metric green">
        <span class="unit" data-count="10" data-prefix="$" data-postfix="M">10</span>
        <span class="description">Reduction secured on an enterprise deal with a key Market Data vendor</span>
      </div>
      <div class="metric green">
        <span class="unit" data-count="10" data-prefix="$" data-postfix="M">12</span>
        <span class="description">Identified and realized Research and Analytics savings</span>
      </div>
      <div class="metric green">
        <span class="unit" data-count="15" data-postfix="Years">15</span>
        <span class="description">Supported vendor negotiation cycles with pricing and usage benchmarks</span>
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
</section>



<!-- Approach -->
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
      <div class="card purple">
        <h3>Benchmark model </h3>
        <p>Our proprietary benchmark model estimates expected market data costs for firms of a given size, using relevant business metrics and industry peer averages.</p>
      </div>
      <div class="card purple">
        <h3>Benchmark data</h3>
        <ul class="list-check">
          <p>We leverage years of experience to deliver high-accuracy benchmarks while keeping participant effort low.</p>
        </ul>
      </div>
      <div class="card purple">
        <h3>Benchmark delivery</h3>
        <p>Our process keeps participant effort low while enabling robust like-for-like comparisons.</p>
      </div>
    </div>
  </div>
</section>

<!-- Value Pathways -->
<section class="offering value filterable">
  <div class="container">
    <h2>Value Pathways</h2>
    <p>Concise summary for performance. Full, interactive pathways live in the separate module.</p>
    <div class="grid grid-3">
      <div class="card blue">
        <strong>Cost Optimisation</strong>
        <p>Firms leverage our benchmarking to reduce overspend, rationalize vendors, and identify duplicative or underutilized products. New clients typically realize 10–20% in annual savings on market data, while YoY participants perform consistently better than industry price hikes.</p>
        <a class="button alt" href="value-pathways-module.html" target="_blank" rel="noopener">Open Value Pathways Module</a>
      </div>
      <div class="card purple">
        <strong>Peer Benchmarking</strong>
        <p>Understand how peers of similar scale and operating model allocate their market data spend and structure their vendor relationships. Clients gain confidence in negotiations and budget planning.</p>
        <a class="button alt" href="value-pathways-module.html" target="_blank" rel="noopener">Open Value Pathways Module</a>
      </div>
      <div class="card green">
        <strong>Vendor Strategy & Negotiation Support</strong>
        <p>Empower internal stakeholders with independent, granular insights into vendor pricing, adoption trends, and service satisfaction to enhance strategic negotiations.</p>
        <a class="button alt" href="value-pathways-module.html" target="_blank" rel="noopener">Open Value Pathways Module</a>
      </div>
    </div>
  </div>
</section>

<!-- Sectors -->
<!-- <section class="offering sectors">
  <div class="container">
    <h2>Sectors</h2>
    <p>We tailor benchmarks and playbooks by sector. Explore patterns and priority levers for your domain.</p>
    <div id="sectorFilter" class="card" style="display:flex;gap:.5rem;flex-wrap:wrap;align-items:center">
      <span class="pill">Filter:</span>
      <button  data-key="all" id="filterAll">All</button>
      <button  data-key="markets" id="filterMarkets">Investment Banks</button>
      <button  data-key="wealth" id="filterWealth">Asset Managers</button>
      <button  data-key="wealth" id="filterWealth">Hedge Funds</button>
      <button   data-key="retail" id="filterRetail">Sovereign Wealth Firms</button>
      <button   data-key="retail" id="filterRetail">Commodities Trading Firms</button>
    </div>
    <div class="grid grid-3" id="sectorsGrid" style="margin-top:1rem">
      <article class="card" data-sector="markets">
        <span class="kicker">Markets</span>
        <h3 style="margin:.2rem 0 .6rem">Latency, Resilience, and Throughput</h3>
        <ul class="list-check">
          <li>✔ Reprice/route latency, venue connectivity, service SLOs</li>
          <li>✔ Automation in middle/back, incident/error rates</li>
          <li>✔ Front-to-back flow, release frequency & change failure rate</li>
        </ul>
        <a class="button" href="value-pathways-module.html#vp-revenue" target="_blank" rel="noopener">See Revenue Pathway</a>
      </article>
      <article class="card" data-sector="wealth">
        <span class="kicker">Wealth</span>
        <h3 style="margin:.2rem 0 .6rem">Onboarding, Personalization, and Advisor Productivity</h3>
        <ul class="list-check">
          <li>✔ KYC/AML STP rates, cycle time variance, document exceptions</li>
          <li>✔ Digital engagement and feature utilization by segment</li>
          <li>✔ Advisor tooling, data readiness, and workflow friction</li>
        </ul>
        <a class="button" href="value-pathways-module.html#vp-penetration" target="_blank" rel="noopener">See Penetration Pathway</a>
      </article>
      <article class="card" data-sector="retail">
        <span class="kicker">Retail Banking</span>
        <h3 style="margin:.2rem 0 .6rem">Cost-to-Serve, Reliability, and Growth at Scale</h3>
        <ul class="list-check">
          <li>✔ Unit costs by product/channel, branch vs. digital mix</li>
          <li>✔ Reliability & incident heatmaps across journeys</li>
          <li>✔ Cloud & automation waves that reduce CIR sustainably</li>
        </ul>
        <a class="button" href="value-pathways-module.html#vp-cost" target="_blank" rel="noopener">See Cost Pathway</a>
      </article>
    </div>
  </div>
</section> -->

<!-- Diagnostic -->


  
<!-- Insights -->
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
</section>

<!-- Exhibits -->
<!-- <section class="offering exhibits">
  <div class="container">
    <h2>BCG Exhibits</h2>
    <p>Licensed BCG exhibits are hosted in a separate module to keep this page light and fast.</p>
    <div class="metrics">
      <div class="metric">
        <span class="unit">10%+</span>
        <span class="description">Tech spend share of revenues</span>
      </div>
      <div class="metric">
        <span class="unit">~9%</span>
        <span class="description">Global tech spend CAGR</span>
      </div>
      <div class="metric">
        <span class="unit">≤60%</span>
        <span class="description">Target RTB share</span>
      </div>
    </div>
    <div>
      <a class="button alt" href="bcg-exhibits-module.html" target="_blank" rel="noopener">Open BCG Exhibits Module</a>
    </div>
  </div>
</section> -->

<!-- Testimonials -->
<!-- <section class="offering testimonials">
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

<!-- Packages -->
<!-- <section class="offering packages">
  <div class="container">
    <h2>Engagement Packages</h2>
    <div class="grid grid-3">
      <div class="card">
        <h3>Benchmark Diagnostic</h3>
        <ul>
          <li>Data collection via MIS extracts</li>
          <li>Rescaled benchmark report & readout</li>
          <li>Top 10 opportunities identified</li>
        </ul>
        <a class="button primary" href="#contact">Start</a>
      </div>
      <div class="card">
        <h3>Diagnostic + Strategy Workshop</h3>
        <ul>
          <li>Executive workshop & investment cases</li>
          <li>Automation & cloud adoption sequencing</li>
          <li>Resourcing optimization plan</li>
        </ul>
        <a class="button primary" href="#contact">Book</a>
      </div>
      <div class="card">
        <h3>Full Partnership</h3>
        <ul>
          <li>Operating model redesign</li>
          <li>Program governance & KPI tracking</li>
          <li>Value realization office</li>
        </ul>
        <a class="button primary" href="#contact">Discuss</a>
      </div>
    </div>
  </div>
</section> -->

<!-- Contact -->
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
</section>

<!-- Modules -->
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
</section>

<section class="stat_section visible">
  <div class="container">
    <div class="stats four">
          <div class="stat white visible">
        <span class="unit" data-count="24">24</span>
        <span class="description">Years</span>
      </div>
          <div class="stat green visible">
        <span class="unit" data-count="200" data-postfix="+">200</span>
        <span class="description">Firms engaged each year</span>
      </div>
          <div class="stat grey visible">
        <span class="unit" data-count="50" data-postfix="+">50</span>
        <span class="description">Benchmarks</span>
      </div>
          <div class="stat white visible">
        <span class="unit" data-count="5.1" data-postfix="TB">5.10TB</span>
        <span class="description">Mapped Client Data</span>
      </div>
        </div>
  </div>
</section>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>