<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */

// create ìnfomation for plugin
/*
Plugin Name: Coming Soon
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: WilokeComingsoon\Controllers\FrontendController
Version: 1.0
Author URI: http://wiloke.com
*/



require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require_once plugin_dir_path(__FILE__) . 'configs/general.php';
//require( dirname( __FILE__ ) . '/wp-blog-header.php' );

//define( 'WP_USE_THEMES', true );

if (is_admin()) {
    new Comingsoon\Controllers\PluginSettingsController();
} else {
    new Comingsoon\Controllers\FrontendController();
}


