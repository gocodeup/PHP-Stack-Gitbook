# Data Types in PHP

In programming languages, there is a concept of data types.  [Primitive data types](http://en.wikipedia.org/wiki/Primitive_data_type) are the baked-in _elements_ that we use to represent our data.

There are 8 primitive data types in PHP:

* boolean
* integer
* float (floating-point number, aka double)
* string
* array
* object
* resource
* NULL

There are some _psuedo-types_ that are used for things like type hinting, but we will cover that much later.

Each of these represent different data types that PHP recognizes.  We will go through each one individually.

## Variables

Before we move on, we will need to get a basic understanding of variables.  Programming languages need a way to store data that can be recalled or manipulated easily.  Just like the `x` and `y` values commonly used in algebra, programming languages use variables to refer to data stored in memory.

In PHP variables are defined by a name preceded by a `$`.  The [documentation for variables](http://www.php.net/manual/en/language.variables.basics.php) states:

>  A valid variable name starts with a letter or underscore, followed by any number of letters, numbers, or underscores.

Variables hold different data types.  To define a variable that represents a string, we can simply assign it with an equal sign `=`.

	$greeting = 'Hello Codeup!';

We can now output the contents of our variable in our interactive shell.

	php > $greeting = 'Hello Codeup!';
	php > echo $greeting;
	Hello Codeup!

You can also assign the results of a statement to a variable. To store the contents of an arithmetic result in a variable, we assign it using the equals sign `=`:

	php > $answer = 5 + 4;
	php > echo $answer;
	9

We can use variables like we would any data type.  Using a variable in place of a value works like the value itself.

	php > $a = 10;
	php > $b = 20;
	php > $c = $b / $a;
	php > echo $c;
	2

## Exercises

In the interactive shell, perform the following experiments.

1. Assign a variable the result of `6 % 2` and echo the result to check the type returned.  Was it what you predicted?

1. Create a variable named `$pi` and set is value to `pi()`.  Echo the results.  Were you able to predict the output?
