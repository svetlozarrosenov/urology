<?php
if ( empty( $video ) ) {
	return;
}

$video_link = carbon_get_post_meta( $video['video_id'], 'crb_video_link' );

$carbon_video = Carbon_Video::create($video_link);
?>
<div class="video" style="background-image: url(<?php echo $carbon_video->get_thumbnail( 'maxresdefault.jpg' ); ?>);">
	<a href="<?php echo esc_url( $video_link ); ?>" class="video-trigger">
		<span>
			<?php echo $video['title']; ?>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-play.svg" alt="" />
		</span>
	</a>
</div><!-- /.video -->