<?php
if ( ! array_filter( $section ) ) {
	return;
}
?>
<section class="section-text section-base">
	<div class="shell">
		<?php if ( ! empty( $section['text'] ) ) : ?>
			<div class="section__content entry">
				<p>
					<?php echo esc_html( $section['text'] ); ?>
				</p>
			</div><!-- /.section__content -->
		<?php endif; ?>
		
		<?php
		$care_area_ids = crb_get_association_ids( $section['related_care_area'] );  
		$care_areas_loop = new WP_Query( array(
			'post_type' => 'crb_care_area',
			'posts_per_page' => -1,
			'post__in' => $care_area_ids
		) );
		?>

		<?php if ( $care_areas_loop->have_posts() ) : ?>
			<div class="form form--filter form--filter-large filter-stories">
				<form action="?" method="post">
					<div class="form__body">
						<div class="form__row">
							<label for="field-filter-area-of-care" class="form__label screen-reader-text">filter-area-of-care</label>

							<div class="form__controls">
								<div class="select">
									<select name="field-filter-area-of-care" id="field-filter-area-of-care">
										<option value="0"><?php _e( 'Filter by Area of Care', 'crb' ); ?></option>

										<?php while ( $care_areas_loop->have_posts() ) : $care_areas_loop->the_post(); ?>
											<?php
											$selected = false;
											if ( isset( $_GET['care-area-id'] ) && $_GET['care-area-id'] == get_the_ID() ) {
												$selected = 'selected';
											}
											?>
											<option value="<?php the_ID(); ?>" <?php echo $selected; ?>><?php the_title(); ?></option>
										<?php endwhile; ?>
										
										<?php wp_reset_postdata(); ?>
									</select>
								</div><!-- /.select -->
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->
					</div><!-- /.form__body -->

					<div class="form__actions">
						<input type="submit" value="Submit" class="screen-reader-text form__btn">
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form -->
		<?php endif; ?>
	</div><!-- /.shell -->
</section><!-- /.section-text -->

<?php
$posts_per_page = 6;
$args = array(
	'post_type' => 'crb_patient_story',
	'posts_per_page' => $posts_per_page,
);
if( isset( $_GET['care-area-id'] ) && $_GET['care-area-id'] != 0 ) {
	$args['meta_query'] = [
		[
			'key' => '_crb_patient_story_related_care_area|||0|id',
			'value' => $_GET['care-area-id'],
			'compare' => '='
		]
	];	
}

$stories_loop = new WP_Query( $args );

for ( $i = 0; $i < absint( $stories_loop->found_posts ); $i++ ) {
	if ( $i == 0 ) {
		crb_render_fragment( 'common/article-story', [
			'stories_loop' => $stories_loop,
		] );
	}

	if ( $i === 5 && ! empty( $section['chosen_stories'][0] ) ) {
		crb_render_fragment( 'common/featured-story', [
			'featured_story' => $section['chosen_stories'][0],
		] );
	}

	if ( $i === 6 ) {
		$args['offset'] = 6;

		crb_render_fragment( 'common/article-story', [
			'stories_loop' => new WP_Query( $args ),
		] );

		if ( ! empty( $section['chosen_stories'][1] ) ) {
			crb_render_fragment( 'common/featured-story', [
				'featured_story' => $section['chosen_stories'][1]
			] );
		}
	}

	if ( $i === 11 ) {
		$args['posts_per_page'] = 3;
		$args['offset'] = 12;

		crb_render_fragment( 'common/article-story', [
			'stories_loop' => new WP_Query( $args ),
		] );
	}
}
