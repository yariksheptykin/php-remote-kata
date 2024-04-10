<?php declare(strict_types=1);

namespace Kata;

final readonly class CircularBuffer
{
    public function __construct(private int $buffersize)
    {
    }

    public function getSize(): int
    {
        return $this->buffersize;
    }
}
