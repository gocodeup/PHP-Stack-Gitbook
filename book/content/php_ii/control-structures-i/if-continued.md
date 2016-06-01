# if (continued)

Control structures become more powerful when combined with comparison and logical operators.

## Using if with logical operators

In the previous sub-unit, we compared variables using the comparison operators (`==`, `===`, `!=`, `!==`).

~~~php
if ($a == $b) {
    echo "$a is equal to $b";
}

if ($a != $b) {
    echo "$a is not equal to $b";
}
~~~

While these comparisons are useful, we can harness much more power by adding logical operators to our expressions.

### Using OR

In the prework, examples like this one were given:

    If I win the lottery or it rains, then I will by a new car.

This can be expressed in PHP like this:

~~~php
$wonLottery = false;
$isRaining = true;

if ($wonLottery || $isRaining) {
    echo "I'm buying a new car!\n";
}
~~~

Here we are setting some variables, then our expression reads _if $wonLottery or $isRaining is true, then echo string_.

### Using AND

Logically, _or_ and _and_ are wildly different.  `||` means if either are true, then the expression is true.  `&&` is the opposite; only if both are true does the expression evaluate as truthful.

    If I win the lottery and it rains, then I will by a new car.

This we can write in PHP using `&&`.

~~~php
$wonLottery = false;
$isRaining = true;

if ($wonLottery && $isRaining) {
    echo "I'm buying a new car!\n";
}
~~~

### Using NOT

In PHP, the logical operator _not_ is `!`.

We've already used this for _not equal_ `!=` and _not identical_ `!==`.

Adding `!` to expressions changes the check from expecting `true` to expecting `not true`.

Here we are using a PHP function called `is_bool()` that returns `true` if a value is a boolean, and `false` if it is not.

~~~php
$isRaining = true;

if (is_bool($isRaining)) {
    echo "{$isRaining} is expected type of boolean\n";
}
~~~

If we wanted to check if `$isRaining` is _not_ a boolean, we could use `!`.

~~~php
$isRaining = true;

if (!is_bool($isRaining)) {
    echo "WARNING: {$isRaining} is expected type of boolean - unexpected results may occur\n";
}
~~~

If we decided we only wanted to buy a car if it was _not_ raining, we could do this.

~~~php
$isRaining = false;

if (!$isRaining) {
    echo "I'm buying a new car!\n";
}
~~~

## Exercises

Using logical operators, solve the following problems.

1. After you complete each step commit your changes with git. At the end of the exercise push your commits to GitHub.

1. Download [`if_and_or.php`](../../examples/php/if_and_or.php) and move it to your `exercises` directory.

1. Read the comments in that file and follow instructions.

1. When you are complete, `if_and_or.php` should have 7 `if` blocks. Test your file in the Vagrant environment by running `php if_and_or.php`. It should produce the following output:

        0 < 5 < 10
        0 is less than 0 OR 0 is less than 10
        0 is less than 5 OR 5 is less than 10
        0 is less than 10 OR 10 is less than 10
        0 is less than 5 AND 5 is less than 10
