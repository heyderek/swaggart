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
      <?php while(have_posts()) : the_post(); ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <h2><?php the_date('F Y'); ?></h2>
        <?php the_content(); ?>
      </article>
      <?php endwhile; ?>
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>