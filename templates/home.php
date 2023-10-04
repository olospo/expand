<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>
  
<?php if (have_rows('project_content')) { // Flexible Content ?>
<div class="flexible_content">        
  <?php while (have_rows('project_content')) { the_row(); ?>
    <?php if( get_row_layout() == 'hero' ): ?>
      <?php get_template_part( 'inc/flexible/hero'); // Hero ?>
    <?php elseif( get_row_layout() == 'stats' ): ?>
      <?php get_template_part( 'inc/flexible/stats'); // Stats ?>
    <?php elseif( get_row_layout() == 'square_section' ): ?>
      <?php get_template_part( 'inc/flexible/square_section'); // Square Section ?>
    <?php elseif( get_row_layout() == 'text_gradient' ): ?>
      <?php get_template_part( 'inc/flexible/text'); // Text Gradient ?>
    <?php elseif( get_row_layout() == 'tabbed_content' ): ?>
      <?php get_template_part( 'inc/flexible/tabbed'); // Tabbed Content ?>
    <?php elseif( get_row_layout() == 'content_block' ): ?>
      <?php get_template_part( 'inc/flexible/content_block'); // Content Block ?>
    <?php elseif( get_row_layout() == 'product_details_section' ): ?>
      <?php get_template_part( 'inc/flexible/content_block'); // Product Details Section ?>
    <?php endif; ?>
  <?php } ?>
</div>
<?php } ?>

<section class="our_products">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Our Products</h3>
    </div>
    <div class="row">
      
      <article class="one-third column">
        <a href="<?php echo get_site_url(); ?>/products#Functional">
        <div class="content">
          <span class="type">Product</span>
          <h4>Functional Effectiveness</h4>
          <p>Want to understand cost and capability?</p>
          <p>Here is an extensive product portfolio designed to support firms in assessing specific functional areas relative to peers, including:</p>
          <ul>
            <li>Technology</li>
            <li>Operations</li>
            <li>Corporate Functions</li>
            <li>External Fees</li>
          </ul>
        </div>
        </a>
      </article>
      
      <article class="one-third column">
        <a href="<?php echo get_site_url(); ?>/products#Business">
        <div class="content">
          <span class="type">Product</span>
          <h4>Business Performance Benchmarks</h4>
          <p>Want to know the health of your business?</p>
          <p>These products provide independent and impartial benchmarks of firms’ overall performance relative to peers, including:</p>
          <ul>
            <li>Revenues</li>
            <li>Volumes</li>
            <li>Client Intelligence</li>
          </ul> 
        </div>
        </a>
      </article>
      
      <article class="one-third column">
        <a href="<?php echo get_site_url(); ?>/products#Working">
        <div class="content">
          <span class="type">Product</span>
          <h4>Working Groups & Forums</h4>
          <p>Want to know what your peers are thinking?</p>
          <p>These events are an opportunity for member participants to meet with peers and discuss hot topics or challenges they might be facing, in a controlled and confidential environment:</p>
          <ul>
            <li>Tech and Ops Roundtables</li>
            <li>IT Regulatory Risk Working Group</li>
            <li>Fraud, Financial Crime and AML eForums</li>
            <li>Market Data Forums</li>
            <li>CIO and COO Forums</li>
          </ul>
        </div>
        </a>
      </article>
      
    </div>
  </div>
</section>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>