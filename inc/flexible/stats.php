<?php if( have_rows('stat') ): $numrows = count( get_field( 'stat' ) ); $word = number_to_word($numrows); ?>
<section class="stat_section">
  <div class="container">
    <div class="stats four <?php // echo $word; To Do: Fix this ?>">
    <?php while( have_rows('stat') ): the_row(); 
      $unit = get_sub_field('unit');
      $unit_extra = get_sub_field('unit_extra');
      $prepost = get_sub_field('postfix_or_prefix');
      $desc = get_sub_field('description');
      $colour = get_sub_field('colour');
    ?>
      <div class="stat <?php echo $colour; ?>">
        <span class="unit" data-count="<?php echo $unit; ?>" <?php if ($prepost) { ?> data-<?php echo $prepost ;?>="<?php echo $unit_extra; ?>" <?php } ?>><?php echo $unit; ?></span>
        <span class="description"><?php echo $desc; ?></span>
      </div>
    <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>