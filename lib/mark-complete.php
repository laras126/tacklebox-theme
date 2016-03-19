<?php 


// Mark lessons completed button
// https://tommcfarlin.com/sending-data-post/

function tsk_mark_complete() {
	$lesson_args = array(
		'post_type' => 'lesson',
		'posts_per_page' => '-1'
	);

	$lesson_arr = get_posts($lesson_args);
	
	// Is there a better way to do this?
	foreach ($lesson_arr as $lesson) { 
		if ( isset( $_POST['_lesson_'.$lesson->ID.'_complete'] ) ) {
			$new_state = $_POST['_lesson_'.$lesson->ID.'_complete'];
			$user_id = get_current_user_id();

			update_user_meta( $user_id, '_lesson_'.$lesson->ID.'_complete', $new_state ); 

			if ( is_wp_error( $user_id ) ) {
				// There was an error, probably that user doesn't exist.
			} else {
				// Success!
			}
		}
	}

}
add_action( 'wp', 'tsk_mark_complete' );


// Custom user fields to indicate completed lessons
// justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields

add_action( 'show_user_profile', 'tsk_add_lesson_state_fields_to_admin' );
add_action( 'edit_user_profile', 'tsk_add_lesson_state_fields_to_admin' );

function tsk_add_lesson_state_fields_to_admin( $user ) { 

	$lesson_args = array(
		'post_type' => 'lesson',
		'posts_per_page' => '-1'
	);

	$lesson_arr = get_posts($lesson_args);
	
	?>

	<h3>Completed Lessons</h3>

	<table class="form-table">

	<?php foreach ($lesson_arr as $lesson) { 

		$field = '_lesson_'. $lesson->ID . '_complete';
		$value = get_the_author_meta( '_lesson_'.$lesson->ID.'_complete', $user->ID );

		?>
		<tr>
			<td>
				<input type="checkbox" name="<? echo $field ?>" id="<?php echo $field ?>" <?php if($value == 'true'){ echo 'checked'; } ?> />
				<label for="<?php echo $field ?>"><?php echo get_the_title($lesson->ID) ?></label>
			</td>
		</tr>

	<?php } ?>

	</table>
<?php }


// Update completed lesson options in database
add_action( 'personal_options_update', 'tsk_save_lesson_state_in_admin' );
add_action( 'edit_user_profile_update', 'tsk_save_lesson_state_in_admin' );

function tsk_save_lesson_state_in_admin( $user_id ) {

	$lesson_args = array(
		'post_type' => 'lesson',
		'posts_per_page' => '-1'
	);

	$lesson_arr = get_posts($lesson_args);

	foreach ($lesson_arr as $lesson) {
		$field = '_lesson_'. $lesson->ID . '_complete';
		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		update_user_meta( $user_id, $field, isset( $_POST[$field] ) ? 'true' : 'false');
	}
}

