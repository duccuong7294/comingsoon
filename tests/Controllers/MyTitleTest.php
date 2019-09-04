<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 03/09/2019
 * Time: 5:26 CH
 */
namespace ComingsoonTest\Controllers;

use Comingsoon\Controllers\FrontendController;
use Comingsoon\Controllers\MyTitle;
use PHPUnit\Framework\TestCase;

class MyTitleTest extends TestCase
{
    public function testFirstName()
    {
        $oNew = new MyTitle();
        return $this->assertIsArray([]);
    }
    /**
     * @depends testFirstName
     */
    public function testLastName() {
        $oNew = new MyTitle();
        return $this->assertSame('Cuong1', $oNew->lastName());
    }

    /**
     * @depends testLastName
     */
    public function testFullName() {
        $oNew = new MyTitle();
        return $this->assertSame('Cuong1', $oNew->lastName());
    }

}