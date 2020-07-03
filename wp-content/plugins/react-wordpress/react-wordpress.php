<?php
/**
 * @wordpress-plugin
 * Plugin Name:       React Wordpress
 */

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );


define( 'ERW_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/widget' );
define( 'ERW_ASSET_MANIFEST', ERW_WIDGET_PATH . '/build/asset-manifest.json' );
define( 'ERW_INCLUDES', plugin_dir_path( __FILE__ ) . '/includes' );

require_once( ERW_INCLUDES . '/enqueue.php' );
require_once( ERW_INCLUDES . '/shortcode.php' );

class Rest_Api_Controller extends WP_REST_Controller {
	 function register_routes() {
      $namespace = 'react/v1';
      $path = 'all';

      register_rest_route( $namespace, '/' . $path, [
  	      [ 'methods'             => 'GET',
  	        'callback'            => [ $this, 'get_items'],
  	        'permission_callback' => [ $this, 'get_items_permissions_check' ]
  	      ],
  		]);
      register_rest_route( $namespace, '/product/add' , [
        [ 'methods'             => 'Post',
        'callback'            => [ $this, 'add_product'],
        'permission_callback' => [ $this, 'get_items_permissions_check' ]
        ],
      ]);
    }

    function get_items_permissions_check($request) {
    	return true;
    }

	  function get_items($request) {
       return new WP_REST_Response(['test' => 'test'], 200);
    }

	 function add_product($request) {
			$name  = $request['name'];
      $size  = $request['size'];
			global $wpdb;
			$table_name = $wpdb->prefix . "products";
			$data = $wpdb->insert($table_name, [
				'name' => $name,
				'size' => $size,
			],['%s','%s']);
      if($data) {
        return new WP_REST_Response(['status' => 'success'], 200);
      }
    return new WP_REST_Response(['status' => 'error', 'data' => $data], 400);
  }
}

add_action('rest_api_init', function () {
   $latest_posts_controller = new Rest_Api_Controller();
   $latest_posts_controller->register_routes();
});
