<?php
/**
 * The API communication functions.
 *
 * Adds functions for fetching information from the API.
 *
 * @link      http://trteeb.co
 * @since      1.0.0
 * @package    TRAPI
 * @subpackage TRAPI/includes
 * @author     Trteeb <info@trteeb.co>
 */

class TRAPI_API {

  private $api_url ;

  public function __construct()
      {
          $this->api_url = 'https://miusage.com/v1/';
      }



    /**
     * Get Users Data From API
     */
    private function tr_get_users_data_api() {

        // http request to the api to fetch a list of all the users data
        $response = wp_remote_get(
              $this->api_url . 'challenge/1/'
        );

        // decode the JSON response to retrieve the list of user info
        $api_response = json_decode( wp_remote_retrieve_body( $response ), false );

        return $api_response;
    }



    /* -------------------------------------------------
     * Public functions that interact with the front-end
     * ------------------------------------------------- */


     /**
      * Get Users Data From API
      */
     public function tr_get_users_data() {

       $users_response = $this->tr_get_users_data_api();

       return $users_response;
     }

}
