<?php get_header(); ?>
<section class="featured-content">
  <div class="flexslider">
    <ul class="slides">
    <?php 
      $args = array(
        'post_type' => 'slider'
      );
      $slide = new WP_Query($args); ?>
      <?php while($slide->have_posts()) : $slide->the_post(); ?>
        <li>
          <?php the_post_thumbnail('homepage-feature'); ?>
          <figure class="caption left top blktnt content">
          <h3>Commercial Building</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="page.html" class="big-button"><span>Learn More</span>about our skyline.</a>
        </li>
      <?php endwhile; ?>
    </ul><!-- /.slides -->
  </div>
</section><!-- /.featured-content -->
<?php get_footer(); ?>