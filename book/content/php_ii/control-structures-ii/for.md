# for

`for` loops take 3 arguments, and operate based on a condition much like `if` statements and `while` loops.

We can write a `for` loop like this:

~~~php
for (expr1; expr2; expr3) {
    statement
}
~~~

The first expression is executed the first time the `for` loop is encountered.

The second expression is the conditional that determines if the code block is run.  If the result of the condition is `true`, the code inside the curly braces is executed.

The last expression is executed after each pass of the loop.

## Using for

When we were learning `while` loops, we wanted to count from 1 to 5, so we wrote this:

~~~php
$a = 1;
while ($a <= 5) {
    echo "\$a has a value of {$a}\n";
    $a++;
}
~~~

In 5 simple lines of code, we set `$a` to `1`, wrote its value out on a new line if `$a` was less than or equal to `5`, and after each output we increased the value of `$a` by `1`.

We can shorten this by 40% using a `for` loop.

~~~php
for ($a = 1; $a <= 5; $a++) {
    echo "\$a has a value of {$a}\n";
}
~~~

This reads "Set the value of variable `$a` to 1, while `$a` is less than or equal to `5` output its value on each line, and increase `$a` by 1 each time it loops".  This is exactly the same as our `while` loop, just much more concise.

When the incrementer is only being used for the loop, it makes sense to use a throwaway variable that will not be used later.

It is very common for the variable `$i` to be used in `for` loops.  By using `$i` as the incrementer variable, it is understood that `$i` is to be used only in these loops, and will not be used elsewhere in the program.

If we wanted to count to 100 by 2's, we could simply do this:

~~~php
for ($i = 0; $i <= 100; $i += 2) {
    echo "\$i has a value of {$i}\n";
}
~~~

## Exercises

Create a file named `for.php` in your exercises repo.  Commit and push all changes after each step.

1. Prompt user for a starting number and ending number, then display all the numbers from the starting to ending using a `for` loop.

1. Refactor to allow user to choose increment. (count by 1, 2, 10, ...)

1. Default increment to 1 if no input.

1. Make sure you are only allowing users to pass in numbers.  Give an error message is both passed arguments are not numeric.  See [php.net/is_numeric](http://www.php.net/is_numeric).

### FizzBuzz

One of the most common interview questions for entry-level programmers is the _FizzBuzz_ test.  Developed by Imran Ghory, the test is designed to test basic looping and conditional logic skills.  The test can be solved using what you have learned so far, namely a `for` loop and some `if` statements, with a few `echo` statements.

On his [blog](http://imranontech.com/2007/01/24/using-fizzbuzz-to-find-developers-who-grok-coding/), Ghory explains a FizzBuzz problem:

    Write a program that prints the numbers from 1 to 100. But for multiples of three print “Fizz” instead of the number and for the multiples of five print “Buzz”. For numbers which are multiples of both three and five print “FizzBuzz”.

1. Create a file named `fizzbuzz.php` in your exercises repo.  Commit and push when complete.  Your output should look like this:

    ~~~
    1
    2
    Fizz
    4
    Buzz
    Fizz
    7
    8
    Fizz
    Buzz
    11
    Fizz
    13
    14
    FizzBuzz
    16
    17
    Fizz
    19
    Buzz
    Fizz
    22
    23
    Fizz
    Buzz
    26
    Fizz
    28
    29
    FizzBuzz
    31
    32
    Fizz
    34
    Buzz
    Fizz
    37
    38
    Fizz
    Buzz
    41
    Fizz
    43
    44
    FizzBuzz
    46
    47
    Fizz
    49
    Buzz
    Fizz
    52
    53
    Fizz
    Buzz
    56
    Fizz
    58
    59
    FizzBuzz
    61
    62
    Fizz
    64
    Buzz
    Fizz
    67
    68
    Fizz
    Buzz
    71
    Fizz
    73
    74
    FizzBuzz
    76
    77
    Fizz
    79
    Buzz
    Fizz
    82
    83
    Fizz
    Buzz
    86
    Fizz
    88
    89
    FizzBuzz
    91
    92
    Fizz
    94
    Buzz
    Fizz
    97
    98
    Fizz
    Buzz
    ~~~
