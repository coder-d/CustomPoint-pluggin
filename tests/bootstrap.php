<?php
/**
 * The following snippets uses `PLUGIN` to prefix
 * the constants and class names. You should replace
 * it with something that matches your plugin name.
 */
// define test environment
define( 'PLUGIN_PHPUNIT', true );

if ( ! defined( 'PLUGIN_ABSPATH' ) ) {
	define( 'PLUGIN_ABSPATH', sys_get_temp_dir() . '/wp-content/plugins/inpsydeCustomPoint-pluggin/' );
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once(__DIR__ . "/../../../../wp-load.php");
// define fake PLUGIN_ABSPATH

// Includes\Init::register_services();

// Include the class for PluginTestCase
require_once __DIR__ . '/PluginTestCase.php';


// Since our plugin files are loaded with composer, we should be good to go