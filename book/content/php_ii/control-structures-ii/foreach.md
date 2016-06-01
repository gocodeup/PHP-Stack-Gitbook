# foreach

Iterating through arrays is very important in PHP.  We will find ourselves using and manipulating arrays throughout our programming careers, and PHP's `foreach` loop makes it easy to iterate through arrays (and objects, too).

## Using foreach

Before we look at `foreach`, let's examine how we'd iterate over an array using a `for` loop.

If we did not have `foreach`, we could use `for` loops to iterate over an array like this:

~~~php
$numbers = ['zero', 'one', 'two', 'three', 'four', 'five'];
for ($i = 0; $i < count($numbers); $i++) {
    echo "\$numbers has an element with a value of {$numbers[$i]}\n";
}
~~~

This would output:

    $numbers has an element with a value of 1
    $numbers has an element with a value of 2
    $numbers has an element with a value of 3
    $numbers has an element with a value of 4
    $numbers has an element with a value of 5

First we created an array of numbers and assigned it to the variable `$numbers`.

Then, we created a `for` loop that set `$i` to `0`, and said to continue as long as `$i` is _less than_ the `count()` of `$numbers`.  `count()` is a function that returns the number of elements in an array. Finally, the `for` loop increments the value of `$i` on each pass.  This tells `for` to start with `0`, and increase through each element until it has reached the last element.

This method is a bit cumbersome, and only works if all the keys are numeric.  We'd have to add logic to check for keys, etc, to make this work on all arrays.

Fortunately, PHP has provided a `foreach` structure to make iterating through arrays much easier.

`foreach` has a syntax that should be getting familiar.

~~~php
foreach (array_expression as $value) {
    statement
}
~~~

We can see that `foreach` says for each array element, yield the value to the code block between the curly braces as a variable.

Let's look at this example.

~~~php
$numbers = ['zero', 'one', 'two', 'three', 'four', 'five'];
foreach ($numbers as $value) {
    echo "\$number has a value of {$value}\n";
}
~~~

Like our previous control structure examples, we get our values output one per line.

    $number has a value of 1
    $number has a value of 2
    $number has a value of 3
    $number has a value of 4
    $number has a value of 5

We can use the values inside the block as well.

~~~php
$numbers = [1, 2, 3, 4, 5];
foreach ($numbers as $value) {
    $newNumber = $value * 2;
    echo "$value * 2 is {$newNumber}\n";
}
~~~

Outputs

    1 * 2 is 2
    2 * 2 is 4
    3 * 2 is 6
    4 * 2 is 8
    5 * 2 is 10


We can iterate over any type of array value, not just integers.

~~~php
$animalTypes = array('dogs', 'cats', 'birds', 'narwhals');
foreach ($animalTypes as $animal) {
    echo "Old McDonald had a farm, and on that farm he raised some {$animal}\n";
}
~~~

The result:

    Old McDonald had a farm, and on that farm he raised some dogs
    Old McDonald had a farm, and on that farm he raised some cats
    Old McDonald had a farm, and on that farm he raised some birds
    Old McDonald had a farm, and on that farm he raised some narwhals

The yielded variable for each iteration has been `$value` until this example, this time we used a more descriptive name, `$animal`.  While using `$value` or even `$v` is common practice, the more descriptive the variable name, the easier it is to understand the code at first glance.

We can _nest_ control structure inside one another to have greater control over the flow of our program.

~~~php
$data = array(42, 'bacon', (6 * 3), 'The Big Bang Theory', 98.6);
foreach ($data as $datum) {
    if (is_numeric($datum)) {
        echo "{$datum} is a number\n";
    } else if (is_string($datum)) {
        echo "{$datum} is a string\n";
    }
}
~~~

Here we are iterating over the `$data` array and then looking at the value for each key.  We are also using 2 functions we've not seen before: `is_numeric()` and `is_string()`.  As we can see, `is_numeric()` returns `true` for both integers and floats, and `is_string()` returns `true` for values that are of type `string`. Lastly, we can notice that `(6 * 3)` is evaluated when the array is created, and the value for the 3rd element (`$data[2]`) is actually `18`.

## Exercises

PHP provides us with many functions to test the types of values.  Here is a list of functions you can use to test types that you already know about.

- `is_array()` - Checks if value is of type `array`
- `is_bool()` - Checks if value if of type `boolean`
- `is_float()` - Checks if value is of type `float`
- `is_double()` - alias of `is_float()`
- `is_real()` - alias of `is_float()`
- `is_int()` - Checks if value is of type `integer`
- `is_integer()` - alias of `is_int()`
- `is_long()` - alias of `is_int()`
- `is_null()` - Checks if value is of type `null`
- `is_numeric()` - Checks if value is of type `float` or `integer`
- `is_scalar()` - Checks if value is of type `float`, `integer`, `string`, or `boolean`
- `is_string()` - Checks if value is of type `string`

Use the following array to complete the practice exercises.

    $things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);

1. Create a file named `foreach.php` in you exercises directory.  Commit each step and push to GitHub.

1. Construct a loop that iterates through each value and outputs its type as either `integer`, `float`, `boolean`, `array`, `null`, or `string`.

1. Construct a loop that iterates through each value and outputs only values with a type that is `scalar`.

1. Create a loop that will `echo` out every value, including those nested in arrays.  Output should look like this.

    ~~~
    Sgt. Pepper
    11

    Array (loop through inner array display here)
    3.14
    12 + 7

    11
    ~~~
