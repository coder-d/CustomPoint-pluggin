<?php 
/**
 * @package  InpsydeCustomPoint-pluggin
 */
namespace Includes\Base;

use \Includes\Base\BaseController;


/**
* 
*/
class EndPoint extends BaseController
{
	public function register() {
			add_action( 'init', array( $this, 'endPoint' ) );
			add_action( 'parse_request', array( $this, 'endPoint' ) , 0);
		

		}
	/**
		* @param null
		* @return null
		* @description Create a independent endpoint
		*/
		public  function endPoint() {

			global $wp;
	    	$endpoint_vars = $wp->query_vars;

	    	// if endpoint
	    	if ($wp->request == 'inpsyde_custom_end_point') {

	        	// Your own function to process endpoint
	        	self::processEndPoint($this->plugin_url);
	        	exit;
	    	} 
		}

		public function processEndPoint(){

			 $data = self::getApiInfo();
			 require_once dirname( __FILE__, 3 )   . '/templates/userTable.php';
			 
		}
		public static function getApiInfo() {
			
			global $apiInfo; // Check if it's in the runtime cache (saves database calls)
			if( empty($apiInfo) ) $apiInfo = get_transient('api_info'); // Check database (saves expensive HTTP requests)
			if( !empty($apiInfo) ) return $apiInfo;

			$response = wp_remote_get('https://jsonplaceholder.typicode.com/users');
			$data = wp_remote_retrieve_body($response);

			if( empty($data) ) return false;

			$apiInfo = json_decode($data); // Load data into runtime cache
			set_transient( 'api_info', $apiInfo, 24 * HOURS ); // Store in database for up to 12 hours

			return $apiInfo;
		}
}