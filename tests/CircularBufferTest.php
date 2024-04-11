<?php

namespace Kata\Tests;

use Kata\CircularBuffer;
use PHPUnit\Framework\TestCase;

class CircularBufferTest extends TestCase
{
    private CircularBuffer $circularBuffer;

    public function setUp(): void
    {
        $this->circularBuffer = new CircularBuffer(3);
        
        parent::setUp();
    }

    public function testAddMultipleElementsToBuffer(): void
    {
        $this->circularBuffer->add(2);
        $this->circularBuffer->add(3);
        
        self::assertSame(2, $this->circularBuffer->take());
        self::assertSame(3, $this->circularBuffer->take());
    }
    
    public function testCountMultipleElementsToBuffer(): void
    {
        $this->circularBuffer->add(2);
        $this->circularBuffer->add(3);

        self::assertSame(2, $this->circularBuffer->count());
    }
    
    public function testAddMoreElementsThanCapacityOfBuffer(): void
    {
        $this->circularBuffer->add(1);
        $this->circularBuffer->add(2);
        $this->circularBuffer->add(3);
        $this->circularBuffer->add(4);
        
        self::assertSame(2, $this->circularBuffer->take());
    }
}
