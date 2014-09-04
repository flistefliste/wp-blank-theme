<?php 
// à l'initialisation de l'administration
// on informe WordPress des options de notre thème

add_action( 'admin_init', 'myThemeRegisterSettings' );

function myThemeRegisterSettings( )
{
	register_setting( 'my_theme', 'contact_settings', theme_options_updated() ); // infos de contact / socials
}


// la fonction myThemeAdminMenu( ) sera exécutée
// quand WordPress mettra en place le menu d'admin

add_action( 'admin_menu', 'myThemeAdminMenu' );

function myThemeAdminMenu( )
{
	add_menu_page(
		'Options de contact / réseaux sociaux', // le titre de la page
		'Options du thème',            // le nom de la page dans le menu d'admin
		'administrator',        // le rôle d'utilisateur requis pour voir cette page
		'wp-blank-options',        // un identifiant unique de la page
		'myThemeSettingsPage'   // le nom d'une fonction qui affichera la page
	);
}

function myThemeSettingsPage( )
{
?>
	<div class="wrap">
		<h2>Options de contact et réseaux sociaux</h2>


		<form method="post" action="options.php">
			<?php
				// cette fonction ajoute plusieurs champs cachés au formulaire
				// pour vous faciliter le travail.
				// elle prend en paramètre le nom du groupe d'options
				// que nous avons défini plus haut.

				settings_fields( 'my_theme' );
				settings_errors('contact_settings');
		
				$settings = (array) get_option('contact_settings' );
				foreach($settings as $key => $value){
					${$key} = $value ;
				}

			
			?>


			<?php
				if(!empty($settings)){

					ob_start();
					echo '<div class="updated alt">';
					echo '<p>Copiez/collez ce shortcode '; 
					echo '<code>[contact_infos]</code> où vous souhaitez dans vos pages, posts et templates pour afficher ceci :</p>';

					echo '<div class="mp6-notification">'.do_shortcode( '[contact_infos]' ).'</div>';
					echo '</div>';

					ob_end_flush();
					

				}
				?>


			<h3>Informations de contact :</h3>
			<table class="widefat">
				<tr valign="top">
					<th scope="row"><label for="contact_societe">Nom ou raison sociale</label></th>
					<td><input type="text" id="contact_societe" name="contact_settings[societe]" class="regular-text" value="<?php if(isset($societe)) echo $societe ?>" /></td>
				</tr>

				<tr class="alternate" valign="top">
					
					<th scope="row" width="30%"><label for="contact_adresse">Adresse 1</label></th>
					<td><input type="text" id="contact_adresse" name="contact_settings[adresse]" class="regular-text" value="<?php if(isset($adresse)) echo $adresse ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="contact_adresse2">Adresse 2</label></th>
					<td><input type="text" id="contact_adresse2" name="contact_settings[adresse2]" class="regular-text" value="<?php if(isset($adresse2)) echo $adresse2 ?>" /></td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row"><label for="contact_cp">Code postal</label></th>
					<td><input type="text" id="contact_cp" name="contact_settings[cp]" class="regular-text" value="<?php if(isset($cp)) echo $cp ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="contact_ville">Ville</label></th>
					<td><input type="text" id="contact_ville" name="contact_settings[ville]" class="regular-text" value="<?php if(isset($ville)) echo $ville ?>" /></td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row"><label for="contact_pays">Pays</label></th>
					<td><input type="text" id="contact_pays" name="contact_settings[pays]" class="regular-text" value="<?php if(isset($pays)) echo $pays ?>" /></td>
				</tr> 

				<tr valign="top">
					<th scope="row"><label for="contact_phone">Téléphone</label></th>
					<td><input type="text" id="contact_phone" name="contact_settings[phone]" class="regular-text" value="<?php if(isset($phone)) echo $phone; ?>" /></td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row"><label for="contact_phone2">Téléphone 2 (ou mobile)</label></th>
					<td><input type="text" id="contact_phone2" name="contact_settings[phone2]" class="regular-text" value="<?php if(isset($phone2)) echo $phone2 ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="contact_email">Email de contact :</label></th>
					<td><input type="email" id="contact_email" name="contact_settings[email]" class="regular-text" value="<?php if(isset($email)) echo $email ?>" /></td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row"><label for="contact_email">URL du site web :</label></th>
					<td><input type="text" id="contact_email" name="contact_settings[website]" class="regular-text" value="<?php if(isset($website)) echo $website ; else echo get_bloginfo('url' ); ?>" /></td>
				</tr>





				

			</table>



				<h3>Réseaux sociaux</h3>

				<table class="widefat">

				<tr valign="top">
					<th width="30%" scope="row"><label for="contact_fb">Adresse Facebook</label></th>
					<td><input type="text" id="contact_fb" name="contact_settings[fb]" class="regular-text" value="<?php if(isset($fb)) echo $fb ?>" /></td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row"><label for="contact_twitter">Adresse Twitter</label></th>
					<td><input type="text" id="contact_twitter" name="contact_settings[twitter]" class="regular-text" value="<?php if(isset($twitter)) echo $twitter ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="contact_googleplus">Adresse Google+</label></th>
					<td><input type="text" id="contact_googleplus" name="contact_settings[googleplus]" class="regular-text" value="<?php if(isset($googleplus)) echo $googleplus ?>" /></td>
				</tr>

				<tr valign="top" class="alternate">
					<th scope="row"><label for="contact_linkedin">Adresse LinkedIn</label></th>
					<td><input type="text" id="contact_linkedin" name="contact_settings[linkedin]" class="regular-text" value="<?php if(isset($linkedin)) echo $linkedin ?>" /></td>
				</tr>

				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="Mettre à jour" />
			</p>
		</form>
	</div>

	


<?php
}

function theme_options_updated(){
	add_settings_error( 'contact_settings', '', 'Vos options ont été mises à jour', 'updated' );
}

// function coucou(){
// 	if(empty(get_option('contact_societe' ))){
// 		add_settings_error( 'contact_societe', '', 'Aie il faut pas que ce soit vide entends tu ?', 'error' );
// 	}
// 	else{
// 		add_settings_error( 'contact_societe', '', 'Options mises à jour', 'updated' );
// 	}
	
// }


?>