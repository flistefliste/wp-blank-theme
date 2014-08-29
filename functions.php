<?php
/**
 * AdourManutention functions file
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */


/******************************************************************************\
	Theme support, standard settings, menus and widgets
\******************************************************************************/

add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'link' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

$custom_header_args = array(
	'width'         => 980,
	'height'        => 300,
	'default-image' => get_template_directory_uri() . '/images/header.png',
);
//add_theme_support( 'custom-header', $custom_header_args );




register_nav_menu( 'main-menu', __( 'Menu principal', 'adourmanutention' ) );
register_nav_menu( 'top-menu', __( 'Top menu', 'adourmanutention' ) );

if ( function_exists( 'register_sidebars' ) ) {
	register_sidebar(
		array(
			'id' => 'home-sidebar',
			'name' => __( 'Home widgets', 'adourmanutention' ),
			'description' => __( 'Shows on home page', 'adourmanutention' )
		)
	);

	register_sidebar(
		array(
			'id' => 'footer-sidebar',
			'name' => __( 'Footer widgets', 'adourmanutention' ),
			'description' => __( 'Shows in the sites footer', 'adourmanutention' )
		)
	);
}

if ( ! isset( $content_width ) ) $content_width = 650;

/**
 * Include editor stylesheets
 * @return void
 */
function adourmanutention_editor_style() {
    add_editor_style( 'wp-editor-style.css' );
}
add_action( 'init', 'adourmanutention_editor_style' );


/******************************************************************************\
	Scripts and Styles
\******************************************************************************/

/**
 * Enqueue adourmanutention scripts
 * @return void
 */
function adourmanutention_enqueue_scripts() {
	wp_enqueue_style( 'google-webfont', 'http://fonts.googleapis.com/css?family=Titillium+Web:400,300,700' );
	wp_enqueue_style( 'fa', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'adourmanutention-styles', get_stylesheet_uri(), array(), '1.0' );
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cycle2', '//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20140415/jquery.cycle2.min.js', array(), '', true );
	wp_enqueue_script( 'cycle2-carousel', '//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20140415/jquery.cycle2.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'cycle2-caption2', '//cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/20140415/jquery.cycle2.caption2.min.js', array(), '', true );
	wp_enqueue_script( 'default-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0', true );
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'adourmanutention_enqueue_scripts' );


/******************************************************************************\
	Content functions
\******************************************************************************/

/**
 * Displays meta information for a post
 * @return void
 */
function adourmanutention_post_meta() {
	if ( get_post_type() == 'post' ) {
		echo sprintf(
			__( 'Posted %s in %s%s by %s. ', 'adourmanutention' ),
			get_the_time( get_option( 'date_format' ) ),
			get_the_category_list( ', ' ),
			get_the_tag_list( __( ', <b>Tags</b>: ', 'adourmanutention' ), ', ' ),
			get_the_author_link()
		);
	}
	//edit_post_link( __( ' (edit)', 'adourmanutention' ), '<span class="edit-link">', '</span>' );
}


//Custom post types
include'inc/custom_post_types.php';
include'inc/clean_header.php';
include'inc/admin.php';

//auto add plugins
require_once('inc/auto_added_plugins.php');

//auto create Pages
require_once('inc/auto_create_pages.php');