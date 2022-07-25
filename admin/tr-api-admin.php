<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version.
 * Enqueues the admin-specific stylesheet and JavaScript.
 *
 * @link      http://trteeb.co
 * @since      1.0.0
 * @package    TRAPI
 * @subpackage TRAPI/includes
 * @author     Trteeb <info@trteeb.co>
 */
class TRAPI_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tr-api-admin.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tr-api-admin.js', array( 'jquery' ), $this->version, false );

    }

    /**
     * Register the Menu Item in the admin area.
     *
     * @since    1.0.0
     */
    public function tr_plugin_menu()
    {
        add_menu_page('Trteeb API', 'Trteeb API', 'manage_options', 'trteeb-api', array(
            $this,
            'trteeb_api_callback'
        ));
    }
	/**
     * Callback function for the Menu Item in the admin area.
     *
     * @since    1.0.0
     */
    public function trteeb_api_callback()
    {
     //Load the shortcode
     echo do_shortcode('[users_info_short_code]');
     //  echo '<table id="users_table"></table>';
    }

}
