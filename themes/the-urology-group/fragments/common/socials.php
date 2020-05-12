<?php
$socials = carbon_get_theme_option( 'crb_socials' );
if ( empty( $socials ) ) {
	return;
}
?>
<div class="socials">
	<ul>
		<?php foreach ( $socials as $social ) : ?>
			<li>
				<a target="_blank" href="<?php echo esc_url( $social['link'] ); ?>">
					<i class="<?php echo $social['icon']['class']; ?>"></i>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div><!-- /.socials -->