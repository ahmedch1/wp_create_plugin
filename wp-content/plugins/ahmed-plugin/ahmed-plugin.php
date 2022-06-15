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

use Inc\Base\Activate;
use Inc\Base\Deactivate;

defined('ABSPATH') or die('Hey you can\'t acces this file !');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	require_once dirname(__FILE__). '/vendor/autoload.php';
}

define('PLUGIN_PATH',plugin_dir_path(__FILE__));
define('PLUGIN_URL',plugin_dir_url(__FILE__));
define('PLUGIN',plugin_basename(__FILE__));


/**
 * The code that runs during plugin activation
 */
function activate_ahmed_plugin(){
	Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_ahmed_plugin(){
	Deactivate::deactivate();
}

register_deactivation_hook(__FILE__,'activate_ahmed_plugin');
register_deactivation_hook(__FILE__,'deactivate_ahmed_plugin');


/**
 * Initialize all the core classes of the plugin
 */
if(class_exists('Inc\\Init')){
	Inc\Init::register_services();
}

