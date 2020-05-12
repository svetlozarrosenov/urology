<?php
$args = array(
	'post_type' => 'crb_event',
	'posts_per_page' => $posts_per_page,
	'order' => $order,
	'meta_key' => '_crb_event_date',
    'orderby' => 'meta_value',
	'meta_query' => array(
        array(
            'key' => '_crb_event_date',
            'value' => $value,
            'compare' => $compare,
            'type' => 'DATE'
        )
    ),
);


$events_loop = new WP_Query( $args );

if ( ! $events_loop->have_posts() ) {
	return;
}
?>
<div class="events">
	<ol>
		<?php while ( $events_loop->have_posts() ) : $events_loop->the_post(); ?>
			<?php
			$class = 'event';
			$is_important_event = carbon_get_the_post_meta( 'crb_event_is_important' );
			$format = 'l, F j, Y';
			if ( $is_important_event ) {
				$format = 'F j, Y';
			}
			$event_date = crb_convert_date_string_to_another_format( carbon_get_the_post_meta( 'crb_event_date' ), $format );

			$thumbnail_url = false;
			if ( $is_important_event ) {
				$thumbnail_url = get_the_post_thumbnail_url();
			}

			if ( $is_important_event ) {
				$class = 'event event--featured';
			}
			?>
			<li>
				<article class="<?php echo $class; ?>" style="background-image: url(<?php echo $thumbnail_url; ?>);">
					<div class="event__container">
						<?php if ( ! $is_important_event ) : ?>
							<?php 
							$image = carbon_get_the_post_meta( 'crb_event_image' ); 
							?>
							<div class="event__image" style="background-image: url(<?php echo wp_get_attachment_image_url( $image, 'full' ); ?>);">
									<a href="<?php the_permalink(); ?>"></a>
							</div><!-- /.event__image -->
						<?php endif; ?>
						
						<div class="event__content">
							<?php if ( $event_date ) : ?>
								<div class="event__meta">
									<p>
										<?php 
										if ( $is_important_event ) {
											echo '<span>' . crb_str_replace_first(',', ',</span><br>', $event_date);
										} else {
											echo $event_date;
										}
										?>	
									</p>
								</div><!-- /.event__meta -->
							<?php endif; ?>

							<div class="article__entry entry">
								<a href="<?php the_permalink(); ?>" class="btn-more"></a>

								<h5>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h5>

								<p>
									<?php the_excerpt(); ?>
								</p>
							</div><!-- /.article__entry -->
						</div><!-- /.event__content -->
					</div><!-- /.event__container -->
				</article><!-- /.event -->
			</li>
		<?php endwhile; ?>
		
		<?php wp_reset_postdata(); ?>
	</ol>
</div><!-- /.events -->