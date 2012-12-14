<?php get_header(); ?>
<section class="page-content">
  <div class="headerimg">
    <img src="<?php bloginfo('template_url'); ?>/images/header.png" />
  </div><!-- /.headerimg -->
  <div class="wrapper">
    <section class="secondary">
      <?php do_action('before_sidebar'); ?>
        <?php if(! dynamic_sidebar('sidebar-1')) : ?>
      <?php endif; ?>
    </section><!-- /.secondary -->
    <section class="primary content">
      <header>
        <h2 class="cat-heading"><?php printf( __( '%s', '' ),  single_term_title( '', false ) ); ?></h2>
          <p><?php
          $category_description = category_description();
            if ( ! empty( $category_description ) )
            echo apply_filters( 'category_archive_meta', $category_description ); ?></p>
      </header>
      <?php while ( have_posts() ) : the_post(); ?>
        <a href="<?php the_permalink(); ?>">
          <article class="cat-thumbs">
            <h3><?php the_title(); ?></h3>
            <?php the_post_thumbnail('project-category'); ?>
          </article><!-- /.posts -->
        </a>
      <?php endwhile; ?>
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>