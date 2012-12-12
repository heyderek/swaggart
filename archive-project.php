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

          <article>
        <?php 
            $args=array(
              'public'   => true,
              '_builtin' => false
              
            ); 
            $output = 'objects'; // or objects
            $operator = 'and'; // 'and' or 'or'
            $taxonomies=get_taxonomies($args,$output,$operator); 
            if  ($taxonomies) {
              foreach ($taxonomies  as $taxonomy ) {
                echo '<p>'. $taxonomy. '</p>';
              }
            }
        ?>
      </article>

    </section><!-- /.primary -->
  </div>
</section><!-- /.page-content -->
<?php get_footer(); ?>