<?php

$intro = get_field('description');
$eLogo = get_field('e_logo');

$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( empty( $featured_image_url ) ) {
  $parent_id = wp_get_post_parent_id( get_the_ID() );
  if ( $parent_id ) {
    $featured_image_url = get_the_post_thumbnail_url( $parent_id, 'full' );
  }
}

$parent_id = wp_get_post_parent_id( get_the_ID() );
$parent_title = $parent_id ? get_the_title( $parent_id ) : null;
$parent_link  = $parent_id ? get_permalink( $parent_id ) : null;

?>

<!-- Hero -->
<section class="offering hero">
  <div class="container">
    <div class="intro ten columns">
      <span class="kicker">
      <?php
      $ancestors = get_post_ancestors(get_the_ID());
      
      if ($ancestors) {
      
        // Reverse so it goes top → down (Asset Management → Market Data Optimization)
        $ancestors = array_reverse($ancestors);
      
        foreach ($ancestors as $ancestor_id) {
          echo '<a href="' . esc_url(get_permalink($ancestor_id)) . '">';
          echo esc_html(get_the_title($ancestor_id));
          echo '</a> / ';
        }
      }
      
      // Current page title (no link)
      the_title();
      ?>
      </span>

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