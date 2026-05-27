<?php
  $post_categories = get_the_category();
  $primary_cat     = ! empty( $post_categories ) ? $post_categories[0] : null;

  $cat_label = '';
  $cat_link  = '';
  $cat_slug  = '';

  if ( $primary_cat ) {
    $cat_slug  = $primary_cat->slug;
    $cat_label = $category_labels[ $cat_slug ] ?? $primary_cat->name;
    $cat_link  = get_category_link( $primary_cat->term_id );
  }
?>
<article class="item clickable-card" data-link="<?php the_permalink(); ?>">
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="item_image">
      <?php if ( $primary_cat ) : ?>
        <a class="category_tag <?php echo esc_attr( $cat_slug ); ?>" href="<?php echo esc_url( $cat_link ); ?>">
          <span><?php echo esc_html( $cat_label ); ?></span>
        </a>
      <?php endif; ?>

      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'featured-img' ); ?>
      </a>
    </div>
  <?php endif; ?>

  <div class="item_content">
    <div class="item_body">
      <p class="date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></p>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>

    <div class="item_footer">
      <a href="<?php the_permalink(); ?>" class="read-more">
        Read more<span aria-hidden="true">→</span>
      </a>
    </div>
  </div>
</article>