<?php 

$intro = get_field('description');
$eLogo = get_field('e_logo');
$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

while ( have_posts() ) : the_post(); ?>
  
<?php $parent_id = wp_get_post_parent_id( get_the_ID() );
if ( $parent_id ) {
    $parent_title = get_the_title( $parent_id );
    $parent_link  = get_permalink( $parent_id );
} ?>

<!-- Hero -->
<section class="offering hero">
  <div class="container">
    <div class="intro ten columns">
      <span class="kicker"><?php if ( $parent_id ) : ?>
          <a href="<?php echo esc_url( $parent_link ); ?>"><?php echo esc_html( $parent_title ); ?></a><?php endif; ?> / <?php the_title(); ?></span>
      <h1>Market Data Benchmark</h1>
      <p><?php echo $intro; ?></p>
    </div>  
  </div>
</section>

<!-- Offering Image -->
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
<section class="offering modules">
  <div class="container">
    <div class="intro">
    <h2><?php the_title(); ?> Pathways</h2>
    </div>
    <div class="row">
      <article style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="service-card one-third column visible" data-service="cost-optimisation">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Cost Optimisation</h4>
          <p>Firms leverage our benchmarking to reduce overspend, rationalize vendors, and identify duplicative or underutilized products.</p>
          <span class="button">Select This Pathway</span>        
        </div>
        </a>      
      </article>
      <article style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="service-card one-third column visible" data-service="peer-benchmarking">
        <a href="#">        
        <div class="content">
          <span class="type">Service</span>
          <h4>Peer Benchmarking</h4>
          <p>Understand how peers of similar scale and operating model allocate their market data spend and structure their vendor relationships.</p>
          <span class="button">Select This Pathway</span>        
        </div>
        </a>      
      </article>
      <article style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;" class="service-card one-third column visible" data-service="vendor-strategy">
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



<!-- Problem -->
<section class="offering problem hidden-section" data-service="cost-optimisation">
  <div class="container">
  <div class="product twelve columns" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_eye.jpg') center center no-repeat; background-size:cover;">
    <div class="content six columns">
      <h3><span>Cost Optimisation</span> The Problem</h3>
      <ul class="list-check">
        <li><span class="tick">✔</span> Fragmented market data environments create cost inefficiencies and usage blind spots</li>
        <li><span class="tick">✔</span>Limited visibility into peer pricing and vendor usage patterns</li>
        <li><span class="tick">✔</span> Pressure from Procurement and the Business to reduce costs without sacrificing functionality (do more with less!)</li>
        <li><span class="tick">✔</span> Complex license structures and compliance risk from misuse</li>
        <li><span class="tick">✔</span> High user dissatisfaction with certain high-cost tools remains unaddressed</li>
      </ul>
    </div>
  </div>
  </div>
</section>

<section class="offering problem hidden-section" data-service="peer-benchmarking">
  <div class="container">
  <div class="product twelve columns" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_mark-lane.jpg') center center no-repeat; background-size:cover;">
    <div class="content six columns">
      <h3><span>Peer Benchmarking</span> The Problem</h3>
      <ul class="list-check">
        <li><span class="tick">✔</span> Limited visibility into peer pricing and vendor usage patterns</li>
        <li><span class="tick">✔</span> Pressure from Procurement and the Business to reduce costs without sacrificing functionality (do more with less!)</li>
        <li><span class="tick">✔</span> Complex license structures and compliance risk from misuse</li>
        <li><span class="tick">✔</span> High user dissatisfaction with certain high-cost tools remains unaddressed </li>
      </ul>
    </div>
  </div>
  </div>
</section>

<section class="offering problem hidden-section" data-service="vendor-strategy">
  <div class="container">
  <div class="product twelve columns" style="background: url('<?php bloginfo('template_directory'); ?>/img/expand_wg.jpg') center center no-repeat; background-size:cover;">
    <div class="content six columns">
      <h3><span>Vendor Strategy & Negotiation Support</span> The Problem</h3>
      <ul class="list-check">
        <li><span class="tick">✔</span> Fragmented market data environments create cost inefficiencies and usage blind spots</li>
        <li><span class="tick">✔</span> Limited visibility into peer pricing and vendor usage patterns</li>
        <li><span class="tick">✔</span> Pressure from Procurement and the Business to reduce costs without sacrificing functionality (do more with less!)</li>
        <li><span class="tick">✔</span> Complex license structures and compliance risk from misuse</li>
        <li><span class="tick">✔</span> High user dissatisfaction with certain high-cost tools remains unaddressed </li>
      </ul>
    </div>
  </div>
  </div>
</section>

<!-- Impact -->
<section class="offering impact hidden-section" data-service="cost-optimisation">
  <div class="container">
    <h2><span>Cost Optimisation</span> The Impact</h2>
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
      <div class="card"><h4>Case Study A — Global Investment Bank</h4>
      <ul>
          <li>BCG Expand identified <strong>$13.5M in potential savings</strong> in Research and Analytics and highlighted key vendors and products for removal.</li>
          <li>The client used this information to realize <strong>$12M in savings</strong>, including $5M through immediate cancellation.</li>
        </ul>
      </div>
        <div class="card"><h4>Case Study B — Large Global Asset Manager </h4>
        <ul>
          <li>BCG Expand benchmarking was used to challenge vendor pricing, resulting in a <strong>12% reduction</strong> in total Market Data spend and improved contract terms.</li>
        </ul>
    </div>  
  </div>
</section> 

<section class="offering impact hidden-section" data-service="peer-benchmarking">
  <div class="container">
    <h2><span>Peer Benchmarking</span> The Impact</h2>
    <div class="metrics">
      <div class="metric green">
        <span class="unit">15 Years</span>
        <span class="description">Supported vendor negotiation cycles with pricing and usage benchmarks</span>
      </div>
      <div class="metric green">
        <span class="unit">0</span>
        <span class="description">Locked in below-benchmark spend with leading Market Data vendor</span>
      </div>
      <div class="metric green">
        <span class="unit">$10M</span>
        <span class="description">Reduction secured on an enterprise deal with a key Market Data vendor</span>
      </div>
    </div>
    <div class="grid grid-2">
      <div class="card"><h4>Case Study A — Global Investment Bank</h4>
      <ul>
          <li>BCG Expand identified <strong>$13.5M in potential savings</strong> in Research and Analytics and highlighted key vendors and products for removal.</li>
          <li>The client used this information to realize <strong>$12M in savings</strong>, including $5M through immediate cancellation.</li>
        </ul>
      </div>
        <div class="card"><h4>Case Study B — Large Global Asset Manager </h4>
        <ul>
          <li>BCG Expand benchmarking was used to challenge vendor pricing, resulting in a <strong>12% reduction</strong> in total Market Data spend and improved contract terms.</li>
        </ul>
    </div>  
  </div>
</section>

<section class="offering impact hidden-section" data-service="vendor-strategy">
  <div class="container">
    <h2><span>Vendor Strategy & Negotiation Support</span> The Impact</h2>
    <div class="metrics">
      <div class="metric green">
        <span class="unit">$10M</span>
        <span class="description">Reduction secured on an enterprise deal with a key Market Data vendor</span>
      </div>
      <div class="metric green">
        <span class="unit">$12M</span>
        <span class="description">Identified and realized Research and Analytics savings</span>
      </div>
      <div class="metric green">
        <span class="unit">15 Years</span>
        <span class="description">Supported vendor negotiation cycles with pricing and usage benchmarks</span>
      </div>
    </div>
    <div class="grid grid-2">
      <div class="card"><h4><span>Case Study A</span> — Global Investment Bank</h4>
      <ul>
          <li>BCG Expand identified <strong>$13.5M in potential savings</strong> in Research and Analytics and highlighted key vendors and products for removal.</li>
          <li>The client used this information to realize <strong>$12M in savings</strong>, including $5M through immediate cancellation.</li>
        </ul>
      </div>
        <div class="card"><h4><span>Case Study B</span> — Large Global Asset Manager </h4>
        <ul>
          <li>BCG Expand benchmarking was used to challenge vendor pricing, resulting in a <strong>12% reduction</strong> in total Market Data spend and improved contract terms.</li>
        </ul>
    </div>  
  </div>
</section> 

<!-- Approach -->
<section class="offering approach hidden-section" data-service="cost-optimisation">
  <div class="container">
    <h2><span>Cost Optimisation</span> The Approach</h2>
    <div class="grid grid-3">
      <div class="card blue">
        <h3>Benchmark model</h3>
        <p>Our proprietary benchmark model computes the expected Market Data cost for a firm of a given size, using relevant business metrics in addition to industry peer averages.</p>
      </div>
      <div class="card blue">
        <h3>Benchmark data</h3>
        <ul class="list-check">
          <p>Our benchmark data is collected via inventory extracts, standardized by BCG Expand analysts using the firm’s industry-leading taxonomy, and verified by the client.</p>
        </ul>
      </div>
      <div class="card blue">
        <h3>Benchmark delivery</h3>
        <p>Deliver robust, peer-aligned benchmarks across spend and usage.</p>
      </div>
    </div>
  </div>
</section>

<!-- Approach -->
<section class="offering approach hidden-section" data-service="peer-benchmarking">
  <div class="container">
    <h2><span>Peer Benchmarking</span> The Approach</h2>
    <div class="grid grid-3">
      <div class="card blue">
        <h3>Benchmark model</h3>
        <p>Our proprietary benchmark model computes the expected Market Data cost for a firm of a given size, using relevant business metrics in addition to industry peer averages.</p>
      </div>
      <div class="card blue">
        <h3>Benchmark data</h3>
        <ul class="list-check">
          <p>We leverage years of experience to ensure unparalleled accuracy while maintaining a low burden on participants.</p>
        </ul>
      </div>
      <div class="card blue">
        <h3>Benchmark delivery</h3>
        <p>We ensure minimal work for participants while allowing for the strongest like-for-like comparisons.</p>
      </div>
    </div>
  </div>
</section>

<!-- Insights -->
<section class="offering insights hidden-section always-show">
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

<section class="offering testimonials hidden-section always-show">
  <div class="container">
  <div class="product twelve columns" style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size:cover;">
    <div class="content six columns">
      <p>"It’s been a great engagement and partnership from the BCG Expand team with a lot of great materials and discussions."</p>
      <h4><span>Global Head of Market Data</span> Tier 1 Bank</h4>   
    </div>
    <div class="content six columns">
      <p>“We didn’t realize how much we were overspending until we saw what our peers were doing. The data gave us a clear mandate to act.”</p>
      <h4><span>Chief Operating Officer</span> Mid-sized Asset Manager</h4>
    </div>
  </div>
  </div>
</section>

<!-- Contact -->
<section class="offering contact hidden-section always-show">
  <div class="container">
    <h2>Contact Us</h2>
    <div class="grid grid-2">
      <article class="card">
        <div class="person">
        <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/09/Expand_Eddie_Edit_300.jpg" class="photo">
        <p><strong>Eddie Molloy</strong><br />Director – Global Commercial Lead<br /> Third-party Fees Practice<br/><a href="mailto:eddie.molloy@bcgexpand.com">eddie.molloy@bcgexpand.com</a></p>
        </div>
      </article>
      <article class="card">
        <form>
          <div class="name-field">
            <label>Name</label>
            <input type="text" />
  
            <label>Email</label>
            <input type="email" />
          </div>
        
          <div class="message-field">
            <label>Message</label>
            <textarea></textarea>
          </div>
            <button type="button">Submit</button>
            <button type="button" class="blank">Clear</button>

        </form>
      </article>
    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const serviceCards = document.querySelectorAll(".service-card");
  const allHiddenSections = document.querySelectorAll(".hidden-section");
  const alwaysShow = document.querySelectorAll(".always-show");
  let lastService = null;

  // Smooth scroll helper
  function smoothScrollTo(element, extraOffset = 0, duration = 700) {
    // detect header height dynamically (add extra offset if needed)
    const header = document.querySelector('.site-header'); // adjust selector if your header has a different class
    const headerHeight = header ? header.offsetHeight + extraOffset : extraOffset;

    const targetY = element.getBoundingClientRect().top + window.pageYOffset - headerHeight;
    const startY = window.pageYOffset;
    const distance = targetY - startY;
    let startTime = null;

    function animation(currentTime) {
      if (!startTime) startTime = currentTime;
      const timeElapsed = currentTime - startTime;
      const progress = Math.min(timeElapsed / duration, 1);
      const ease = progress < 0.5
        ? 4 * progress * progress * progress
        : 1 - Math.pow(-2 * progress + 2, 3) / 2; // easeInOutCubic
      window.scrollTo(0, startY + distance * ease);
      if (timeElapsed < duration) requestAnimationFrame(animation);
    }

    requestAnimationFrame(animation);
  }

  serviceCards.forEach(card => {
    card.addEventListener("click", e => {
      e.preventDefault();
      const service = card.dataset.service;

      // If clicking the same one again → do nothing
      if (service === lastService) return;

      // Hide all hidden sections first
      allHiddenSections.forEach(section => {
        section.style.display = "none";
      });

      // Show all matching hidden sections
      const targets = document.querySelectorAll(`.hidden-section[data-service="${service}"]`);
      let firstShown = null;

      targets.forEach(target => {
        target.style.display = "block";
        if (!firstShown) firstShown = target;
      });

      // Always show global sections
      alwaysShow.forEach(section => {
        section.style.display = "block";
      });

      // Scroll smoothly to the first revealed section
      if (firstShown) {
        // Add ~20px padding below the header if needed
        smoothScrollTo(firstShown, 40, 700);
      }

      // Track which service was last opened
      lastService = service;
    });
  });
});

</script>

<?php get_template_part( 'inc/flexible/product_filter'); // Application/Animated Icons Section ?>

<?php endwhile; // end of the loop. ?>