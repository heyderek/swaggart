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
                echo '<li><div class="ns-border-wrap"><h4><a href="' . get_permalink($news_query->ID) . '">' . get_the_title() . '</a></h4><span><a class="button" href="'. get_permalink($news_query->ID) .'">Read More &raquo;</a></span></div></li>';
              endwhile; 
              wp_reset_postdata();
            ?>
            </ul><!-- /.slides -->
          </div><!-- /.flexslider -->
          <div class="footer-nav-container"></div><!-- /.footer-nav-container -->
          <ul class="social">
            <li><a href="http://www.linkedin.com/company/2683901?trk=tyah" target="_blank" title="Swaggart Brothers on Linked In."><img src="<?php bloginfo('template_url'); ?>/images/linked_in.png" alt="Swaggart on LinkedIn icon" /></a></li>
            <li><a href="https://twitter.com/SwaggartBros" target="_blank" title="Swaggart Brothers on Twitter"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="Swaggart on Twitter icon" /></a></li>
            <li><a href="http://www.facebook.com/pages/Swaggart-Brothers-Inc/445260195519020" target="_blank" title="Swaggart Brothers on Facebook"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Swaggart on Facebook icon" /></a></li>
            <li><a href="<? echo home_url('/'); ?>contact-us/" title="Contact Us"><img src="<?php bloginfo('template_url'); ?>/images/email.png" alt="Contact Swaggart icon" /></a></li>
            <li><a href="https://sp.swaggartbrothers.com:4443" target="_blank" title="Swaggart Brothers' Sharepoint"><img src="<?php bloginfo('template_url'); ?>/images/sharepoint.png" alt="Swaggart Sharepoint" /></a></li>
          </ul><!-- /.social -->
          <section class="credits">
            <p>&copy; 2012 Swaggart Brothers. Inc.</p>
          </section><!-- /.credits -->
          <?php wp_footer(); ?>
          <script type="text/javascript">
          
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-37642590-1']);
            _gaq.push(['_trackPageview']);
          
            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
          </script>
        </footer><!-- /.wrapper -->
      </section><!-- /.colophon -->
    </div><!-- /.page -->
  </body>
</html>
