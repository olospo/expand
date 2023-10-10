<?php /* Template Name: Careers */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php if (have_rows('project_content')) { // Flexible Content ?>
<div class="flexible_content">        
  <?php while (have_rows('project_content')) { the_row(); ?>
    <?php if( get_row_layout() == 'hero' ): ?>
      <?php get_template_part( 'inc/flexible/hero'); // Hero ?>
    <?php elseif( get_row_layout() == 'stats' ): ?>
      <?php get_template_part( 'inc/flexible/stats'); // Stats ?>
    <?php elseif( get_row_layout() == 'square_section' ): ?>
      <?php get_template_part( 'inc/flexible/square_section'); // Square Section ?>
    <?php elseif( get_row_layout() == 'text_gradient' ): ?>
      <?php get_template_part( 'inc/flexible/text'); // Text Gradient ?>
    <?php elseif( get_row_layout() == 'tabbed_content' ): ?>
      <?php get_template_part( 'inc/flexible/tabbed'); // Tabbed Content ?>
    <?php elseif( get_row_layout() == 'content_block' ): ?>
      <?php get_template_part( 'inc/flexible/content_block'); // Content Block ?>
    <?php elseif( get_row_layout() == 'product_details_section' ): ?>
      <?php get_template_part( 'inc/flexible/product_details'); // Product Details Section ?>
    <?php elseif( get_row_layout() == 'explore_section' ): ?>
      <?php get_template_part( 'inc/flexible/explore_section'); // Explore Section ?>
    <?php endif; ?>
  <?php } ?>
</div>
<?php } ?>

<section class="application_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Application process</h3>
      <p>Our application process can vary depending on the role, however you can usually expect:</p>
    </div>
    <div class="row">
      <article class="tab one-third column">
        <div class="contain">
          <div class="icon">
            <img id="iconImage" src="<?php bloginfo('template_directory'); ?>/img/predictive.png" data-staticsrc="<?php bloginfo('template_directory'); ?>/img/predictive.png" data-gifsrc="<?php bloginfo('template_directory'); ?>/img/predictive.gif" alt="Computer screen illustration with icons">
          </div>
          <div class="content">
            <h4>Predictive index assessments</h4>
            <p>These online assessments should each take 10-15 minutes to complete. They help us to understand a little more about you which we can then explore in more detail later in the process.</p>
          </div>
        </div>
      </article>
      <article class="tab one-third column">
        <div class="contain">
          <div class="icon">
            <img id="iconImage" src="<?php bloginfo('template_directory'); ?>/img/telephone.png" data-staticsrc="<?php bloginfo('template_directory'); ?>/img/telephone.png" data-gifsrc="<?php bloginfo('template_directory'); ?>/img/telephone.gif" alt="Phone illustration with notifications">
          </div>
          <div class="content">
            <h4>Telephone interview</h4>
            <p>This is an opportunity for us to learn more about you: your studies, your skills, your experience, and why you chose to apply to Expand. As interviews are two- way processes, we also use this as an opportunity for you to learn more about us too.</p>
          </div>
        </div>
      </article>
      <article class="tab one-third column">
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

<section class="careers_benefits">
  <div class="container">
    <div class="eight columns offset-by-two">
      <div class="title">
        <h3 class="split_title">Employee Benefits</h3>
        <p>Every day, Expanders give their all, unlocking the potential of those who advance the world. It’s important, impactful work – and it’s only possible because of our hardworking people. That’s why our people are our top priority. Helping to make our employees feel genuinely valued, we support each Expander with a comprehensive employee benefits package</p>
      </div>
    </div>
    <div class="benefits twelve columns">
        <div class="benefit three columns">
          <h4>Physical and Mental Wellbeing</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="benefit three columns">
          <h4>Compensation and Retirement Contributions</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="benefit three columns">
          <h4>Balance and Sustainable Working Norms</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="benefit three columns">
          <h4>Career Growth and Community Support</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
  </div>
</section>

<section class="careers_archive">
  <div class="container">
    <div class="twelve columns">
      <div class="title eight columns offset-by-two">
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
        <article class="career eight columns offset-by-two">
          <div class="item_content">
            <div class="content">
              <h3>Unfortunately, we do not have any open positions at the moment.</h3>
              <p>Please check back again soon or fill in our Speculative application</p>
            </div>
          </div>
        </article>
      <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<section class="speculative">
  <div class="container">
    <div class="eight columns offset-by-two">
      <div class="title">
        <h3 class="split_title">Speculative Applications</h3>
        <p>We are always keen to hear from both graduates and experienced professionals who are interested in joining Expand at one of our three office locations: London, New York and Singapore. If you are interested in joining Expand, please apply below and if we have a position that suits your experience, we will be in touch.</p>
      </div>
      <div class="form eight columns offset-by-two">
        <?php echo do_shortcode('[contact-form-7 id="210" title="Speculative Applications"]'); ?>
        <p class="terms">By submitting your personal information, which could include a job application, you give Expand and BCG permission to process, screen and store it for the purposes of the recruitment process. We may share this personal information with a third party IT provider which hosts our recruitment platform and with third party assessment providers who assesses your qualifications as part of the recruitment process. Your personal information will not be shared with any other parties except as set out herein. For additional information, please review our privacy policy which we will update from time to time. You give Expand and BCG permission to retain your application and contact details to verify whether you have previously applied and so that we may notify you of further opportunities</p>
      </di>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>