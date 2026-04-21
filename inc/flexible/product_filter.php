<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.13.1/slimselect.min.js" integrity="sha512-sByHIkabhPJsGxRISbnt0bpNZw3NSAnshLhlu2AceSC+sDOyDT4NgtnDOznHulIjR07ua1SudQC25iLvFzkWTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
$title = get_field('product_filter_title','option');
$text  = get_field('product_filter_text','option');
$bg    = get_field('product_filter_background_image','option');
$logo  = get_field('product_filter_logo_overlay','option');

// Industries (parents)
$industries = new WP_Query([
  'post_type'      => 'product',
  'post_status'    => 'publish',
  'posts_per_page' => -1,
  'post_parent'    => 0,
  'orderby'        => 'title',
  'order'          => 'ASC',
]);

// Build preview data for parent industries only
$productsData = [];
if ($industries->have_posts()) :
  while ($industries->have_posts()) : $industries->the_post();
    $id = get_the_ID();
    $featured = get_the_post_thumbnail_url($id, 'full');

    $productsData[$id] = [
      'title' => html_entity_decode(get_the_title(), ENT_QUOTES, 'UTF-8'),
      'intro' => get_field('description', $id) ?: '',
      'image' => $featured ?: '',
      'link'  => get_permalink($id),
    ];
  endwhile;
  wp_reset_postdata();
endif;

// Whitelist of published children by parent ID
$publishedChildrenByParent = [];
$publishedChildren = get_posts([
  'post_type'           => 'product',
  'post_status'         => 'publish',
  'posts_per_page'      => -1,
  'post_parent__not_in' => [0],
  'orderby'             => 'title',
  'order'               => 'ASC',
  'fields'              => 'ids',
]);

if (!empty($publishedChildren)) {
  foreach ($publishedChildren as $child_id) {
    $parent_id = (int) wp_get_post_parent_id($child_id);

    if (!$parent_id) {
      continue;
    }

    if (!isset($publishedChildrenByParent[$parent_id])) {
      $publishedChildrenByParent[$parent_id] = [];
    }

    $publishedChildrenByParent[$parent_id][] = (int) $child_id;
  }
}
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
            <?php $industries->rewind_posts(); ?>
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
          <a id="previewLink" href="#" class="button" style="display:none;">Learn more</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const products = <?php echo wp_json_encode($productsData); ?>;
  const publishedChildrenByParent = <?php echo wp_json_encode($publishedChildrenByParent); ?>;

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

  const cache = new Map();

  function hideCapabilitySelect() {
    if (!capabilityWrap) return;

    capabilityWrap.classList.add('is-hidden');
    capabilityWrap.classList.remove('is-visible');
    capabilityWrap.setAttribute('aria-hidden', 'true');

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

  hideCapabilitySelect();
  resetPreview();

  industrySelectEl.addEventListener('change', async (e) => {
    const industryId = e.target.value;

    if (!industryId) {
      hideCapabilitySelect();
      resetPreview();
      return;
    }

    updatePreview(industryId);
    hideCapabilitySelect();
    setFunctionStateLoading();

    try {
      const data = await fetchChildren(industryId);

      const allowedIds = (publishedChildrenByParent[industryId] || []).map(String);

      const safeOptions = Array.isArray(data.options)
        ? data.options.filter(option => allowedIds.includes(String(option.value)))
        : [];

      const safeItems = {};
      if (data.items && typeof data.items === 'object') {
        Object.keys(data.items).forEach((id) => {
          if (allowedIds.includes(String(id))) {
            safeItems[id] = data.items[id];
          }
        });
      }

      Object.assign(products, safeItems);

      if (safeOptions.length) {
        populateFunctionSelect(safeOptions);
        showCapabilitySelect();
      } else {
        hideCapabilitySelect();
      }
    } catch (err) {
      console.error(err);
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