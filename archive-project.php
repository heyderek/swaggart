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
      $post_type = 'project';
      // Get all the taxonomies for this post type
      $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );
      foreach( $taxonomies as $taxonomy ) : 
          // Gets every "category" (term) in this taxonomy to get the respective posts
          $terms = get_terms( $taxonomy );
          foreach( $terms as $term ) : 
              $posts = new WP_Query( "taxonomy=$taxonomy&term=$term->slug&posts_per_page=1" );
              if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
                  //Do you general query loop here  
                  echo '<p><h3>' . $term->name . '</h3>' . the_post_thumbnail('thumbnail') . '</p>';
              endwhile; endif;
          endforeach;
      endforeach;    
    ?>
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>