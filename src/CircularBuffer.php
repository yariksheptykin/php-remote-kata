<?php

namespace Kata;

class CircularBuffer
{

    private array $buffer = [];
    
    public function __construct(int $size)
    {
    }

    public function add(int $element): void
    {
        $this->buffer[] = $element;
    }

    public function take(): int
    {
        return array_shift($this->buffer);
    }
}
