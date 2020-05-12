<?php
$args = array(
	'taxonomy' => $taxonomy,
	'hide_empty' => true
);

if ( isset( $object_ids ) && array_filter( $object_ids ) ) {
	$args['object_ids'] = $object_ids;
} else if ( isset( $object_ids ) && ! array_filter( $object_ids ) ) {
	echo " ";
	return;
}

$terms = get_terms( $args );

if ( empty( $terms ) ) {
	echo " ";
	return;
}
?>

<?php foreach ( $terms as $term ) : ?>
	<option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
<?php endforeach; ?>