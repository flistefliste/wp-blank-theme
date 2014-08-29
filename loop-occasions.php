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

	   <?php 
	   	$prix = get_field('prix');
	   	$pdf = get_field('pdf');
	   

	   	if(!empty($prix)):
	   			echo '<br>'.$prix .'€';
	   	endif ;

	   	if(!empty($pdf)):
	   ?>
	   <br><a href="<?php echo $pdf['url'] ?>" target="_blank">télécharger le PDF</a>
		<?php endif ; ?>
	    
	</div>
	

</div>