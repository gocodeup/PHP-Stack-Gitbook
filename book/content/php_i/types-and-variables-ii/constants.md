# Constants

A constant is like a variable in PHP, the main difference being it cannot be changed once it is set, hence then name _constant_.

Constants are used to set simple values that are immutable, or will never change.

## Using Constants

Constants can be named like variables&mdash;they can start with an underscore or any letter, followed by letters, underscores and numbers&mdash;however unlike variables constants do **not** start with `$`.

It is a naming convention that constants are always UPPERCASE.

PHP uses the `define()` function to set the name and value of a constant.

~~~php
define('SIDES_OF_DICE', 6);
~~~

The constant can be accessed by calling it directly.

~~~php
echo SIDES_OF_DICE; // outputs 6
~~~

Now, no matter what, when we call the constant `SIDES_OF_DICE` we'll always get back the same number of sides, in this case 6.

In this example, we have a program named `roll_dice.php` that rolls a set of dice based on the number of sides.

~~~php
<?php

define('SIDES_OF_DICE', 6);

$roll = mt_rand(1, SIDES_OF_DICE);

echo "You rolled {$roll}\n";
~~~

Running this multiple times outputs:

    $ php roll_dice.php
    You rolled 1
    $ php roll_dice.php
    You rolled 5
    $ php roll_dice.php
    You rolled 3

The `SIDES_OF_DICE` is a constant as the die will always have the same number of side.  This should never change.

## Exercises

1. Create a constant called `MY_NAME` that has your name (string) as a value. `echo` the contents.

1. Try to reassign the constant to another name like `MY_NAME = 'Someone Else'`.  What happens?

1. Use the value of the constant in a string. Does it output like a variable?
