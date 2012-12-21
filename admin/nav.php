<?php
//Extend Navigation with Custom Walker Class.  Add container if there is more than one child menu item.
class Menu_With_Description extends Walker_Nav_Menu {
  
  function start_lvl(&$output, $element, $item, $max_depth, $depth=0, $args=array()) {
  
      $output .= "\n<ul>\n";  
    }  
    function end_lvl(&$output, $depth=0, $args=array()) {  
      $output .= "</ul>\n";
    }

  function start_el(&$output, $item, $depth, $args) {
    global $wp_query;

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
/*     $display_depth = ( $depth >= 1); // because it counts the first submenu as 0 */

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';
    
    $output .= "\n" . $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>' . "\n";

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    // get user defined attributes for thumbnail images
    $attr_defaults = array( 'class' => 'nav_thumb' , 'alt' => esc_attr( $item->attr_title ) , 'title' => esc_attr( $item->attr_title ) );
    $attr = isset( $args->thumbnail_attr ) ? $args->thumbnail_attr : '';
    $attr = wp_parse_args( $attr , $attr_defaults );
    
    $item_output = $args->before;
        
    $item_output .= $args->link_before . '<a'. $attributes .'>' . apply_filters( 'the_title', $item->title, $item->ID );
    
    $item_output .= $args->link_after . '</a>';
    
    $item_output .= ( $depth == 0 ) ? apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth ) : '';

    
    /* ? apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth ) : ''; */
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

  }
}

//Menu args
add_filter( 'wp_nav_menu_args' , 'my_add_menu_descriptions' );
function my_add_menu_descriptions( $args ) {
/*   $args['walker'] = new Menu_With_Description; */
  $args['theme_location'] = 'primary';
  $args['container'] = 'nav';
  $args['container_class'] = 'menu';
  $args['desc_depth'] = 0;
  $args['thumbnail'] = true;
  $args['thumbnail_link'] = false;
  $args['thumbnail_size'] = 'thumbnail';
  $args['thumbnail_attr'] = array( 'class' => 'nav_thumb my_thumb' , 'alt' => 'test' , 'title' => 'test' );
return $args;

}