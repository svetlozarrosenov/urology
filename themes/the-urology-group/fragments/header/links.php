<?php
if ( empty( $section['links'] ) && empty( $section['title'] ) ) {
	return;
}
?>

<div class="nav-col nav-col--1of3">
	<?php if ( ! empty( $section['title'] ) ) : ?>
		<p class="nav-title"><?= $section['title']; ?></p>
	<?php endif; ?>
	
	<?php if ( ! empty( $section['links'] ) ) : ?>
		<ul>
			<?php foreach ( $section['links'] as $link ) : ?>
				<?php
				$target = '';
				if ( ! empty( $link['open_link_in_new_tab'] ) && $link['open_link_in_new_tab'] ) {
					$target = 'target="_blank"';
				}

				$class = '';
				if ( $link['important_link'] ) {
					$class = 'links-all';
				}
				?>
				<li class="<?= $class; ?>">
					<a href="<?= esc_url( $link['link'] ); ?>" <?php echo $target; ?>><?= esc_html( $link['title'] ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div><!-- /.nav-dd-col-/-1of3 -->
