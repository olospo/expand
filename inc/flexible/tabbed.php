<?php 
if( have_rows('tab') ): ?>
<section class="tabbed_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Our Unique Approach</h3>
    </div>
    
    <?php 
    $counter = 0;
    $buttons = '';
    $articles = '';
    while( have_rows('tab') ): the_row(); 
      $title = get_sub_field('title');
      $content = get_sub_field('content');
      $icon = get_sub_field('icon');
      $url = $icon['url'];
      $alt = $icon['alt'];
      $caption = $image['caption'];

      $active_class = ($counter == 0) ? 'active' : '';
      $display_style = ($counter == 0) ? '' : 'display:none';
      
      $buttons .= '<button class="w3-bar-item w3-button tablink ' . $active_class . '" onclick="openTab(event,\'' . $title . '\')">' . $title . '</button>';
      
      $articles .= '<article id="' . $title . '" class="tab ten columns offset-by-one" style="' . $display_style . '">
                        <div class="contain">';
      
      if (!empty($icon)) {
        $articles .= '<div class="icon"><img src="' . $url . '" alt="'. $alt . '" /></div>';
      }
      
      $articles .= '<div class="content">' . $content . '</div>
                    </div>
                  </article>';
      
      $counter++;
    endwhile;
    ?>
    
    <div class="tab_menu twelve columns <?php echo $word; ?>">
      <?php echo $buttons; ?>
    </div> 
    
    <?php echo $articles; ?>
    
  </div>
</section>
<?php endif; ?>