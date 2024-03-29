<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testKeysSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame(['x', 'y'], $collect->keys()->toArray());
    }

    public function testKeysNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertNotSame(['y', 'x'], $collect->keys()->toArray());
    }

    public function testValuesSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame([1, 2], $collect->values()->toArray());
    }

    public function testValuesNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertNotSame([4, 5], $collect->values()->toArray());
    }

    public function testGetWithKeySame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame(1, $collect->get('x'));
    }

    public function testGetWithKeyNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertNotSame(3, $collect->get('x'));
    }

    public function testGetWithoutKeySame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame(['x' => 1, 'y' => 2], $collect->get());
    }

    public function testGetWithoutKeyNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertNotSame(['z' => 13, 'x' => 67], $collect->get());
    }

    public function testExceptWithArraySame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['x' => 1, 'z' => 3], $collect->except(['y'])->toArray());
    }

    public function testExceptWithArrayNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertNotSame(['y' => 1, 'z' => 2], $collect->except(['y'])->toArray());
    }

    public function testExceptWithMultipleArgumentsSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['y' => 2], $collect->except('x', 'z')->toArray());
    }

    public function testExceptWithMultipleArgumentsNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertNotSame(['z' => 3], $collect->except('x', 'z')->toArray());
    }

    public function testOnlyWithArraySame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['y' => 2], $collect->only(['y'])->toArray());
    }

    public function testOnlyWithArrayNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertNotSame(['y' => 1, 'z' => 2], $collect->only(['y'])->toArray());
    }

    public function testOnlyWithMultipleArgumentsSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['x' => 1, 'z' => 3], $collect->only('x', 'z')->toArray());
    }

    public function testOnlyWithMultipleArgumentsNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertNotSame(['y' => 2], $collect->only('x', 'z')->toArray());
    }

    public function testFirstSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(1, $collect->first());
    }

    public function testFirstNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertNotSame(2, $collect->first());
    }

    public function testCountSame()
    {
        $collect = new Collect\Collect([13,17]);
        $this->assertSame(2, $collect->count());
    }

    public function testCountNotSame()
    {
        $collect = new Collect\Collect([13,17]);
        $this->assertNotSame(10, $collect->count());
    }

    public function testToArraySame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertSame(['x' => 1, 'y' => 2, 'z' => 3], $collect->toArray());
    }

    public function testToArrayNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2, 'z' => 3]);
        $this->assertNotSame([3, 2, 1], $collect->toArray());
    }

    public function testPushSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertSame(['x' => 1, 'y' => 2, 'z' => 3], $collect->push(3, 'z')->toArray());
    }

    public function testPushNotSame()
    {
        $collect = new Collect\Collect(['x' => 1, 'y' => 2]);
        $this->assertNotSame(['x' => 1, 'y' => 2], $collect->push(3, 'z')->toArray());
    }

    public function testUnshiftSame()
    {
        $collect = new Collect\Collect([2, 3]);
        $this->assertSame([1, 2, 3], $collect->unshift(1)->toArray());
    }

    public function testUnshiftNotSame()
    {
        $collect = new Collect\Collect([2, 3]);
        $this->assertNotSame([2, 3, 1], $collect->unshift(1)->toArray());
    }

    public function testShiftSame()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $this->assertSame([2, 3], $collect->shift()->toArray());
    }

    public function testShiftNotSame()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $this->assertNotSame([1], $collect->shift()->toArray());
    }

    public function testPopSame()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $this->assertSame([1, 2], $collect->pop()->toArray());
    }

    public function testPopNotSame()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $this->assertNotSame([1, 2, 3], $collect->pop()->toArray());
    }
}
