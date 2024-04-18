<?php
declare(strict_types=1);

namespace Kata\Tests;

use Kata\Hangman;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * Hangman
 * Class Kata “Hangman”
 *
 * Write a class of Hangman. The instance receives the searched word as a string via the constructor.
 * The class also has a GuessLetter method. The method receives a character as input and checks where
 * the character occurs within the searched word. The method returns the part of the word guessed up to that point.
 *
 * public class Hangman {
 *
 * public Hangman(string searched word) { ... }
 *
 * public string GuessLetter(char letter) { ... }
 *
 * }
 *
 * The following table shows the process using an example.
 *
 *
 *
 * Method input output
 * -----------------------------------
 * ctor Developer
 * GuessLetter u ---------
 * GuessLetter e -e-e---e-
 * GuessLetter n -e-e---e-
 * GuessLetter o -e-e-o-e-
 * GuessLetter r -e-e-o-er
 * GuessLetter a -e-e-o-er
 * GuessLetter d De-e-o-er
 * GuessLetter l De-elo-er
 * GuessLetter p De-eloper
 * GuessLetter v Developer
 */
class HangmanTest extends TestCase
{
    #[Test]
    public function hangman_initially_covers_all_letter(): void
    {
        $hangman = new Hangman('Developer');
        self::assertSame('---------', $hangman->guessLetter('u'));
    }

    #[Test]
    public function hangman_covers_e_letter(): void
    {
        $hangman = new Hangman('Developer');
        self::assertSame('-e-e---e-', $hangman->guessLetter('e'));
    }

    #[Test]
    public function hangman_wrong_guess_after_right(): void
    {
        $hangman = new Hangman('Developer');
        $hangman->guessLetter('e');
        self::assertSame('-e-e---e-', $hangman->guessLetter('z'));
    }
    
    #[Test]
    public function hangman_guess_two_letters(): void
    {
        $hangman = new Hangman('Developer');
        $hangman->guessLetter('e');
        self::assertSame('-e-e-o-e-', $hangman->guessLetter('o'));
    }
}
