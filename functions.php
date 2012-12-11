<?php

add_theme_support('post-thumbnails');

//Add Navigation
function setup_theme_features(){
  register_nav_menus(array(
    'primary' => 'Primary Menu'
  ));
}

add_action('after_setup_theme', 'setup_theme_features');

//Extend Navigation with Custom Walker Class.  Add container if there is more than one child menu item.
class Menu_With_Description extends Walker_Nav_Menu {

  function start_el(&$output, $item, $depth, $args) {
    global $wp_query;

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth >= 1); // because it counts the first submenu as 0

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';

    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    // get user defined attributes for thumbnail images
    $attr_defaults = array( 'class' => 'nav_thumb' , 'alt' => esc_attr( $item->attr_title ) , 'title' => esc_attr( $item->attr_title ) );
    $attr = isset( $args->thumbnail_attr ) ? $args->thumbnail_attr : '';
    $attr = wp_parse_args( $attr , $attr_defaults );
    
    $item_output = $args->before;
    
    $item_output .= ( $args->display_depth >= $depth ) ? '<div class="menu-overlay">' . '<h4>'. $item->title . '</h4>' . apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth ) : '';
    
    $item_output .= (1 <= $depth) ? $args->link_before . '<a'. $attributes .'>' . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after . '</a>' : '';
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    $item_output .= '</div>';
  }
}

add_filter( 'wp_nav_menu_args' , 'my_add_menu_descriptions' );
function my_add_menu_descriptions( $args ) {
  $args['walker'] = new Menu_With_Description;
  $args['container'] = 'nav';
  $args['desc_depth'] = 0;
  $args['thumbnail'] = true;
  $args['thumbnail_link'] = false;
  $args['thumbnail_size'] = 'thumbnail';
  $args['thumbnail_attr'] = array( 'class' => 'nav_thumb my_thumb' , 'alt' => 'test' , 'title' => 'test' );
return $args;

}


/*
//Load Options Framework
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
*/