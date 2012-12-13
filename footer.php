      <section class="colophon">
        <footer class="wrapper">
          <h3><img src="<?php bloginfo('template_url'); ?>/images/news_icon.png" />News</h3>
          <div class="flexslider">
            <ul class="slides">
            
            <?php 
              $args = array(
                'cat' => 1
              );
              $news_query = new WP_Query($args);
              while($news_query->have_posts()) : $news_query->the_post();
                echo '<li> <h4>' . get_the_title() . '</h4><span><a class="button" href="'. get_permalink($news_query->ID) .'">Read More &raquo;</a></li>';
              endwhile; 
              wp_reset_postdata();
            ?>
            </ul><!-- /.slides -->
          </div><!-- /.flexslider -->
          <div class="footer-nav-container"></div><!-- /.footer-nav-container -->
          <ul class="social">
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/linked_in.png" /></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" /></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" /></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/email.png" /></a></li>
          </ul><!-- /.social -->
          <footer class="credits">
            <p>&copy; 2012 Swaggart Brothers. Inc.</p>
          </footer><!-- /.credits -->
          <?php wp_footer(); ?>
        </footer><!-- /.wrapper -->
      </section><!-- /.colophon -->
    </div><!-- /.page -->
  </body>
</html>
