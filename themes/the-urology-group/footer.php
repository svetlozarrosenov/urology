			</div><!-- /.container -->
			<?php
			$footer = [
				'copyright' => esc_html( carbon_get_theme_option( 'crb_copyright' ) ),
				'btn' => [
					'label' => esc_html( carbon_get_theme_option( 'crb_footer_btn_label' ) ),
					'link' => esc_url( carbon_get_theme_option( 'crb_footer_btn_link' ) ),
				],
			];
			?>
			<footer class="footer" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/footer-bg.jpg);">
				<div class="shell">
					<a href="<?php echo home_url( '/' ); ?>" class="logo-white" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo.svg);"></a>

					<div class="footer__bar">
						<?php if ( ! empty( $footer['btn']['label'] ) && ! empty( $footer['btn']['link'] ) ) : ?>
							<a href="<?php echo $footer['btn']['link']; ?>" class="btn btn--outline btn--white">
								<?php echo $footer['btn']['label']; ?>
							</a>
						<?php endif; ?>

						<?php crb_render_fragment( 'common/socials' ); ?>
					</div><!-- /.footer__bar -->

					<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
						<div class="footer__nav">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'container' => 'nav',
								'container_class' => 'nav-footer'
							) );
							?>
						</div><!-- /.footer__nav -->
					<?php endif; ?>

					<div class="footer__inner">
						<?php if ( ! empty( $footer['copyright'] ) ) : ?>
							<div class="copyright">
								<p><?php echo $footer['copyright']; ?></p>
							</div><!-- /.copyright -->
						<?php endif; ?>

						<?php
						if ( has_nav_menu( 'footer-menu-secondary' ) ) {
							wp_nav_menu( array(
								'theme_location' => 'footer-menu-secondary',
								'container' => 'nav',
								'container_class' => 'nav-utilities'
							) );
						}
						?>
					</div><!-- /.footer__inner -->
				</div><!-- /.shell -->
			</footer><!-- /.footer -->

			<?php crb_render_fragment( 'virtual-assistant/assistant' ); ?>
		</div><!-- /.wrapper__inner -->
	</div><!-- /.wrapper -->
	<?php wp_footer(); ?>
</body>
</html>