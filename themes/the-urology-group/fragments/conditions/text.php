<?php
if ( empty( $section['text'] ) ) {
	return;
}
?>
<section class="section-text section-base">
	<div class="shell">
		<div class="section__content entry">
			<p>
				<?php echo esc_html( $section['text'] ); ?>
			</p>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->