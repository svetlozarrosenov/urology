<?php
$sidebar = [
	'image' => carbon_get_the_post_meta( 'crb_physician_sidebar_image' ),
	'btns' => carbon_get_the_post_meta( 'crb_physician_sidebar_btns' ),
	'specialities_title' => carbon_get_the_post_meta( 'crb_physician_sidebar_specialities_list_title' ),
	'certificates_title' => carbon_get_the_post_meta( 'crb_physician_sidebar_certificates_list_title' ),
];
if ( ! array_filter( $sidebar ) ) {
	return;
}
?>
<aside class="section__aside entry">
	<div class="profile">
		<?php if ( ! empty( $sidebar['image'] ) ) : ?>
			<div class="profile__image">
				<?php echo wp_get_attachment_image( $sidebar['image'], 'full' ); ?>
			</div><!-- /.profile__image -->
		<?php endif; ?>
		
		<?php if ( ! empty( $sidebar['btns'] ) ) : ?>
			<div class="profile__actions">
				<?php foreach ( $sidebar['btns'] as $btn ) : ?>
					<a href="<?php echo esc_url( $btn['btn_link'] ); ?>" class="btn btn-block"><?php echo esc_html( $btn['btn_label'] ); ?></a>
				<?php endforeach; ?>
			</div><!-- /.profile__actions -->
		<?php endif; ?>
		<?php $specialties = crb_the_category('crb_physician_speciality', false ); ?>

		<?php if ( ! empty( $specialties ) ) : ?>
			<div class="profile__content">
				<?php if ( ! empty( $sidebar['specialities_title'] ) ) : ?>
					<div class="list-bio">
						<h5><?php echo esc_html( $sidebar['specialities_title'] ); ?></h5>
						<ul>
							<?php foreach ( $specialties as $speciality ) : ?>
								<li><?php echo $speciality; ?></li>
							<?php endforeach; ?>
						</ul>
					</div><!-- /.list-info -->
				<?php endif; ?>
			</div><!-- /.profile__content -->
		<?php endif; ?>
	</div><!-- /.profile -->
</aside><!-- /.section__aside -->