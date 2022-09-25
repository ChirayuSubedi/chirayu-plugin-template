<?php

/**
 * @package ChirayuPlugin
 */
  namespace Inc;

 final class Init
  {

    /**store all the classes inside an array
     * @reutrn array Full Lists of classes
     */
    public static function get_services() 
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingLinks::class

        ];
    }
    /**Loop through the classes, initialize them, 
     * and call the register () method if it exist
     * @reutrn [type] [description]
     */
    

    public static function register_services()
    {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class);
            if(method_exists ($service, 'register') ){
                $service->register();
            }
        }
    }
    
    /**Initatlize the class
     * @param class $class form the serives array
     * @reutrn class instance new instance of the class
     */
    private static function instantiate ( $class) 
    {
        $service = new $class();

        return $service;
    }
 }

// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Pages\Admin;


// if ( !class_exists ('ChirayuPlugin') ) {

//     class ChirayuPlugin 
//     {
//          public $plugin;

//          function __construct() {
//             $this->plugin = plugin_basename(__FILE__);
//          }

//         function register() {
//             add_action('admin_enqueque_scripts', array( $this, 'enqueue' ) );

//             

//             add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
            
//         }

//         public function settings_link($links) {
//             //  add custom setting link
//             $settings_link = '<a href= "admin.php?page=chirayu_plugin">Settings</a>';
//             array_push($links, $settings_link);
//             return $links;
//         }

//         public function add_admin_pages() {
//             add_menu_page('Chirayu Plugin', 'Chirayu', 'manage_options', 'chirayu_plugin', array($this, 'admin_index'), 'dashicons-dashboard', 110);
//         }

//         public function admin_index() {
//             //require template
//             require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
//         }

//         function create_post_type() {
//             add_action('init', array(  $this, 'custom_post_type'));
//         }
        

//         function custom_post_type() {
//             register_post_type ( 'book', ['public' => true, 'label' => 'books'] );

//         }

//         

//         function activate() {
//             // require_once plugin_dir_path( __FILE__ ) . 'inc/chirayu-plugin-activate.php';
//             ChirayuPluginActivate::Activate();
//         }
//         function Deactivate() {
//             // require_once plugin_dir_path( __FILE__ ) . 'inc/chirayu-plugin-activate.php';
//             ChirayuPluginActivate::Deactivate();
//         }
       
//     }




//     $chirayuPlugin = new ChirayuPlugin();
//     $chirayuPlugin->register();
     
    




//  // activation
 
// // register_activation_hook( __FILE__ , array ( 'ChirayuPluginActivate', 'activate' ) ); 

// // deactivation
// // require_once plugin_dir_path( __FILE__ ) . 'inc/chirayu-plugin-deactivate.php';
// // register_deactivation_hook( __FILE__ , array ( 'ChirayuPluginDeActivate', 'deactivate' ) ); 

// }