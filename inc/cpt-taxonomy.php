<?php
//-----------------------------------------
// custom post type (CPT)
//-----------------------------------------
function sd_register_custom_post_types()
{
		// Register Staff CPT types
	$labels = array(
		'name'                  => _x( 'Staff', 'post type general name' ),
		'singular_name'         => _x( 'Staff', 'post type singular name'),
		'menu_name'             => _x( 'Staff', 'admin menu' ),
		'name_admin_bar'        => _x( 'Staff', 'add new on admin bar' ),
		'add_new'               => _x( 'Add New', 'Staff' ),
		'add_new_item'          => __( 'Add New Staff' ),
		'new_item'              => __( 'New Staff' ),
		'edit_item'             => __( 'Edit Staff' ),
		'view_item'             => __( 'View Staff' ),
		'all_items'             => __( 'All Staff' ),
		'search_items'          => __( 'Search Staff' ),
		'parent_item_colon'     => __( 'Parent Staff:' ),
		'not_found'             => __( 'No Staff found.' ),
		'not_found_in_trash'    => __( 'No Staff found in Trash.' ),
		'archives'              => __( 'Staff Archives'),
		'insert_into_item'      => __( 'Insert into Staff'),
		'uploaded_to_this_item' => __( 'Uploaded to this Staff'),
		'filter_item_list'      => __( 'Filter Staff list'),
		'items_list_navigation' => __( 'Staff list navigation'),
		'items_list'            => __( 'Staff list'),
		'featured_image'        => __( 'Staff featured image'),
		'set_featured_image'    => __( 'Set Staff featured image'),
		'remove_featured_image' => __( 'Remove Staff featured image'),
		'use_featured_image'    => __( 'Use as featured image'),
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
		'rewrite'            => array( 'slug' => 'staff' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-archive',
		'supports'           => array( 'title', 'thumbnail', 'editor' ),
);

register_post_type( 'fwd-staff', $args );

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
        'template' => array(
            array('core/paragraph', array(
                'placeholder' => 'Add your introduction here...'
            )),
            array('core/button', array(
                'text' => '"Name Here" Portfolio',
            )),
        ),
        'template_lock' => 'all', // Lock the template for 'sd-student' post type
    );


    register_post_type('sd-student', $args);
}
add_action('init', 'sd_register_custom_post_types');

//-----------------------------------------
//  creating taxonomy
//-----------------------------------------
function sd_register_taxonomies()
{
	//taxonomy for staff
	$labels = array(
		'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Staff Categories' ),
		'all_items'         => __( 'All Staff Category' ),
		'parent_item'       => __( 'Parent Staff Category' ),
		'parent_item_colon' => __( 'Parent Staff Category:' ),
		'edit_item'         => __( 'Edit Staff Category' ),
		'view_item'         => __( 'View Staff Category' ),
		'update_item'       => __( 'Update Staff Category' ),
		'add_new_item'      => __( 'Add New Staff Category' ),
		'new_item_name'     => __( 'New Staff Category Name' ),
		'menu_name'         => __( 'Staff Category' ),
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
		'rewrite'           => array( 'slug' => 'staff-categories' ),
);
register_taxonomy( 'fwd-staff-category', array( 'fwd-staff' ), $args );

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
    register_taxonomy('sd-student-type', array('sd-student'), $args);
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


