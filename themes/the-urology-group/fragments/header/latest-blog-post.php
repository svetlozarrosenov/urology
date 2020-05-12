<?php
$post_loop = new WP_Query( array(
	'post_type' => 'post',
	'posts_per_page' => 1,
) );

if ( ! $post_loop->have_posts() ) {
	return;
}
?>

<div class="nav-col nav-col--1of3">
	<?php if ( ! empty( $section['title'] ) ) : ?>
		<p class="nav-title"><?php echo esc_html( $section['title'] ); ?></p>
	<?php endif; ?>
	
	<?php while ( $post_loop->have_posts() ) : $post_loop->the_post(); ?>
		<article class="article-blog" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
			<a href="<?php the_permalink(); ?>"></a>

			<div class="article__head">
				<h3>
					<?php the_title(); ?>
				</h3>
			</div><!-- /.article__head -->
			
			<div class="article__meta">
				<?php the_time( 'F j, Y ' ); ?> <br>
				<?php printf( __( 'By %s', 'crb' ), get_the_author() ); ?>
			</div><!-- /.article__meta -->
		</article><!-- /.article -->
	<?php endwhile; ?>
	
	<?php wp_reset_postdata(); ?>
	
	<?php if ( ! empty( $section['link'] ) && ! empty( $section['link_label'] ) ) : ?>
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