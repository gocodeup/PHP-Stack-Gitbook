# else

`else` allows us to make our `if` statements succinct by allowing us to simply act one way if a statement is `true`, and another if it is `false`.

## Using else

In our last sub-unit, we used 2 consecutive `if` statements to determine the proper equality of our variables.

~~~php
$a = 5;
$b = 10;

if ($a == $b) {
    echo "$a is equal to $b";
}

if ($a != $b) {
    echo "$a is not equal to $b";
}
~~~

This code rendered the following output:

    5 is not equal to 10

This code tested for one thing, or the other.  `$a` is either equal to `$b` or it isn't.  We can extend our `if` statement with and `else`.

~~~php
$a = 5;
$b = 10;

if ($a == $b) {
    echo "$a is equal to $b";
} else {
    echo "$a is not equal to $b";
}
~~~

We still get the same output.

    5 is not equal to 10

### Ternary Operator

PHP has another way of making short comparisons - the ternary operator `?:`.  Using this, we can make quick comparisons and return a result based on the comparison.

A comparison with the ternary operator would look like this:

~~~php
$age = 22;
$isAdult = $age >= 18 ? true : false;
~~~

This is the same as:

~~~php
$age = 22;
if ($age >=18) {
    $isAdult = true;
} else {
    $isAdult = false;
}
~~~

So we could refactor this:

~~~php
$a = 5;
$b = 10;

if ($a == $b) {
    echo "$a is equal to $b";
} else {
    echo "$a is not equal to $b";
}
~~~

into this:

~~~php
$a = 5;
$b = 10;

echo $a == $b ? "$a is equal to $b" : "$a is not equal to $b";
~~~

The ternary operator is often abused.  Please use with caution; while this can make very short comparisons easy to read and maintain, nesting ternaries or using them for complex solutions is not advised.

## elseif / else if

`else` works very well if we only want to check for two possible outcomes: something is either `true` or it isn't.  However, some things we need to determine are more complex.

### Using elseif / else if

Consider this example, solved with `if` statements.

~~~php
$a = 10;
$b = '10';
~~~

We know from type casting that `$a` and `$b`, when compared with `==` will be `true`, but `$a` is an `integer` and `$b` is a `string`, so `===` will return `false`.

If we wanted to check first for strong equality, then for weak equality, then for any equality, we could do this:

~~~php
$a = 10;
$b = '10';

if ($a === $b) {
    echo "$a is identical to $b";
} elseif ($a == $b) {
    echo "$a is equal to $b";
} else {
    echo "$a is not equal to $b";
}
~~~

This will output

    10 is equal to 10

as they are not identical.

We are not required to have an `else` at the end.  If we did not want to do anything if there was no equality, we could simply drop the final clause.

~~~php
$a = 10;
$b = '10';

if ($a === $b) {
    echo "$a is identical to $b";
} elseif ($a == $b) {
    echo "$a is equal to $b";
}
~~~

This would still output without the 'else' at the end.

    10 is equal to 10

### Code Standards

In all of our examples above, we used the syntax `elseif`. PHP will allow us to separate those two words with a space, writing it as `else if`. Although this is valid syntax most companies will settle on a single formatting for these and other formats. Throughout this course, we have decided to settle on the one-word formatting for our `elseif` statements. For more examples of this, and other coding standards, you can look at our [Code Standards Appendix](../../appendix/control-structures.html#if).

## Exercises

1. Commit your changes after each step. Do not forget to push your code to GitHub when you are done with the exercise.

1. Download [`if_else.php`](../../examples/php/if_else.php) and move it to your `exercises` directory.

1. Follow the `TODO` instructions and refactor our code.

1. Change the values of `$a`, `$b`, and `$c` to test each conditional.  Make sure you get expected results.
