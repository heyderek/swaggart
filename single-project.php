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
      <?php while(have_posts()) : the_post(); ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
      <?php endwhile; ?>
    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>