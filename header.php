<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<html>
  <head>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" title="stylesheet" type="text/css" media="screen" charset="utf-8">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js" charset="utf-8"></script>
    <!--[if lt IE 9]><script src="<?php bloginfo('template_url'); ?>/js/html5.js" charset="utf-8"></script><![endif]-->
    <script src="<?php bloginfo('template_url'); ?>/js/prefixfree.min.js" charset="utf-8"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/flexslider.js" charset="utf-8"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/custom.js" charset="utf-8"></script>
    <title><?php
      //Title based on page.
      global $page, $paged;
      wp_title( '|', true, 'right' );
      // Add the blog name.
      bloginfo( 'name' );
      // Add the blog description for the home/front page.
      $site_description = get_bloginfo( 'description', 'display' );
      if ( $site_description && ( is_home() || is_front_page() ) )
      	echo " | $site_description";
      // Add a page number if necessary:
      if ( $paged >= 2 || $page >= 2 )
      	echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) ); ?>
    </title>
    <?php wp_head(); ?>
  </head>
  <body>
    <div class="page">
      <section class="masthead">
        <header class="wrapper">
          <hgroup class="branding">
            <h1><?php bloginfo('name'); ?></h1>
            <h2><?php bloginfo('description'); ?></h2>
            <a href="<?php echo home_url('/'); ?>" class="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" /></a>
          </hgroup><!-- /.branding -->
          <?php wp_nav_menu(array('theme_location' => 'primary', 'container_id' => 'access', 'walker' => new Menu_With_Description)); ?>
        </header><!-- /.wrapper -->
      </section><!-- /.masthead -->