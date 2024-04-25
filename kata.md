# Hangman

## Class Kata “Hangman”

Write a class of Hangman. 
The instance receives the searched word as a string via the constructor. 
The class also has a GuessLetter method. The method receives a character as input and checks where the character occurs within the searched word. 
The method returns the part of the word guessed up to that point.

```php
public class Hangman {
    public __construct(string $searchedWord) { ... }
    public function guessLetter(string $letter): string { ... }
}
```

The following table shows the process using an example.

| Method      | input | output    |
|-------------|-------|-----------|
| construct   | 'Developer' |       |
| guessLetter | 'u' | '---------' |
| guessLetter | 'e'  | '-e-e---e-' |
| guessLetter | 'n'  | '-e-e---e-' |
| guessLetter | 'o'  | '-e-e-o-e-' |
| guessLetter | 'r'  | '-e-e-o-er' |
| guessLetter | 'a'  | '-e-e-o-er' |
| guessLetter | 'd'  | 'De-e-o-er' |
| guessLetter | 'l'  | 'De-elo-er' |
| guessLetter | 'p'  | 'De-eloper' |
| guessLetter | 'v'  | 'Developer' |
