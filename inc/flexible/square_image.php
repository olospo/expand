<?php
$leftImage = get_sub_field('square_image_left');
  $lefturl = $leftImage['url'];
  $leftalt = $leftImage['alt'];
  $leftsize = 'featured-img';
  $leftthumb = $leftImage['sizes'][ $leftsize ];
$captionLeft = get_sub_field('square_image_left_caption');
  
$rightImage = get_sub_field('square_image_right');
  $righturl = $rightImage['url'];
  $rightalt = $rightImage['alt'];
  $rightsize = 'featured-img';
  $rightthumb = $rightImage['sizes'][ $rightsize ];
$captionRight = get_sub_field('square_image_right_caption');
?>

<div class="square_image">
  <div class="square six columns">
    <img src="<?php echo esc_url($leftthumb); ?>" alt="<?php echo esc_attr($leftalt); ?>" />
    <?php if ($captionLeft) { ?><p class="caption"><?php echo $captionLeft; ?></p><?php } ?>
  </div>
  <div class="square six columns">
    <img src="<?php echo esc_url($rightthumb); ?>" alt="<?php echo esc_attr($rightalt); ?>" />
    <?php if ($captionRight) { ?><p class="caption"><?php echo $captionRight; ?></p><?php } ?>
  </div>
</div>