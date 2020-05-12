<?php
if ( empty( $section['list'] ) ) {
	return;
}
?>
<section class="section-text section-base">
	<div class="shell">
		<div class="section__content entry">
			<div class="list-info">
				<ul>
					<?php foreach ( $section['list'] as $item ) : ?>
						<li>
							<?php if ( ! empty( $item['title'] ) ) : ?> 
								<strong><?php echo esc_html( $item['title'] ); ?></strong><br>
							<?php endif; ?>

							<?php echo do_shortcode( $item['text'] ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div><!-- /.list-info -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->