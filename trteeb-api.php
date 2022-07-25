<?php
/**
 * Description: Allows the website to access Remote API
 * Plugin Name: Trteeb API
 * Pluign URI: http://trteeb.co
 * Version: 1.0.0
 * Requires at least: 6.0.0
 * Requires PHP: 7
 * Author: Trteeb
 * Author URI: http://trteeb.co
 */
 // If this file is called directly, abort.
 if ( !defined( 'ABSPATH' ) ) die;

 /**
  * Current plugin version.
  */
 define( 'TRAPI_VERSION', '1.0.0' );

 /**
  * Activate the plugin.
  */
 function tr_api_activation() {
     // Trigger any initialisation functions.
     require_once plugin_dir_path( __FILE__ ) . 'includes/class-tr-api-activator.php';
     TRAPI_Activator::activate();
 }
 register_activation_hook( __FILE__, 'tr_api_activation' );

 /**
  * Deactivation hook.
  */
 function tr_api_deactivate() {
     // Trigger any cleanup functions
     require_once plugin_dir_path( __FILE__ ) . 'includes/class-tr-api-deactivator.php';
     TRAPI_Deactivator::deactivate();
 }
 register_deactivation_hook( __FILE__, 'tr_api_deactivate' );

 /**
  * The core plugin class that is used to define internationalization,
  * admin-specific hooks, and public-facing site hooks.
  */
 require_once( plugin_dir_path( __FILE__ ) . 'includes/class-tr-api.php' );

 /**
  * Begins execution of the plugin.
  *
  * Since everything within the plugin is registered via hooks,
  * then kicking off the plugin from this point in the file does
  * not affect the page life cycle.
  *
  * @since 1.0.0
  */
 function run_tr_api() {
     $trApi = new TRAPI();
     $trApi->run();
 }

 // run the plugin
 run_tr_api();
