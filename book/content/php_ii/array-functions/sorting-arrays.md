# Sorting Arrays

Sorting allows us to put arrays in the order we need them in.

## Using Array Sorting Functions

The order of elements in an array can be very important.  List of names are easier read when alphabetical, todo items should be ordered by priority, etc.

We can sort arrays by their keys, or by their values.  PHP provides many functions to meet almost every scenario.

Visit the [PHP manual's array functions page](http://www.php.net/manual/en/array.sorting.php) to learn more about these functions (and others).

Function name | Sorts by | Maintains key association | Order of sort
--- | --- | --- | ---
`asort()` | value | yes | low to high
`arsort()` | value | yes | high to low
`krsort()` | key | yes | high to low
`ksort()` | key | yes | low to high
`sort()` | value | no | low to high
`rsort()` | value | no | high to low
`shuffle()` | value | no | random

Some functions sort by key, some by value.  Some sorts maintain the key association, meaning when they reorder the array, the `key => value` pair stays the same, others keep the keys in the same order and reorder the values.  We also see that some sort from low to high, others from high to low.

The functions with an 'r' in their name will sort in _reverse_ order.  For example, `krsort()` can be remembered as _key reverse sort_, meaning the function will sort by key, from high to low.  It will maintain association as it is a key (k) or associative (a) search.

Let's try a few sorts to see what happens.

~~~php
$names = ['Marc Andreessen', 'Tim Berners-Lee', 'Len Bosack', 'Steve Case', 'Vint Cerf', 'Len Kleinrock', 'J.C.R. Licklider', 'Bob Metcalfe', 'Ray Tomlinson'];
~~~

We'll use this array of names to look at how these functions operate.

First, let's look at the current order of the array.

    php > print_r($names);
    Array
    (
        [0] => Marc Andreessen
        [1] => Tim Berners-Lee
        [2] => Len Bosack
        [3] => Steve Case
        [4] => Vint Cerf
        [5] => Len Kleinrock
        [6] => J.C.R. Licklider
        [7] => Bob Metcalfe
        [8] => Ray Tomlinson
    )

Here we see that they are in no particular order.  Because this is an indexed array, the keys are numeric starting with 0.

    php > asort($names);
    php > print_r($names);
    Array
    (
        [7] => Bob Metcalfe
        [6] => J.C.R. Licklider
        [2] => Len Bosack
        [5] => Len Kleinrock
        [0] => Marc Andreessen
        [8] => Ray Tomlinson
        [3] => Steve Case
        [1] => Tim Berners-Lee
        [4] => Vint Cerf
    )

We can see that running `asort()` on our array orders them by value, but the keys are now in no discernible order.

By running `ksort()`, we can restore order in our array, since the keys have not been re-arranged.

    php > ksort($names);
    php > print_r($names);
    Array
    (
        [0] => Marc Andreessen
        [1] => Tim Berners-Lee
        [2] => Len Bosack
        [3] => Steve Case
        [4] => Vint Cerf
        [5] => Len Kleinrock
        [6] => J.C.R. Licklider
        [7] => Bob Metcalfe
        [8] => Ray Tomlinson
    )

If we wanted both the values, and the indexed keys to be ordered, we can use `sort()`.

    php > sort($names);
    php > print_r($names);
    Array
    (
        [0] => Bob Metcalfe
        [1] => J.C.R. Licklider
        [2] => Len Bosack
        [3] => Len Kleinrock
        [4] => Marc Andreessen
        [5] => Ray Tomlinson
        [6] => Steve Case
        [7] => Tim Berners-Lee
        [8] => Vint Cerf
    )

To reverse the order, we can use the reverse functions.  Like `asort()`, did before, `arsort()` will maintain the key association.

    php > arsort($names);
    php > print_r($names);
    Array
    (
        [8] => Vint Cerf
        [7] => Tim Berners-Lee
        [6] => Steve Case
        [5] => Ray Tomlinson
        [4] => Marc Andreessen
        [3] => Len Kleinrock
        [2] => Len Bosack
        [1] => J.C.R. Licklider
        [0] => Bob Metcalfe
    )

And `rsort()` will reorder both.

    php > rsort($names);
    php > print_r($names);
    Array
    (
        [0] => Vint Cerf
        [1] => Tim Berners-Lee
        [2] => Steve Case
        [3] => Ray Tomlinson
        [4] => Marc Andreessen
        [5] => Len Kleinrock
        [6] => Len Bosack
        [7] => J.C.R. Licklider
        [8] => Bob Metcalfe
    )

`shuffle()` is unique in that it randomly orders an array, much like shuffling a deck of cards.

    php > shuffle($names);
    php > print_r($names);
    Array
    (
        [0] => Ray Tomlinson
        [1] => Vint Cerf
        [2] => J.C.R. Licklider
        [3] => Steve Case
        [4] => Len Bosack
        [5] => Tim Berners-Lee
        [6] => Marc Andreessen
        [7] => Bob Metcalfe
        [8] => Len Kleinrock
    )

## Exercises

Remember to commit your changes after each step. When you are finished, push the final results to GitHub.

1. Download [technology-companies.php](../../examples/php/technology-companies.php) to your exercises directory.

1. Add code to output the `$companies` array in its current form.

1. Sort the `$companies` array by company name and output the results.

1. Sort the people in each company alphabetically. You will need to use a `foreach` loop and will need to reassign each inner array after sorting. Output the result.

1. Sort the companies from "biggest" to "smallest". This may be easier than you think, but be sure you don't loose the company names!
