<?php
declare(strict_types=1);

namespace Kata\Tests;

use Kata\Hangman;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Throwable;

class HangmanTest extends TestCase
{
    #[Test]
    public function guess_a_wrong_letter(): void
    {
        $hangman = new Hangman('Developer');
        self::assertSame('---------', $hangman->guessLetter('u'));
    }

    #[Test]
    public function guess_a_correct_letter(): void
    {
        $hangman = new Hangman('Developer');
        self::assertSame('-e-e---e-', $hangman->guessLetter('e'));
    }
    
    #[Test]
    public function guess_another_incorrect_letter(): void
    {
        $hangman = new Hangman('Developer');
        $hangman->guessLetter('e');
        
        self::assertSame('-e-e---e-', $hangman->guessLetter('n'));
    }
    
    #[Test]
    public function guess_another_correct_letter(): void
    {
        $hangman = new Hangman('Developer');
        $hangman->guessLetter('e');
        $hangman->guessLetter('r');
        self::assertSame('-e-e---er', $hangman->guessLetter('r'));
        
    }

    #[Test]
    public function guess_correct_letter_for_different_case(): void
    {
        $hangman = new Hangman('DifferentWord');
        self::assertSame('--ff---------', $hangman->guessLetter('f'));
    }

    /**
     * @test
     */
    public function guested_letter_is_case_insensitive(): void
    {
        $hangman = new Hangman('DifferentWord');
        self::assertSame('D-----------d', $hangman->guessLetter('d'));
    }

    /**
     * @test
     */
    public function can_handle_unicode(): void
    {
        $hangman = new Hangman('Țâță');
        self::assertSame('---ă', $hangman->guessLetter('ă'));
    }
}
