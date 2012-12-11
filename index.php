<!DOCTYPE html>
<meta charset="utf-8">
<html>
  <head>
    <title>My site Title</title>
    <?php wp_head(); ?>
  </head>
  <body>
    <?php wp_nav_menu(array(
      'theme_location'=>'primary',
      'container' => 'nav',
      'depth' => 3,
      'walker' => new swaggart_mega_menu
      ));
    ?>
  </body>
  <?php wp_footer(); ?>
</html>