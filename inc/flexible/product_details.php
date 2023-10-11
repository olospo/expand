<section class="product_section">
  <div class="container">
  <?php if( have_rows('product_details') ): // Image ?>
    <?php while( have_rows('product_details') ): the_row(); 
      $title = get_sub_field('title');  
      $content = get_sub_field('content');
      $bg = get_sub_field('background_image'); 
    ?>
    <div class="product twelve columns" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-size:cover;">
      <div class="content six columns">
        <h3><?php echo $title; ?></h3>
        <?php echo $content; ?>
      </div>
    </div>
    <?php endwhile; ?>
  <?php endif; ?>
  </div>
</section>