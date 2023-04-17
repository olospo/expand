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

<section class="tabbed_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Application process</h3>
    </div>
    <div class="tab_menu twelve columns">
      <button class="w3-bar-item w3-button tablink active" onclick="openTab(event,'Data')">Data Collection</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Normalisation')">Normalisation</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Comparison')">Comparison</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Action')">Action</button>
    </div> 
    <article id="Data" class="tab eight columns offset-by-two">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/icon.png" alt="Placeholder icon">
        </div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </article>
    
    <article id="Normalisation" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/icon_two.png" alt="Placeholder icon">
        </div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </article>
    <article id="Comparison" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/icon.png" alt="Placeholder icon">
        </div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </article>
    <article id="Action" class="tab eight columns offset-by-two" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/icon_two.png" alt="Placeholder icon">
        </div>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </article>
  </div>
</section>


<section class="page">
  <div class="container">
    <div class="twelve columns">
      <div class="title">
        <h3 class="split_title">Open Positions</h3>
      </div>
      <article class="standard">
        <div class="item_content eight columns offset-by-two">
          <div class="content">
            <h3>Associate – London</h3>
            <p>Expand is looking for enthusiastic Associates to join our Delivery team. Our Associates are typically recent graduates, so if you’re just starting your career this role may be for you.</p>
            <a href="<?php the_permalink(); ?>" class="button red">Read more</a>
          </div>
        </div>
      </article>
      <article class="standard">
        <div class="item_content eight columns offset-by-two">
          <div class="content">
            <h3>Associate – London</h3>
            <p>Expand is looking for enthusiastic Associates to join our Delivery team. Our Associates are typically recent graduates, so if you’re just starting your career this role may be for you.</p>
            <a href="<?php the_permalink(); ?>" class="button red">Read more</a>
          </div>
        </div>
      </article>
      <article class="standard">
        <div class="item_content eight columns offset-by-two">
          <div class="content">
            <h3>Associate – London</h3>
            <p>Expand is looking for enthusiastic Associates to join our Delivery team. Our Associates are typically recent graduates, so if you’re just starting your career this role may be for you.</p>
            <a href="<?php the_permalink(); ?>" class="button red">Read more</a>
          </div>
        </div>
      </article>
      </div>
    </div>
  </div>
</section>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>