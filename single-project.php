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