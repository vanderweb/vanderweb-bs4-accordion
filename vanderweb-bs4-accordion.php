<?php
/*
Plugin Name: Bootstrap 4 Accordions and Tabs by Vander Web
Plugin URI: https://vander-web.com
Description: Add Accordions Section and Shortcodes
Author: Ulrik Vander
Version: 1.0.0
Author URI: https://vander-web.com
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function vanderweb_accordion_scripts (){
	wp_enqueue_style( 'vanderweb-accordion', plugin_dir_url( __FILE__ ).'css/vanderweb-accordion.css', '', null );
	if(get_option('vanderweb_loadbootstrap') == 'true'):
		wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css', array(), null);
		wp_register_script( 'popper_js', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('jquery'), null );
		wp_enqueue_script('popper_js');
		wp_script_add_data( 'popper_js', array( 'integrity', 'crossorigin' ) , array( 'sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo', 'anonymous' ) );
		wp_register_script('Bootstrap4', '//stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js', array('jquery'), null );
		wp_enqueue_script('Bootstrap4');
	endif;
	if(get_option('vanderweb_loadfontawsome') == 'true'):
		wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css', array(), null);
	endif;
}
add_action( 'wp_enqueue_scripts', 'vanderweb_accordion_scripts', 999 );

function vanderweb_accordion_setup() {
	$languages_path = plugin_basename( dirname( __FILE__ ) . '/languages' );
	load_plugin_textdomain( 'vanderweb-accordion', false, $languages_path );
	
	////////////////////////////////////////////////////////////////////
	// Adds funtions
	////////////////////////////////////////////////////////////////////
	require_once('lib/vanderweb-accordion-sections.php');
	require_once('lib/vanderweb-accordion-settings.php');
	require_once('lib/vanderweb-accordion-shortcodes.php');
}
add_action( 'plugins_loaded', 'vanderweb_accordion_setup' );
?>