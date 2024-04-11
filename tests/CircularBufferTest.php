<?php

namespace Kata\Tests;

use Kata\CircularBuffer;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CircularBufferTest extends TestCase
{
    // Roadmap
    // Test for: Size of Buffer
    // Test for Add with take
    // Test for count
    // Override
    private int $buffersize;
    private CircularBuffer $circularBuffer;

    protected function setUp(): void
    {
        $this->buffersize = 3;
        $this->circularBuffer = new CircularBuffer($this->buffersize);
    }

    #[Test]
    public function sizeOfBuffer(): void
    {
        $circularBuffer = new CircularBuffer($this->buffersize);

        $this->assertSame($this->buffersize, $circularBuffer->size());
    }

    #[Test]
    public function addWithTake(): void
    {
        $this->circularBuffer->add(5);
        $firstElement = $this->circularBuffer->take();
        $this->assertSame(5, $firstElement);
    }

    #[Test]
    public function addTwoElementsTakeFirst(): void
    {

        $this->circularBuffer->add(4);
        $this->circularBuffer->add(6);
        $firstElement = $this->circularBuffer->take();
        $this->assertSame(4, $firstElement);
    }

    #[Test]
    public function moreElementsThanSize(): void
    {
        $this->circularBuffer->add(1);
        $this->circularBuffer->add(2);
        $this->circularBuffer->add(3);
        $this->circularBuffer->add(4);


        self::assertSame(2, $this->circularBuffer->take());
    }

    #[Test]
    public function countReturnsNumberOfItemsInBuffer(): void
        {
            $this->circularBuffer->add(1);
            $this->circularBuffer->add(34);
            $this->circularBuffer->add(78);
            
            self::assertSame(3, $this->circularBuffer->count());
        }
}
