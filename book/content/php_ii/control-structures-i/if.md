# if

Remembering that computers are based on boolean logic, setting conditionals that test for `true` and `false` allow us to control the flow of our programs.  By determining the truthfulness of an assertion, we can make decisions about how our code should react during runtime.

## Using if

An `if` statement is very simple.

~~~php
if (expression) {
    // then do this
}
~~~

To craft our expressions for our `if` statements, we can use the [comparison operators](http://php.net/manual/en/language.operators.comparison.php) that php provides for us.

~~~php
$a = 5;
$b = 10;
$c = '10';

if ($a == $b) {
    echo "$a is equal to $b";
}

if ($a != $b) {
    echo "$a is not equal to $b";
}
~~~

This should output

    5 is not equal to 10

## Exercises

1. `cd` into your `exercises` directory. We will be creating new repositories for larger projects, but all your smaller scripts will be created in this directory.

1. Download [`if.php`](../../examples/php/if.php) and move it to your `exercises` directory.

1. Read the comments in the file and follow the directions marked `TODO:`. When you are done, your output should look like the following:

        5 is less than 10
        10 is greater than 5
        10 is greater than or equal to 10
        10 is less than than or equal to 10
        10 is equal to 10
        10 is not identical to 10

    **NOTE**: You can execute this file by logging into your Vagrant VM and changing directory to your exercises folder and running `php if.php`.

1. Commit your new file `if.php`, and push it to GitHub.  Verify it is on GitHub.
