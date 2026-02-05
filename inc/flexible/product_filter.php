<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.13.1/slimselect.min.js" integrity="sha512-sByHIkabhPJsGxRISbnt0bpNZw3NSAnshLhlu2AceSC+sDOyDT4NgtnDOznHulIjR07ua1SudQC25iLvFzkWTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
$title = get_field('product_filter_title','option');
$text  = get_field('product_filter_text','option');
$bg    = get_field('product_filter_background_image','option');
$logo  = get_field('product_filter_logo_overlay','option');

// Industries (parents)
$industries = new WP_Query([
  'post_type'      => 'product',
  'posts_per_page' => -1,
  'post_parent'    => 0,
  'orderby' => 'title',
  'order'   => 'ASC',
]);

// Build preview data for parent industries only (children come from AJAX)
$productsData = [];
if ($industries->have_posts()) :
  while ($industries->have_posts()) : $industries->the_post();
    $id = get_the_ID();
    $featured = get_the_post_thumbnail_url($id, 'full');

    $productsData[$id] = [
      'title' => html_entity_decode(get_the_title()),
      'intro' => get_field('description', $id) ?: '',
      'image' => $featured ?: '',
      'link'  => get_permalink($id),
    ];
  endwhile;
  wp_reset_postdata();
endif;
?>

<section class="product_filter">
  <div class="container">
    <div class="square_content">
      <div class="content filter-controls">
        <h1><?php echo esc_html($title); ?></h1>
        <p><?php echo esc_html($text); ?></p>

        <select id="industrySelect" class="variable-showcase">
          <option data-placeholder="true"></option>
          <?php if ($industries->have_posts()) : ?>
            <?php while ($industries->have_posts()): $industries->the_post(); ?>
              <option value="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html(get_the_title()); ?></option>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php endif; ?>
        </select>

        <div class="capability-wrap is-hidden" id="capabilityWrap" aria-hidden="true">
        <select id="functionSelect" class="variable-showcase">
          <option data-placeholder="true"></option>
          <!-- populated via AJAX -->
        </select>
        </div>

      </div>
    </div>

    <div class="square_background" id="previewSquare"
      style="background-image:url('<?php echo esc_url($bg); ?>'); background-size:cover; background-position:center;">

      <?php if ($logo): ?>
        <img id="previewLogo" src="<?php echo esc_url($logo); ?>" alt="World Class Products" class="preview-logo" />
      <?php endif; ?>

      <div class="overlay" id="previewOverlay" style="display:none;">
        <div class="overlay-content">
          <h3 id="previewTitle"></h3>
          <p id="previewText"></p>
          <a id="previewLink" href="#" class="button" style="display:none;">Explore</a>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function () {
  // Parent preview data (industries)
  const products = <?php echo json_encode($productsData); ?>;

  const industrySelectEl = document.getElementById('industrySelect');
  const functionSelectEl = document.getElementById('functionSelect');

  const title = document.getElementById('previewTitle');
  const text  = document.getElementById('previewText');
  const link  = document.getElementById('previewLink');
  const square = document.getElementById('previewSquare');
  const overlay = document.getElementById('previewOverlay');
  const logo = document.getElementById('previewLogo');

  const placeholder = "<?php echo esc_url($bg); ?>";

  const capabilityWrap = document.getElementById('capabilityWrap');

  // --- SlimSelect instances ---
  const industrySlim = new SlimSelect({
    select: '#industrySelect',
    settings: {
      placeholderText: 'Select Industry',
      showSearch: false
    }
  });

  const functionSlim = new SlimSelect({
    select: '#functionSelect',
    settings: {
      placeholderText: 'Select Capability',
      showSearch: false
    }
  });

  // Cache: industryId -> { options, items }
  const cache = new Map();

  // --- UI helpers ---
  function hideCapabilitySelect() {
    if (!capabilityWrap) return;
    capabilityWrap.classList.add('is-hidden');
    capabilityWrap.classList.remove('is-visible');
    capabilityWrap.setAttribute('aria-hidden', 'true');

    // Reset slim select to neutral state
    functionSlim.setData([{ placeholder: true, text: 'Select Capability', value: '' }]);
    functionSlim.setSelected('');
    functionSlim.disable();
  }

  function showCapabilitySelect() {
    if (!capabilityWrap) return;
    capabilityWrap.classList.remove('is-hidden');
    capabilityWrap.classList.add('is-visible');
    capabilityWrap.setAttribute('aria-hidden', 'false');
  }

  function setFunctionStateLoading() {
    // Keep hidden while loading (cleaner UX)
    functionSlim.setData([{ placeholder: true, text: 'Loading…', value: '' }]);
    functionSlim.setSelected('');
    functionSlim.disable();
  }

  function populateFunctionSelect(options) {
    functionSlim.setData([
      { placeholder: true, text: 'Select Capability', value: '' },
      ...options
    ]);
    functionSlim.setSelected('');
    functionSlim.enable();
  }

  // --- Preview helpers ---
  function updatePreview(id) {
    const item = products[id];
    if (!item) return;
  
    title.textContent = item.title || '';
    text.textContent  = item.intro || '';
  
    if (item.link) {
      link.href = item.link;
      link.style.display = 'inline-block';
    } else {
      link.style.display = 'none';
    }
  
    // ✅ Image fallback: child -> parent -> placeholder
    const parentId = item.parent_id;
    const parentImage = parentId && products[parentId] ? products[parentId].image : '';
    const img = item.image || parentImage || placeholder;
  
    square.style.backgroundImage = `url('${img}')`;
  
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
    link.style.display = 'none';
    if (logo) logo.style.opacity = 1;
  }

  // --- AJAX ---
  async function fetchChildren(industryId) {
    if (cache.has(industryId)) return cache.get(industryId);

    const form = new FormData();
    form.append('action', 'get_industry_children');
    form.append('industry_id', industryId);
    form.append('nonce', ProductFilterAjax.nonce);

    const res = await fetch(ProductFilterAjax.ajaxUrl, {
      method: 'POST',
      credentials: 'same-origin',
      body: form
    });

    const json = await res.json();
    if (!json.success) throw new Error(json.data?.message || 'AJAX failed');

    cache.set(industryId, json.data);
    return json.data;
  }

  // --- Initial state ---
  hideCapabilitySelect();
  resetPreview();

  // --- Events ---
  industrySelectEl.addEventListener('change', async (e) => {
    const industryId = e.target.value;

    // Clearing industry
    if (!industryId) {
      hideCapabilitySelect();
      resetPreview();
      return;
    }

    // Show industry preview immediately
    updatePreview(industryId);

    // Prep capability select (hidden) while loading
    hideCapabilitySelect();
    setFunctionStateLoading();

    try {
      const data = await fetchChildren(industryId);

      // Merge child preview items into products map for instant preview on child selection
      if (data.items) Object.assign(products, data.items);

      // Only show Select 2 if there are children
      if (data.options && data.options.length) {
        populateFunctionSelect(data.options);
        showCapabilitySelect();
      } else {
        // No children: keep hidden (as requested)
        hideCapabilitySelect();
      }
    } catch (err) {
      console.error(err);
      // Error: keep hidden (less alarming)
      hideCapabilitySelect();
    }
  });

  functionSelectEl.addEventListener('change', (e) => {
    const childId = e.target.value;
    if (!childId) return;
    updatePreview(childId);
  });
});
</script>