<?php

namespace Kata;

class CircularBuffer
{
    public function __construct(
        protected int $size,
        private array $buffer = []
    ) {
    }

    public function Size(): int
    {
        return $this->size;
    }

    public function add(int $int): void
    {
        $this->buffer[] = $int;
    }

    public function take()
    {
        return $this->buffer;
    }
}
