<?php 
get_header();


while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template-parts/hero-landing'); ?>

<!-- Modules -->
<section class="offering modules">
  <div class="container">
    <div class="intro">
      <h2>Our <?php the_title(); ?> Capabilities</h2>
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
    
    $post_count = (int) $query->post_count;
    
    // Decide row structure (how many items per row)
    switch ($post_count) {
      case 1: $row_plan = [1]; break;                 // 1
      case 2: $row_plan = [2]; break;                 // 2
      case 3: $row_plan = [3]; break;                 // 3
      case 4: $row_plan = [4]; break;                 // 4
      case 5: $row_plan = [3,2]; break;               // 3/2
      case 6: $row_plan = [3,3]; break;               // 3/3
      case 7: $row_plan = [4,3]; break;               // 4/3
      case 8: $row_plan = [4,4]; break;               // 4/4
      case 9: $row_plan = [3,3,3]; break;             // 3/3/3
      default:
        // Sensible fallback: 4 per row, then remainder
        $row_plan = array_fill(0, (int) floor($post_count / 4), 4);
        $remainder = $post_count % 4;
        if ($remainder) $row_plan[] = $remainder;
        break;
    }
    
    // Helper: map items-per-row -> Skeleton column class
    function olospo_columns_for_items_per_row($n) {
      switch ((int) $n) {
        case 1: return 'twelve columns';
        case 2: return 'six columns';
        case 3: return 'four columns';      // 12/3
        case 4: return 'three columns';     // 12/4
        default:
          // fallback: try thirds
          return 'four columns';
      }
    }
    
    $row_index = 0;
    $in_row = false;
    $item_in_row = 0;
    $current_row_size = $row_plan[0] ?? 4;
    $column_class = olospo_columns_for_items_per_row($current_row_size);
    ?>
    
    <?php if ($query->have_posts()): ?>
    
      <?php while ($query->have_posts()): $query->the_post();
        $desc = get_field('description', get_the_ID());
    
        // Open a new row if needed
        if (!$in_row) {
          $current_row_size = $row_plan[$row_index] ?? 4;
          $column_class = olospo_columns_for_items_per_row($current_row_size);
          echo '<div class="row">';
          $in_row = true;
          $item_in_row = 0;
        }
    
        $item_in_row++;
      ?>
    
        <article class="service-card <?php echo esc_attr($column_class); ?> small-margin">
          <a href="<?php the_permalink(); ?>">
            <div class="content">
              <span class="type">Capability</span>
              <h4><?php the_title(); ?></h4>
              <p><?php echo esc_html($desc); ?></p>
              <span class="button">Explore</span>
            </div>
          </a>
        </article>
    
      <?php
        // Close row when we reach its planned size
        if ($item_in_row >= $current_row_size) {
          echo '</div>'; // .row
          $in_row = false;
          $row_index++;
        }
    
      endwhile;
    
      // Close any dangling row
      if ($in_row) echo '</div>';
    
      wp_reset_postdata();
      ?>
    
    <?php endif; ?>

    </div>
  </div>
</section>


<?php get_template_part( 'inc/flexible/product_filter'); // Application/Animated Icons Section ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>