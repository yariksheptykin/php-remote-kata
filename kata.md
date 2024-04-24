Hangman
Class Kata “Hangman”

Write a class of Hangman. The instance receives the searched word as a string via the constructor. The class also has a GuessLetter method. The method receives a character as input and checks where the character occurs within the searched word. The method returns the part of the word guessed up to that point.

```php
public class Hangman {
    public __construct(string $searchedWord) { ... }
    public function guessLetter(string $letter): string { ... }
}
```

The following table shows the process using an example.

| Method      | input | output    |
|-------------|-------|-----------|
| ctor        | Developer |       |
| GuessLetter | u | --------- |
| GuessLetter | e  | -e-e---e- |
| GuessLetter | n  | -e-e---e- |
| GuessLetter | o  | -e-e-o-e- |
| GuessLetter | r  | -e-e-o-er |
| GuessLetter | a  | -e-e-o-er |
| GuessLetter | d  | De-e-o-er |
| GuessLetter | l  | De-elo-er |
| GuessLetter | p  | De-eloper |
| GuessLetter | v  | Developer |
