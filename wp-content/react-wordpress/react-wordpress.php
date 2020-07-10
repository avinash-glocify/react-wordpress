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
