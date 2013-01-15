<?php
//Add basic theme support
add_theme_support('post-thumbnails');
$defaults = array(
  'width' => 1300,
  'height' => 190
);
add_theme_support('custom-header', $defaults);
add_image_size('homepage-feature', 1300, 645, true ); //Front page (large) images.
add_image_size('project-category', 900, 250, true ); //Project Classification thumbnails (wide).
add_image_size('gallery-thumbnail', 275, 275, true ); //Create a gallery thumbnail.

//Add Navigation
function setup_theme_features(){
  register_nav_menus(array(
    'primary' => 'Primary Menu',
    'mobile' => 'Mobile Navigation'
  ));
}
add_action('after_setup_theme', 'setup_theme_features');

//Create Sidebars
function create_secondary() {
  register_sidebar(array(
    'name' => __('Sidebar', ''),
    'id' => 'sidebar-1',
    'before_widget' => '<aside class="content">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="ribbon">',
    'after_title' => '</h3>'
  ));
}
add_action('init', 'create_secondary');

/*
//Flush and rewrite the permalinks on theme activation and deactivation.
function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );
*/

//Call in the navigation
require_once('admin/nav.php');

//Call in Galleries
require_once('admin/galleries.php');

//Call in Custom Post Types
require_once('admin/posttypes.php');

//Call in Meta boxes
require_once('admin/metaboxes.php');

//Initialize the MetaBox Class
function cmb_initialize_cmb_meta_boxes() {
  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'init.php';

}