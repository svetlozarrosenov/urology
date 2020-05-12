<?php
$args = array(
	'post_type' => $post_type,
	'posts_per_page' => 100,
);

if ( isset( $ids ) ) {
	$args['post__in'] = crb_remove_from_array($ids, $staff_to_exclude);
	$args['orderby'] = 'post__in';
}

if ( isset( $tax_query ) ) {
	$args['tax_query'] = [$tax_query];
}

$loop = new WP_Query( $args );
?>

<?php if ( ! $loop->have_posts() ) {
	return;
}
?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
<?php endwhile; 

wp_reset_postdata();
