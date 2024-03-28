<?php

declare(strict_types=1);

namespace Kata\Tests;

use Kata\Ringbuffer;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;


class RingbufferTest extends TestCase
{
    private Ringbuffer $ringBuffer;
    private int $bufferSize;

    protected function setUp(): void
    {
        $this->bufferSize = 3;
        $this->ringBuffer = new Ringbuffer($this->bufferSize);
    }


    #[Test]
    public function sizeIsThreeOnInit(): void
    {
        self::assertSame($this->bufferSize, $this->ringBuffer->size());
    }

    #[Test]
    public function countZeroOnInit()
    {
        self::assertSame(0, $this->ringBuffer->count());
    }

    #[Test]
    public function countMustBeOneAfterElementIsAdded(): void
    {
        $this->ringBuffer->add(PHP_INT_MAX);

        self::assertSame(1, $this->ringBuffer->count());
    }

    #[Test]
    public function countMustBeTwoAfterTwoElementsAreAdded(): void
    {
        $this->ringBuffer->add(PHP_INT_MAX);
        $this->ringBuffer->add(PHP_INT_MAX);

        self::assertSame(2, $this->ringBuffer->count());
    }

    #[Test]
    public function takeFirstElement()
    {
        $element = 1;
        $this->ringBuffer->add($element);
        
        self::assertSame($element, $this->ringBuffer->take());
    }

    #[Test]
    public function takeTwoElements(): void
    {
        $element1 = 3;
        $element2 = 2;
        $this->ringBuffer->add($element1);
        $this->ringBuffer->add($element2);
        $this->ringBuffer->take();
                
        self::assertSame($element2, $this->ringBuffer->take());
    }
}
