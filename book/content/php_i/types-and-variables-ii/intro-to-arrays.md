# Arrays

The next data type we'll explore is the `array`.

Arrays are collections of data, often of many types. This allows a single variable to hold multiple pieces of information.

## Basic Syntax

Arrays are declared using the `array()` construct, and are comprised of `key => value` pairs.

To create an array with 2 strings we can do this:

```php
$name = array('Joe', 'Blow');
```

Now we have a variable `$name` with an array holding two strings: `Joe` and `Blow`.

If we dump this variable, we learn a lot about its structure.

	php > $name = array('Joe', 'Blow');
	php > var_dump($name);
	array(2) {
	  [0]=>
	  string(3) "Joe"
	  [1]=>
	  string(4) "Blow"
	}

Here we see we have an `array(2)` as the type, telling us we have an array with 2 elements.  next we see the first element, with an index of `0` has a value of `Joe` that is a `string`.  The second element has an index of `1` and contains a `string` with a value of `Blow`.

An easier way to view the contents of arrays is to use PHP's `print_r()` function.  This function recursively prints the contents of a variable.  That sentence will make more sense when we cover recursion and functions, but for now let's look at this example:

	php > print_r($name);
	Array
	(
	    [0] => Joe
	    [1] => Blow
	)

We can see `print_r()` gives us a lot of the same information as `var_dump()`, but without all the extra type information.  This is much better suited for printing an array's content.

To access a value in an array directly, we can refer to the index the value is associated with.  The syntax for this is `$variable[index]`.  To get the output of the index `1` for our `$name` variable, we can do this:

	php > echo $name[1];
	Blow

Notice we got the 2nd value in the array.  This is because all array indexes start at `0`, so to get the first name, we'd need to call the first index.

	php > echo $name[0];
	Joe

### New Syntax

As of PHP 5.4.x, arrays can be defined with square brackets `[]` in place of the `array()` method.

Example:

```php
$name = ['John', 'Doe'];
```

While new code has the option of using this format, projects using older versions of PHP would not be compatible with this syntax.

## Data Types

Arrays are not limited to holding strings.  They can hold any data type, including other arrays.

	php > $evenNumbers = array(0, 2, 4, 6, 8, 10);

We can print the contents.

	php > print_r($evenNumbers);
	Array
	(
	    [0] => 0
	    [1] => 2
	    [2] => 4
	    [3] => 6
	    [4] => 8
	    [5] => 10
	)

And echo the values of specific elements.

	php > echo $evenNumbers[0];
	0
	php > echo $evenNumbers[5];
	10

Array values work like any other variable, and can be used in expressions.

	php > echo $evenNumbers[5] + $evenNumbers[1];
	12

## Associative Arrays

Arrays in PHP can have strings as keys, associating keys to values.

	php > $name = array('first' => 'John', 'last' => 'Doe');

As we see, the `=>` operator allows us to specify a value for a key.

	php > print_r($name);
	Array
	(
	    [first] => John
	    [last] => Doe
	)

Printing the array lets us see the indexes are now using the key names.  We can access these values directly using the key names:

	php > echo $name['first'];
	John

## Multi-dimensional Arrays

Arrays can be nested, meaning they can contain other arrays as values.  This is referred to as multi-dimensional arrays.

	php > $user = array('name' => array('first' => 'John', 'last' => 'Doe'));
	php > print_r($user);
	Array
	(
	    [name] => Array
	        (
	            [first] => John
	            [last] => Doe
	        )

	)

## Overview

Arrays are very powerful, and we'll explore them in much deeper detail soon.  As you can see at first glance, they allow us to pack a lot of information into a single variable.

As we continue to learn our craft, arrays will be a very important tool that we use to build our applications.  For now, it is important to understand the basics of their syntax.

## Exercises

1. Create an array of numbers, 1-5, using `array()`, and assign it to a variable. Now `var_dump()` your variable. Now `print_r()` your variable.

1. Repeat #1 using square brackets `[]` instead of `array()`.

1. Echo the element with the index of `3` from your array. The value should be `4`. Do you see how array indices work?

1. Create an associative array with keys (`first_name`, `last_name`, `email`, `phone`) and put a person in this array.

1. Create a variable `$test` and make it a multidimensional array with the keys `person1`, `person2`, and `person3` with your person array from last step, and 2 more people arrays, as values.
