<?php
//-----------------------------------------
// custom post type (CPT)
//-----------------------------------------
function sd_register_custom_post_types()
{

    // Register Student CPT
    $labels = array(
        'name'               => _x('Students', 'post type general name'),
        'singular_name'      => _x('Student', 'post type singular name'),
        'menu_name'          => _x('Students', 'admin menu'),
        'name_admin_bar'     => _x('Student', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'student'),
        'add_new_item'       => __('Add New Student'),
        'new_item'           => __('New Student'),
        'edit_item'          => __('Edit Student'),
        'view_item'          => __('View Student'),
        'all_items'          => __('All Students'),
        'search_items'       => __('Search Students'),
        'parent_item_colon'  => __('Parent Students:'),
        'not_found'          => __('No students found.'),
        'not_found_in_trash' => __('No students found in Trash.'),
        'archives'           => __('Student Archives'),
        'insert_into_item'   => __('Insert into student'),
        'uploaded_to_this_item' => __('Uploaded to this student'),
        'filter_item_list'   => __('Filter Students list'),
        'items_list_navigation' => __('Students list navigation'),
        'items_list'         => __('Students list'),
        'featured_image'     => __('Student featured image'),
        'set_featured_image' => __('Set student featured image'),
        'remove_featured_image' => __('Remove student featured image'),
        'use_featured_image' => __('Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'students'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array('title', 'thumbnail', 'editor'),
    );
    register_post_type('sd-student', $args);
}
add_action('init', 'sd_register_custom_post_types');

//-----------------------------------------
//  creating taxonomy
//-----------------------------------------
function sd_register_taxonomies()
{
    // Add Student Type taxonomy
    $labels = array(
        'name'              => _x('Student Types', 'taxonomy general name'),
        'singular_name'     => _x('Student Type', 'taxonomy singular name'),
        'search_items'      => __('Search Student types'),
        'all_items'         => __('All Student Type'),
        'parent_item'       => __('Parent Student Type'),
        'parent_item_colon' => __('Parent Student Type:'),
        'edit_item'         => __('Edit Student Type'),
        'view_item'         => __('View Student Type'),
        'update_item'       => __('Update Student Type'),
        'add_new_item'      => __('Add New Student Type'),
        'new_item_name'     => __('New Student Type Name'),
        'menu_name'         => __('Student Type'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'student-type'),
    );
    register_taxonomy('sd-type', array('sd-student'), $args);
}
add_action('init', 'sd_register_taxonomies');




// fixes front end urls.. for when user changes themes
function sd_rewrite_flush()
{
    sd_register_custom_post_types();
    sd_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'sd_rewrite_flush');


