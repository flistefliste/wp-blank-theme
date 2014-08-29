<?php
/**
 * AdourManutention template for displaying the header
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="ie ie-no-support" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="ie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php if(is_front_page()): bloginfo('name' ); else: echo wp_title( ); endif ; ?></title>
<meta name="viewport" content="width=device-width" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php bloginfo('template_directory' ); ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php bloginfo('template_directory' ); ?>/apple-touch-icon.png">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="site">
		<header>
			<?php if(is_front_page()): ?>
				<h1 class="logo">
			<?php else: ?>
				<div class="logo">
			<?php endif; ?>
				<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
					<img src="<?php bloginfo('template_directory' );?>/images/logo.png" alt=" <?php bloginfo('name' );?>" />
				</a>
			<?php if(is_front_page()): ?>
				</h1>
			<?php else: ?>
				</div>
			<?php endif; ?>

				<nav class="menu">
					<?php

					$nav_menu = wp_nav_menu(
						array(
							'container' => '',
							'menu_class' => 'top-menu',
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'theme_location' => 'top-menu',
							'fallback_cb' => '__return_false',
						)
					);
					?>

					<?php

					$nav_menu = wp_nav_menu(
						array(
							'container' => '',
							'menu_class' => 'main-menu',
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'theme_location' => 'main-menu',
							'fallback_cb' => '__return_false',
						)
					); ?>

				</nav>

			</header>

			 <?php if ( is_front_page()) : ?>
                    <div class="cycle-header cycle cycle-slideshow"
                         data-cycle-fx="scrollHorz"
                         data-cycle-timeout="4000"
                         data-cycle-caption-plugin="caption2"
                         data-cycle-overlay-fx-out="slideUp"
  						 data-cycle-overlay-fx-in="fadeIn"

                     
                    >
                    		<div class="cycle-pager"></div>
                    		<div class="cycle-overlay"></div>

                           <?php

                            $loop = new WP_Query( array( 'post_type' => 'slideshow', 'posts_per_page' => 10 ) );
                                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <?php
                                	$thumbnail_id = get_post_thumbnail_id($post->ID);
									$thumbnail_object = get_post($thumbnail_id);
									$slide_link = get_field('link') ;
								?>
                                <img src="<?php echo $thumbnail_object->guid ; ?>"
                                	alt="<?php the_title();?>"
                                	width="100%"
                                	height="auto"
                                	data-link="<?php echo $slide_link?>"
                                	data-cycle-title="<?php the_title();?>"
                                	data-cycle-desc="
                                	<?php
                                		if( !empty($slide_link)) :
                                			echo '> '. esc_attr(get_the_excerpt());
                                		endif ;
                                	?>
                                	"
                                >

                           		<?php endwhile;?>
                    
                         </div>
                <?php endif; ?>

		<div class="boxed">