<?php

namespace Kata\Tests;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testSetup()
    {
        self::assertTrue(false);
    }
    
    public function testanotherTest(): void
    {
        self::assertTrue('Never trust a test you did not see failing');
    }
    
}
