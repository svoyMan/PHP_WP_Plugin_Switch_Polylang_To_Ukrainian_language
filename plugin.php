<?php
/*
 * Plugin Name: Polylang Switch To Ukrainian language
 * Description: Ukrainian language selection popup
 * Author: My Master
 * Author URI: http://my-master.net.ua/
 * Version: 0.2
 */

define( 'SWITCH_TO_UKRAINIAN_LANGUAGE_VERSION', '0.2' );
define( 'ROOT_DIR', __DIR__ );
define( 'ROOT_URL', plugin_dir_url( __FILE__ ) );

if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_action( 'wp_enqueue_scripts', 'pstul_wp_enqueue_scripts' );
	function pstul_wp_enqueue_scripts(){
		wp_enqueue_style( 'pstul_style', plugin_dir_url( __FILE__ ) . '/assets/css/style.css', array(), SWITCH_TO_UKRAINIAN_LANGUAGE_VERSION );
		wp_enqueue_script( 'pstul_app', plugin_dir_url( __FILE__ ) . '/assets/js/PSTULApp.js', array('jquery'), SWITCH_TO_UKRAINIAN_LANGUAGE_VERSION, true );
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
