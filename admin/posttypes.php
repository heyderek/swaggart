<?php
//Add Slider Post Type
function slider_custom_init() {
  $labels = array(
    'name' => 'Slider',
    'singular_name' => 'Slide',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Slide',
    'edit_item' => 'Edit Slide',
    'new_item' => 'New Slide',
    'all_items' => 'All Slides',
    'view_item' => 'View Slide',
    'search_items' => 'Search Slides',
    'not_found' => 'No Slides found',
    'not_found_in_trash' => 'No Slides found in trash.',
    'parent_item_colon' => '',
    'menu_name' => 'Slider'
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
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => 60,
    'menu_icon' => $my_url . '/images/picture--arrow.png',
    'supports' => array('title', 'revisions', 'thumbnail')
  );
  register_post_type('slider', $args);
}
add_action('init', 'slider_custom_init');

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
    'taxonomies' => array('classification'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 20,
    'menu_icon' => $my_url . '/images/application-text-image.png',
    'supports' => array('title', 'editor', 'revisions', 'thumbnail')
  );
  register_post_type('project', $args);
}
add_action('init', 'project_custom_init');
add_action('init', 'project_tax_init', 0);
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
  register_taxonomy('classification',array('project'),array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'classification'),
  ));
}