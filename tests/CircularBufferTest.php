<?php

namespace Kata\Tests;

use Kata\CircularBuffer;
use PHPUnit\Framework\TestCase;

class CircularBufferTest extends TestCase
{
    public function testInstantiateCircularBuffer(): void
    {
        self::assertInstanceOf(CircularBuffer::class, new CircularBuffer(3));
    }

    public function testCircularBufferSize(): void
    {
        $size = 5;
        $circularBuffer = new CircularBuffer($size);

        self::assertEquals($size, $circularBuffer->Size());
    }

    /**
     * @test
     */
    public function testAddElementToCircularBuffer(): void
    {
        $size = 5;
        $circularBuffer = new CircularBuffer($size);
        $circularBuffer->add(1);
        self::assertSame(1, $circularBuffer->take());
    }

    /**
     * @test
     */
    public function testAddMultipleElementsToCircularBuffer(): void
    {
        $size = 5;
        $circularBuffer = new CircularBuffer($size);
        $circularBuffer->add(1);
        $circularBuffer->add(2);
        self::assertSame(2, $circularBuffer->take());
    }
}
