<?php

namespace Netsan\Helper;

class ArrayChainTest extends \PHPUnit_Framework_TestCase
{
    private $array = [
        'name' => 'netsan',
        'info' => [
            'sex' => 'male'
        ]
    ];

    /**
     * @covers Netsan\Helper\ArrayChain::make()
     */
    public function testMakeReturnsInstanceOfArrayChain()
    {
        $this->assertInstanceOf('Netsan\Helper\ArrayChain', ArrayChain::make([]));
    }

    /*
     * @covers Netsan\Helper\ArrayChain::has()
     * @covers Netsan\Helper\ArrayChain::get()
     */
    public function testHasAndGet()
    {
        $instance = ArrayChain::make($this->array);
        $this->assertTrue($instance->has('name'));
        $this->assertFalse($instance->has('age'));

        $this->assertSame('netsan', $instance->get('name'));
        $this->assertSame('male', $instance->get('info')->get('sex'));
        $this->assertSame(0, $instance->get('level', 0));
        return $instance;
    }

    /**
     * @covers Netsan\Helper\ArrayChain::toArray()
     * @depends testHasAndGet
     */
    public function testToArray(ArrayChain $instance)
    {
        $this->assertSame($this->array, $instance->toArray());
    }
}
