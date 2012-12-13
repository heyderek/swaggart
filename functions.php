<?php

add_theme_support('post-thumbnails');

//Add Navigation
function setup_theme_features(){
  register_nav_menus(array(
    'primary' => 'Primary Menu'
  ));
}

add_action('after_setup_theme', 'setup_theme_features');

//Add Projects Post Type
function project_custom_init() {
  $labels = array(
    'name' => 'Projects',
    'singular_name' => 'Project',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Project',
    'edit_item' => 'Edit Project',
    'new_item' => 'New Project',
    'all_items' => 'All Projects',
    'view_item' => 'View Project',
    'search_items' => 'Search Projects',
    'not_found' => 'No projects found',
    'not_found_in_trash' => 'No projects found in trash.',
    'parent_item_colon' => '',
    'menu_name' => 'Projects'
  );
  $my_url = get_bloginfo('template_directory'); 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => $my_url . '/images/application-text-image.png',
    'supports' => array('title', 'editor', 'revisions', 'thumbnail')
  );
  register_post_type('project', $args);
}

add_action('init', 'project_custom_init');

function project_tax_init() {
  $labels = array(
    'name' => _x('Classification','taxonomy general name'),
    'singular_name' => _x('Classification', 'taxonomy singular name'),
    'search_items' => __('Search Classes'),
    'all_items' => __('All Classes'),
    'parent_item' => __('Parent Classification'),
    'parent_item_colon' => __('Parent Classification:'),
    'edit_item' => __('Edit Classification'),
    'update_item' => __('Update Classification'),
    'add_new_item' => __('Add New Classification'),
    'new_item_name' => __('New Classification Name'),
    'menu_name' => __('Classes'),
  );
  register_taxonomy('Classification',array('project'),array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'hierarchical'),
  ));
}

add_action('init', 'project_tax_init', 0);


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
    $item_output .= $args->link_before . '<a'. $attributes .'>' . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after . '</a>';
    
    $item_output .= ( $args->display_depth >= $depth ) ? '<div class="menu-overlay">' . '<h4>'. $item->title . '</h4>' . apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth ) : '';
    
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    $item_output .= '</div>';
  }
}

add_filter( 'wp_nav_menu_args' , 'my_add_menu_descriptions' );
function my_add_menu_descriptions( $args ) {
  $args['walker'] = new Menu_With_Description;
  $args['container'] = 'nav';
  $args['container_class'] = 'menu';
  $args['desc_depth'] = 0;
  $args['thumbnail'] = true;
  $args['thumbnail_link'] = false;
  $args['thumbnail_size'] = 'thumbnail';
  $args['thumbnail_attr'] = array( 'class' => 'nav_thumb my_thumb' , 'alt' => 'test' , 'title' => 'test' );
return $args;

}
