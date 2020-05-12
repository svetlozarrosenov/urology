<?php
if ( ! has_nav_menu( 'header-menu' ) ) {
	return;
}
?>
<div class="header__content">
	<div class="shell">
		<div class="header__content-inner">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'container' => 'nav',
				'container_class' => 'nav',
				'walker' => new Crb_Walker_Nav_Menu()
			) );
			?>
		</div>
	</div>
</div>
