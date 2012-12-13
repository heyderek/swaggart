<?php get_header(); ?>
<section class="featured-content">
  <div class="flexslider">
    <ul class="slides">
    <?php 
      $args = new WP_Query();
    ?>
    
    
    
      <li>
        <img src="<?php bloginfo('template_url'); ?>/images/slide_1.png" />
        <figure class="caption left bottom content">
          <h3>The Sky is the Limit.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="page.html" class="big-button"><span>Learn More</span>about our skyline.</a>
        </figure><!-- /.caption -->
      </li>
      <li>
        <img src="<?php bloginfo('template_url'); ?>/images/slide_2.png" />
          <figure class="caption left top blktnt content">
          <h3>Commercial Building</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="page.html" class="big-button"><span>Learn More</span>about our skyline.</a>
        </figure><!-- /.caption -->
      </li>
    </ul><!-- /.slides -->
  </div>
</section><!-- /.featured-content -->
<?php get_footer(); ?>