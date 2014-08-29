<?php 
//remove admin bar
add_filter('show_admin_bar', '__return_false');

//custom logo & css on wp-login page
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/logo.png);
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/style-login.css'; ?>" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

//remove posts & comments admin menus (we don't need them in this theme)
function remove_menus(){	  
	  //remove_menu_page( 'edit.php' );        			//Posts
	  remove_menu_page( 'edit-comments.php' );          //Comments
	 
}
add_action( 'admin_menu', 'remove_menus' );

// Ajout Favicon à admin + login
function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
  
// Now, just make sure that function runs when you're on the login page and admin pages  
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');


?>