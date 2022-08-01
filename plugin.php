<?php
/*
 * Plugin Name: Switch Polylang To Ukrainian language
 * Plugin URI: git@github.com:svoyMan/PHP_WP_Plugin_Switch_Polylang_To_Ukrainian_language.git
 * Description: Displays a popup with languages. For Ukraine, so that the Ukrainian version opens first by default
 * Version: 0.1
 * Requires at least: 5.0
 * Requires PHP: 5.6
 * Author: My Master
 * Author URI: http://my-master.net.ua/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sptul_domain
 */

define( 'SPTUL_PLUGIN_VERSION', '0.1' );
define( 'SPTUL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SPTUL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SPTUL_UKRAINE_CODE', 'uk' );

if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if ( ! function_exists( 'sptul_wp_enqueue_scripts' ) ) {
		add_action( 'wp_enqueue_scripts', 'sptul_wp_enqueue_scripts' );
		function sptul_wp_enqueue_scripts(){
			wp_enqueue_style( 'sptul_style', SPTUL_PLUGIN_URL . 'assets/css/style.css', array(), SPTUL_PLUGIN_VERSION );
			wp_enqueue_script( 'sptul_app', SPTUL_PLUGIN_URL . 'assets/js/SPTULApp.js', array('jquery'), SPTUL_PLUGIN_VERSION, true );
			wp_localize_script( 'sptul_app', 'sptul_app', array(
				'ukraine_code' => SPTUL_UKRAINE_CODE,
			) );
		}
	}

	if ( ! function_exists( 'sptul_wp_footer' ) ) {
		add_action( 'wp_footer', 'sptul_wp_footer' );
		function sptul_wp_footer(){
			include SPTUL_PLUGIN_DIR . 'templates/popup.php';
		}
	}
} else {
	if ( ! function_exists( 'sptul_admin_notices' ) ) {
		add_action( 'admin_notices', 'sptul_admin_notices' );
		function sptul_admin_notices() {
			include SPTUL_PLUGIN_DIR . 'templates/admin-notices.php';
		}
	}
}
