# Internal (built-in) Functions

PHP ships with a large assortment of internal functions.  These functions allow us to accomplish our programming with greater ease, and provide the core functionality for the language.

For a full listing of available functions, visit the [PHP manual's function reference page](http://www.php.net/manual/en/funcref.php).

## Using Internal Functions

The entire list of available PHP functions and extensions is vast, many built for specific use cases that we may never encounter.  However, there are many functions that are essential to know about.

The variable functions are listed in the [PHP manual's variable functions page](http://www.php.net/manual/en/ref.var.php).  As we read down this list, we notice we've already used over half of these functions already.

Using these functions, and some we do not know about, we can check and manipulate variables in many ways. We have already covered type checking, and we see there is more info we can find out about variables.

## Exercises

After each of the following steps, commit your changes to git. Push all your changes to GitHub at the end of the exercise.

1. Download [`internal_functions.php`](../../examples/php/internal_functions.php) and save it to your exercises directory.

1. Using functions from the [PHP manual's variable functions page](http://www.php.net/manual/en/ref.var.php), complete the next steps.

1. At the top of the file, create a new function called `inspect()` that takes in one argument. Your `inspect()` function should look at the passed argument and return a string with the variable's type and its value, similar to `"The integer is 12."`.

1. Use your new function to inspect the given variables one at a time. Create these calls in an iterative manner: add a call to `inspect()` for `$num1` and then test your code, add a call to `inspect()` for `$num2` and then test your code, etc.

1. There are some special cases your `inpsect()` function needs to handle. In particular:

    - If the variable is `NULL`, return `"The value is NULL."`
    - If the variable is an array, return `"The value is an array"`
    - If the variable is an *empty* array, return `"The value is an empty array."`
    - If the variable is a boolean, make sure your return value says whether it is `TRUE` or `FALSE`.
    - If the variable is an empty string, return `"The string is empty."`
