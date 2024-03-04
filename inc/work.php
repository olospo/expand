<?php
$banneruploadvideo = get_field('banner_upload_video');
?>

<article class="work_item six columns">
  <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
  <div class="image" style="background: url(<?php the_post_thumbnail_url( 'featured-img' ); ?>) center center no-repeat;background-size: cover;">
    <video muted playsinline loop poster="<?php the_post_thumbnail_url( 'featured-img' ); ?>" class="video">
      <source src="<?php echo $banneruploadvideo['url']; ?>" type="video/mp4">
    </video>
    <div class="overlay"></div>
    <div class="content">
      <h3><?php the_title(); ?></h3>
      <span class="client"><?php echo get_field('client_name'); ?></span>
  </div>
  </a>
</article>