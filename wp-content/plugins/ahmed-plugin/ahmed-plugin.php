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

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	require_once dirname(__FILE__). '/vendor/autoload.php';
}

define('PLUGIN_PATH',plugin_dir_path(__FILE__));
define('PLUGIN_URL',plugin_dir_url(__FILE__));
if(class_exists('Inc\\Init')){
	Inc\Init::register_services();
}

