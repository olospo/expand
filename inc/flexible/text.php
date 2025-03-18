<?php 
$title = get_sub_field('title');
$text = get_sub_field('gradient_text');
?>

<section class="text_section">
  <div class="container">
    <div class="ten columns offset-by-one">
      <?php if ($title) { ?>  
      <div class="title">
        <h3 class="split_title"><?php echo $title; ?></h3>
      </div>
      <?php } ?>
      <?php echo $text; ?>
    </div>
  </div>
</section>