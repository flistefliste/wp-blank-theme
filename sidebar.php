<aside>

	<?php if(!is_front_page()): ?>
				<h3 class="sidebar-heading-link">
					<a href="<?php echo get_post_type_archive_link( 'occasions' ); ?>">
						Nos <span class="heading-span">occasions</span>
					</a>
				</h3>
				<h3 class="sidebar-heading-link">
					<a href="<?php echo get_permalink(2 ); ?>">
						Contactez <span class="heading-span">Nous</span>
					</a>
				</h3>
			<?php endif; ?>



	<?php if(is_front_page()): ?>
		<h2>Service <span class="heading-span">après vente</span></h2>
	<?php endif; ?>



		<div class="encart-sav">
			<?php if(!is_front_page()): ?>
				<h3>Service <span class="heading-span">après vente</span></h3>
			<?php endif; ?>

			<a href="tel:0559564545" title="Cliquez pour appeller le Service Client Adour Manutention">05 59 56 45 45</a>
				<strong>
					Du lundi<br>
					au vendredi<br>
					9h-12h<br>
					14h-18h
				</strong>

				<span class="appel-gratuit">
					Appel gratuit<br>
					depuis un poste fixe
				</span>
		</div>
		
</aside>