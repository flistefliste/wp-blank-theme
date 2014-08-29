<?php
/**
 * AdourManutention template for displaying the standard Loop
 *
 * @package WordPress
 * @subpackage AdourManutention
 * @since AdourManutention 1.0
 */
?>

<div class="product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<?php
		if ( '' != get_the_post_thumbnail() ) : 
	?>
		<?php the_post_thumbnail(); ?>
	<?php
		endif;

	?>


	<div class="product-desc">
	    <strong>
	    	<?php esc_html(the_title()); ?>
	    </strong>
	
	    
	   <?php esc_html(the_excerpt()); ?> 

	        <a href="<?php echo get_permalink(2); ?>?about=<?php echo $post->post_name ?>#contact-anchor">demander un devis</a>
	    
	</div>
	

</div>