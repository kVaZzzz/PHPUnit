<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testCount()
    {
        $collect = new Collect\Collect([13, 17]);
        $this->assertSame(2, $collect->count());
    }

    public function testCountNegative()
    {
        $collect = new Collect\Collect([13, 17]);
        $this->assertNotSame(1, $collect->count());
    }

    public function testKeys()
    {
        $collect = new Collect\Collect(['Papa' => 2, 'Mama' => 1]);
        $this->assertSame(['Papa', 'Mama'], $collect->keys()->toArray());
    }

    public function testKeysNegative()
    {
        $collect = new Collect\Collect(['Papa' => 1, 'Mama' => 2]);
        $this->assertNotSame(['Papa', 'Son'], $collect->keys()->toArray());
    }

    public function testValues()
    {
        $collect = new Collect\Collect([321, 213, 321]);
        $this->assertSame([321, 213, 321], $collect->values()->toArray());
    }

    public function testValuesNegative()
    {
        $collect = new Collect\Collect([321, 213, 321]);
        $this->assertNotSame([321, 213], $collect->values()->toArray());
    }

    public function testFirst()
    {
        $collect = new Collect\Collect(['sda' => 1, 'qwe' => 2, 'asd' => 3],);
        $this->assertSame(1, $collect->first());
    }

    public function testFirstNegative()
    {
        $collect = new Collect\Collect(['sda' => 1, 'qwe' => 2, 'asd' => 3]);
        $this->assertNotEquals(2, $collect->first());
    }

    public function testSearch()
    {
        $collect = new Collect\Collect([
            ['sda' => 1, 'qwe' => 1], ['sda' => 2, 'qwe' => 2], ['sda' => 3, 'qwe' => 1]]);
        $result = $collect->search('qwe', 1)->toArray();
        $this->assertSame([['sda' => 1, 'qwe' => 1], ['sda' => 3, 'qwe' => 1]], $result);
    }

    public function testPop()
    {
        $collect = new Collect\Collect([213, 32, 5]);
        $collect->pop();
        $this->assertSame([213, 32], $collect->toArray());
    }

    public function testPopNegative()
    {
        $collect = new Collect\Collect([213, 32, 5]);
        $collect->pop();
        $this->assertNotSame([5], $collect->toArray());
    }

    public function testShift()
    {
        $collect = new Collect\Collect([213, 32, 5]);
        $collect->shift();
        $this->assertSame([32, 5], $collect->toArray());
    }

    public function testShiftNegative()
    {
        $collect = new Collect\Collect([213, 32, 5]);
        $collect->shift();
        $this->assertNotSame([32], $collect->toArray());
    }

    public function testUnshift()
    {
        $collect = new Collect\Collect([43, 123]);
        $collect->unshift(313);
        $this->assertSame([313, 43, 123,], $collect->toArray());
    }

    public function testUnshiftNegative()
    {
        $collect = new Collect\Collect([43, 123]);
        $collect->unshift(313);
        $this->assertNotSame([43, 123, 313], $collect->toArray());
    }
}