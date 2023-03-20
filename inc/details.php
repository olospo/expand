<div class="details twelve columns">
  <div class="content">
    <ul class="category">
      <h4 class="category">Category</h4>
      <?php
      $workprojectid = get_the_ID(); 
      $workcategory = wp_get_post_terms( $workprojectid, 'work_category' ); 
      $arraycatname = array(); 
      $workterm_id = array(); 
      foreach($workcategory as $thisslug) 
      {
        $arraycatname[] = $thisslug->name;
        $workterm_id[] = $thisslug->term_id;
      } 
      $categoryname = implode( " ", $arraycatname );
      $term_id = implode( " ", $workterm_id ); ?>
      <li><?php echo $categoryname; ?></li>
    </ul>
    
    <ul class="technique">
      <h4 class="technique">Technique</h4>
      <?php
      $technique = wp_get_post_terms( $workprojectid, 'technique' ); 
      $arraytechniquecatname = array(); 
      foreach($technique as $thisslug) 
      {
        $arraytechniquecatname[] = $thisslug->name;
      } 
      $techniquename = implode( " ", $arraytechniquecatname ); ?>
  
      <li><?php echo  $techniquename; ?></li>
    </ul>
    
    <ul class="client">
      <h4>Client</h4>
      <li><?php the_field('client_name'); ?></li>
    </ul>
  </div>
</div>