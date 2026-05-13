<?php 
$color = get_sub_field('colour_scheme');
$title = get_sub_field('title');
$custom = get_sub_field('custom_title_split');
$split = get_sub_field('split_title');
$text = get_sub_field('gradient_text');
?>

<section class="text_section <?php echo $color; ?>">
  <div class="container">
    <div class="ten columns offset-by-one">
      <?php if ($title) { ?>  
      <div class="title">
        <h3 class="split_title <?php if( $custom ) { echo $split; } ?>"><?php echo $title; ?></h3>
      </div>
      <?php } ?>
      <?php echo $text; ?>
    </div>
  </div>
</section>