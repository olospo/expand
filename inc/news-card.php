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
      <?php
      $event_date       = get_field( 'event_date' );
      $event_start_time = get_field( 'event_start_time' );
      $event_end_time   = get_field( 'event_end_time' );
      $is_event         = in_category( 'event' );
      ?>
      
      <p class="date">
        <?php if ( $is_event && $event_date ) : ?>
      
          <?php echo esc_html( $event_date ); ?>
      
          <?php if ( $event_start_time ) : ?>
            · <?php echo esc_html( $event_start_time ); ?>
      
            <?php if ( $event_end_time ) : ?>
              - <?php echo esc_html( $event_end_time ); ?>
            <?php endif; ?>
          <?php endif; ?>
      
        <?php else : ?>
      
          <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
      
        <?php endif; ?>
      </p>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>

    <div class="item_footer">
      <a href="<?php the_permalink(); ?>" class="read-more">
        Read more<span aria-hidden="true">→</span>
      </a>
    </div>
  </div>
</article>