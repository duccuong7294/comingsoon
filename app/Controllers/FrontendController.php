<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 20/08/2019
 * Time: 5:21 CH
 */
namespace Comingsoon\Controllers;

use Comingsoon\Controllers\PluginSettingsController;

//use comingsoon\Controllers\Controller;
/**
 * Class FrontendController
 * @package Comingsoon\Controllers
 */


class FrontendController extends Controller
{
    public function __construct()
    {
        add_action(
            'template_redirect',
            [$this, 'redirectToComingsoon']
        );
        add_action(
            'wp_enqueue_scripts',
            [$this, 'enqueueStyle']
        );
        add_action(
            'wp_enqueue_scripts',
            [$this, 'enqueueScripts']
        );
    }
    public function enqueueStyle()
    {

        wp_register_style
        (
            'bootstrap_min',
            COMINGSOON_BOOSTRAPS_URL . 'bootstrap/css/bootstrap.min.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_style('bootstrap_min');

        wp_register_style
        (
            'animate',
            COMINGSOON_BOOSTRAPS_URL . 'animate/animate.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_style('animate');

        wp_register_style
        (
            'bootstrap_select2',
            COMINGSOON_BOOSTRAPS_URL . 'select2/select2.min.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_style('bootstrap_select2');

        wp_register_style
        (
            'font-awesome',
            COMINGSOON_FONT_URL . 'font-awesome-4.7.0/css/font-awesome.min.css',
            [],
            COMINGSOON_VERSION
        );
       wp_enqueue_style('font-awesome');

        wp_register_style
        (
            'font',
            COMINGSOON_FONT_URL
            . 'iconic/css/material-design-iconic-font.min.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_style('font');

        wp_register_style
        (
            'main',
            COMINGSOON_CSS_URL . 'main.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_style('main');

        wp_register_style
        (
            'util',
            COMINGSOON_CSS_URL . 'util.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_style('util');

    }
    public function enqueueScripts()
    {
        wp_register_script(
            'jquery.minjs',
            COMINGSOON_BOOSTRAPS_URL . 'jquery/jquery-3.2.1.min.js',
//            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('jquery.minjs');

        wp_register_script(
            'js_popper',
            COMINGSOON_BOOSTRAPS_URL . 'bootstrap/js/popper.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('js_popper');
        wp_register_script(
            'js_bootstrap_min',
            COMINGSOON_BOOSTRAPS_URL . 'bootstrap/js/bootstrap.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('js_bootstrap_min');
        wp_register_script(
            'js_select2',
            COMINGSOON_BOOSTRAPS_URL . 'select2/select2.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('js_select2');
        wp_register_script(
            'js_countdown_moment',
            COMINGSOON_BOOSTRAPS_URL . 'countdowntime/moment.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('js_countdown_moment');
        wp_register_script(
            'js_timezone',
            COMINGSOON_BOOSTRAPS_URL . 'countdowntime/moment-timezone.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('js_timezone');
        wp_register_script(
            'js_timezone_data',
            COMINGSOON_BOOSTRAPS_URL
            . 'countdowntime/moment-timezone-with-data.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('js_timezone_data');
        wp_register_script(
            'countdowntime',
            COMINGSOON_BOOSTRAPS_URL . 'countdowntime/countdowntime.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('countdowntime');
        wp_register_script(
            'js_tilt_min',
            COMINGSOON_BOOSTRAPS_URL . 'tilt/tilt.jquery.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('js_tilt_min');
        wp_register_script(
            'myjs_countdown',
            COMINGSOON_SOURCE_DIR . 'js/countdown.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script('myjs_countdown');
    }
    public function redirectToComingsoon()
    {
        if (!is_user_logged_in()) {
            $aOptions = get_option('comingsoon_settings');
            if (isset($aOptions['cCheck'])) {
                $this->loadView(
                    'frontend',
                    $aOptions
                );
                exit;
            }
        }
    }
}