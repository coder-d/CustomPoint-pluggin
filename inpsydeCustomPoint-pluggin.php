<?php
/**
 * @package InpsydeCustomPoint-pluggin
 */
/*
/*
Plugin Name: Inpsyde Custom point
Plugin URI: 
Description: Create and make available a custom NOT A REST endpoint "http://localhost/wordpress/inpsyde_custom_end_point". When a visitor navigates to that endpoint, the plugin send an HTTP request to a REST API endpoint. The API is available at https://jsonplaceholder.typicode.com/ and the endpoint to call is /users.The plugin will parse the JSON response and will use it to build and display an HTML table.
Version: 0.1.0
Author: Debanjan Sengupta
Author URI: 
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

/*
This progrm is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or  any later version.

This program is distribuited in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. see the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software 
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
Copyright 2005-2015 automattic, Inc.
*/



// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
define( 'HOURS', 60 * 60 );
/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Includes\\Init' ) ) {
	Includes\Init::register_services();
}