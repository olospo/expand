<?php /* Template Name: Careers */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero home" >
  <div class="video-upload" style="background: linear-gradient(rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.30)), url('<?php bloginfo('template_directory'); ?>/img/expand_careers.jpg') center center no-repeat;">
    <video data-object-fit="cover" playsinline muted autoplay loop  id="homeVideo" poster="<?php echo $image['url']; ?>">
      <source src="<?php echo $videowebm; ?>" type="video/webm">
      <source src="<?php echo $videomp4; ?>" type="video/mp4">
    </video>
    <div class="poster" style="background: url('<?php echo $image['url']; ?>') center center no-repeat; background-size: cover"></div>
  </div>
</section>


<section class="text_section">
  <div class="container">
    <div class="ten columns offset-by-one">
      <div class="title">
        <h3 class="split_title">Why Join Us?</h3>
      </div>
      <p>As a trusted advisor to senior executives across the world’s leading financial services firms, providing unique data-driven business intelligence to help them to operate more effectively, we have a breadth and depth of opportunities to offer you a rewarding and varied career path.</p>
    </div>
  </div>
</section>

<section class="square_section green">
  <div class="container">
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title">Expand+ BCG</h3>
        </div>
        <p>Expand is a wholly-owned subsidiary of the Boston Consulting Group, headquartered in London and with offices in Singapore and New York. Our enthusiastic and committed team has a friendly, diverse small company feel with regular social events and a highly collaborative, professional, supportive and entrepreneurial working culture.</p>
        <p><a href="<?php echo get_site_url(); ?>/about" class="button">Read more</a></p>
      </div>
    </div>
    <div class="square_background"></div>
  </div>
</section>

<section class="square_section grey">
  <div class="container">
    <div class="square_background"></div>
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title">Who are we looking for?</h3>
        </div>
        <p>Our people are proactive, curious and diligent individuals: analytical and articulate problem solvers who combine the ability to pick things up quickly with a passion for financial services and building relationships with clients.</p>
        <p>Our Delivery team have both a high analytical aptitude, meaning they are comfortable handling and examining large data sets, and strong written and verbal communication skills as everyone engages with clients from an early stage.</p>
        <p><a href="#" class="button">Review our Competency Framework</a></p>
      </div>
    </div>
    
  </div>
</section>

<section class="application_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Application process</h3>
      <p>Our application process can vary depending on the role, however you can usually expect:</p>
    </div>
    <div class="row">
      <article class="tab three columns">
        <div class="contain">
          <div class="icon">
            <img src="<?php bloginfo('template_directory'); ?>/img/icon_two.png" alt="Placeholder icon">
          </div>
          <div class="content">
            <h4>Predictive index assessments</h4>
            <p>These online assessments should each take 10-15 minutes to complete. They help us to understand a little more about you which we can then explore in more detail later in the process.</p>
          </div>
        </div>
      </article>
      <article class="tab three columns">
        <div class="contain">
          <div class="icon">
            <img src="<?php bloginfo('template_directory'); ?>/img/icon_three.png" alt="Placeholder icon">
          </div>
          <div class="content">
            <h4>Telephone interview</h4>
            <p>This is an opportunity for us to learn more about you: your studies, your skills, your experience, and why you chose to apply to Expand. As interviews are two- way processes, we also use this as an opportunity for you to learn more about us too.</p>
          </div>
        </div>
      </article>
      <article class="tab three columns">
        <div class="contain">
          <div class="icon">
            <img src="<?php bloginfo('template_directory'); ?>/img/icon.png" alt="Placeholder icon">
          </div>
          <div class="content">
            <h4>Case study</h4>
            <p>At this stage of the process you will get the opportunity to meet some more members of our team who will guide you through a more in depth case study to assess your analytical capabilities. If you reach this stage, we will provide more details about what to expect and how to prepare for this part of the process.</p>
          </div>
        </div>
      </article>
      <article class="tab three columns">
        <div class="contain">
          <div class="icon">
            <img src="<?php bloginfo('template_directory'); ?>/img/icon.png" alt="Placeholder icon">
          </div>
          <div class="content">
            <h4>Case study</h4>
            <p>At this stage of the process you will get the opportunity to meet some more members of our team who will guide you through a more in depth case study to assess your analytical capabilities. If you reach this stage, we will provide more details about what to expect and how to prepare for this part of the process.</p>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>


<section class="page">
  <div class="container">
    <div class="twelve columns">
      <div class="title">
        <h3 class="split_title">Open Positions</h3>
      </div>
      <?php $args = array(
        'post_type' => 'career',
        'posts_per_page' => -1,
        'post_status' => 'publish',
      ); query_posts($args); ?>
      <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('inc/career'); ?>
      <?php endwhile; else : ?>
      <!-- No posts found -->
      <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>