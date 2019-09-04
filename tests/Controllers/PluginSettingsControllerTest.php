<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 03/09/2019
 * Time: 5:07 CH
 */
namespace ComingsoonTest\Controllers;

use PHPUnit\Framework\TestCase;

class PluginSettingsControllerTest extends TestCase
{
    public function testCai()
    {
        $aOptions = get_option('comingsoon_settings');
        $this->assertSame('Coming Soon1', $aOptions['tTitle']);
    }
}