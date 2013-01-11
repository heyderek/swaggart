      <section class="colophon">
        <footer class="wrapper">
          <h3><img src="<?php bloginfo('template_url'); ?>/images/news_icon.png" alt="Swaggart Brothers News Icon" />News</h3>
          <div class="flexslider">
            <ul class="slides">
            
            <?php 
              $args = array(
                'cat' => 1
              );
              $news_query = new WP_Query($args);
              while($news_query->have_posts()) : $news_query->the_post();
                echo '<li><div class="ns-border-wrap"><h4><a href="' . get_permalink($news_query->ID) . '">' . get_the_title() . '</a></h4><span><a class="button" href="'. get_permalink($news_query->ID) .'">Read More &raquo;</a></div></li>';
              endwhile; 
              wp_reset_postdata();
            ?>
            </ul><!-- /.slides -->
          </div><!-- /.flexslider -->
          <div class="footer-nav-container"></div><!-- /.footer-nav-container -->
          <ul class="social">
            <li><a href="http://www.linkedin.com/company/2683901?trk=tyah" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/linked_in.png" alt="Swaggart on LinkedIn icon" /></a></li>
            <li><a href="https://twitter.com/SwaggartBros" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="Swaggart on Twitter icon" /></a></li>
            <li><a href="https://www.facebook.com/pages/Swaggart-Brothers-Inc/445260195519020?ref=ts&fref=ts" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Swaggart on Facebook icon" /></a></li>
            <li><a href="<? echo home_url('/'); ?>contact-us/"><img src="<?php bloginfo('template_url'); ?>/images/email.png" alt="Conact Swaggart icon" /></a></li>
          </ul><!-- /.social -->
          <section class="credits">
            <p>&copy; 2012 Swaggart Brothers. Inc.</p>
          </section><!-- /.credits -->
          <?php wp_footer(); ?>
        </footer><!-- /.wrapper -->
      </section><!-- /.colophon -->
    </div><!-- /.page -->
  </body>
</html>
