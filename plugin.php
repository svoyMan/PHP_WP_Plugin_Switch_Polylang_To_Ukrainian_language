<?php
/*
 * Plugin Name: Polylang Switch To Ukrainian language
 * Plugin URI: https://github.com/svoyMan/PHP_WP_Polylang_Plugin_SwitchToUkrainianlanguage
 * Description: Displays a popup with languages. For Ukraine, so that the Ukrainian version opens first by default
 * Version: 0.1
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: My Master
 * Author URI: http://my-master.net.ua/
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: pstula_domain
 */

define( 'SWITCH_TO_UKRAINIAN_LANGUAGE_VERSION', '0.1' );
define( 'ROOT_DIR', __DIR__ );
define( 'ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'UKRAINE_CODE', 'uk' );

if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_action( 'wp_enqueue_scripts', 'pstul_wp_enqueue_scripts' );
	function pstul_wp_enqueue_scripts(){
		wp_enqueue_style( 'pstul_style', plugin_dir_url( __FILE__ ) . '/assets/css/style.css', array(), SWITCH_TO_UKRAINIAN_LANGUAGE_VERSION );
		wp_enqueue_script( 'pstul_app', plugin_dir_url( __FILE__ ) . '/assets/js/PSTULApp.js', array('jquery'), SWITCH_TO_UKRAINIAN_LANGUAGE_VERSION, true );
		wp_localize_script( 'pstul_app', 'pstul_app', array(
			'ukraine_code' => UKRAINE_CODE,
		) );
	}

	add_action( 'wp_footer', 'pstul_wp_footer' );
	function pstul_wp_footer(){
		include ROOT_DIR . '/templates/popup.php';
	}
} else {
	add_action( 'admin_notices', 'pstul_admin_notices' );
	function pstul_admin_notices() {
		include ROOT_DIR . '/templates/admin-notices.php';
	}
}
