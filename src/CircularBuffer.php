<?php

namespace Kata;

class CircularBuffer
{
    private array $buffer = [];

    public function __construct(private readonly int $size)
    {
    }

    public function add(int $element): void
    {
        if (count($this->buffer) === $this->size) {
            $this->take();
        }
        
        $this->buffer[] = $element;
    }

    public function take(): int
    {
        return array_shift($this->buffer);
    }

    public function count(): int
    {
        return count($this->buffer);
    }
}
