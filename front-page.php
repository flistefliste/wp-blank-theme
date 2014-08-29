<?php
/**
 * AdourManutention template for displaying the Front-Page
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */

get_header(); ?>

	

	<section class="left-content page-content primary" role="main">
		<h2>Nos occasions <span class="heading-span">sélectionnées</span></h2>
		<div class="cycle-carousel-products-wrap">

			<span class="carousel-nav" id="prev"><i title="précédent" class="fa fa-angle-left"></i></span>
      	 	<span class="carousel-nav" id="next"><i title="suivant" class="fa fa-angle-right"></i></span>


			<div class="cycle cycle-slideshow cycle-carousel-products cycle-occasions" 
			    data-cycle-fx="carousel"
			    data-cycle-timeout="0"
			    data-cycle-visible="3"
			    data-cycle-slides="> div"
			    data-cycle-prev="#prev"
       			data-cycle-next="#next"
			    >
			   

			    <?php

	                 $loop = new WP_Query( array( 'post_type' => 'occasions', 'posts_per_page' => -1 ) );
	                 while ( $loop->have_posts() ) : $loop->the_post(); ?>

	                   <div class="cycle-carousel-products-item">           
	                    	<?php the_post_thumbnail(); ?>
	                    	<p>
	                    		<strong>
	                    			<?php the_title(); ?>
	                    			<br>
	                    			<?php echo get_field('prix'); ?> €
	                    		</strong>
	                    	</p>
	                   		<a href="<?php echo get_permalink() ?>">voir le produit</a>
	                    </div> 

	                 <?php endwhile;?>


			</div>
		</div>


	</section>

	<?php get_sidebar() ?>

<?php get_footer(); ?>