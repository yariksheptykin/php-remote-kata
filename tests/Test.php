<?php

namespace Kata\Tests;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testSetup()
    {
        self::assertFalse(true);
    }
    
    public function testanotherTest(): void
    {
        self::assertTrue('ja');
    }
    
}
