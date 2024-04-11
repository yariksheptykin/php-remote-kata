<?php

namespace Kata;

class CircularBuffer
{
    private array $bufferArray = [];


    public function __construct(private readonly int $size)
    {
    }

    public function size(): int
    {
        return $this->size;
    }

    public function add(int $value): void
    {
        if ($this->isBufferFull()) {
            $this->take();
        }

        $this->bufferArray[] = $value;

    }

    public function take(): int
    {
        return array_shift($this->bufferArray);
    }

    public function count(): int
    {
        return count($this->bufferArray);
    }


    public function isBufferFull(): bool
    {
        return $this->count() >= $this->size;
    }

}
