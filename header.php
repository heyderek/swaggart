<!DOCTYPE html>
<meta charset="utf-8">
<html>
  <head>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" title="stylesheet" type="text/css" media="screen" charset="utf-8">
    <script src="<?php bloginfo('template_url'); ?>js/jquery.js" charset="utf-8"></script>
    <!--[if lt IE 9]><script src="js/html5.js" charset="utf-8"></script><![endif]-->
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
            <h1>Swaggart Brothers Inc.</h1>
            <h2>General Commercial Contractors</h2>
            <a href="index.html" class="logo"><img src="images/logo.png" /></a>
          </hgroup><!-- /.branding -->
          <nav class="menu">
            <ul>
              <li><a href="index.html">Link</a></li>
              <li>
                <a href="#">Link</a>
                <div class="menu-overlay">
                  <h4>Link</h4>
                  <img class="nav-thumb" src="images/thumbnail.png" />
                  <ul>
                    <li><a href="page.html">Page</a></li>
                    <li><a href="page.html">Page</a></li>
                    <li><a href="page.html">Page</a></li>
                    <li><a href="page.html">Page</a></li>
                  </ul>
                  <button class="close button">Close navigation</button>
                </div><!-- /.menu-overlay -->
              </li>
              <li>
                <a href="#">Link</a>
                <div class="menu-overlay">
                  <h4>Link</h4>
                  <img class="nav-thumb" src="images/thumbnail.png" />
                  <ul>
                    <li><a href="page.html">Page 2</a></li>
                    <li><a href="page.html">Page 2</a></li>
                    <li><a href="page.html">Page 2</a></li>
                    <li><a href="page.html">Page 2</a></li>
                  </ul>
                  <button class="close button">Close navigation</button>
                </div><!-- /.menu-overlay -->
              </li>
              <li><a href="index.html">Link</a></li>
            </ul>
          </nav><!-- /.menu -->
        </header><!-- /.wrapper -->
      </section><!-- /.masthead -->