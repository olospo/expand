<?php // Solution
get_header();


while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template-parts/hero-landing'); ?>

<!-- Modules -->
<section class="offering modules">
  <div class="container">
    <div class="intro">
      <h2>Our <?php the_title(); ?> Solutions</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    <?php
    $current_solution_id = get_the_ID();
    
    $query = new WP_Query([
      'post_type'      => 'product',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
      'meta_query'     => [
        [
          'key'     => 'solutions',
          'value'   => '"' . $current_solution_id . '"',
          'compare' => 'LIKE'
        ]
      ]
    ]);
    
    $post_count = $query->post_count;

    // Work out correct class
    switch ($post_count) {
      case 1:
        $column_class = 'twelve columns';
        break;

      case 2:
        $column_class = 'six columns';
        break;

      case 3:
        $column_class = 'one-third column';
        break;

      case 4:
        $column_class = 'three columns';
        break;

      default:
        // fallback (optional)
        $column_class = 'three columns';
        break;
    }
    ?>
    <div class="row">
      <?php if ($query->have_posts()): ?>
        <?php while ($query->have_posts()): $query->the_post(); 
          $desc = get_field('description', get_the_ID());
    
          $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
    
          // Fallback if no featured image exists
          if (!$bg_image) {
            $bg_image = get_site_url() . '/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg';
          }
        ?>
        <article 
          class="service-card <?php echo $column_class; ?> small-margin"
          style="background: url('<?php echo esc_url($bg_image); ?>') center center no-repeat; background-size: cover;"
        >
          <a href="<?php the_permalink(); ?>">
            <div class="content">
              <span class="type"><?php echo esc_html( get_the_title( $current_solution_id ) ); ?></span>
              <h4><?php the_title(); ?></h4>
              <p><?php echo esc_html($desc); ?></p>
              <span class="button">Explore</span>
            </div>
          </a>
        </article>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>


<?php get_template_part( 'inc/flexible/product_filter'); // Application/Animated Icons Section ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>