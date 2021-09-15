<?php
/**
 * Created by PhpStorm.
 * @author: svd22286@gmail.com
 * @date: 15.09.2021
 * @time: 08:36
 */
namespace common\tests;

use common\components\OrderedList;

class OrderedListTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected UnitTester $tester;

    protected array $listToOrder = [];

    protected function _before()
    {
        $this->listToOrder = [84,72,99,0,17,76,49,52,13,33,69,73,47,84,37];
    }

    protected function _after()
    {
        $this->listToOrder = [];
    }

    public function testFirst5Elements()
    {
        $list = new OrderedList($this->listToOrder);
        $this->assertEquals([0,13,17,33,37], $list->first(5)->getList());
    }

    public function testLast5Elements()
    {
        $list = new OrderedList($this->listToOrder);
        $this->assertEquals([0,13,17,33,37], $list->first(5)->getList());
    }

    /**
     * @depends testFirst5Elements
     */
    public function testOffset()
    {
        $list = new OrderedList($this->listToOrder);
        $this->assertEquals(
            [13,17,33,37],
            $list
                ->first(5)
                ->offset(1)
                ->getList()
        );
    }
}
