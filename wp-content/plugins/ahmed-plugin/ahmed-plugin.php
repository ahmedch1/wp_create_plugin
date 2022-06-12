<?php
/**
 * @package AhmedPlugin
 */
/*
 * Plugin Name: Ahmed Plugin
 * Plugin URI:
 * Description: Plugin Created by Ahmed For Testing Purposes
 * Version: 1.0.0
 * Author: Ahmed
 * Author URI: ahmedchouihi.com
 */

defined('ABSPATH') or die('Hey you can\'t acces this file !');

if(!class_exists('AhmedPlugin')) {
	class AhmedPlugin {
		public $plugin;
		function __construct(){
			$this->plugin=plugin_basename(__FILE__);
		}
		function register() {
			add_action('admin_enqueue_scripts',array($this,'enqueue'));

			add_action('admin_menu',array($this,'add_admin_pages'));

			add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
		}
		public function settings_link($links){
			$settings_link='<a href="admin.php?page=ahmed_plugin">Settings</a>';
			array_push($links,$settings_link);
			return $links;
		}
		public function add_admin_pages(){
			add_menu_page('Ahmed Plugin','Ahmed',
				'manage_options', 'ahmed_plugin',
				array($this,'admin_index'),'dashicons-store',110);
		}
		public function admin_index(){
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
			//require template
		}

		protected function create_post_type() {
			add_action( 'init', array( $this, 'custom_post_type' ) );
		}

		function custom_post_type() {
			register_post_type( 'book', array( 'public' => true, 'label' => 'Books' ) );
		}

		function enqueue() {
			//enqueue all our scripts
			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
		}

		function activate() {
			require_once plugin_dir_path( __FILE__ ) . 'inc/ahmed-plugin-activate.php';
			AhmedPluginActivate::activate();
		}
	}

	$ahmedPlugin = new AhmedPlugin();
	$ahmedPlugin->register();
//	AhmedPlugin::register();

//activation
	require_once plugin_dir_path(__FILE__) . 'inc/ahmed-plugin-activate.php';
	register_activation_hook( __FILE__, array( $ahmedPlugin, 'activate' ) );

//deactivation
	require_once plugin_dir_path( __FILE__ ) . 'inc/ahmed-plugin-deactivate.php';
	register_deactivation_hook( __FILE__, array( 'AhmedPluginDeactivate', 'deactivate' ) );

}
