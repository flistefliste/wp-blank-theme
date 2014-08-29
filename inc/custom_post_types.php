<?php 
 add_action('init', 'my_custom_init');
	function my_custom_init()
	{
	  	  //custom post type slideshow
		    register_post_type('slideshow', array(
			  'label' => __('Slider Home'),
			  'singular_label' => __('Slideshow'),
			  'public' => true,
			  'show_ui' => true,
			  'capability_type' => 'post',
			  'hierarchical' => false,
			  //'query_var' => "portfolio",
			  'supports' => array('title', 'excerpt', 'thumbnail')
			));

			//custom post type slideshow
		    register_post_type('occasions', array(
			  'label' => __('Occasions'),
			  'singular_label' => __('Occasion'),
			  'public' => true,
			  'show_ui' => true,
			  'capability_type' => 'post',
			  'hierarchical' => false,
			  'has_archive' => true ,
			  //'query_var' => "portfolio",
			  'supports' => array('title', 'excerpt', 'thumbnail')
			));

			//custom post type products
		    register_post_type('products', array(
			  'label' => __('Produits'),
			  'singular_label' => __('Produits'),
			  'public' => true,
			  'show_ui' => true,
			  'capability_type' => 'post',
			  'hierarchical' => false,
			  //'query_var' => "portfolio",
			  'supports' => array('title', 'excerpt', 'thumbnail')
			));

		
		  

			//taxonomy products
			register_taxonomy( 'type', 'products', array( 'hierarchical' => true, 'label' => 'Catégories de produits', 'query_var' => true, 'rewrite' => true ) ); 
		
			
	}

 ?>