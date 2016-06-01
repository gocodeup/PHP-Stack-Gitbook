# Functions

We have been using functions a lot already, however they have been predefined by PHP. These have been functions like the `is_string()`; functions are _subroutines_ that wrap functionality into an easily callable unit of code.

## User Defined Functions

We will need to create our own functions for a couple of reasons:
- Organizing our code into functions makes our code easier to maintain
- Functions can be reused, making our code more succinct

### Using User Defined Functions

Creating functions in PHP is very simple. The PHP manual gives a similar example to this one:

~~~php
function functionName($arg1, $arg2, /* ..., */ $argN)
{
    // code goes here
}
~~~

Function definitions start with the `function` keyword, followed by the name of the function, the arguments it accepts, then a block of code to be executed.

Thinking back to our early lessons, let's revisit some simple arithmetic.

Remember doing this in the interactive shell?

    php > echo 5 + 4;
    9

We could make a function that adds 2 numbers together.

~~~php
<?php

function add($a, $b)
{
    return $a + $b;
}

echo add(5, 4);
~~~

This code would output `9`, just like our earlier example.  With this function, we can call it over and over.

~~~php
echo add(6, 3); // Outputs: 9
echo add(12 3); // Outputs: 15
echo add(42, 0); // Outputs: 42
~~~

## Variable Scope

An importance concept that goes along with functions is variable scope. Variable scope refers to the block of code where you can or cannot access a particular variable. Let us look at an example.

```php
<?php

$outsideVar   = 'I am outside the function scope';

function scopeTest()
{
    $insideVar = 'I am inside the function scope';

    echo "\nInside Scope:\n\n";

    echo '$insideVar: '  . $insideVar  . PHP_EOL;
    echo '$outsideVar: ' . $outsideVar . PHP_EOL;
}

echo "Outside Scope:\n\n";

echo '$insideVar: '  . $insideVar  . PHP_EOL;
echo '$outsideVar: ' . $outsideVar . PHP_EOL;

scopeTest();
```

When the above example is run, its output will be similar to the following:


    Outside Scope:

    Notice: Undefined variable: insideVar in /Users/bbatsche/Desktop/scope.php on line 17
    $insideVar:
    $outsideVar: I am outside the function scope

    Inside Scope:

    $insideVar: I am inside the function scope
    Notice: Undefined variable: outsideVar in /Users/bbatsche/Desktop/scope.php on line 12
    $outsideVar:

Look closely at each case. You will notice that variables that are declared outside the function curly braces are not accessible inside the function. You will also notice that variables declared inside a function are not accessible outside the function. There are certain exceptions to these rules when special key words or operators are used, but this is the basic way that scope works in PHP.

One of the ways we can solve this problem is by writing functions that take in *parameters*, or *arguments*. We have seen how this is done above with the `add()` function, but it is important to understand how those parameters are assigned values. Consider the following example:

```php
<?php
function paramTest($paramA, $paramB)
{
    echo "Param A is: $paramA\n";
    echo "Param B is: $paramB\n";
}

$paramA = 'Alpha';
$paramB = 'Beta';

paramTest($paramA, $paramB);
echo PHP_EOL;
paramTest($paramB, $paramA);
```

The output for this script is:

    Param A is: Alpha
    Param B is: Beta

    Param A is: Beta
    Param B is: Alpha

Study the differences between how the function was called, and the output it generated. In particular, the second case outputted "Beta" for `Param A`. That is because even though the variable in the function was called `$paramA`, when we called the function we passed `$paramB` first. The value of function parameters is based on the order things are passed, **not** on the names of those parameters.

## Exercises

1. Download and save [arithmetic.php](../../examples/php/arithmetic.php) to your exercises repository.
1. Add and commit the file now. As you complete each step, commit your changes to the file. When you are done with this exercise, push your commits to GitHub.
1. Fill in the `// Add code here` blocks to make each function `echo` the proper result.
1. Add code after functions that calls each function with real numbers.
1. Verify the output of each test.
1. Add a function `modulus` that finds the modulus of 2 numbers.
1. Add test code and verify the output of modulus.
1. Create variables `$a` and `$b` at the top of your script and give them different values. Watch what happens (or, does not happen) to your function output as you set and modify `$a` & `$b` **outside** of your functions. Think carefully about how this behavior differs from the way JavaScript handles variables.
