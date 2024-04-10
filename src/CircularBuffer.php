<?php declare(strict_types=1);

namespace Kata;

final class CircularBuffer
{
    private array $buffer = [];

    public function __construct(readonly private int $buffersize)
    {
    }

    public function getSize(): int
    {
        return $this->buffersize;
    }

    public function add(int $item) : void
    {
        $this->buffer[] = $item;
    }

    public function take() : int
    {
        return array_shift($this->buffer);
    }
}
