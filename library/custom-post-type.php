<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'dgh_flush_rewrite_rules' );

// Flush your rewrite rules
function dgh_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post() {
	// creating (registering) the custom type
	register_post_type( 'photo_post', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Photo Posts', 'dghtheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Photo Post', 'dghtheme' ), /* This is the individual type */
			'all_items' => __( 'All Photo Posts', 'dghtheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'dghtheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Photo Post', 'dghtheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'dghtheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Photo Posts', 'dghtheme' ), /* Edit Display Title */
			'new_item' => __( 'New Photo Post', 'dghtheme' ), /* New Display Title */
			'view_item' => __( 'View Photo Post', 'dghtheme' ), /* View Display Title */
			'search_items' => __( 'Search Photo Post', 'dghtheme' ), /* Search Photo Post Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'dghtheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'dghtheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Use for highlighting photography', 'dghtheme' ), /* Photo Post Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'photo_post', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'photo_post', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky'),
			'show_in_rest' => true,
   		'supports' => array('editor')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'photo_post' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'photo_post' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat',
		array('photo_post'), /* if you change the name of register_post_type( 'photo_post', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Photo Categories', 'dghtheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Photo Category', 'dghtheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Photo Categories', 'dghtheme' ), /* search title for taxomony */
				'all_items' => __( 'All Photo Categories', 'dghtheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Photo Category', 'dghtheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Photo Category:', 'dghtheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Photo Category', 'dghtheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Photo Category', 'dghtheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Photo Category', 'dghtheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Photo Category Name', 'dghtheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);

	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag',
		array('photo_post'), /* if you change the name of register_post_type( 'photo_post', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Photo Tags', 'dghtheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Photo Tag', 'dghtheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Photo Tags', 'dghtheme' ), /* search title for taxomony */
				'all_items' => __( 'All Photo Tags', 'dghtheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Photo Tag', 'dghtheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Photo Tag:', 'dghtheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Photo Tag', 'dghtheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Photo Tag', 'dghtheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Photo Tag', 'dghtheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Photo Tag Name', 'dghtheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);




?>
