<?php
declare(strict_types=1);

namespace Kata\Tests;

use Kata\CircularBuffer;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CircularBufferTest extends TestCase
{
    private CircularBuffer $circularBuffer;
    private int $buffersize;

    protected function setUp(): void
    {
        $this->buffersize = 3;
        $this->circularBuffer = new CircularBuffer($this->buffersize);
    }


    #[Test]
    public function circularBufferIsCreated()
    {
        self::assertSame($this->buffersize, $this->circularBuffer->getSize());
    }

    #[Test]
    public function takeGetsAddedElement(): void
    {
        $someItem = 7;
        $this->circularBuffer->add($someItem);

        self::assertSame($someItem, $this->circularBuffer->take());
    }

    #[Test]
    public function takeGetsFirstElementOfMultiple(): void
    {
        $this->circularBuffer->add(5);
        $this->circularBuffer->add(6);
        self::assertSame(5, $this->circularBuffer->take());
    }

    #[Test]
    public function takeDeletesFirstElementOfMultiple(): void
    {
        $this->circularBuffer->add(5);
        $this->circularBuffer->add(6);
        $this->circularBuffer->take();

        self::assertSame(6, $this->circularBuffer->take());
    }

    #[Test]
    public function addOneMoreElementThanSize(): void
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
        $this->circularBuffer->add(99);
        $this->circularBuffer->add(100);
        
        self::assertSame(2, $this->circularBuffer->count());
    }

}
