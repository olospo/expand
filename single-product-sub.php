<?php 
/** 
* Template Name: Product
* Template Post Type: product
*/
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); 

$parent_id = wp_get_post_parent_id( get_the_ID() );

// If this is a top-level product, use the landing hero
if ( ! $parent_id ) {
  get_template_part('template-parts/hero-landing');
} else {
  get_template_part('template-parts/hero-product');
}

// Count total pathways first
$pathway_count = 0;
if ( have_rows('pathways') ) {
  while ( have_rows('pathways') ) { the_row(); $pathway_count++; }
  reset_rows();
}

// Work out correct class
if ($pathway_count === 1) {
  $column_class  = 'twelve columns';
  $items_per_row = 1;
} elseif ($pathway_count === 2 || $pathway_count === 4) {
  $column_class  = 'six columns';
  $items_per_row = 2;
} elseif ($pathway_count === 3 || $pathway_count === 5 || $pathway_count === 6) {
  $column_class  = 'one-third column';
  $items_per_row = 3;
} else {
  $column_class  = 'three columns';
  $items_per_row = 4;
}
?>
<section class="offering modules">
  <div class="container">
    <div class="intro">
      <h2><?php the_title(); ?> Pathways</h2>
    </div>
    <?php if ( have_rows('pathways') ) : ?>
      <?php 
        $i = 0;
        while ( have_rows('pathways') ) : the_row();
        
          if ($i % $items_per_row === 0) {
            if ($i > 0) echo '</div>';
            echo '<div class="row">';
          }
          $title    = get_sub_field('pathway_title');
          $slug     = get_sub_field('pathway_slug');
          $summary  = get_sub_field('pathway_summary');
          
          $related_solution = get_sub_field('related_solution');
          
          if ($related_solution) {
            $solution_id   = $related_solution->ID;
            $solution_slug = $related_solution->post_name;
          } else {
            $solution_id = '';
            $solution_slug = '';
          }

      ?>
      <article class="service-card <?php echo esc_attr($column_class); ?> small-margin" data-service="<?php echo esc_attr($slug); ?>" data-solution="<?php echo esc_attr($solution_id); ?>" data-solution-slug="<?php echo esc_attr($solution_slug); ?>" style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;">
        <a href="#">
          <div class="content">
            <span class="type">Solution</span>
            <h4><?php echo $title; ?></h4>
            <p><?php echo $summary; ?></p>
            <span class="button">Select This Pathway</span>
          </div>
        </a>
      </article>
      <?php $i++; endwhile; echo '</div>'; ?>
    <?php endif; ?>
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
    <!-- Problem -->
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

    <?php if ( $impact_metrics || $case_studies ) : ?>
    <!-- Impact -->
    <section class="offering impact hidden-section" data-service="<?php echo esc_attr($slug); ?>">
      <div class="container">
        <h2><span><?php echo esc_html($title); ?></span> The Impact</h2>
    
        <?php if ( $impact_metrics ) : ?>
        <!-- Metrics -->
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

        <?php if ( $case_studies ) : ?>
          <!-- Case Studies -->
          <h2 class="case-studies"><span><?php echo esc_html($title); ?></span> Case Studies</h2>
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
    
    <?php if ( $approach_cards ) : ?>
    <!-- Approach -->
    <section class="offering approach hidden-section" data-service="<?php echo esc_attr($slug); ?>">
      <div class="container">
        <h2><span><?php echo esc_html($title); ?></span> The Approach</h2> 
        <div class="grid grid-3">
          <?php foreach ( $approach_cards as $card ) : ?>
          <div class="card">   
            <?php if ( ! empty( $card['approach_title'] ) ) : ?>
            <h3><?php echo esc_html( $card['approach_title'] ); ?></h3>
            <?php endif; ?>
            <?php if ( ! empty( $card['approach_content'] ) ) : ?>
            <div class="approach-content">
              <?php echo wp_kses_post( $card['approach_content'] ); ?>
            </div>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>
    
  <?php endwhile; ?>
<?php endif; ?>
<!-- End of Pathway loop -->



<?php if ( have_rows('insights') ) : ?>
<!-- Insights -->
<?php
  $insights_count = count(get_field('insights'));
  // Work out correct class
  if ($insights_count === 1) {
    $column_class  = 'six columns';
    $items_per_row = 1;
  } elseif ($insights_count === 2 || $insights_count === 4) {
    $column_class  = 'six columns';
    $items_per_row = 2;
  } elseif ($insights_count === 3 || $insights_count === 5 || $insights_count === 6) {
    $column_class  = 'one-third column';
    $items_per_row = 3;
  } else {
    $column_class  = 'three columns';
    $items_per_row = 4;
  }
?>
<section class="offering insights hidden-section always-show">
  <div class="container">
    <h2>Insights</h2>
    <?php 
      $i = 0;
      while ( have_rows('insights') ) : the_row();
        if ($i % $items_per_row === 0) {
          if ($i > 0) echo '</div>';
          echo '<div class="row">';
        }
        $title       = get_sub_field('insight_title');
        $description = get_sub_field('insight_description');
        $btn_text    = get_sub_field('button_text');
        $btn_type    = get_sub_field('button_type');
        $btn_url = '';
        if ($btn_type === 'link') {
          $btn_url = get_sub_field('button_link');
        }
        if ($btn_type === 'file') {
          $file = get_sub_field('button_file');
          if (is_array($file) && isset($file['url'])) {
            $btn_url = $file['url'];
          } else {
            $btn_url = $file;
          }
        }
    ?>
      <article class="card <?php echo esc_attr($column_class); ?>">
        <?php if ($title) : ?>
          <h3><?php echo esc_html($title); ?></h3>
        <?php endif; ?>
        <?php if ($description) : ?>
          <?php echo wp_kses_post($description); ?>
        <?php endif; ?>
        <?php if ($btn_url && $btn_text) : ?>
          <a class="button"
             href="<?php echo esc_url($btn_url); ?>"
             target="_blank"
             <?php echo ($btn_type === 'file') ? 'download' : ''; ?>>
            <?php echo esc_html($btn_text); ?>
          </a>
        <?php endif; ?>
      </article>
    <?php 
      $i++; 
      endwhile; 
      echo '</div>'; 
    ?>
  </div>
</section>
<?php endif; ?>

<?php if ( have_rows('exhibits') ) : ?>
<!-- Exhibits -->
<?php
  $exhibits_count = count(get_field('exhibits'));
  // Work out correct class
  if ($exhibits_count === 1) {
    $column_class  = 'six columns';
    $items_per_row = 1;
  } elseif ($insights_count === 2 || $exhibits_count === 4) {
    $column_class  = 'six columns';
    $items_per_row = 2;
  } elseif ($insights_count === 3 || $exhibits_count === 5 || $exhibits_count === 6) {
    $column_class  = 'one-third column';
    $items_per_row = 3;
  } else {
    $column_class  = 'three columns';
    $items_per_row = 4;
  }
?>
<section class="offering insights hidden-section always-show">
  <div class="container">
    <h2>Exhibits</h2>
    <?php 
      $i = 0;
      while ( have_rows('exhibits') ) : the_row();
        if ($i % $items_per_row === 0) {
          if ($i > 0) echo '</div>';
          echo '<div class="row">';
        }
        $title       = get_sub_field('exhibits_title');
        $description = get_sub_field('exhibits_description');
        $btn_text    = get_sub_field('button_text');
        $btn_type    = get_sub_field('button_type');
        $btn_url = '';
        if ($btn_type === 'link') {
          $btn_url = get_sub_field('button_link');
        }
        if ($btn_type === 'file') {
          $file = get_sub_field('button_file');
          if (is_array($file) && isset($file['url'])) {
            $btn_url = $file['url'];
          } else {
            $btn_url = $file;
          }
        }
    ?>
      <article class="card <?php echo esc_attr($column_class); ?>">
        <?php if ($title) : ?>
          <h3><?php echo esc_html($title); ?></h3>
        <?php endif; ?>
        <?php if ($description) : ?>
          <?php echo wp_kses_post($description); ?>
        <?php endif; ?>
        <?php if ($btn_url && $btn_text) : ?>
          <a class="button"
             href="<?php echo esc_url($btn_url); ?>"
             target="_blank"
             <?php echo ($btn_type === 'file') ? 'download' : ''; ?>>
            <?php echo esc_html($btn_text); ?>
          </a>
        <?php endif; ?>
      </article>
    <?php 
      $i++; 
      endwhile; 
      echo '</div>'; 
    ?>
  </div>
</section>
<?php endif; ?>

<?php if ( have_rows('testimonials') ) : ?>
  <!-- Testimonials -->
<section class="offering testimonials hidden-section always-show">
  <div class="container">
    <div class="product twelve columns" style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size:cover;">
      <?php while ( have_rows('testimonials') ) : the_row(); ?>
        <?php 
          $quote   = get_sub_field('quote');
          $person  = get_sub_field('person');
          $company = get_sub_field('company');
        ?>
        <div class="content six columns">
          <p><?php echo esc_html($quote); ?></p>
          <h4><span><?php echo esc_html($person); ?></span> <?php echo esc_html($company); ?></h4>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Contact -->
<section class="offering contact hidden-section always-show">
  <div class="container">
    <h2>Contact Us</h2>
    <div class="grid grid-2">
      <?php if (have_rows('contacts')): ?>
        <article class="card">
        <?php while (have_rows('contacts')): the_row(); ?>
          <?php $type = get_sub_field('contact_type'); if ($type === 'profile') {
            $profile = get_sub_field('contact_profile');
            if ($profile) {
              $name = get_the_title($profile->ID);
              $title = get_field('job_title', $profile->ID);
              $email = get_field('email', $profile->ID);
              $photo_id = get_post_thumbnail_id($profile->ID);
              $photo_url = $photo_id ? wp_get_attachment_image_url($photo_id, 'full') : '';
            }
          } else {
            $name  = get_sub_field('contact_custom_name');
            $title = get_sub_field('contact_custom_title');
            $email = get_sub_field('contact_custom_email');
            $photo = get_sub_field('contact_custom_photo');
            $photo_url = $photo ? $photo['url'] : '';
          }
        ?>
          <div class="person">
            <?php if ($photo_url): ?>
              <img src="<?php echo esc_url($photo_url); ?>" class="photo">
            <?php endif; ?>
            <p>
              <strong><?php echo esc_html($name); ?></strong><br/>
              <?php echo esc_html($title); ?><br/>
              <a href="mailto:<?php echo esc_attr($email); ?>">
                <?php echo esc_html($email); ?>
              </a>
            </p>
          </div>
        <?php endwhile; ?>
        </article>
      <?php endif; ?>
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

  // Auto-select correct pathway
  if (serviceCards.length) {
    let selectedCard = null;
    const hash = window.location.hash.replace('#', '');
  
    if (hash) {
      selectedCard = document.querySelector(
        `.service-card[data-solution-slug="${hash}"]`
      );
    }
  
    if (selectedCard) {
      selectedCard.click();
    } else {
      serviceCards[0].click(); // fallback
    }
  
    updateButtonLabels();
    isInitialSelection = false;
  }


});
</script>

<?php get_template_part( 'inc/flexible/product_filter'); // Application/Animated Icons Section ?>

<?php endwhile; // end of the loop. ?>
<?php endif; ?>
<?php get_footer(); ?>