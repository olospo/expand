<?php $numrows = count( get_sub_field( 'stat_box' ) );?>
<?php if( have_rows('stat_box') ): ?>
<div class="stat_block">
  <?php while( have_rows('stat_box') ): the_row(); 
    $icon = get_sub_field('icon');
    $figure = get_sub_field('figure');
    $unit = get_sub_field('unit');
    $explanation = get_sub_field('explanation');
  ?>
  <div class="content <?php if ($numrows =='1') { echo "six columns offset-by-three single"; } elseif ($numrows =='2') { echo "six columns double"; } else { echo "one-third column third"; } ?>">
      <?php if ($numrows) { ?><img src="<?php echo $icon; ?>" class="icon"/><?php } ?>
      <h3><span class="count"><?php echo $figure; ?></span> <?php echo $unit; ?></h3>
      <p><?php echo $explanation; ?></p>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>