# Function Arguments

Not only can we create our own functions, we have a good amount of control over the way arguments work for our functions.

## Using Function Arguments

When we pass arguments to a function, it uses them inside the block of code.

~~~php
function add($a, $b) {
    return $a + $b;
}
~~~

Here we see that `$a` and `$b` are both arguments.  What happens if we pass only one argument to our `add()` function?

        Warning: Missing argument 2 for add() ... on line 1

PHP throws a warning telling us we did not supply a value for each argument.

### Default Values

One feature we can take advantage of is default values for function arguments.  By setting default values, we can make it easier to customize the behavior of our functions.

Let's say we have a function that is used to compare 2 values, and it can choose to look for strict or weak type checking.

~~~php
function compare($a, $b, $strict) {
    if ($strict === true) {
        return $a === $b ? 'True' : 'False';
    } else {
        return $a == $b ? 'True' : 'False';
    }
}
~~~

Every time we forget to pass `true` or `false` in as the 3rd argument, this function is going to throw a warning.  A good default would be to always test for strict (identical) comparison unless otherwise stated.

We can accomplish this by setting the default value for the argument.

~~~php
function compare($a, $b, $strict = true) {...}
~~~

Now, these two calls will return the same result:

~~~php
echo compare('Madonna', 'Lady Gaga', true);
echo compare('Madonna', 'Lady Gaga');
~~~

Because we've set the default value for `$strict`, our function can now take 2 or 3 arguments.

We can set defaults on any number of arguments and types.

~~~php
// uses print_r or var_dump on an array
function inspect($variable = null, $dump = true) {
    // Same as if ($dump == true) {...}
    if ($dump) {
        var_dump($variable);
    } else {
        print_r($variable);
    }
}
~~~

Testing this in the interactive shell lets us see the results.

    php > inspect();
    NULL

    php > inspect(array(1,2,3), false);
    Array
    (
        [0] => 1
        [1] => 2
        [2] => 3
    )

    php > inspect(array(1,2,3));
    array(3) {
      [0]=>
      int(1)
      [1]=>
      int(2)
      [2]=>
      int(3)
    }

If we pass 0 arguments, we get back a `var_dump`ed empty array.  Passing `false` into the second argument gets us a `print_r` of the array, and just passing an array gets us a full `var_dump`.

### Validating Arguments

Setting defaults makes working with arguments easier, however, when we pass the wrong information to a function, we could get some very undesirable results.

Checking arguments for the expected types and characteristics minimizes error and unexpected results.

Let's take a look at our `add()` function from `arithmetic.php`.

~~~php
function add($a, $b) {
    return $a + $b;
}
~~~

If we pass this an array and a boolean, what do we get?

    Fatal error:  Unsupported operand types...

We get a Fatal error, thats what we get!

To prevent this, we can cast the arguments like this:

~~~php
function add($a, $b) {
    return (int) $a + (int) $b;
}
~~~

Now we'll get `1` for our array and boolean test, still not what we want.  This is casting the array to `1` and the `false` to `0`.  Also, now floats wont work, and it is a reasonable expectation for this function to add floats.

It'd be better if we only got results if we passed the right argument types.

~~~php
function add($a, $b) {
    if (is_numeric($a) && is_numeric($b)) {
        return $a + $b;
    } else {
        return "ERROR: Both arguments must be numbers\n";
    }
}
~~~

## Exercises

Open the file `arithmetic.php` from your exercise repo for editing.

Commit your changes for each step and push to GitHub.

1. Validate all the arguments, and display an error if the input is not numeric.

1. Validate divide by 0 errors, display error if attempts to divide by 0 are made.

1. Make the error messages show the values of the arguments.

1. Refactor the error messages into their own `throwErrorMessage()` function, have the other functions use it for error messaging.
