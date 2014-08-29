<?php
/**
 * AdourManutention template for displaying Archives
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */

get_header(); ?>

	<section class="left-content page-content primary" role="main"><?php

		if ( have_posts() ) : ?>

			<h1 class="archive-title">
				<?php

				$post_type = get_post_type();
				if ( $post_type )
				{
				    $post_type_data = get_post_type_object( $post_type );
				    $post_type_slug = $post_type_data->rewrite['slug'];
				    
				}


					if (is_archive() ):
						echo $post_type_slug;



					

					else :
						_e( 'Archives', 'adourmanutention' );

					endif;
				?>
			</h1><?php

			if ( is_category() || is_tag() || is_tax() ):
				$term_description = term_description();
				if ( ! empty( $term_description ) ) : ?>

					<div class="archive-description"><?php
						echo $term_description; ?>
					</div><?php

				endif;
			endif;

			
			echo '<div class="wrap">' ;
				while ( have_posts() ) : the_post();

					get_template_part( 'loop', 'occasions' );

				endwhile;
			echo '</div>';

		else :

			get_template_part( 'loop', 'empty' );

		endif; ?>

		
	</section>

	<?php get_sidebar(); ?>
<?php get_footer(); ?>