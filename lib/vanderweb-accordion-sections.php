<?php
////////////////////////////////////////////////////////////////////
// Adds Custom Post Type.
////////////////////////////////////////////////////////////////////
function vanderweb_accordion_post_types() {
	$labels = array(
		'name'               => __( 'Accordions', 'vanderweb-accordion' ),
		'singular_name'      => __( 'Accordions', 'vanderweb-accordion' ),
		'menu_name'          => __( 'Accordions', 'vanderweb-accordion' ),
		'name_admin_bar'     => __( 'Accordions', 'vanderweb-accordion' ),
		'add_new'            => __( 'Add new', 'vanderweb' ),
		'add_new_item'       => __( 'Add new accordion item', 'vanderweb-accordion' ),
		'new_item'           => __( 'New accordion item', 'vanderweb-accordion' ),
		'edit_item'          => __( 'Edit accordion item', 'vanderweb-accordion' ),
		'view_item'          => __( 'Show', 'vanderweb-accordion' ),
		'all_items'          => __( 'Accordion items', 'vanderweb-accordion' ),
		'search_items'       => __( 'Search accordion item', 'vanderweb-accordion' ),
		'parent_item_colon'  => __( 'Parent accordion item:', 'vanderweb-accordion' ),
		'not_found'          => __( 'No accordion items found.', 'vanderweb-accordion' ),
		'not_found_in_trash' => __( 'No trashed accordion items found.', 'vanderweb-accordion' )
	);

	$args = array( 
		'public'      => false, 
		'labels'      => $labels,
		'has_archive' => false,
		'description' => __( 'Accordions', 'vanderweb-accordion' ),
		'show_ui'	        => true,
		'show_in_admin_bar' => true,
		'menu_position' => 25.2,
		'menu_icon' => 'dashicons-id',
		'taxonomies' => array( 'vanderweb_acc_section' ),
		'exclude_from_search' => true,
		'supports' => array( 'title', 'editor', 'custom-fields' )
	);
    	register_post_type( 'vanderweb_accordions', $args );
}
add_action( 'init', 'vanderweb_accordion_post_types' );

////////////////////////////////////////////////////////////////////
// Adds Custom Category.
////////////////////////////////////////////////////////////////////
function create_vanderweb_accordion_taxonomy() {
	$labels = array(
		'name'                           => __( 'Accordion - Sections', 'vanderweb-accordion' ),
		'singular_name'                  => __( 'Accordion - Sections', 'vanderweb-accordion' ),
		'search_items'                   => __( 'Search Sections', 'vanderweb-accordion' ),
		'all_items'                      => __( 'All Sections', 'vanderweb-accordion' ),
		'edit_item'                      => __( 'Edit Section', 'vanderweb-accordion' ),
		'update_item'                    => __( 'Update Section', 'vanderweb-accordion' ),
		'add_new_item'                   => __( 'Add new Section', 'vanderweb-accordion' ),
		'new_item_name'                  => __( 'New Section Name', 'vanderweb-accordion' ),
		'menu_name'                      => __( 'Sections', 'vanderweb-accordion' ),
		'view_item'                      => __( 'Show Section', 'vanderweb-accordion' ),
		'popular_items'                  => __( 'Popular Sections', 'vanderweb-accordion' ),
		'separate_items_with_commas'     => __( 'Seperate Sections with commas', 'vanderweb-accordion' ),
		'add_or_remove_items'            => __( 'Add or Remove Sections', 'vanderweb-accordion' ),
		'choose_from_most_used'          => __( 'Select from the most used Sections', 'vanderweb-accordion' ),
		'not_found'                      => __( 'No Sections found', 'vanderweb-accordion' )
	);
	$args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
        'show_admin_column' => true
	);
    register_taxonomy( 'vanderweb_acc_section', array( 'vanderweb_accordions' ), $args );
}
add_action( 'init', 'create_vanderweb_accordion_taxonomy', 0 );