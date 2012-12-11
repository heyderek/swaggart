<?php

//Add Navigation
function setup_theme_features(){
  register_nav_menus(array(
    'primary' => 'Primary Menu'
  ));
}

add_action('after_setup_theme', 'setup_theme_features');

//Extend Navigation with Custom Walker Class.  Add container if there is more than one child menu item.
class swaggart_mega_menu extends Walker_Nav_Menu {
  // add classes to ul sub-menus
  function start_lvl( &$output, $depth ) {
      // depth dependent classes
      $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
      $display_depth = ( $depth >= 1); // because it counts the first submenu as 0
      // build html
      $output .= "\n" . $indent . '<div class="menu-overlay">' . "\n" . $indent . '<ul>' . "\n";
  }
  //Close the .menu-overlay div
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n</div>\n";
  }
}