<?php get_header(); ?>
<section class="page-content">
  <div class="headerimg">
    <img src="<?php header_image(); ?>" />
  </div><!-- /.headerimg -->
  <div class="wrapper">
    <section class="secondary">
      <?php do_action('before_sidebar'); ?>
        <?php if(! dynamic_sidebar('sidebar-1')) : ?>
      <?php endif; ?>
    </section><!-- /.secondary -->
    <section class="primary content">
    <h1>Project Categories</h1>
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
                  echo '<a href="'. home_url() . '/classification/' .$term->slug.'"><article class="cat-thumbs"><h3>' . $term->name . '</h3>',  the_post_thumbnail('project-category'), '</article></a>';
              endwhile; endif;
          endforeach;
      endforeach;    
    ?>
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>