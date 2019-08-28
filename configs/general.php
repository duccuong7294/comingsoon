<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 26/08/2019
 * Time: 8:53 SA
 */


/*
Plugin Name: Coming Soon
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Wiloke
Version: 1.0
Author URI: http://wiloke.com
*/


define('COMINGSOON_ASSETS_DIR', plugin_dir_path(__DIR__) . 'assets/');
/**
 * COMINGSOON_ASSETS_URL
 */
define('COMINGSOON_ASSETS_URL', plugin_dir_url(__DIR__) . 'assets/');

define('COMINGSOON_VIEWS_DIR', plugin_dir_path(__DIR__).'views/');

define('COMINGSOON_VIEW_FRONTEND',plugin_dir_path(__DIR__).'views/');

define('COMINGSOON_CSS_DIR', plugin_dir_path(__DIR__).'sources/css/');

define('COMINGSOON_SOURCE_DIR', plugin_dir_url(__DIR__).'sources/');

define('COMINGSOON_CSS_URL', plugin_dir_url(__DIR__).'sources/css/');

define('COMINGSOON_BOOSTRAPS_URL', plugin_dir_url(__DIR__).'sources/vendor/');

define('COMINGSOON_FONT_URL',plugin_dir_url(__DIR__).'sources/fonts/');

define('COMINGSOON_VERSION', '1.0');

