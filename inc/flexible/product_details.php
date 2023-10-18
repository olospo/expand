<section class="product_section">
  <div class="container">
  <?php if( have_rows('product_details') ): // Image ?>
    <?php while( have_rows('product_details') ): the_row(); 
      $title = get_sub_field('title');  
      $content = get_sub_field('content');
      $bg = get_sub_field('background_image'); 
      
      // Extract the first word from $title
      $id = explode(' ', trim($title));
      $id = strtolower($id[0]);
      // Only keep alphanumeric characters and ensure the resulting string is valid as an ID
      $id = preg_replace('/[^a-z0-9]+/', '', $id);

    ?>
    <div id="<?php echo $id; ?>" class="product twelve columns" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-size:cover;">
      <div class="content six columns">
        <h3><?php echo $title; ?></h3>
        <?php echo $content; ?>
        <?php $email = get_field('contact_email','options'); 
        if( $email ) { ?>
        <a href="mailto:<?php echo $email; ?>?subject=<?php echo $title; ?>" class="button">Get in touch</a><br />
        <?php } ?> 
        <?php if( get_sub_field('extra_details') ) { ?>
        <a href="javascript:void(0);" data-target="extra<?php echo $id; ?>" class="button extra">Read more</a>
        <?php } ?>
      </div>
    </div>
    
    <?php if( get_sub_field('extra_details') ) { ?>
    <div class="extra_details twelve columns" id="extra<?php echo $id; ?>">
      <div class="content">
        
        <?php if( have_rows('extra_content_one') ): ?>
          <?php while( have_rows('extra_content_one') ): the_row(); 
            // Get sub field values.
            $heading = get_sub_field('heading_one');
            $content = get_sub_field('content_one');
          ?>
          <div class="six columns no_right_margin">
            <h4><?php echo $heading; ?></h4>
            <?php echo $content; ?>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>  
        
        <?php if( have_rows('extra_content_two') ): ?>
          <?php while( have_rows('extra_content_two') ): the_row(); 
            // Get sub field values.
            $heading = get_sub_field('heading_two');
            $content = get_sub_field('content_two');
          ?>
          <div class="six columns no_left_margin">
            <h4><?php echo $heading; ?></h4>
            <?php echo $content; ?>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>  
        
        
      <?php if( have_rows('key_contacts') ): // Image ?>
        <div class="twelve columns">
        <h4>Key Contacts</h4>
        <ul class="key_contacts">
          
        <?php while( have_rows('key_contacts') ): the_row();
          $link = get_sub_field('person_link'); ?>
            <li><strong><?php the_sub_field('role'); ?></strong><br />
            <?php if( $link ): ?><a href="<?php the_sub_field('person_link'); ?>"><?php endif; ?><?php the_sub_field('person'); ?><?php if( $link ): ?></a><?php endif; ?></li>
          
        <?php endwhile; ?>
        </ul>
        </div>
      <?php endif; ?>
      </div>
    </div>
    <?php } ?>
    
    <?php endwhile; ?>
  <?php endif; ?>
  </div>
</section>