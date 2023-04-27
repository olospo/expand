<?php
$post = get_sub_field('individual_profile'); 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
<article class="team_member">
  <div class="image" style="background: url(<?php the_post_thumbnail_url( 'large-thumb' ); ?>) top center no-repeat; background-size: cover;"></div>
  <p><strong><?php the_title(); ?></strong><br />
  <?php the_field('job_title'); ?></p>
</article>
<?php wp_reset_postdata(); ?>