<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<?php
$additional_body_classes = '';
if ( isset( $_GET['physician_name'] ) ) {
	$additional_body_classes = 'physician_name';
}
?>
<body <?php body_class( $additional_body_classes ); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NH8DWR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

	<div class="wrapper">
		<div class="wrapper__inner">
			<header class="header">
				<a href="<?php echo home_url( '/' ); ?>" class="logo">
					<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo@2x.png);"></span>
				</a>

				<a href="#" class="nav-trigger">
					<span></span>
					<span></span>
					<span></span>
				</a>

				<div class="header__wrapper">
					<div class="header__wrapper-inner">
						<?php crb_render_fragment( 'header/bar' ); ?>

						<?php crb_render_fragment( 'header/menu' ); ?>
					</div><!-- /.header__wrapper-inner -->
				</div><!-- /.header__wrapper -->
			</header><!-- /.header -->

			<div class="container">
