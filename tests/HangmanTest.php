<?php

namespace Kata\Tests;

use Kata\Hangman;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class HangmanTest extends TestCase
{
    // Roadmap
    // Define Class
    // Argument "searchedWord"
    // method guessLetter: Wrong letter -> output dashes
    // method guessLetter: Correct Letter -> output dashes and letter

    #[Test]
    public function hangmanIsInstanceOfHangman(): void
    {
        $hangman = new Hangman('Developer');
        self::assertInstanceOf(Hangman::class, $hangman);
    }

    #[Test]
    public function guessWrongLetter(): void
    {
        $hangman = new Hangman('Developer');
        $result = $hangman->guessLetter('x');
        
        $this->assertSame($result, '---------');
    }

    #[Test]
    public function guessCorrectLetter(): void
    {
        $hangman = new Hangman('Developer');
        $result = $hangman->guessLetter('e');

        $this->assertSame($result, '-e-e---e-');
    }
    
    #[Test]
    public function guessCorrectLetterN(): void
    {
        $hangman = new Hangman('Developer');
        
        $result = $hangman->guessLetter('u');
        $result = $hangman->guessLetter('e');
        $result = $hangman->guessLetter('n');

        $this->assertSame('-e-e---e-', $result);
    }

    /**
     * @test
     */
    public function guessCorrectLetterO(): void
        {
            $hangman = new Hangman('Developer');

            $result = $hangman->guessLetter('u');
            $result = $hangman->guessLetter('e');
            $result = $hangman->guessLetter('n');
            $result = $hangman->guessLetter('o');

            $this->assertSame('-e-e-o-e-', $result);
        }

}
