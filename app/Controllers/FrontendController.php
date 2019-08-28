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

class FrontendController extends Controller
{
    public function __construct()
    {
        add_action('template_redirect', [$this, 'redirectToComingsoon']);
        add_action(
            'wp_head',
            [ $this , 'enqueueStyle' ]
        );
        add_action(
            'wp_footer',[$this,'enqueueScripts']
        );
    }

    public function enqueueStyle()
    {
        wp_enqueue_style
        (
        'main',
        COMINGSOON_CSS_URL . 'main.css',
        [],
        COMINGSOON_VERSION
        );
        wp_enqueue_style
        (
        'util',
        COMINGSOON_CSS_URL . 'util.css',
        [],
        COMINGSOON_VERSION
        );
        wp_enqueue_style
        (
        'bootstrap_min',
            COMINGSOON_BOOSTRAPS_URL . 'bootstrap/css/bootstrap.min.css',
        [],
        COMINGSOON_VERSION
        );
        wp_enqueue_style
        (
        'bootstrap_min',
            COMINGSOON_BOOSTRAPS_URL . 'animate/animate.css',
        [],
        COMINGSOON_VERSION
        );
        wp_enqueue_style
        (
        'bootstrap_min',
            COMINGSOON_BOOSTRAPS_URL . 'select2/select2.min.css',
        [],
        COMINGSOON_VERSION
        );
        wp_enqueue_style
        (
        'bootstrap_min',
            COMINGSOON_FONT_URL .'font-awesome-4.7.0/css/font-awesome.min.css',
        [],
        COMINGSOON_VERSION
        );
        wp_enqueue_style
        (
        'font',
            COMINGSOON_FONT_URL .'iconic/css/material-design-iconic-font.min.css',
        [],
        COMINGSOON_VERSION
        );

    }

    public function enqueueScripts()
    {
        wp_enqueue_script(
            'js55',
            COMINGSOON_BOOSTRAPS_URL.'jquery/jquery-3.2.1.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js21',
            COMINGSOON_BOOSTRAPS_URL . 'bootstrap/js/popper.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js45',
            COMINGSOON_BOOSTRAPS_URL . 'bootstrap/js/bootstrap.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js10',
            COMINGSOON_BOOSTRAPS_URL . 'select2/select2.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js11',
            COMINGSOON_BOOSTRAPS_URL . 'countdowntime/moment.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js12',
            COMINGSOON_BOOSTRAPS_URL . 'countdowntime/moment-timezone.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js1',
            COMINGSOON_BOOSTRAPS_URL . 'countdowntime/moment-timezone-with-data.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js2',
            COMINGSOON_BOOSTRAPS_URL . 'countdowntime/countdowntime.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js',
            COMINGSOON_BOOSTRAPS_URL . 'tilt/tilt.jquery.min.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
        wp_enqueue_script(
            'js4',
            COMINGSOON_SOURCE_DIR . 'js/countdown.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );
    }
    public function redirectToComingsoon()
    {
        if(!is_user_logged_in() )
        {
            $aOptions = get_option('comingsoon_settings');
//            var_dump($aOptions['cCheck']);
            if (isset($aOptions['cCheck']))
            {
                $this->loadView('frontend',$aOptions);
            }
            wp_redirect( home_url( 'blog/wp-login.php?loggedout=true' ));
            die;
        }
    }
}