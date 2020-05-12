<?php
if ( ! array_filter( $section ) ) {
	return;
}
?>
<div class="nav-col nav-col--1of3">
	<?php if ( ! empty( $section['title'] ) ) : ?>
		<p class="nav-title"><?php echo esc_html( $section['title'] ); ?></p>
	<?php endif; ?>
	
	<?php
	$physician_page_url = get_page_url_by_template( 'all-physicians' );
	?>
	<div class="form-search header-search-form">
		<form class="physician-search-form" action="<?php echo $physician_page_url; ?>" method="GET">
			<label for="field-physician-name" class="form__label screen-reader-text">physician-name</label>

			<input type="text" class="field" name="physician_name" id="field-physician-name" value="" placeholder="Enter Physician Name" autocomplete="off">

			<input type="submit" value="Find Physician" class="form__btn">
		</form>

		<ul class="physician-autocompleted-names">

		</ul>
	</div><!-- /.form -->
	
	<?php if ( ! empty( $section['text'] ) ) : ?>
		<p>
			<?php echo esc_html( $section['text'] ); ?>
		</p>
	<?php endif; ?>
	
	<?php if ( ! empty( $section['link_label'] ) && $section['link'] ) : ?>
		<?php
		$class = '';
		if ( $section['important_link'] ) {
			$class = 'links-all';
		}
		?>
		<a href="<?php echo esc_url( $section['link'] ); ?>" class="<?php echo $class; ?>">
			<?php echo esc_html( $section['link_label'] ); ?>
		</a>
	<?php endif; ?>
</div><!-- /.nav-dd-col-/-1of3 -->