<?php
/**
* Plugin Name: Project Go-Gallery
* Plugin URI: https://www.graywelldesign.com
* Description: create amazing post carousel gallery using masonry grid and includes category filter
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Mariano Barrionuevo, Graywell Design
* Author URI: https://www.graywelldesign.com
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: gwd-go-gallery
* Domain Path: /languages
*/

 if ( ! defined( 'ABSPATH' ) ) exit;
/* requires */
require_once plugin_dir_path(__FILE__) . 'includes/go-postype.php'; 
require_once plugin_dir_path(__FILE__) . 'includes/go-roles.php'; 
require_once plugin_dir_path(__FILE__) . 'includes/go-shortcode.php'; 
require_once plugin_dir_path(__FILE__) . 'includes/go-rev-shortcode.php'; 
require_once plugin_dir_path(__FILE__) . 'includes/go-script.php';
require_once plugin_dir_path(__FILE__) . 'includes/go-res-ajx.php'; 
require_once plugin_dir_path(__FILE__) . 'includes/go-res-md-ajx.php';  


/* activations */
register_activation_hook(__FILE__, 'go_galery_rewrite_flush');
register_activation_hook(__FILE__, 'go_gallery_add_role' );
register_activation_hook(__FILE__, 'go_gallery_add_capabilities' );

/* deactivations */
register_deactivation_hook(__FILE__, 'go_gallery_remove_role' );
register_deactivation_hook(__FILE__, 'go_gallery_remove_capabilities' );