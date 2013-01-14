<!DOCTYPE html>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<html>
  <head>
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/bookmark-icon.png" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" title="stylesheet" type="text/css" media="screen" charset="utf-8">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js" charset="utf-8"></script>
    <!--[if lt IE 9]><script src="<?php bloginfo('template_url'); ?>/js/html5.js" charset="utf-8"></script><![endif]-->
    <script src="<?php bloginfo('template_url'); ?>/js/prefixfree.min.js" charset="utf-8"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/flexslider.js" charset="utf-8"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/custom.js" charset="utf-8"></script>
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>
    <div class="page">
      <section class="masthead">
        <header class="wrapper">
          <hgroup class="branding">
            <h1><?php bloginfo('name'); ?></h1>
            <h2><?php bloginfo('description'); ?></h2>
          </hgroup><!-- /.branding -->
          <a href="<?php echo home_url('/'); ?>" class="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Swaggart Brothers Logo" /></a>
          <?php wp_nav_menu(array('theme_location' => 'primary', 'container_id' => 'access', 'walker' => new Menu_With_Description)); ?>
        </header><!-- /.wrapper -->
      </section><!-- /.masthead -->