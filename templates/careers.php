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
      </div>
    </div>
    <div class="square_background">
    
    </div>
  </div>
</section>

<section class="page">
  <div class="container">
    <div class="twelve columns">
      
        <article class="standard no_positions">
          <div class="item_content eight columns offset-by-two">
            <div class="content">
              <h3>Unfortunately, we do not have any open positions at the moment.</h3>
              
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="our_products">
  <div class="container">
    <div class="title six columns">
      <h3 class="split_title">Our Values</h3>
      <p>Expand embraces diversity, innovation and creativity and recognizes values and core competencies that apply to everyone. These values underpin the very work that we do.</p>
    </div>
    <div class="row">
      <article class="one-third column">
        <div class="content">
          <h4>Integrity</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Respect for the individual</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Ambassador of the firm</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
    </div>
  </div>
</section>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>