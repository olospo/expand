<?php 

$intro = get_field('description');
$eLogo = get_field('e_logo');
$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

// If none exists, try the parent page’s featured image
if ( empty( $featured_image_url ) ) {
    $parent_id = wp_get_post_parent_id( get_the_ID() );
    if ( $parent_id ) {
        $featured_image_url = get_the_post_thumbnail_url( $parent_id, 'full' );
    }
}

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
      <h1><?php the_title(); ?></h1>
      <p><?php echo $intro; ?></p>
    </div>  
  </div>
</section>

<!-- Offering Image -->
<section class="offering image">
  <div class="background" style="background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php echo esc_url( $featured_image_url ); ?>') center center no-repeat; background-size: cover;">
  </div>
</section>


<!-- MODULES -->
<section class="offering modules">
  <div class="container">
    <div class="intro">
      <h2><?php the_title(); ?> Pathways</h2>
    </div>
    <div class="row">
    <?php if ( have_rows('pathways') ) : ?>
      <?php while ( have_rows('pathways') ) : the_row(); ?>
        <?php 
          $title    = get_sub_field('pathway_title');
          $slug     = get_sub_field('pathway_slug');
          $summary  = get_sub_field('pathway_summary');
        ?>
        <article class="service-card one-third column small-margin" data-service="<?php echo esc_attr($slug); ?>" style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;">
          <a href="#">
            <div class="content">
              <span class="type">Service</span>
              <h4><?php echo $title; ?></h4>
              <p><?php echo $summary; ?></p>
              <span class="button">Select This Pathway</span>
            </div>
          </a>
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
    <?php endif; ?>
    </div>
  </div>
</section>

<?php if ( have_rows('pathways') ) : ?>
  <?php while ( have_rows('pathways') ) : the_row(); ?>
    <?php 
      $title          = get_sub_field('pathway_title');
      $slug           = get_sub_field('pathway_slug');
      // Problem
      $problem_bg     = get_sub_field('problem_background_image');
      $problem_content = get_sub_field('problem_content');
      // Impact
      $impact_metrics = get_sub_field('impact_metrics');
      $case_studies   = get_sub_field('case_studies');
      // Approach
      $approach_cards = get_sub_field('approach_cards');
    ?>
    <!-- PROBLEM -->
    <section class="offering problem hidden-section" data-service="<?php echo esc_attr($slug); ?>">
      <div class="container">
        <div class="product twelve columns" style="background: url('<?php echo esc_url($problem_bg); ?>') center center no-repeat; background-size:cover;">
          <div class="content six columns">
            <h3><span><?php echo esc_html($title); ?></span> The Problem</h3>
            <?php echo $problem_content; ?>
            </div>
        </div>
      </div>
    </section>

    <!-- IMPACT -->
    <?php if ( $impact_metrics || $case_studies ) : ?>
    <section class="offering impact hidden-section" data-service="<?php echo esc_attr($slug); ?>">
      <div class="container">
        <h2><span><?php echo esc_html($title); ?></span> The Impact</h2>
    
        <!-- METRICS -->
        <?php if ( $impact_metrics ) : ?>
        <div class="metrics">
          <?php foreach ( $impact_metrics as $metric ) : ?>
          <div class="metric green">
            <span class="unit">
              <?php echo esc_html( $metric['metric_unit'] ); ?>
            </span>
            <span class="description">
              <?php echo esc_html( $metric['metric_description'] ); ?>
            </span>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
    
        <!-- CASE STUDIES -->
        <?php if ( $case_studies ) : ?>
        <div class="grid grid-2">
          <?php foreach ( $case_studies as $study ) : ?>
          <div class="card">
            <?php if ( ! empty( $study['case_study_title'] ) ) : ?>
            <h4><?php echo esc_html( $study['case_study_title'] ); ?></h4>
            <?php endif; ?>
            <?php if ( ! empty( $study['case_study_content'] ) ) : ?>
            <div class="case-study-content">
              <?php echo wp_kses_post( $study['case_study_content'] ); ?>
            </div>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
    
      </div>
    </section>
    <?php endif; ?>

  <?php endwhile; ?>
<?php endif; ?>


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
        <span class="unit">100%</span>
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
        <a class="button" href="https://bcgexpand.com/news-events/category/insight/" target="_blank">Download Brief</a>
      </article>
      <article class="card" data-tag="automation">
        <h3>Automation Waves: Sequencing for impact</h3>
        <p style="color:var(--muted)">Metrics that matter, how to avoid pilot purgatory, and why change failure rate is a first‑class KPI.</p>
        <a class="button" href="https://bcgexpand.com/news-events/category/insight/" target="_blank">Watch 10‑min Talk</a>
      </article>
      <article class="card" data-tag="client-intel">
        <h3>Client Intelligence 2025</h3>
        <p style="color:var(--muted)">Signals from buy‑side counterparties—where service, latency, and resilience now rank.</p>
        <a class="button" href="https://bcgexpand.com/news-events/category/insight/" target="_blank">Access Highlights</a>
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
  let isInitialSelection = true; // prevents scroll on page load

  // Update button labels based on selection state
  function updateButtonLabels() {
    serviceCards.forEach(card => {
      const btn = card.querySelector(".button");
      if (!btn) return;
      if (card.classList.contains("active")) {
        btn.textContent = "Selected Pathway";
      } else {
        btn.textContent = "Select This Pathway";
      }
    });
  }

  // Smooth scroll (only for user clicks)
  function smoothScrollTo(element, extraOffset = 0, duration = 700) {
    const header = document.querySelector('.site-header');
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
        : 1 - Math.pow(-2 * progress + 2, 3) / 2;
      window.scrollTo(0, startY + distance * ease);
      if (timeElapsed < duration) requestAnimationFrame(animation);
    }

    requestAnimationFrame(animation);
  }

  // Click handler
  serviceCards.forEach(card => {
    card.addEventListener("click", e => {
      e.preventDefault();
      const service = card.dataset.service;

      if (service === lastService) return;

      // Remove old active states
      serviceCards.forEach(c => c.classList.remove("active"));
      card.classList.add("active");

      updateButtonLabels();

      // Hide everything
      allHiddenSections.forEach(section => {
        section.style.display = "none";
      });

      // Show selected sections
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

      // Scroll only on user click
      if (firstShown && !isInitialSelection) {
        smoothScrollTo(firstShown, 40, 700);
      }

      lastService = service;
    });
  });

  // Auto-select first service (no scroll)
  if (serviceCards.length) {
    serviceCards[0].click();
    updateButtonLabels();
    isInitialSelection = false;
  }
});
</script>

<?php get_template_part( 'inc/flexible/product_filter'); // Application/Animated Icons Section ?>

<?php endwhile; // end of the loop. ?>