<?php
$boxes = crb_get_boxes();
if ( empty( $boxes ) ) {
	return;
}
?>
<section class="section-base section-tiles">
	<div class="shell">
		<div class="tiles">
			<ul>
				<?php foreach( $boxes as $box ) : ?>
					<li>
						<div class="tile">
							<?php if ( ! empty( $box['title'] ) ) : ?>
								<h4><?php echo esc_html( $box['title'] ); ?></h4>
							<?php endif; ?>
							
							<?php if ( ! empty( $box['phone'] ) ) : ?>
								<a href="tel:<?php echo crb_esc_phone_number( $box['phone'] ); ?>" class="btn-phone btn-phone--large">
									<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-phone.svg);"></span>

									<?php echo esc_html( $box['phone'] ); ?>
								</a>
							<?php endif; ?>

							<?php if ( ! empty( $box['form_link'] ) ) : ?>
								<?php 
								$autocomplete = '';
								$class = '';
								$box_name = '';
								$placeholder = '';
								if ( $box['_type'] === 'find-location' ) {
									$box_name = 'location-address';
									$class = 'location-search-form';
									$placeholder = "placeholder='Enter Your Address, City & State, or Zip Code'";
								}
								if ( $box['_type'] === 'find-physician' ) {
									$box_name = 'physician_name';
									$class = 'physician-search-form';
									$autocomplete = 'autocomplete="off"';
								}
								?>

								<div class="form-search header-search-form form-search--large">
									<form class="<?php echo $class; ?>" action="<?php echo esc_url( $box['form_link'] ); ?>" method="GET">
										<label for="field-location" class="form__label screen-reader-text">physician-name</label>

										<input type="text" class="field" name="<?php echo $box_name; ?>" id="field-location" <?php echo $placeholder; ?> value="" <?php echo $autocomplete; ?>>

										<input type="submit" value="Find Physician" class="form__btn">

									</form>
									
									<?php if ( $class == 'physician-search-form' ) : ?>
										<ul class="physician-autocompleted-names">

										</ul>
									<?php endif; ?>
								</div><!-- /.form -->
							<?php endif; ?>
							
							<?php if ( ! empty( $box['text'] ) ) : ?>
								<p>
									<?php echo esc_html( $box['text'] ); ?>
								</p>
							<?php endif; ?>
							
							<?php if ( ! empty( $box['btn_label'] ) && ! empty( $box['btn_link'] ) ) : ?> 
								<a href="<?php echo esc_url( $box['btn_link'] ); ?>" class="links-all">
									<?php echo esc_html( $box['btn_label'] ); ?>
								</a>
							<?php endif; ?>
						</div><!-- /.tile -->
					</li>
				<?php endforeach; ?>
			</ul>
		</div><!-- /.tiles -->
	</div><!-- /.shell -->
</section><!-- /.section-widgets -->