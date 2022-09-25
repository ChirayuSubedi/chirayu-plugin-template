<?php
/**
 * @package ChirayuPlugin
 */
  /*
  Plugin Name: Chirayu Plugin
  Plugin URI: http://chirayu.comPlugin
  Description: My basic knowledge about plugin
  Version: 1.0.0
  Author: Chirayu Subedi
  Author URI: chirayusubedi.com.np
  License: GPLv2 or later
  Text Domain: chirayu-plugin
  */

// If the file is called firectly, abort !!!
defined ( 'ABSPATH' ) or die('Hey, you cant access the file, Thank you');

// Require once the Composer Autoload
if (file_exists (dirname (__FILE__ ). '/vendor/autoload.php') ) {
    require_once dirname (__FILE__ ). '/vendor/autoload.php';
}

// Define CONSTANTS
define ('PLUGIN_PATH', plugin_dir_path(__FILE__ ) );
define ('PLUGIN_URL', plugin_dir_url(__FILE__ ) );
define ('PLUGIN', plugin_basename(__FILE__ ) );

use Inc\Base\Activate;
use Inc\Base\DeActivate;

/**
 * The code that runs during plugin activation
 */
function activate_chirayu_plugin( ) {
    Activate::activate();
}
/**
 * The code that runs during plugin deactivation
 */
function deactivate_chirayu_plugin( ) {
    DeActivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_chirayu_plugin');
register_deactivation_hook(__FILE__, 'deactivate_chirayu_plugin');


if (class_exists ('Inc\\Init')) {
    Inc\Init::register_services();
}
