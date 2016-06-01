# Using I/O Streams

PHP provides us with the following [standard streams](http://en.wikipedia.org/wiki/Standard_streams).

STDIN - Accepts input from user
STDOUT - Output responses
STDERR - Output errors

The default for these outputs is to the terminal, however, you could output STDERR to an error log file, for example.

~~~php
// Write the output
// Notice the space after the ?
fwrite(STDOUT, 'What is your first name? ');

// Get the input from user
$firstName = fgets(STDIN);

// Output the user's name
fwrite(STDOUT, "Hello $firstName\n");
~~~

This results in the following prompt

    What is your first name?

When we enter our first name, then hit `enter`, we get the following output

    Hello Codeup

We can call `STDIN` over and over, and we can use `fwrite()` to write to `STDOUT`.  We do this instead of `echo` as `STDOUT` can be set to other output options.

## Exercises

High Low Game!

Welcome to the world of game development!

You are going to build a game using the CLI.

The specs for the game are:
- game picks a random number between 1 and 100.
- prompts user to guess the number
- if user's guess is less than the number, it outputs "HIGHER"
- if user's guess is more than the number, it outputs "LOWER"
- if a user guesses the number, the game should declare "GOOD GUESS!"

Hints:
- Using conditionals and loops here is important
- Random numbers can be made with [the internal `rand()` function](http://us2.php.net/rand)
- If user is right, tell them they won
- While they are wrong, give them hints and keep asking
- Use exit(0) to end the game
- If you get stuck in game, `ctrl-c` will exit.

Create a [new repository](https://github.com/new), name it `High_Low`. Make a new directory in `vagrant-lamp` called `highlow` and `git init` a new local repository there. Use `git remote add origin <url>` to connect your local repository to the remote on GitHub.

After each step, commit your changes with a descriptive message and push to GitHub.

1. Build a working game for high/low meeting these requirements, your results should look similar to this.

    ~~~
    $ php highlow.php
    Guess? 22
    HIGHER
    Guess? 88
    LOWER
    Guess? 44
    HIGHER
    Guess? 55
    HIGHER
    Guess? 66
    HIGHER
    Guess? 77
    HIGHER
    Guess? 83
    LOWER
    Guess? 81
    LOWER
    Guess? 80
    LOWER
    Guess? 78
    GOOD GUESS!
    ~~~

1. Look up `mt_rand()` on [PHP.net](http://php.net) and use it in place of `rand()`.

1. Display number of guesses it took after outputting 'Good Guess!'
