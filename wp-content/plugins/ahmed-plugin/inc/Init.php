<?php

/**
 * @package AhmedPlugin
 */
namespace Inc;
final class Init{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
    public static function get_services(){
        return [
             Pages\Admin::class,
	         Base\Enqueue::class,
	         Base\SettingsLinks::class
        ];
    }

	/**
	 * Loop through the classes, initialize them, and class the register() method if exists
	 * @return [type] [description]
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
            $service=self::instantiate($class);
            if(method_exists($service,'register')){
                $service->register();
            }
        }
	}

	/**
	 * @param class $class from the services array
	 * @return class instance new instance of the class
	 * @return
	 */
    private static function instantiate($class){
        $service=new $class();
        return $service;
    }
}
//use Inc\Activate;
//use Inc\Deactivate;
//use Inc\Admin\Admin;
//
//require_once plugin_dir_path(__FILE__) . 'inc/Admin/AdminPages.php';
//
//if(!class_exists('AhmedPlugin')) {
//class AhmedPlugin {
//public $plugin;
//function __construct(){
//$this->plugin=plugin_basename(__FILE__);
//}
//function register() {
//add_action('admin_enqueue_scripts',array($this,'enqueue'));
//
//add_action('admin_menu',array($this,'add_admin_pages'));
//
//add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
//}
//public function settings_link($links){
//$settings_link='<a href="admin.php?page=ahmed_plugin">Settings</a>';
//array_push($links,$settings_link);
//return $links;
//}
//public function add_admin_pages(){
//add_menu_page('Ahmed Plugin','Ahmed',
//'manage_options', 'ahmed_plugin',
//array($this,'admin_index'),'dashicons-store',110);
//}
//public function admin_index(){
//require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
////require template
//}
//
//protected function create_post_type() {
//add_action( 'init', array( $this, 'custom_post_type' ) );
//}
//
//function custom_post_type() {
//register_post_type( 'book', array( 'public' => true, 'label' => 'Books' ) );
//}
//
//function enqueue() {
////enqueue all our scripts
//wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
//wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
//}
//
//function activate() {
////			require_once plugin_dir_path( __FILE__ ) . 'inc/ahmed-plugin-activate.php';
//Activate::activate();
//}
//}
//
//$ahmedPlugin = new AhmedPlugin();
//$ahmedPlugin->register();
////	AhmedPlugin::register();
//
////activation
//register_activation_hook( __FILE__, array( $ahmedPlugin, 'activate' ) );
//
////deactivation
//register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );
//
//}
