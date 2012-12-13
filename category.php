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
    <header>
      <h2 class="cat-heading"><?php printf( __( '%s', '' ),  single_cat_title( '', false ) ); ?></h2>
      <?php
      $category_description = category_description();
        if ( ! empty( $category_description ) )
        echo apply_filters( 'category_archive_meta', '<blockquote>' . $category_description . '</blockquote>' ); ?>
    </header>
    <?php while ( have_posts() ) : the_post(); ?>
      <article class="posts">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <h2><?php the_date('F Y'); ?></h2>
        <?php the_content(); ?>
      </article>
      <?php endwhile; ?>
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>