<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version.
 * Enqueues the public-facing stylesheet and JavaScript.
 * Add shortcodes for showing users information.
 *
 *
 * @link      http://trteeb.co
 * @since      1.0.0
 * @package    TRAPI
 * @subpackage TRAPI/includes
 * @author     Trteeb <info@trteeb.co>
 */
class TRAPI_Public {

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
	 * @param    string    $plugin_name       The name of the plugin.
	 * @param    string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_register_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tr-api-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
    	wp_register_script( $this->plugin_name . '-tr-api-public', plugin_dir_url( __FILE__ ) . 'js/tr-api-public.js', array( 'jquery' ), $this->version, false );
	    wp_enqueue_script( $this->plugin_name . '-tr-api-public' );

		}

	/**
	 * Generate and return html for all users info
	 */
	static function users_info_data() {
		$api_caller = new TRAPI_API();
		$data = $api_caller->tr_get_users_data();
		$title = '<h2>' . $data->title . '</h2>';
		$headers = $data->data->headers;
		$table_header = '<tr>';
		
			foreach ($headers as $header) {
				
				$table_header = $table_header . '<th>'. $header.'</th>';
			}
		$table_header = $table_header . '</tr>';
		$content = $data->data->rows;
		$table_content = '';
		
			foreach ($content as $content_row) {
                $table_content = $table_content . '<tr>';
				foreach($content_row as $key => $val) {
			    if($key == 'date'){ $val = date('Y-m-d', $val); }
				$table_content = $table_content . '<td>'. $val .'</td>';
				
				}
				$table_content = $table_content . '</tr>';
			}
		
		
		$html =$title . '<table>' . $table_header . $table_content . '</table>';
		// return the html content
		return $html;
	}

	/**
	 * Add the shortcodes for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function add_shortcodes() {
		// if each shortcode doesn't exist, attempt to add it

		if ( !shortcode_exists( 'users_info_short_code' ) ) {
			// shortcode to output html for all users info
			add_shortcode( 'users_info_short_code', array( 'TRAPI_Public', 'users_info_data' ) );
		}
	}
}
