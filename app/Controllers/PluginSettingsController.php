<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 20/08/2019
 * Time: 4:50 CH
 */
namespace Comingsoon\Controllers;

use function Sodium\add;

class PluginSettingsController extends Controller
{
    private $slug = 'comingsoon-settings';
    public function __construct()
    {
        add_action(
            'admin_menu',
            [$this, 'registerMenu']
        );
        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueueScripts']
        );

    }

    public function enqueueScripts()
    {
        $oCurrentScreen = get_current_screen();
        if (!isset($oCurrentScreen->base)
            || strpos(
                   $oCurrentScreen->base,
                   $this->slug
               ) === false
        ) {
            return false;
        }
        wp_enqueue_style('semantic', COMINGSOON_ASSETS_URL . 'semantic/semantic.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_style(
            'abc',
            COMINGSOON_ASSETS_URL . 'abc.css',
            [],
            COMINGSOON_VERSION
        );
        wp_enqueue_script(
            'semantic',
            COMINGSOON_ASSETS_URL . 'semantic/semantic.js',
            ['jquery'],
            COMINGSOON_VERSION,
            true
        );

//        wp_enqueue_script('jquery.minjs');
    }
    public function registerMenu()
    {
        add_menu_page(
            'Comingsoon Settings',
            'Comingsoon Settings',
            'administrator',
            $this->slug,
            [$this, 'comingsoonSettings']
        );

        add_menu_page(
            'Comingsoon 1',
            'CMSOON 1',
            'administrator',
            $this->slug . '1',
            [$this, 'comingsoon1Settings']
        );
    }
    public function comingsoon1Settings()
    {
//        add_filter('hoa','change_wiloke',10,1);

        function change_wiloke()
        {
            $output = "change value";
            return $output;
        }

        if (isset($_POST['cms_settings'])) {
            update_option(
                "cms_setting",
                $_POST['cms_settings']
            );
        }
        $aSetting = get_option("cms_setting");
        $aSetting = wp_parse_args(
            $aSetting,
            [
                'fName' => null,
                'lName' => null
            ]
        );

        include COMINGSOON_VIEWS_DIR . 'comingsoon1.php';
    }
//    public function
    public static function comingsoonSettings()
    {
        $url = add_query_arg(
            [
                'page' => 'comingsoon-settings'
            ],
            admin_url('admin.php')
        );
        if (isset($_POST['comingsoon_settings'])) {
            update_option(
                'comingsoon_settings',
                $_POST['comingsoon_settings']
            );
        }

        $aOptions = get_option('comingsoon_settings');
        $aOptions = wp_parse_args(
            $aOptions,
            [
                'tTitle' => null,
                'dDescription' => null,
                'sStart' => null,
                'eEnd' => null,
                'nNote' =>null
            ]
        );
        $sTime = explode('-',$aOptions['sStart']);
        $eTime = explode('-',$aOptions['eEnd']);
        $y = ($eTime[0] - $sTime[0]);
        $m = ($eTime[1] - $sTime[1]);
        $d = ($eTime[2] - $sTime[2]);
        $dTime = $y*365 + $m*30 + $d ;

        $aOptions['d']=(int)$dTime;

        update_option(
            'comingsoon_settings',
            $aOptions
        );
        include COMINGSOON_VIEWS_DIR . 'coming.php';
    }
}