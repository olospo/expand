<article class="standard">
  <div class="item_image seven columns">
    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
      <?php the_post_thumbnail('featured-img'); ?>
    </a>
  </div>
  <div class="item_content five columns">
    <div class="content">
      <p class="date"><?php the_time('jS M Y'); ?></p>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>" class="button orange">Read more</a>
    </div>
  </div>
</article>