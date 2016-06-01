# Exploding and Imploding

PHP allows us to convert strings to arrays, and vice-versa.  We often use arrays as lists, and these functions make it easy to go back and forth.

## Using explode and implode

### explode()

If we have a string that we'd like to convert to an array, we can `explode()` the string into an array.

~~~php
array explode ( string $delimiter , string $string [, int $limit ] )
~~~

We can see `explode()` returns an array, and accepts a delimiter, a string, and an option integer that limits the number of array elements created.

If we have this list of theoretical physicists as a string:

~~~php
$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';
~~~

We can turn it into an array easily.  Each name is separated by a comma and a space.  We know that `explode()` takes a string as a delimiter, so we can use `, `.

~~~php
$physicistsArray = explode(', ', $physicistsString);
~~~

We now have an array `$physicistsArray` that looks like this:

    array(6) {
      [0] =>
      string(14) "Gordon Freeman"
      [1] =>
      string(15) "Samantha Carter"
      [2] =>
      string(14) "Sheldon Cooper"
      [3] =>
      string(13) "Quinn Mallory"
      [4] =>
      string(12) "Bruce Banner"
      [5] =>
      string(10) "Tony Stark"
    }

### implode()

The opposite of `explode()` is `implode()`.

~~~php
string implode ( string $glue , array $pieces )
~~~

Here we see `implode()` returns a `string`, and accepts a string as the `$glue` and an array of `$pieces`.

To turn our `$physicistsArray` back into a string, this time separated by pipes, we could use `implode()`.

~~~php
$physicistsString = implode('|', $physicistsArray);
echo $physicistsString;
~~~

Outputs

    Gordon Freeman|Samantha Carter|Sheldon Cooper|Quinn Mallory|Bruce Banner|Tony Stark


## Exercises

If we wanted to display our array as the ending of this string:

~~~php
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.";
~~~

then we'd need to convert our `$physicistsArray` into a human friendly `$famousFakePhysicists` string.

If we `implode()` our array with commas, this sentence will not be grammatically correct.  Whether you subscribe to the [Oxford Comma](http://en.wikipedia.org/wiki/Serial_comma) or not, any listing of items should end with `and [final item]`.

This list should read:

Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, **and** Tony Stark.

Create a new file named `list_with_commas.php` in your exercises repo to solve these exercises.  Commit and push each step.

Using the `$physicistsString` from the lecture notes and your new knowledge of pushing, popping, exploding, and imploding:

1. Create the `$famousFakePhysicists` string that lists the physicists and contains the "and" at the end.

    This should end with this line:

    ~~~php
    echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.";
    ~~~

    and output this result:

        Some of the most famous fictional theoretical physicists are Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, and Tony Stark.

1. Turn your solution into a function named `humanizedList()`.  You should be able to pass the `$physicistsArray` as the only parameter, and your function will return the result.

    Example code:

    ~~~php
    <?php

    // Converts array into list n1, n2, ..., and n3
    function humanizedList($array) {
      // Your solution goes here!
    }

    // List of famous peeps
    $physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

    // TODO: Convert the string into an array
    $physicistsArray = [];

    // Humanize that list
    $famousFakePhysicists = humanizedList($physicistsArray);

    // Output sentence
    echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.";

    ?>
    ~~~

1. Update your code to list the physicists by first name, in alphabetical order.

1. Create a second parameter to make alphabetical sorting optional.

    _**Hint:** Default alphabetical sorting to false. If no second parameter is passed to the function no sorting should take place._
