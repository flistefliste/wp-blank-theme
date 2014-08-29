<?php
/**
 * AdourManutention template for displaying the standard Loop
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="post-title"><?php

		if ( is_singular() ) :
			the_title();
		else : ?>

			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php
				the_title(); ?>
			</a><?php

		endif; ?>

	</h1>

	

	<div class="post-content">

		

		<?php if ( is_front_page() || is_category() || is_archive() || is_search() ) : ?>

			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>"><?php _e( 'Read more &raquo;', 'adourmanutention' ); ?></a>

		<?php else : ?>

			<?php the_content( __( 'Continue reading &raquo', 'adourmanutention' ) ); ?>

		<?php endif; ?>

		

	</div>

	<?php
		if ( '' != get_the_post_thumbnail() ) : 
	?>
		<?php the_post_thumbnail(); ?>
	<?php
		endif;
	?>

</article>