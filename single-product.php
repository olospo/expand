<?php 
get_header();


while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template-parts/hero-landing'); ?>

<!-- Modules -->
<section class="offering modules">
  <div class="container">
    <div class="intro">
      <h2>Our <?php the_title(); ?> Services</h2>
      <p>BCG Expand provides industry leading benchmarking, cost optimisation and competitor intelligence capabilities across the 3rd party ecosystem, including Market Data and Brokerage, Clearing and Exchange costs.</p>
    </div>

    <?php
    // Fetch child products
    $query = new WP_Query([
      'post_type'      => 'product',
      'post_parent'    => get_the_ID(),
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC'
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
        ?>

        <article 
          class="service-card <?php echo $column_class; ?> small-margin "
          style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg') center center no-repeat; background-size: cover;"
        >
          <a href="<?php the_permalink(); ?>">
            <div class="content">
              <span class="type">Service</span>
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