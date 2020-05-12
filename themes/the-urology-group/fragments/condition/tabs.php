<?php
if ( empty( $section['tabs'] )  ) {
	return;
}
?>
<section class="section-base section-tabs">
	<div class="shell">
		<div class="tabs">
			<div class="tabs__head">
				<nav class="tabs__nav">
					<ul>
						<?php foreach ( $section['tabs'] as $index => $tab ) : ?>
							<?php
							$class = crb_get_class_on_iteration( array(
								'iteration' => 0,
								'index' => $index,
								'class' => 'current'
							) );
							?>
							<li class="<?php echo $class; ?>">
								<a href="#tab<?php echo $index +1; ?>"><?php echo esc_html( $tab['title'] ); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav><!-- /.tabs__nav -->
			</div><!-- /.tabs__head -->

			<div class="tabs__body">
				<?php foreach ( $section['tabs'] as $index => $tab ) : ?>
					<?php
					$class = crb_get_class_on_iteration( array(
						'iteration' => 0,
						'index' => $index,
						'class' => 'current'
					) );
					?>
					<div id="tab<?php echo $index +1; ?>" class="tab <?php echo $class; ?>">
						<?php if ( ! empty( $tab['title'] ) ) : ?>
							<div class="tab__head">
								<p><?php echo esc_html( $tab['title'] ); ?></p>
							</div><!-- /.tab__head -->
						<?php endif; ?>
						
						<?php if ( ! empty( $tab['content'] ) ) : ?>
							<div class="tab__body entry">
								<?php echo crb_content( $tab['content'] ); ?>
							</div><!-- /.tab__body -->
						<?php endif; ?>
					</div><!-- /.tab -->
				<?php endforeach; ?>
			</div><!-- /.tabs__body -->
		</div><!-- /.tabs -->
	</div><!-- /.shell -->
</section><!-- /.section-tabs -->