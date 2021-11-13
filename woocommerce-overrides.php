<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              oxyframe.com
 * @since             1.0.0
 * @package           Woocommerce_Overrides
 *
 * @wordpress-plugin
 * Plugin Name:       Woocommerce Overrides
 * Plugin URI:        oxyframe.com
 * Description:       Overrides all woocommerce templates.
 * Version:           1.0.1
 * Author:            Paul Ryder
 * Author URI:        oxyframe.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-overrides
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Remove Everything first
 */

//  ONE BY ONE
//add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	unset( $enqueue_styles['select2'] );	
	return $enqueue_styles;
}

// OR EVERYTHING
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Get woocommerce to use our templates instead
 */
add_filter( 'woocommerce_locate_template', 'woocommerce_overrides', 1, 3 );
   function woocommerce_overrides( $template, $template_name, $template_path ) {
     global $woocommerce;
     $_template = $template;
     if ( ! $template_path ) 
        $template_path = $woocommerce->template_url;
     $plugin_path  = untrailingslashit( plugin_dir_path( __FILE__ ) )  . '/templates/';
 
    // Look within passed path within the theme - this is priority
    $template = locate_template(
    array(
      $template_path . $template_name,
      $template_name
    )
   );
 
   if( ! $template && file_exists( $plugin_path . $template_name ) )
    $template = $plugin_path . $template_name;
 
   if ( ! $template )
    $template = $_template;

   return $template;
}

/**
 * Enqueue our own stylesheet after everything else
 */
function woo_overrides_styles(){
	wp_register_style( 'woo-overrides', untrailingslashit( plugin_dir_path( __FILE__ ) )  . '/templates/css/woocommerce.css');
	
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'woo-overrides' );
	}
}
add_action( 'wp_enqueue_scripts', 'woo_overrides_styles', 99 );