<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.13.1/slimselect.min.js" integrity="sha512-sByHIkabhPJsGxRISbnt0bpNZw3NSAnshLhlu2AceSC+sDOyDT4NgtnDOznHulIjR07ua1SudQC25iLvFzkWTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php

$title = get_field('product_filter_title','option');
$text = get_field('product_filter_text','option');
$bg = get_field('product_filter_background_image','option');
$logo = get_field('product_filter_logo_overlay','option');

// Get all Industries
$industries = new WP_Query([
  'post_type'      => 'product',
  'posts_per_page' => -1,
  'post_parent'    => 0,
  'meta_query'     => [[
    'key'     => 'product_type',
    'value'   => 'industry',
    'compare' => '=',
  ]],
  'orderby' => 'title',
  'order'   => 'ASC',
]);

// Get all Solutions
$functions = new WP_Query([
  'post_type'      => 'solution',
  'posts_per_page' => -1,
  'post_parent'    => 0,
  'orderby' => 'title',
  'order'   => 'ASC',
]);
?>

<section class="product_filter">
  <div class="container">
    <div class="square_content">
      <div class="content filter-controls">
        <h1><?php echo $title; ?></h1>
        <p><?php echo $text; ?></p>
        
        <select id="industrySelect" class="variable-showcase">
          <option data-placeholder="true"></option>
          <?php while ($industries->have_posts()): $industries->the_post(); ?>
            <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
          <?php endwhile; wp_reset_postdata(); ?>
        </select>
        
        <select id="functionSelect" class="variable-showcase">
          <option data-placeholder="true"></option>
          <?php while ($functions->have_posts()): $functions->the_post(); ?>
            <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
          <?php endwhile; wp_reset_postdata(); ?>
        </select>
      </div>
    </div>

    <div class="square_background" id="previewSquare" style="background-image:url('<?php echo esc_url($bg); ?>'); background-size:cover; background-position:center;">
      
      <?php if ($logo): ?>
        <img id="previewLogo" src="<?php echo esc_url($logo); ?>" alt="World Class Products" class="preview-logo" />
      <?php endif; ?>

      <div class="overlay" id="previewOverlay" style="display:none;">
        <div class="overlay-content">
          <h3 id="previewTitle"></h3>
          <p id="previewText"></p>
          <a id="previewLink" href="#" class="button">Explore</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
new SlimSelect({
  select: '#industrySelect',
  settings: {
    placeholderText: 'Select Industry / Function',
    showSearch: false
  }
});

new SlimSelect({
  select: '#functionSelect',
  settings: {
    placeholderText: 'Select Capability',
    showSearch: false
  }
});

document.addEventListener('DOMContentLoaded', function() {
  const products = <?php
    $data = [];
    $query = new WP_Query([
      'post_type'      => ['product', 'solution'],
      'posts_per_page' => -1,
      'post_parent'    => 0,
      'orderby'        => 'title',
      'order'          => 'ASC',
    ]);
    while ($query->have_posts()) : $query->the_post();
      $featured = get_the_post_thumbnail_url(get_the_ID(), 'full');
      $data[get_the_ID()] = [
        'title' => html_entity_decode(get_the_title()),
        'intro' => get_field('description') ?: '',
        'image' => $featured ?: '',
        'link'  => get_permalink(),
      ];
    endwhile;
    wp_reset_postdata();
    echo json_encode($data);
  ?>;
  
  // ✅ Preload featured images after page load (non-blocking)
  window.addEventListener('load', () => {
    const preloadImages = () => {
      Object.values(products).forEach(item => {
        if (item.image) {
          const img = new Image();
          img.src = item.image;
        }
      });
    };
    if ('requestIdleCallback' in window) {
      requestIdleCallback(preloadImages);
    } else {
      setTimeout(preloadImages, 500);
    }
  });

  const industrySelect = document.getElementById('industrySelect');
  const functionSelect = document.getElementById('functionSelect');
  const title = document.getElementById('previewTitle');
  const text = document.getElementById('previewText');
  const link = document.getElementById('previewLink');
  const square = document.getElementById('previewSquare');
  const overlay = document.getElementById('previewOverlay');
  const logo = document.getElementById('previewLogo');
  const placeholder = "<?php echo esc_url($bg); ?>";

  function updatePreview(id) {
    const item = products[id];
    if (!item) return;

    title.textContent = item.title;
    text.textContent = item.intro;
    link.href = item.link;
    link.style.display = 'inline-block';

    square.style.backgroundImage = `url('${item.image || placeholder}')`;

    overlay.style.display = 'flex';
    overlay.style.opacity = 0;

    requestAnimationFrame(() => {
      overlay.style.transition = 'opacity 0.4s ease-in-out';
      overlay.style.opacity = 1;
    });

    if (logo) logo.style.opacity = 0;
  }

  function resetPreview() {
    overlay.style.display = 'none';
    square.style.backgroundImage = `url('${placeholder}')`;
    if (logo) logo.style.opacity = 1;
  }

  industrySelect.addEventListener('change', e => {
    const val = e.target.value;
    if (val) {
      functionSelect.selectedIndex = 0;
      updatePreview(val);
    } else {
      resetPreview();
    }
  });

  functionSelect.addEventListener('change', e => {
    const val = e.target.value;
    if (val) {
      industrySelect.selectedIndex = 0;
      updatePreview(val);
    } else {
      resetPreview();
    }
  });
});
</script>
