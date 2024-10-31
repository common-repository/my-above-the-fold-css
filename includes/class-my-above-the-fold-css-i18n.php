<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://eboxnet.com
 * @since      1.0.0
 *
 * @package    My_Above_The_Fold_Css
 * @subpackage My_Above_The_Fold_Css/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    My_Above_The_Fold_Css
 * @subpackage My_Above_The_Fold_Css/includes
 * @author     Vagelis P. <info@eboxnet.com>
 */
class My_Above_The_Fold_Css_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'my-above-the-fold-css',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
