<?php

namespace Kata;

class Hangman
{
    private $guesstedWord;

    public function __construct(private readonly string $searchedWord)
    {
        $this->guesstedWord = '---------';
    }

    public function guessLetter(string $letter): string
    {
        for ($i = 0; $i < strlen($this->searchedWord); $i++) {
            if ($this->searchedWord[$i] === $letter) {
                $this->guesstedWord[$i] = $letter;
            }
        }

        return $this->guesstedWord;
    }
}
