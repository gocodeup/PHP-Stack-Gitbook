# do-while

`do-while` is much like `while`. The only difference between the two is when the loop condition is checked. A `while` loop checks the condition first, and then runs a code block if the condition is met. A `do-while` loop executes a code block, then checks a condition to decide if the loop should continue.

`do-while` loops are used far less often than `while` loops.

## Using do-while

A `do-while` statement looks like this:

~~~php
do {
    // do this
} while (expression);
~~~

To echo our numbers again, we'd write something like this:

~~~php
$a = 1;
do {
    echo "\$a is equal to {$a}\n";
    $a++;
} while ($a <= 5);
~~~

This block of code should output:

    $a is equal to 1
    $a is equal to 2
    $a is equal to 3
    $a is equal to 4
    $a is equal to 5

If we change the expression being checked so it is never true, we can see that the first iteration of the code still runs.

~~~php
$a = 1;
do {
    echo "\$a is equal to {$a}\n";
    $a++;
} while (1 == 2);
~~~

Our output is:

    $a is equal to 1

even though `1` will never be equal to `2`.

## Exercises

Create a file named `do_while.php` in your exercises repository.

After each step, commit your changes with a descriptive message and push to `origin`.

1. Create a `do-while` loop that will count by 2's starting with 0 and ending at 100.  Follow each number with a newline.

1. Alter your loop to count backwards by 5's from 100 to -10.

1. Create a do-while loop that starts at 2, and displays the result $a * $a on each line while $a is less than 1,000,000.  Output should equal:

    ~~~
    2
    4
    16
    256
    65536
    ~~~

1. Push your file to GitHub.
