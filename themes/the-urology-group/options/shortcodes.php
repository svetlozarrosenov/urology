<?php

/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode( 'year', 'crb_shortcode_year' );
function crb_shortcode_year() {
	return date( 'Y' );
}

add_shortcode( 'phone', 'crb_shortcode_phone' );
function crb_shortcode_phone($atts, $content) {
	ob_start();
	?>
	<a href="tel:<?php echo crb_esc_phone_number( $content ); ?>"><?php echo esc_html( $content ); ?></a>
	<?php
	return ob_get_clean();
}

add_shortcode( 'link', 'crb_shortcode_link' );
function crb_shortcode_link($atts, $content) {
	ob_start();
	?>
	<a href="<?php echo esc_url( $atts['url'] ); ?>"><?php echo esc_html( $content ); ?></a>
	<?php
	return ob_get_clean();
}

add_shortcode( 'pay_bill_form', 'crb_shortcode_pay_bill_form' );
function crb_shortcode_pay_bill_form($atts, $content) {
	ob_start();
	crb_render_fragment('default-page/form-pay-bill');
	return ob_get_clean();
}