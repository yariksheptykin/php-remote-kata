<?php
declare(strict_types=1);

namespace Kata;

class Hangman
{
    private array $guessedWord = [];
    public function __construct(private readonly string $secretWord)
    {
        $this->guessedWord = array_fill(0, strlen($this->secretWord), '-');
    }

    public function guessLetter(string $letter): string
    {
        for ($i = 0; $i < strlen($this->secretWord); ++$i) {
            if (strtolower($this->secretWord[$i]) === strtolower($letter)) {
                $this->guessedWord[$i] = $this->secretWord[$i];
            }
        }

        return implode('', $this->guessedWord);
    }
}
