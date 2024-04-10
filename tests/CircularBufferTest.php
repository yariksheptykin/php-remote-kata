<?php

namespace Kata\Tests;

use Kata\CircularBuffer;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertSame;

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
    public function circularBufferIsCreated() {
        

        self::assertSame($this->buffersize, $this->circularBuffer->getSize());
    }

    #[Test]
    public function takeGetsAddedElement(): void
    {
        $someItem = 7;
        $this->circularBuffer->add($someItem);

        self::assertSame($someItem, $this->circularBuffer->take());
    }
    
}
