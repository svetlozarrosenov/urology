<?php
if ( empty( $maps ) ) {
	return;
}
$markers = crb_get_positions($maps);
?>
<?php if ( ! is_page_template( 'templates/locations.php' ) ) : ?>
	<div class="locations__content">
<?php endif; ?>
	<div class="locations__map" 
		data-zoom="<?php echo $maps[0]['zoom']; ?>" data-center-lat="<?php echo $maps[0]['lat']; ?>" 
		data-center-lng="<?php echo $maps[0]['lng']; ?>" data-locations='<?php echo $markers;?>' ></div><!-- /.locations__map -->
<?php if ( ! is_page_template( 'templates/locations.php' ) ) : ?>
	</div><!-- /.locations__content -->
<?php endif; ?>