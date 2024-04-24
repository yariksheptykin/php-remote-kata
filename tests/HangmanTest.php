<?php

namespace Kata\Tests;

use Kata\Hangman;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class HangmanTest extends TestCase
{
    #[Test]
    public function GuessWrongLetterReturnsOnlyDashes(): void
    {
        $hangman = new Hangman('Developer');
        self::assertSame('---------', $hangman->guessLetter('x'));
    }
    
    #[Test]
    public function guessValidLetter(): void
    {
        $hangman = new Hangman('Developer');
        self::assertSame('-e-e---e-', $hangman->guessLetter('e'));
    }

    #[Test]
    public function quessInvalidLetterAfterValidLetter(): void
    {
        $hangman = new Hangman('Developer');
        $hangman->guessLetter('e');
        self::assertSame('-e-e---e-', $hangman->guessLetter('n'));
        
    }

    #[Test]
    public function guessSecondValidLetter(): void
    {
        $hangman = new Hangman('Developer');
        $hangman->guessLetter('e');
        $hangman->guessLetter('n');
        self::assertSame('-e-e-o-e-', $hangman->guessLetter('o'));
    }

    #[Test]
    public function guessLowerCaseLetterReturnsUpperCaseLetter(): void
    {
        $hangman = new Hangman('Developer');
        self::assertSame('D--------', $hangman->guessLetter('d'));
    }

    #[Test]
    public function guessAnotherWord(): void
    {   
        $hangman = new Hangman('Php');
        self::assertSame('-h-', $hangman->guessLetter('h'));
    }

    #[Test]
    public function guessMultibyteCharacter(): void
    {
        $hangman = new Hangman('Fuß');
        self::assertSame('--ß', $hangman->guessLetter('ß'));

    }
    
}
