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
    
    <header>
      <h2><?php printf( __( '%s', '' ),  single_cat_title( '', false ) ); ?></h2>
      <?php
      $category_description = category_description();
        if ( ! empty( $category_description ) )
        echo apply_filters( 'category_archive_meta', '<blockquote>' . $category_description . '</blockquote>' ); ?>
    </header>
    
    

    
    <?php while ( have_posts() ) : the_post(); ?>
      <article class="posts">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
      </article>
      <?php endwhile; ?>
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>