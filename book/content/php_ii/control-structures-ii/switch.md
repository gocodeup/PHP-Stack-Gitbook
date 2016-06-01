# switch

The `switch` structure allows us to check for multiple conditions more elegantly than a list of `if` statements.

## Using switch

Using `if-else` statements, we can imaging writing things like this:

~~~php
$value = 'Hello!';

if (is_int($value)) {
    echo '$value is an integer';
} elseif (is_float($value)) {
    echo '$value is a float';
} elseif (is_bool($value)) {
    echo '$value is a boolean';
} elseif (is_array($value)) {
    echo '$value is an array';
} elseif (is_null($value)) {
    echo '$value is null';
} elseif (is_string($value)) {
    echo '$value is a string';
}
~~~

This tells us:

    $value is a string

Not only is that a considerable amount of typing, but it is also hard to read and maintain.  Thankfully, we can use a `switch` statement to improve code readability and maintainability in cases like this.

We can refactor these six `if/else` statements into a single `switch`.

~~~php
$value = 'Hello!';

switch (gettype($value)) {
    case 'integer':
        echo '$value is an integer';
        break;
    case 'float':
        echo '$value is a float';
        break;
    case 'boolean':
        echo '$value is a boolean';
        break;
    case 'array':
        echo '$value is an array';
        break;
    case 'null':
        echo '$value is null';
        break;
    case 'string':
        echo '$value is a string';
        break;
}
~~~

The output is the same, `$value is a string`, but this is much easier to read.  Also, instead of checking for each type via individual methods, we are using [`gettype()`](http://us3.php.net/gettype), a PHP function that returns the data type as a string.  Our `switch` is saying: return the value of `gettype($value)` and then, based on it's output, start at the first `case` block and work down until you find one that matches, then execute that code.

### Default Case

When we are using `switch` statements, sometimes we need to perform an action if none of the specific cases are met.  We can add a `default` case that will execute if none of the other cases were met.

We can add the _default case_ like any other `case`.

~~~php
switch(gettype($value)) {
    case 'string':
        echo '$value is a string';
        break;
    default:
        echo '$value is not a string';
        break;
}
~~~

In this example, if we set `$value` to `1`, we will get this output:

    $value is not a string

### Falling Through

As we can see, each `case` block is ending with a `break` statement.  If we did not include this, we would see our `switch` _falling through_, or continuing to find `case`es that evaluate truthfully.

## Exercises

Commit your code to GitHub after each step.

1. Create a new file named `switch.php` in your exercises directory with the following code:

    ~~~php
    <?php

    // Set the default timezone
    date_default_timezone_set('America/Chicago');

    // Get Day of Week as number
    // 1 (for Monday) through 7 (for Sunday)
    $dayOfWeek = date('N');

    switch($dayOfWeek) {
        case 1:
            // Output Monday
        case 2:
            // Output Tuesday
        // etc through day 7
    }
    ~~~

1. Test and verify the results before proceeding by creating a matching `if` block.  The output should be identical.
