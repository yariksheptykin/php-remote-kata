<?php

namespace Kata\Tests;

use PHPUnit\Framework\TestCase;

class CircularBufferTest extends TestCase
{
    private $circularBuffer;

    public function testCircularBufferIsCreated() {
        $buffersize = 3;
        $this->circularBuffer = new \Kata\CircularBuffer( $buffersize);
        self::assertSame($buffersize, $this->circularBuffer->getSize());
        

    }

}
