# PHP CLI arguments

Being able to pass arguments to a command line application is a common way to set configuration or handle other situations where flags or data can be used by the application.

## Using arguments in PHP command line applications

We can pass arguments to an app by including them after the filename.

    php file.php arg1 arg2 arg3 ... argN

PHP gives us two arrays in CLI mode to deal with arguments.

`$argc` contains a count of all the arguments

`$argv` contains a array of all the values passed to PHP.

Since we are passing a file to PHP followed by the arguments, `$argv` will always start with the first element of the array containing the filename.

Hence, a file with no arguments will have an `$argc` count of 1, and an array with `$argv[0]` containing the filename.

For example, if we created a file named `args_example.php` with the following code:

~~~php
<?php
// Dump arg count
var_dump($argc);
// Dump arg vars
var_dump($argv);
// Exit with 0 errors
exit(0);
~~~

Running this with no args

    $ php args_example.php

would give this result:

    int(1)
    array(1) {
      [0]=>
      string(16) "args_example.php"
    }


This shows us we have `$argc` value of `int(1)`, and an array with `args_example.php` in element with the key `0`.

Passing 2 args lets us see them also.

    $ php args_example.php some_string 42

Yields:

    int(3)
    array(3) {
      [0]=>
      string(16) "args_example.php"
      [1]=>
      string(11) "some_string"
      [2]=>
      string(2) "42"
    }

We can check to make sure there are values in each, then use them directly by calling the key on the array directly.

~~~php
<?php

// If there are 2 args + filename
if ($argc == 3) {
    // Echo them out directly
    echo "arg1 is {$argv[1]} and arg2 is {$argv[2]}\n";
}

~~~

Running it outputs expected results.

    $ php args_example.php some_string 42
    arg1 is some_string and arg2 is 42

## Exercise

Open your high-low game and add this feature.  Commit and push to GitHub.

- If there are 2 arguments passed, and both are numbers, use the numbers to set the min and max on the random number generator.
