<?php get_header(); ?>
<section class="page-content">
  <div class="headerimg">
    <img src="<?php bloginfo('template_url'); ?>/images/header.png" />
  </div><!-- /.headerimg -->
  <div class="wrapper">
    <section class="secondary">
      <aside class="content">
        <h3 class="ribbon">Heading</h3>
        <ul class="menu">
          <li><a href="index.html">Home</a></li>
          <li><a href="index.html">Home</a></li>
          <li><a href="index.html">Home</a></li>
          <li><a href="index.html">Home</a></li>
          <li><a href="index.html">Home</a></li>
        </ul>
      </aside>
    </section><!-- /.secondary -->
    <section class="primary content">
    <?php 
      $args = array( 'taxonomy' => 'Classification' );
      $terms = get_terms('Classification', $args);
      $count = count($terms); $i=0;

      if ($count > 0) {
        foreach ($terms as $term) {
          
          global $post;
          $term_item = $term->slug;
          $args = array(
            'tax_query' => array(
              'taxonomy'=>'classification', 
              'terms'=> 'agriculture'
              )
          );
          $posts_array = get_posts($args);
          
          foreach($posts_array as $solo_post){
            $solo_title = $solo_post->post_title;
          }
          
          $term_list .= '<p><a href="/project/' . $term->slug . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name) . '">' . $term->name .'</a>&nbsp;'. $solo_title . '&nbsp;' . $term_item .'</p>';

        }
        echo $term_list;
      }
     ?>

<!--
       <?php
         global $post;
          $args = array('post_type' => 'project');
          $posted = get_posts($args); 
          foreach($posted as $post_one) {
            $title .= $post_one->post_title;
          }
            
          echo $title;
        ?> 
-->
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>