<?php
$sectionTitle = get_sub_field('title');
$stories = get_sub_field('stories');
?>
<section class="stories">
  <div class="container">
    <div class="eight columns">
      <div class="title">
        <h3 class="split_title"><?php echo esc_html($sectionTitle); ?></h3>
      </div>
    </div>
    <div class="twelve columns">
      <div class="stories__grid" id="stories-grid">
        <?php if ($stories): ?>
          <?php foreach ($stories as $index => $story): ?>
            <?php $story_id = 'story-' . $index; ?>
            <button class="story-card" type="button" data-story="<?php echo esc_attr($story_id); ?>" aria-expanded="false">
              <div class="story-card__image">
                <?php if (!empty($story['image'])): ?>
                  <img src="<?php echo esc_url($story['image']); ?>" alt="<?php echo esc_attr($story['name']); ?>">
                <?php endif; ?>
              </div>
              <div class="story-card__content">
                <?php if (!empty($story['label'])): ?>
                  <span class="story-card__label"><?php echo esc_html($story['label']); ?></span>
                <?php endif; ?>
                <?php if (!empty($story['name'])): ?>
                  <h3 class="story-card__title"><?php echo esc_html($story['name']); ?></h3>
                <?php endif; ?>
                <span class="story-card__link">Read more</span>
              </div>
            </button>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<script>
const stories = <?php
$story_data = [];
if ($stories) {
  foreach ($stories as $index => $story) {
    $story_id = 'story-' . $index;
    $story_data[$story_id] = [
      'name' => $story['name'] ?? '',
      'label' => $story['label'] ?? '',
      'image' => $story['image'] ?? '',
      'content' => $story['content'] ?? ''
    ];
  }
}
echo wp_json_encode($story_data);
?>;
const grid = document.querySelector('#stories-grid');
const cards = [...document.querySelectorAll('.story-card')];

function closeStory() {
  const detail = grid.querySelector('.story-detail');
  if (detail) {
    detail.remove();
  }
  cards.forEach(card => {
    card.classList.remove('is-active');
    card.setAttribute('aria-expanded', 'false');
  });
}

function openStory(card) {
  const id = card.dataset.story;
  if (card.classList.contains('is-active')) {
    closeStory();
    return;
  }
  closeStory();
  const story = stories[id];
  if (!story) {
    return;
  }
  card.classList.add('is-active');
  card.setAttribute('aria-expanded', 'true');
  const cardIndex = cards.indexOf(card);
  const columns = window.innerWidth <= 720 ? 1 : (window.innerWidth <= 1200 ? 2 : 3);
  const rowEndIndex = Math.min(
    Math.floor(cardIndex / columns) * columns + columns - 1,
    cards.length - 1
  );
  const rowEndCard = cards[rowEndIndex];
  const detail = document.createElement('article');
  detail.className = 'story-detail';
  detail.id = 'story-detail';
  detail.innerHTML = `
    <div class="story-detail__body">
      <h3 class="story-detail__title">${story.name}</h3>
      <span class="story-detail__label">${story.label}</span>
      <div class="story-detail__content">${story.content}</div>
    </div>
    <button class="story-detail__close" type="button" aria-label="Close story">×</button>
  `;
  rowEndCard.after(detail);
  const cardPosition = cardIndex % columns;
  const arrowPosition = ((cardPosition + 0.5) / columns) * 100;
  detail.style.setProperty('--detail-arrow-left', `${arrowPosition}%`);
  detail.querySelector('.story-detail__close').addEventListener('click', closeStory);
  requestAnimationFrame(() => {
    detail.scrollIntoView({
      behavior: 'smooth',
      block: 'nearest'
    });
  });
}

cards.forEach(card => {
  card.addEventListener('click', () => openStory(card));
});

window.addEventListener('resize', () => {
  const detail = grid.querySelector('.story-detail');
  if (detail) {
    closeStory();
  }
});
</script>