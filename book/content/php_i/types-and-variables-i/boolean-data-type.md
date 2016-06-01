# Data Types - Boolean

[Boolean data types](http://en.wikipedia.org/wiki/Boolean_data_type) are purely logical and can only hold 2 values: `true` and `false`.  Boolean logic is very important in computer science and engineering, and when we cover control structures, we will rely heavily on conditional logic to control our program's flow.

Using our interactive shell, we can see what happens when we try to output boolean values using `echo`.

	php > echo true;
	1

Okay, so `true` returns `1`, so `false` must return `0`, right?

	php > echo false;
	php >

Nothing.  Why?  Because boolean values are `true` if the bit is set and `false` if it is not set.  Therefore, if nothing is set, then converting nothing to a number or string results in nothing.

Here we begin to see the limitations of `echo`.  It will output strings and numbers, but it cannot properly handle outputting boolean values as anything human readable.

Luckily, PHP gives us another function, [var_dump()](http://us1.php.net/var_dump), which outputs, or "dumps", the variable's information.

	php > var_dump(false);
	bool(false)

	php > var_dump(true);
	bool(true)

Not only does it tell us if what we passed is `true` or `false`, it also tells us its type.

Let's assign a variable a boolean value.

	php > $codeupRocks = true;
	php > var_dump($codeupRocks);
	bool(true)

Now, we can see inside of any variable, know the value, _and_ the data type.

## Exercises

In the interactive shell, perform the following experiments.

1. Assign variables `true` and `false` values and `var_dump()` to check the types.
