<?php
$post = get_sub_field('individual_profile'); 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
<article class="team_member">
  <div class="image" style="background: url(<?php the_post_thumbnail_url( 'large-thumb' ); ?>) top center no-repeat; background-size: cover;"></div>
  <p><strong class="name"><?php the_title(); ?></strong><br />
  <strong><?php the_field('job_title'); ?></strong><br />
  <em><?php the_field('location'); ?></em></p>
</article>
<?php wp_reset_postdata(); ?>