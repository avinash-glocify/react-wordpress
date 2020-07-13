<?php
/**
 * @wordpress-plugin
 * Plugin Name:       React Wordpress
 */

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );


define( 'ERW_ERW_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/widget' );
define( 'ERW_ERW_ASSET_MANIFEST', ERW_ERW_WIDGET_PATH . '/build/asset-manifest.json' );
define( 'ERW_ERW_INCLUDES', plugin_dir_path( __FILE__ ) . '/includes' );

require_once( ERW_ERW_INCLUDES . '/enqueue.php' );
require_once( ERW_ERW_INCLUDES . '/shortcode.php' );

class Latest_Posts_Controller extends WP_REST_Controller
{
    public function register_routes() {
        $namespace = 'react/v1';
        $path = 'sendMail';

        register_rest_route( $namespace, '/' . $path, [
          array(
            'methods'             => 'POST',
            'callback'            => array( $this, 'get_items' ),
            'permission_callback' => array( $this, 'get_items_permissions_check' )
          ),

        ]);
      }

    public function get_items_permissions_check($request) {
      return true;
    }

    public function get_items($request)
    {
        $json        = json_decode(file_get_contents('php://input'), true);
        $headers     = $json['csvHeaders'];
        $addData     = $json['formData'];
        $csvData     = $this->createCsv($headers, $addData);
        $fileName    = WP_CONTENT_DIR. '/ad.csv';

        if(file_exists($fileName)) {
          $mailResult = $this->sendMail($fileName);
          if($mailResult) {
            return new WP_REST_Response(['success' => 'Email send Successfullly'], 200);
          } else {
            return new WP_REST_Response(['error' => 'Something Went wrong'], 400);
          }
        } else {
          return new WP_REST_Response(['error' => 'something went wrong'], 400);
        }
    }

    public function sendMail($fileName)
    {
        $adminEmail = get_option( 'admin_email', false );
        $attachments = array($fileName);
        $mailHeader = "From: My Name <".$adminEmail.">" . "\r\n";
        $mailResult = wp_mail($adminEmail, 'Ad Csv Data', ' ', $mailHeader, $attachments);

        if(file_exists($fileName)) {
          unlink($fileName);
        }

        return $mailResult;
    }

    public function createCsv($headers, $addData)
    {
      $csvHeadings = [];
      $csvData     = [];

      foreach ($headers as $key => $header) {
        array_push($csvHeadings, $header['label']);
        array_push($csvData, $addData[$header['key']]);
      }

      header('Content-Type: application/csv');
      header('Content-Disposition: attachment; filename="sample.csv"');

      $fileName = WP_CONTENT_DIR. '/ad.csv';
      $file = fopen($fileName, 'w');

      fputcsv($file, $csvHeadings);
      fputcsv($file, $csvData);
      fclose($file);

      return $file;
    }
}

add_action('rest_api_init', function () {
     $latest_posts_controller = new Latest_Posts_Controller();
     $latest_posts_controller->register_routes();
});
