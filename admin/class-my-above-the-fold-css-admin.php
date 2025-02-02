<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://eboxnet.com
 * @since      1.0.0
 *
 * @package    My_Above_The_Fold_Css
 * @subpackage My_Above_The_Fold_Css/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    My_Above_The_Fold_Css
 * @subpackage My_Above_The_Fold_Css/admin
 * @author     Vagelis P. <info@eboxnet.com>
 */
class My_Above_The_Fold_Css_Admin {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in My_Above_The_Fold_Css_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The My_Above_The_Fold_Css_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/my-above-the-fold-css-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in My_Above_The_Fold_Css_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The My_Above_The_Fold_Css_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/my-above-the-fold-css-admin.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Create menu entry the admin area.
	 *
	 * @since    1.0.0
	 */
	public function create_menu() {	
	add_submenu_page( 'tools.php', __( 'My AboveTheFold Css', 'tools' ), __( 'My AboveTheFold Css', 'tools' ), 'administrator', 'mabtf-options', 'mabtf_admin_page' );
	}
	/**
	 * Register settings variables
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {

	register_setting( 'mabtf-group', 'myabovethefold_display' );
	register_setting( 'mabtf-group', 'myabovethefold_responsive' );
	register_setting( 'mabtf-group', 'myabovethefold_displaytoall' );
	}
}
