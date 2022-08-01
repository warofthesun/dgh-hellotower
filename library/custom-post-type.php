<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'dgh_flush_rewrite_rules' );

// Flush your rewrite rules
function dgh_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// Start photography post type and tags
function photo_post() {
	// creating (registering) the custom type
	register_post_type( 'photo_post', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Photography', 'dghtheme' ), /* This is the Title of the Group */
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
			'menu_icon' => 'dashicons-camera', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'photography', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'sticky', 'custom-tags'),
			'show_in_rest' => false,
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'photo_post' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'photo_post' );
}

	// adding the function to the Wordpress init
	add_action( 'init', 'photo_post');
	
	// Start music post type and tags
	function music_post() {
		// creating (registering) the custom type
		register_post_type( 'music_post', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 'labels' => array(
				'name' => __( 'Music', 'dghtheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Music Post', 'dghtheme' ), /* This is the individual type */
				'all_items' => __( 'All Music Posts', 'dghtheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'dghtheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Music Post', 'dghtheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'dghtheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Music Posts', 'dghtheme' ), /* Edit Display Title */
				'new_item' => __( 'New Music Post', 'dghtheme' ), /* New Display Title */
				'view_item' => __( 'View Music Post', 'dghtheme' ), /* View Display Title */
				'search_items' => __( 'Search Music Post', 'dghtheme' ), /* Search Photo Post Title */
				'not_found' =>  __( 'Nothing found in the Database.', 'dghtheme' ), /* This displays if there are no entries yet */
				'not_found_in_trash' => __( 'Nothing found in Trash', 'dghtheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
				
				'description' => __( 'Use for highlighting musical releases', 'dghtheme' ), /* Photo Post Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
				'menu_icon' => 'dashicons-format-audio', /* the icon for the custom post type menu */
				'rewrite'	=> array( 'slug' => 'music', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => true, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'sticky', 'custom-tags'),
				'show_in_rest' => false,
			) /* end of options */
		); /* end of register post type */
	
		/* this adds your post categories to your custom post type */
		register_taxonomy_for_object_type( 'category', 'music_post' );
		/* this adds your post tags to your custom post type */
		register_taxonomy_for_object_type( 'post_tag', 'music_post' );
	}
	
		// adding the function to the Wordpress init
		add_action( 'init', 'music_post');
		
		// Start epk post type and tags
		function epk_post() {
			// creating (registering) the custom type
			register_post_type( 'epk_post', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
				// let's now add all the options for this post type
				array( 'labels' => array(
					'name' => __( 'EPK', 'dghtheme' ), /* This is the Title of the Group */
					'singular_name' => __( 'EPK Post', 'dghtheme' ), /* This is the individual type */
					'all_items' => __( 'All EPK Posts', 'dghtheme' ), /* the all items menu item */
					'add_new' => __( 'Add New', 'dghtheme' ), /* The add new menu item */
					'add_new_item' => __( 'Add New EPK Post', 'dghtheme' ), /* Add New Display Title */
					'edit' => __( 'Edit', 'dghtheme' ), /* Edit Dialog */
					'edit_item' => __( 'Edit EPK Posts', 'dghtheme' ), /* Edit Display Title */
					'new_item' => __( 'New EPK Post', 'dghtheme' ), /* New Display Title */
					'view_item' => __( 'View EPK Post', 'dghtheme' ), /* View Display Title */
					'search_items' => __( 'Search EPK Post', 'dghtheme' ), /* Search Photo Post Title */
					'not_found' =>  __( 'Nothing found in the Database.', 'dghtheme' ), /* This displays if there are no entries yet */
					'not_found_in_trash' => __( 'Nothing found in Trash', 'dghtheme' ), /* This displays if there is nothing in the trash */
					'parent_item_colon' => ''
				), /* end of arrays */
					
					'description' => __( 'Use for creting an EPK page', 'dghtheme' ), /* Photo Post Description */
					'public' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'show_ui' => true,
					'query_var' => true,
					'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
					'menu_icon' => 'dashicons-playlist-audio', /* the icon for the custom post type menu */
					'rewrite'	=> array( 'slug' => 'epk', 'with_front' => false ), /* you can specify its url slug */
					'has_archive' => true, /* you can rename the slug here */
					'capability_type' => 'post',
					'hierarchical' => false,
					/* the next one is important, it tells what's enabled in the post editor */
					'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'sticky', 'custom-tags'),
					'show_in_rest' => false,
				) /* end of options */
			); /* end of register post type */
		
			/* this adds your post categories to your custom post type */
			register_taxonomy_for_object_type( 'category', 'epk_post' );
			/* this adds your post tags to your custom post type */
			register_taxonomy_for_object_type( 'post_tag', 'epk_post' );
		}
		
			// adding the function to the Wordpress init
			add_action( 'init', 'epk_post');

?>
