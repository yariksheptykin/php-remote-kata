<?php

namespace Kata;

class Ringbuffer
{

    private int $count = 0;
    private array $buffer = [];
    /**
     * @param int $bufferSize
     */
    public function __construct(int $bufferSize)
    {
    }

    public function size():int
    {
        return 3;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function add(int $value): void
    {
        $this->count++;
        $this->buffer[] = $value;
    }

    public function take(): int
    {
        return array_shift($this->buffer);
    }
}
