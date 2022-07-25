<?php

/**
 * Get all users data
 */
if ( !function_exists( 'tr_ajax_get_tr_users' ) ) {
	// returns a list of users from API
	function pt_its_ajax_get_tr_users() {

		$api_caller = new TRAPI_API();
		$users = $api_caller->tr_get_users();

		// create an array to hold response data
	    $response = array(
	        'users' => $users
	    );

	    // return the array of data as JSON
	    wp_send_json( $response );

		// don't do anything else
		wp_die();
	}
}
add_action( 'wp_ajax_get_tr_users',			'tr_ajax_get_tr_users' );
add_action( 'wp_ajax_nopriv_get_tr_users',	'tr_ajax_get_tr_users' );
