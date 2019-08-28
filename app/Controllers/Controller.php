<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 21/08/2019
 * Time: 6:28 CH
 */
namespace Comingsoon\Controllers;

//use Jenssegers\Blade\Blade;

/**
 * Class Controller
 * @package comingsoon\Controller
 */
class Controller
{
    public function loadView($viewFile, ... $aData)
    {
        try {
            require_once  COMINGSOON_VIEWS_DIR. $viewFile . ".php";

        } catch (\Exception $oException) {
            throw $oException;
        }
    }
    /**
     * @param       $aMiddleware
     * @param array $aData
     * @throws \Exception
     */

}