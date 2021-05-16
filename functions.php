<?php

// LOAD starter CORE (if you remove this, the theme will break)
require_once( 'library/starter.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH starter
Let's get everything up and running.
*********************/

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function dgh_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'dghtheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'dgh_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'dgh_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'dgh_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'dgh_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'dgh_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'dgh_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  dgh_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'dgh_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'dgh_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'dgh_excerpt_more' );

} /* end starter ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'dgh_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'featured-image', 1040, 550, true );
add_image_size( 'gallery-image', 680, 450, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'dgh-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'dgh-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'dgh_custom_image_sizes' );

function dgh_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'gallery-image' => __('Gallery Image'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

// TGM Plugin Activation Class
require_once locate_template('library/tgm-plugin-activation/class-tgm-plugin-activation.php');

/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function dgh_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'dgh_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function dgh_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'dghtheme' ),
		'description' => __( 'The first (primary) sidebar.', 'dghtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'dghtheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'dghtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


function dgh_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Special+Elite&display=swap');
}

add_action('wp_enqueue_scripts', 'dgh_fonts');


/* Load ScrollMagic Scripts */

function scrollmagic_scripts() {

		wp_register_script( 'greensock', get_stylesheet_directory_uri() . '/library/js/libs/greensock/TweenMax.min.js', array(), '', true );

    wp_register_script( 'scrollmagic', get_stylesheet_directory_uri() . '/library/scrollmagic/uncompressed/ScrollMagic.js', array(), '', true );

    wp_register_script( 'animation', get_stylesheet_directory_uri() . '/library/scrollmagic/uncompressed/plugins/animation.gsap.js', array(), '', true );

    wp_register_script( 'indicators', get_stylesheet_directory_uri() . '/library/scrollmagic/uncompressed/plugins/debug.addIndicators.js', array(), '', true );



		// enqueue styles and scripts
		wp_enqueue_script( 'greensock' );
		wp_enqueue_script( 'scrollmagic' );
		wp_enqueue_script( 'animation' );
    wp_enqueue_script( 'indicators' );
}

add_action( 'wp_enqueue_scripts', 'scrollmagic_scripts' );



/**
 * Register the required plugins for this theme.
 *
 */

include 'inc/required-plugs.php';

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/inc/acf/';
    // return
    return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';
    // return
    return $dir;
}
// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

// Turn on ACF Options Page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}

/* DON'T DELETE THIS CLOSING TAG */ ?>
