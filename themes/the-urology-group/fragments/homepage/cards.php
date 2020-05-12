<?php
if ( empty( $section['cards'] ) ) {
	return;
}
?>
<section class="section-articles section-base">
	<div class="shell">
		<div class="section__content">
			<div class="articles">
				<ol>
					<?php foreach ( $section['cards'] as $card ) : ?>
						<li>
							<article class="article">
								<div class="article__actions">
									<?php if ( ! empty( $card['btn_label'] ) ) : ?>
										<a href="<?php echo esc_url( $card['link'] ); ?>" class="btn btn--outline">
											<?php echo esc_html( $card['btn_label'] ); ?>
										</a>
									<?php endif; ?>
								</div><!-- /.article__actions -->
								
								<?php if ( ! empty( $card['link'] ) || ! empty( $card['image'] ) || ! empty( $card['title'] ) || ! empty( $card['text'] ) ) : ?>
									<div class="article__body">
										<?php if ( ! empty( $card['link'] ) ) : ?>
											<a href="<?php echo esc_url( $card['link'] ); ?>"></a>
										<?php endif; ?>
										
										<?php if ( ! empty( $card['image'] ) ) : ?>
											<div class="article__image" style="background-image: url(<?php echo wp_get_attachment_image_url( $card['image'], 'full' ); ?>);"></div><!-- /.article__image -->
										<?php endif; ?>
										
										<?php if ( ! empty( $card['title'] ) || ! empty( $card['text'] ) ) : ?>
											<div class="article__content">
												<?php if ( ! empty( $card['title'] ) ) : ?>
													<h5><?php echo esc_html( $card['title'] ); ?></h5>
												<?php endif; ?>
												
												<?php if ( ! empty( $card['text'] ) ) : ?>
													<p>
														<?php echo esc_html( $card['text'] ); ?>
													</p>
												<?php endif; ?>
											</div><!-- /.article__content -->
										<?php endif; ?>
									</div><!-- /.article__body -->
								<?php endif; ?>
							</article><!-- /.article -->
						</li>
					<?php endforeach; ?>
				</ol>
			</div><!-- /.articles -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-articles -->