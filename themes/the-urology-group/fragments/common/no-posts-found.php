<div class="articles">
	<ol>
		<li>
			<div class="article article--error404 article--not-found">
				<div class="article__body">
					<div class="article__entry">
						<p>
							<?php
							if ( is_category() ) { // If this is a category archive
								printf( __( "Sorry, but there aren't any posts in the %s category yet.", 'crb' ), single_cat_title( '', false ) );
							} else if ( is_date() ) { // If this is a date archive
								_e( "Sorry, but there aren't any posts with this date.", 'crb' );
							} else if ( is_author() ) { // If this is a category archive
								$userdata = get_user_by( 'id', get_queried_object_id() );
								printf( __( "Sorry, but there aren't any posts by %s yet.", 'crb' ), $userdata->display_name );
							} else if ( is_search() ) { // If this is a search
								_e( 'No posts found. Try a different search?', 'crb' );
							} else {
								_e( 'No posts found.', 'crb' );
							}
							?>
						</p>

						<?php get_search_form(); ?>
					</div><!-- /.article__entry -->
				</div><!-- /.article__body -->
			</div><!-- /.article -->

		</li>
	</ol>
</div><!-- /.articles -->