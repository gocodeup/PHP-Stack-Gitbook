# Pushing, Popping, and Shifting

Working with stacks of data, and manipulating data structures, are powerful tools in programming.  Moving elements on and off of arrays can be accomplished in a variety of ways. Pushing, popping, and shifting are some of the most common array functions used in PHP to accomplish this task.

## Using Push, Pop, Shift, and Unshift

Being able to add and remove elements to/from the beginning and end of an array allows us to gain even more control over the data structures we build inside our arrays.

PHP provides us with many array functions, however, we are going to be looking at 4 of the most commonly used functions:

- [`array_push()`](http://us3.php.net/manual/en/function.array-push.php) &mdash; Push one or more elements onto the _end_ of an array
- [`array_pop()`](http://us3.php.net/manual/en/function.array-pop.php) &mdash; Pop the element off the _end_ of an array
- [`array_shift()`](http://us3.php.net/manual/en/function.array-shift.php) &mdash; Shift an element off the _beginning_ of an array
- [`array_unshift()`](http://us3.php.net/manual/en/function.array-unshift.php) &mdash; Prepend one or more elements to the _beginning_ of an array

### array_push()

In our previous examples, we've just used `$someArray[] = ...` to add elements to an array.  This is fine for adding one at a time, but to add 1 or more to the _end_ of an array, we use the array function `array_push()`.

~~~php
$items = ['First', 'Second', 'Third'];
array_push($items, 'Fourth', 'Fifth', 'Sixth');
print_r($items);
~~~

Outputs

    Array
    (
        [0] => First
        [1] => Second
        [2] => Third
        [3] => Fourth
        [4] => Fifth
        [5] => Sixth
    )

### array_pop()

Popping is the way we take elements off of the _end_ of an array. [`array_pop()`](http://us3.php.net/manual/en/function.array-pop.php) returns the element(s) that are popped off the end of the array.

~~~php
$items = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth'];
$lastItem = array_pop($items);
print_r($items);
~~~

Outputs

    Array
    (
        [0] => First
        [1] => Second
        [2] => Third
        [3] => Fourth
        [4] => Fifth
    )

and `echo $lastItem` displays `Sixth`.

### array_shift()

Shifting takes elements off of the _front_ of an array, returning the shifted elements.

~~~php
$items = ['First', 'Second', 'Third', 'Fourth', 'Fifth'];
$firstItem = array_shift($items);
print_r($items);
~~~

Outputs

    Array
    (
        [0] => Second
        [1] => Third
        [2] => Fourth
        [3] => Fifth
    )

and `echo $firstItem;` displays `First`.

### array_unshift()

When we unshift elements onto an array, we add them to the _front_ of the array.

~~~php
$items = ['Second', 'Third', 'Fourth', 'Fifth'];
array_unshift($items, 'New First Item!');
print_r($items);
~~~

Here we've added a new item back to the beginning.  Let's view the output.

    Array
    (
        [0] => New First Item!
        [1] => Second
        [2] => Third
        [3] => Fourth
        [4] => Fifth
    )

## Exercises

1. Copy `search-arrays.php` and rename it `merge-arrays.php`.

1. Write a function called `combine_arrays()` that will take in two array values as parameters and return a new array with values from both.
    - If the arrays have the same value at the same index, then it should only be added once.
    - If the values differ, then the value from the first array should be added and then the second.
    - The function will need to use at least two of the array functions we discussed: `array_shift()`, `array_unshift()`, `array_push()`, and `array_pop()`.

1. Test your `combine_arrays()` function with `$names` and `$compare`. The resulting array should look like:

        Array
        (
            [0] => Tina
            [1] => Dana
            [2] => Dean
            [3] => Mike
            [4] => Mel
            [5] => Amy
            [6] => Adam
            [7] => Michael
        )

### Bonus

You may have noticed that the solution we created will only work when comparing two arrays of the same size. What would you do to make this function work while comparing two arrays of differing sizes? What tradeoffs are involved?
