# while

When we want to execute a block of code that meets a condition once, `if` is perfect.  When we want to do something as long as a condition is met, we have a few other options.  One of those options is `while`.  We refer to blocks of code that run over and over as `loops`.

## Using while

`while` will continue to execute code as long as it meets a specified condition.

~~~php
$a = 1;
while ($a <= 5) {
    echo "\$a is equal to {$a}\n";
    $a++;
}
~~~

This block of code should output

    $a is equal to 1
    $a is equal to 2
    $a is equal to 3
    $a is equal to 4
    $a is equal to 5

Let's step through the code and see what is happening.

First, we set `$a` to the integer `1`.  The while block then checks to see if `$a` meets the condition of being less than or equal to `5`.  Since 1 is less than 5, it executes the block of code inside the curly braces.  This code outputs the value of `$a` with a newline, then the next line uses the increment operator `++` to increase the value of `$a` by 1.

The `while` loop will then start over from the beginning. Now, `$a` is 2, which still satisfies the specified condition. As the loop continues, `$a` will eventually have a value of 6, which will no longer satisfy the condition, causing the `while` loop to stop executing.

What happens if the condition is always met?  We call that an infinite loop.

Let's change our code a bit.

~~~php
$a = 1;
while ($a <= 5) {
    echo "\$a is equal to {$a}\n";
}
~~~

This example is the same as the first, sans the increment of `$a` on each pass.  Now `$a` will always have the value of 1, and will always satisfy the loop condition.  Running this creates an infinite loop, or a block of code that will run forever.  If you run this code in the interactive shell, use `ctrl-c` to stop the execution.

Output:

    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    $a is equal to 1
    ... (forever)

## Exercises

1. Create a file in your exercises directory named `while.php`. Complete the following code to meet requirements in the comments.

1. Create a variable `$test` equal to 5.

1. Create a while loop that checks `$test <= 15` and increment `$test` by 1 inside the loop.  Before incrementing `$test`, output each iteration (echo $test with newline) and display results.

    Your output should look like this:

    ~~~
    5
    6
    7
    8
    9
    10
    11
    12
    13
    14
    15
    ~~~

1. Commit your code and push to GitHub.
