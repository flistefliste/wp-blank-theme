<?php
/**
 * AdourManutention template for displaying Pages
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */

get_header(); ?>

	<section class="left-content page-content primary" role="main">

		<?php
			if ( have_posts() ) : the_post();

				get_template_part( 'loop' ); ?>

				<?php

			else :

				get_template_part( 'loop', 'empty' );

			endif;
		?>

	</section>

	<?php get_sidebar( ); ?>

<?php get_footer(); ?>