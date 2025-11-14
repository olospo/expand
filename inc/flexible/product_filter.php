<?php
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

// Get all Functions
$functions = new WP_Query([
  'post_type'      => 'product',
  'posts_per_page' => -1,
  'post_parent'    => 0,
  'meta_query'     => [[
    'key'     => 'product_type',
    'value'   => 'function',
    'compare' => '=',
  ]],
  'orderby' => 'title',
  'order'   => 'ASC',
]);
?>

<section class="product_filter">
  <div class="container">
    <div class="square_content">
      <div class="content filter-controls">
        <h1 style="color:white;">How can we assist you today?</h1>
        <p style="font-size: 22px;">Learn more about our core areas of expertise by selecting your topic of interest.</p>
        
        <select id="industrySelect">
          <option value="">Select Industry</option>
          <?php while ($industries->have_posts()): $industries->the_post(); ?>
            <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
          <?php endwhile; wp_reset_postdata(); ?>
        </select>
        
        <select id="functionSelect">
          <option value="">Select Function</option>
          <?php while ($functions->have_posts()): $functions->the_post(); ?>
            <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
          <?php endwhile; wp_reset_postdata(); ?>
        </select>
      </div>
    </div>
    <div class="square_background" id="previewSquare" style="background-size:cover; background-position:center;">
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
document.addEventListener('DOMContentLoaded', function() {
  const products = <?php
    $data = [];
    $query = new WP_Query([
      'post_type'      => 'product',
      'posts_per_page' => -1,
      'meta_query'     => [[
        'key'     => 'product_type',
        'value'   => ['industry', 'function'],
        'compare' => 'IN',
      ]]
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

  // DOM references
  const industrySelect = document.getElementById('industrySelect');
  const functionSelect = document.getElementById('functionSelect');
  const title = document.getElementById('previewTitle');
  const text = document.getElementById('previewText');
  const link = document.getElementById('previewLink');
  const square = document.getElementById('previewSquare');
  const overlay = document.getElementById('previewOverlay');

  // Update the preview content and image
  function updatePreview(id) {
    const item = products[id];
    if (!item) return;

    const placeholder = "<?php echo get_stylesheet_directory_uri(); ?>/img/placeholder.jpg";

    title.textContent = item.title;
    text.textContent = item.intro;
    link.href = item.link;
    link.style.display = 'inline-block';

    const bgImage = item.image ? `url('${item.image}')` : `url('${placeholder}')`;
    square.style.backgroundImage = bgImage;

    // Fade in overlay
    overlay.style.display = 'flex';
    overlay.style.opacity = 0;
    requestAnimationFrame(() => {
      overlay.style.transition = 'opacity 0.4s ease-in-out';
      overlay.style.opacity = 1;
    });
  }

  // Toggle active class for selects
  function toggleSelectStyle(select) {
    if (select.value) {
      select.classList.add('active');
    } else {
      select.classList.remove('active');
    }
  }

  // Industry select listener
  industrySelect.addEventListener('change', e => {
    const val = e.target.value;
    if (val) {
      functionSelect.selectedIndex = 0;
      functionSelect.classList.remove('active');
      updatePreview(val);
    } else {
      overlay.style.display = 'none';
      square.style.removeProperty('background-image');
    }
    toggleSelectStyle(industrySelect);
  });

  // Function select listener
  functionSelect.addEventListener('change', e => {
    const val = e.target.value;
    if (val) {
      industrySelect.selectedIndex = 0;
      industrySelect.classList.remove('active');
      updatePreview(val);
    } else {
      overlay.style.display = 'none';
      square.style.removeProperty('background-image');
    }
    toggleSelectStyle(functionSelect);
  });
});
</script>