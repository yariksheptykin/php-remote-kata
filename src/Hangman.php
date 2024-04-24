<?php declare(strict_types=1);

namespace Kata;

final class Hangman
{

    private array $result;
    private string $placeHolder = '-';
    
    public function __construct(private readonly string $searchWord)
    {
        $this->result = array_fill(0, mb_strlen($this->searchWord), $this->placeHolder);
    }

    public function guessLetter(string $letter): string
    {
        $characters = mb_str_split( $this->searchWord, 1);
        foreach ( $characters as $i => $character ) {
            if (strcasecmp( $character, $letter) === 0) {
                $this->result[$i] = $character;
            }
        }
        return implode('',$this->result);
    }
}
