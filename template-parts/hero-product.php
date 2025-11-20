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
      <span class="kicker"><?php if ( $parent_id ) : ?><a href="<?php echo esc_url( $parent_link ); ?>"><?php echo esc_html( $parent_title ); ?></a><?php endif; ?> / <?php the_title(); ?></span>
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