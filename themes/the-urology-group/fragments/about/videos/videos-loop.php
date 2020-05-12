<?php
if ( ! empty( $_GET['care-area-id'] ) ) {
	$care_areas = crb_get_list_of_care_areas_which_have_videos( $_GET['care-area-id'] );
} else {
	$care_areas = crb_get_list_of_care_areas_which_have_videos();
}
?>
<section class="section-videos">
	<div class="shell">
		<?php foreach ( $care_areas as $care_area ) : ?>
			<div class="section__group">
				<h4><?php printf( "%s Videos", $care_area['care_area_title'] ); ?></h4>
				
				<?php
				$videos = crb_get_filtered_videos( $care_area['care_area_id'] );
				?>
				<div class="videos">
					<ol>
						<?php foreach ( $videos as $video ) : ?>
							<li>
								<?php 
								crb_render_fragment('common/video', [
									'video' => $video
								] ); 
								?>
							</li>
						<?php endforeach; ?>
					</ol>
				</div><!-- /.list-videos -->
			</div><!-- /.section__group -->
		<?php endforeach; ?>
		
		<?php
		$uncategorized_videos = false;
		if ( empty( $_GET['care-area-id'] ) ) {
			$uncategorized_videos = crb_get_videos_without_care_areas();
		}
		?>
		<?php if ( $uncategorized_videos ) : ?>
			<div class="section__group">
				<h4><?php _e( 'Uncategorized', 'crb' ); ?></h4>
	 			<div class="videos">
					<ol>
						<?php foreach ( $uncategorized_videos as $uncategorized_video ) : ?>
							<li>
								<?php 
								crb_render_fragment('common/video', [
									'video' => $uncategorized_video
								] ); 
								?>
							</li>
						<?php endforeach; ?>
					</ol>
				</div><!-- /.list-videos -->
			</div><!-- /.section__group -->
		<?php endif; ?>
	</div><!-- /.shell -->
</section><!-- /.section-videos -->