# Break & Continue

Loops are powerful structures in programming, and the more we learn to control them, the more efficiently we can use them.  Controlling the flow of our program can be improved by manipulating the actual loop cycle; `break` and `continue` give us that exact functionality.

## Using break & continue

`break` exits the loop, and `continue` skips ahead to the next iteration.

### break

If we want the execution of a loop to cease, we can `break` out of the structure.

~~~php
for ($i = 1; $i <= 100; $i++) {
    echo $i . "\n";
    if ($i == 5) {
        break;
    }
}
~~~

Here we have a `for` loop that is set to count from 1 to 100, however, we've said that if `$i` ever has a value of 5, we want to `break`.

This outputs:

    1
    2
    3
    4
    5

It never made it to 100.  During the 5th iteration, `$i` had a value of `5`, met the condition in the `if` statement, and our `break` was called.

### continue

Like `break`, `continue` also steps us out of the current loop cycle, however, it just tells the loop to move on to the next iteration, not exit the loop completely.

~~~php
for ($i = 1; $i <= 10; $i++) {
    echo $i . "\n";
    if ($i % 2 == 0) {
        continue;
    }
    echo "^ that is an odd number.\n";
}
~~~

Here we have our `for` counting from 1 to 10, and we are outputting the value of `$i` during each iteration. Next we are checking to see if the remainder of `$i` divided by 2 is 0.  If this condition is `true`, we know that `$i` is an even number, and we are telling the loop to `continue`, or skip the rest of the block and start again at the next iteration.  If `$i` is not even, we are outputting a line declaring the odd ball, as we see here:

    1
    ^ that is an odd number.
    2
    3
    ^ that is an odd number.
    4
    5
    ^ that is an odd number.
    6
    7
    ^ that is an odd number.
    8
    9
    ^ that is an odd number.
    10

### Nested Loops

Both `break` and `continue` allow you to exit or advance parent loops by passing a number that represents the number of nested loops levels affected.

~~~php
$numbers = array(1, 2, 3, 4, 5);
// Loop 1
foreach ($numbers as $key => $value) {
    echo "{$value}\n";
    // Loop 2
    for ($i = 1; $i <= 10; $i++) {
        if ($i == 2) {
            echo "{$i}\n";
            break 2;
        }
    }
}
echo "done!\n";
~~~

This outputs

    1
    2
    done!

Can you explain why?

## Exercises

Create a file named `break_continue.php` in your exercises directory.  Commit and push to GitHub after each step.

1. Create a `for` loop that shows all even numbers between 1 and 100 using `continue`.

1. Create another `for` loop that counts from 1 to 100, but stops _after_ 10 using `break`.
