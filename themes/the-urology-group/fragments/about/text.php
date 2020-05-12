<?php
if ( empty( $section['content'] ) ) {
	return;
}
?>
<section class="section-text section-base">
	<div class="shell">
		<div class="section__content entry">
			<?php echo crb_content( $section['content'] ); ?>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->