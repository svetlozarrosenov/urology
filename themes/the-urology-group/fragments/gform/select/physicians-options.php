<?php
$loop = new WP_Query( array(
	'post_type' => $post_type,
	'posts_per_page' => 100,
	'post__in' => $id,
	'orderby' => 'post__in'
) );

?>

<option value=""><?php echo $first_option; ?></option>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
<?php endwhile; 

wp_reset_postdata(); 