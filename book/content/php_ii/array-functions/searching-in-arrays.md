# Searching in Arrays

There is no use creating lists of items if we cannot find anything in them.  PHP allows us to search arrays for queried values.

## Using Array Search Functions

Finding things in array is like finding a needle in a haystack.

The [php manual's page on array_search()](http://www.php.net/manual/en/function.array-search.php) shows this description for the function.

~~~php
mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] )
~~~

We can see the manual places the type before the function, and the function's arguments. This allows us to quickly see which types are allowed.  We've not see the `mixed` type before; it is a pseudo-type that means more than one type.

This description tells us that `array_search()` returns a mixed result, takes a mixed _needle_, an array _haystack_, and an optional argument to enforce strict comparison.

So, we can pass what we are looking for as the _needle_, the array were searching through as the _haystack_, and if we want type matching we can pass a `true` as the third argument.

This function will return the `key` for the _needle_ if found and `false` if nothing is found.

Taking a look at this array again:

~~~php
$names = ['Marc Andreessen', 'Tim Berners-Lee', 'Len Bosack', 'Steve Case', 'Vint Cerf', 'Len Kleinrock', 'J.C.R. Licklider', 'Bob Metcalfe', 'Ray Tomlinson'];
~~~

We can search for _Bill Gates_ and see if he made our list.

    php > $result = array_search('Bill Gates', $names);
    php > var_dump($result);
    bool(false)

Nope, not in the array.  What about Bob (Metcalfe)?

    php > $result = array_search('Bob Metcalfe', $names);
    php > var_dump($result);
    int(7)

Okay, so Bob is in there, and his `key` is `7`.

Now, consider this code:

~~~php
<?php

$names = ['Marc Andreessen', 'Tim Berners-Lee', 'Len Bosack', 'Steve Case', 'Vint Cerf', 'Len Kleinrock', 'J.C.R. Licklider', 'Bob Metcalfe', 'Ray Tomlinson'];

$query = 'Tim Berners-Lee';

$result = array_search($query, $names);

if ($result) {
    echo $names[$result];
}
~~~

Here we have a list (array) of names, and we are searching for a particular name (`$query`).  If the queried item is in the list, we'll get an output.  Changing the value of `$query` will change the output.

## Exercises

1. Download and save [`search-arrays.php`](../../examples/php/search-arrays.php) to your exercises directory. Commit each step in git and push to GitHub at the end of the exercise.

1. Create a function that returns `TRUE` or `FALSE` if an array value is found.  Search for `Tina` and `Bob` in `$names`.  Make sure it works as expected.

1. Create a function to compare 2 arrays that returns the number of values in common between the arrays.  Use the 2 example arrays and make sure your solution uses `array_search()`.


