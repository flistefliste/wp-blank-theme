<?php
/**
 * AdourManutention template for displaying Archives
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */

get_header(); ?>

	<section class="left-content page-content primary" role="main">

			<h1 class="archive-title">


				<?php
					if ( is_category() ):
						printf( __( 'Category Archives: %s', 'adourmanutention' ), single_cat_title( '', false ) );

					
					elseif ( is_tax() ):
						$term     = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$taxonomy = get_taxonomy( get_query_var( 'taxonomy' ) );
						echo $term->name ;



					else :
						_e( 'Archives', 'adourmanutention' );

					endif;
				?>
			</h1>

			<?php

			if ( have_posts() ){ ?>


			<?php

			//print_r($term);




			if ( is_category() || is_tag() || is_tax() ):
				$term_description = term_description();
				if ( ! empty( $term_description ) ) : ?>

					<div class="archive-description"><?php
						echo $term_description; ?>
					</div><?php

				endif;
			endif;

			//get childrens
			$args = array(
				//'type'                     => 'product',
				'parent'                   => $term->term_id,
				'hide_empty' => false
				//'taxonomy'                 => 'type'

			); 

			$sous_cats = get_terms('type', $args );
			
			if(count($sous_cats) > 0){
				foreach($sous_cats as $sous_cat):
					echo '<h2 class="sous_cat">'.$sous_cat->name.'</h2>' ;
					echo '<div class="wrap">';
					 $my_query = null;
					 $my_query_args=array(
	                      'post_type' => 'products',
	                      'type' => $sous_cat->slug,
	                      'post_status' => 'publish',
	                      'posts_per_page' => -1,
	                      'caller_get_posts'=> 1
	                    );
		             $my_query = new WP_Query($my_query_args);


		                  if( $my_query->have_posts() ):
		                      
		                  
		                      while ($my_query->have_posts()) : $my_query->the_post(); 
		                  	
		                      	get_template_part( 'loop','products' );

		                      endwhile ;

		                   endif ;

		                   wp_reset_postdata();
		                   wp_reset_query();

		             echo '</div>'; //end div wrap products
				endforeach ;
			} //end count sous_cats
			elseif(count($sous_cats) <= 0){
				 // affichage direct des produits car pas de sous cat
				 get_template_part( 'loop','products' );
			}



		}
		else{

			get_template_part( 'loop', 'empty' );
		}

		 ?>

		<!-- <div class="pagination">

			<?php get_template_part( 'template-part', 'pagination' ); ?>

		</div> -->
	</section>
	<?php get_sidebar(); ?>

<?php get_footer(); ?>