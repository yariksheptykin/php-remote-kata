<?php

namespace Kata\Tests;

use Kata\CircularBuffer;
use PHPUnit\Framework\TestCase;

class CircularBufferTest extends TestCase
{
    public function testAddMultipleElementsToBuffer(): void
    {
        $circularBuffer = new CircularBuffer(3);
        $circularBuffer->add(2);
        $circularBuffer->add(3);
        
        self::assertSame(2, $circularBuffer->take());
        self::assertSame(3, $circularBuffer->take());
    }
    
    public function testCountMultipleElementsToBuffer(): void
    {
        $circularBuffer = new CircularBuffer(3);
        $circularBuffer->add(2);
        $circularBuffer->add(3);

        self::markTestIncomplete('to be done by teo');
        self::assertSame(2, $circularBuffer->count());
    }
}
