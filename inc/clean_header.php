<?php 
 //remove unusefull tags from header
    remove_action( 'wp_head', 'wlwmanifest_link');
    remove_action ('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');

//remove rss feeds from header
function my_remove_feeds() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
}
add_action( 'after_setup_theme', 'my_remove_feeds' );



//remove contact form7 style & script unless on contact page (change the page ID ;)
add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );
 
function ac_remove_cf7_scripts() {
	if ( !is_page(2) ) {
		wp_deregister_style( 'contact-form-7' );
		wp_deregister_script( 'contact-form-7' );
	}
}

//remove scripts version
function _remove_script_version( $src ){
	if(!preg_match('@http://fonts.googleapis.com/css@', $src)){
		$parts = explode( '?', $src );
		return $parts[0];
	}
	else return $src ;
	
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

//remove YOAST comments
function remove_yoast(){
  global $wpseo_front;
  remove_action( 'wpseo_head', array($wpseo_front, 'debug_marker') , 2 );
}
add_action('wp_enqueue_scripts','remove_yoast');

//remove hardcoded recent comments css
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}



?>