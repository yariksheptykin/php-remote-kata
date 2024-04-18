<?php

namespace Kata;

class Hangman
{
    private array $result = [];

    public function __construct(private readonly string $searchedWord)
    {
        $this->result = array_fill(0, strlen($this->searchedWord), '-');
    }

    public function guessLetter(string $letter): string
    {
        $numbersOfLetters = strlen($this->searchedWord);
        for ($count = 0; $count < $numbersOfLetters; $count++) {
            if ($this->searchedWord[$count] === $letter) {
                $this->result[$count] = $letter;
            }
        }

        return implode('', $this->result);
    }
}
