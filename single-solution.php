<?php // Solution
get_header();

while ( have_posts() ) : the_post();

get_template_part('template-parts/hero-landing');

// --------------------------------------------------
// Data setup
// --------------------------------------------------

global $wpdb;

$current_solution_id = get_the_ID();
$solution_slug       = get_post_field('post_name', $current_solution_id);

$product_ids = $wpdb->get_col("SELECT DISTINCT post_id FROM {$wpdb->postmeta} WHERE meta_key LIKE 'pathways_%_related_solution' AND meta_value = '{$current_solution_id}'");

if (empty($product_ids)) {
  $product_ids = [0]; // 0 will never match a real post ID
}

$query = new WP_Query([
  'post_type'      => 'product',
  'posts_per_page' => -1,
  'post__in'       => $product_ids,
  'orderby'        => 'menu_order',
  'order'          => 'ASC'
]);

$post_count = $query->post_count;

// Layout logic
if ($post_count === 1) {
  $column_class  = 'twelve columns';
  $items_per_row = 1;
} elseif ($post_count === 2 || $post_count === 4) {
  $column_class  = 'six columns';
  $items_per_row = 2;
} elseif ($post_count === 3 || $post_count === 5 || $post_count === 6) {
  $column_class  = 'one-third column';
  $items_per_row = 3;
} else {
  $column_class  = 'three columns';
  $items_per_row = 4;
}
?>

<!-- Modules -->
<section class="offering modules">
  <div class="container">

    <div class="intro">
      <h2>Our <?php the_title(); ?> Solutions</h2>
    </div>
    
    <?php if ($query->have_posts()) : ?>
      <?php $i = 0;
      while ($query->have_posts()) : $query->the_post();

        if ($i % $items_per_row === 0) {
          if ($i > 0) echo '</div>';
          echo '<div class="row">';
        }
        
        $desc = '';
      
        if (have_rows('pathways')) {
          while (have_rows('pathways')) : the_row();
            $related_solution = get_sub_field('related_solution');
        
            if ($related_solution && $related_solution->ID == $current_solution_id) {
              $desc = get_sub_field('pathway_summary');
              break;
            }
          endwhile;
        }
        $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: get_site_url() . '/wp-content/uploads/2023/10/Expand_WEB_Cover_Sparks-green_RGB.jpg';
      ?>
      <article class="service-card <?php echo esc_attr($column_class); ?> small-margin" style="background: url('<?php echo esc_url($bg_image); ?>') center center no-repeat; background-size: cover;">
        <a href="<?php echo esc_url( get_permalink() . '#' . $solution_slug ); ?>">
          <div class="content">
            <span class="type"><?php echo esc_html( get_the_title($current_solution_id) ); ?></span>
            <h4><?php the_title(); ?></h4>
            <?php echo $desc; ?>
            <span class="button">Explore</span>
          </div>
        </a>
      </article>
        <?php $i++; endwhile; echo '</div>'; wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</section>

<?php get_template_part('inc/flexible/product_filter'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>