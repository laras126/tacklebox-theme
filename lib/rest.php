<?php 



// REST API
// Adding custom fields to the WP API JSON response

add_action( 'rest_api_init', 'tsk_register_api_hooks' );
function tsk_register_api_hooks() {

	$fields = array(
			'source_author',
      'source_publication',
      'source_blurb'
		);

    // Add the plaintext content to GET requests for individual posts
    foreach ($fields as $f) {
	    register_api_field(
	        'source',
	        $f,
	        array(
	            'get_callback'    => 'tsk_return_cf_content',
	        )
	    );
    }

  //   register_api_field(
		// 'source',
  //       'featured_image_url',
  //       array(
  //           'get_callback'    => 'tsk_return_feat_img',
  //       )
  //   );

  //   register_api_field(
		// 'source',
  //       'formatted_date',
  //       array(
  //           'get_callback'    => 'tsk_return_date',
  //       )
  //   );
}

// Return plaintext content for posts
function tsk_return_cf_content( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}



