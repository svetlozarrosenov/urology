<?php
$args =  array(
	'api_key' => carbon_get_theme_option( 'crb_google_maps_api_key' ),
	'radius' => $section['location_selected_distance'], 
);

if ( ! empty( $_GET['location-address'] ) ) {
	$args['address'] = $_GET['location-address'];
}

if ( ! empty( $_GET['location-type'] ) && $_GET['location-type'] != 0 ) {
	$args['term_id'] =  $_GET['location-type'];
}

if ( ! empty( $_GET['location-distance'] ) ) {
	$args['radius'] =  $_GET['location-distance'];
}

if ( ! empty( $_GET['location-state'] ) ) {
	$args['state'] =  $_GET['location-state'];
}

$locations_loop = new Crb_Location_Query( $args );
?>
<section class="section-locations">
	<div class="locations locations--full">
		<?php
		$maps = crb_get_maps( $locations_loop );
		?>
		<?php if ( ! empty( $maps ) ) : ?>
			<div class="locations__content">
				<div class="svg-clipper">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1934 703.02">
						<defs>
							<clipPath id="maskRect1111" >
								<rect y="122.75" width="1933.99" height="580.27"/>

								<path d="M1934,122.75H0V105.59c.28,0,30.11,4.06,84.28,8,31.74,2.33,65.48,4.2,100.26,5.53,43.45,1.67,88.7,2.51,134.48,2.51,131.1,0,266.73-6.83,403.11-20.3,39.82-3.94,80.23-8.5,120.12-13.57,42.1-5.34,84.73-11.4,126.7-18,44.14-6.93,88.79-14.64,132.7-22.92,45.95-8.67,92.42-18.21,138.11-28.37,14.53-3.23,29.58-6.07,44.72-8.45,14.67-2.31,29.85-4.25,45.11-5.76C1358.57,1.46,1389,0,1420,0c31.74,0,64.87,1.53,98.49,4.54,30.56,2.73,62.21,6.76,94.09,12a1556,1556,0,0,1,164.21,36.3c21.74,6,43.52,12.55,64.74,19.38,17,5.49,33.7,11.18,49.58,16.91,26.47,9.57,42.23,16.22,42.88,16.5h0v17.12ZM279.15,104.43l-5.4-.34Zm-6.32-.36-1.65-.11,1.65.1ZM1828.19,57.29l-3.55-1.39-5.47-2.12,5.48,2.12h0Z"/>
							</clipPath>
						</defs>
					</svg>
				</div><!-- /.svg-clipper -->
				
				<?php
				crb_render_fragment( 'common/map', [
					'maps' => $maps
				] );
				?>

				<div class="shell">
					<p>
						<em><?php echo esc_html( $section['text'] ); ?></em>
					</p>
				</div><!-- /.shell -->
			</div><!-- /.locations__content -->
		<?php endif; ?>

		<div class="locations__container">
			<div class="shell">
				<?php 
				crb_render_fragment( 'all-locations/filter', [
					'section' => $section
				] );
				
				crb_render_fragment( 'all-locations/state-filter', [
					'section' => $section
				] );

				crb_render_fragment( 'all-locations/locations_loop', [
					'locations_loop' => $locations_loop
				] ); 
				?>
			</div><!-- /.shell -->
		</div><!-- /.locations__container -->
	</div><!-- /.locations -->
</section><!-- /.section-locations -->