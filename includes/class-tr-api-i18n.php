<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 *
 * @link      http://trteeb.co
 * @since      1.0.0
 * @package    TRAPI
 * @subpackage TRAPI/includes
 * @author     Trteeb <info@trteeb.co>
 */
 class TRAPI_i18n {

 	/**
 	 * Load the plugin text domain for translation.
 	 *
 	 * @since    1.0.0
 	 */
 	public function load_plugin_textdomain() {

 		load_plugin_textdomain(
 			'tr-api',
 			false,
 			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
 		);
 	}
 }
