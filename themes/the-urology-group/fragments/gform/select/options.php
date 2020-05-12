<?php
if ( in_array( 'crb_physician', $post_type ) ) {
	$physicians_to_exclude = crb_get_post_type_by_meta_value('crb_physician', '_crb_physician_hide_from_request_appointment_form', 'yes', 'ID');
	$staff_to_exclude = crb_get_post_type_by_meta_value('crb_staff', '_crb_staff_hide_from_request_appointment_form', 'yes', 'ID');
         	
    $posts_to_exclude = array_merge( $physicians_to_exclude, $staff_to_exclude );
    $options_loop = crb_get_get_physicians_and_staff_ordered_by_last_name( $posts_to_exclude, $id );
}
?>

<option value="0"><?php echo $first_option; ?></option>

<?php if ( ! empty( $second_option ) ) : ?>
	<option value="0"><?php echo $second_option; ?></option>
<?php endif; ?>

<?php foreach ( $options_loop as $option ) : ?>
	<?php
	$option_id = $option['ID'];
	$selected = '';
	if ( $option_id == $selected_option ) {
		$selected = 'selected';
	}
	?>
	<option <?php echo $selected; ?> value="<?php echo $option_id; ?>"><?php echo $option['name']; ?></option>
<?php endforeach; 