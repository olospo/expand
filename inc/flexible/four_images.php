<?php
$oneImage = get_sub_field('square_image_one');
  $oneurl = $oneImage['url'];
  $onealt = $oneImage['alt'];
  $onesize = 'featured-img';
  $onethumb = $oneImage['sizes'][ $onesize ];
$captionOne = get_sub_field('square_image_one_caption');
  
$twoImage = get_sub_field('square_image_two');
  $twourl = $twoImage['url'];
  $twoalt = $twoImage['alt'];
  $twosize = 'featured-img';
  $twothumb = $twoImage['sizes'][ $twosize ];
$captionTwo = get_sub_field('square_image_two_caption');
  
$threeImage = get_sub_field('square_image_three');
  $threeurl = $threeImage['url'];
  $threealt = $threeImage['alt'];
  $threesize = 'featured-img';
  $threethumb = $threeImage['sizes'][ $threesize ];
$captionThree = get_sub_field('square_image_three_caption');
  
$fourImage = get_sub_field('square_image_four');
  $foururl = $fourImage['url'];
  $fouralt = $fourImage['alt'];
  $foursize = 'featured-img';
  $fourthumb = $fourImage['sizes'][ $foursize ];
$captionFour = get_sub_field('square_image_four_caption');

?>

<div class="square_image">
  <div class="square three columns">
    <img src="<?php echo esc_url($onethumb); ?>" alt="<?php echo esc_attr($onealt); ?>" />
    <?php if ($captionOne) { ?><p class="caption"><?php echo $captionOne; ?></p><?php } ?>
  </div>
  <div class="square three columns">
    <img src="<?php echo esc_url($twothumb); ?>" alt="<?php echo esc_attr($twoalt); ?>" />
    <?php if ($captionTwo) { ?><p class="caption"><?php echo $captionTwo; ?></p><?php } ?>
  </div>
  <div class="square three columns">
    <img src="<?php echo esc_url($threethumb); ?>" alt="<?php echo esc_attr($threealt); ?>" />
    <?php if ($captionThree) { ?><p class="caption"><?php echo $captionThree; ?></p><?php } ?>
  </div>
  <div class="square three columns">
    <img src="<?php echo esc_url($fourthumb); ?>" alt="<?php echo esc_attr($fouralt); ?>" />
    <?php if ($captionFour) { ?><p class="caption"><?php echo $captionFour; ?></p><?php } ?>
  </div>
</div>