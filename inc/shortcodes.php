<?php

//SHORTCODES CONTACT
$settings = (array) get_option('contact_settings' );
if(!empty($settings)){

//generation du shortcode
function fonction_shortcode_contact_infos() {
global $settings ;
ob_start();
{
?>
<div itemscope itemtype="http://schema.org/Organization">
	<?php if(!empty($settings['societe'])): ?>
		<div itemprop="name">
			<h3><a itemprop="url" href="<?php echo $settings['website'] ?>"><?php echo $settings['societe'] ?></a></h3>
		</div>
	<?php endif ; ?>

	<?php if(!empty($settings['adresse'])): ?>
		<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress"><?php echo $settings['adresse'] ?></span><br>
		<?php if(!empty($settings['cp'])): ?>
			<span itemprop="postalCode"><?php echo $settings['cp'] ?></span>
		<?php endif ; ?>
		<?php if(!empty($settings['ville'])): ?>
			<span itemprop="addressLocality"><?php echo $settings['ville'] ?></span><br>
		<?php endif ; ?>
		
		<?php if(!empty($settings['pays'])): ?>
			<span itemprop="addressCountry"><?php echo $settings['pays'] ?></span><br>
		<?php endif ; ?>
		</div>
	<?php endif ; ?>
	<?php if(!empty($settings['phone'])): ?>
		<span itemprop="telephone"><?php echo $settings['phone'] ?></span><br>
	<?php endif ; ?>
	<?php if(!empty($settings['email'])): ?>
		<span itemprop="email"><?php echo $settings['email'] ?></span><br>
	<?php endif ; ?>
	<?php if(!empty($settings['website'])): ?>
		<a itemprop="url" href="<?php echo $settings['website'] ?>"><?php echo $settings['website'] ?></a>
	<?php endif ; ?>
</div>
<?php 
}
return ob_get_clean();
}
add_shortcode('contact_infos', 'fonction_shortcode_contact_infos');


}
				
?>