# Strings

We've been using strings from the very beginning, when we output our "Hello World" one-liner.  Strings, as we learned, are series of characters _strung_ together.

For now, we'll concentrate on how we make strings and the basics of their use.  There are plenty of cool functions in our PHP arsenal to manipulate and work with strings; first we need to know how to use them.

## Single Quotes

The easiest way to create a string is to wrap characters in single quotes.

~~~php
$name = 'John';
~~~

This creates a variable `$name` with the value `John` with the type of `string`.

If we insert another string in the quotes, PHP is unaware.

	php > $firstName = 'John';
	php > $lastName = 'Doe';
	php > echo '$firstName $lastName';
	$firstName $lastName

As we see, PHP sees our variables as ordinary characters, and does not do anything to evaluate them.

So how do we put strings together for simple output?

### Concatenation

[Concatenation](http://en.wikipedia.org/wiki/Concatenation) is common in most every programming language, and allows strings to be joined together, end-to-end.

In PHP, the concatenation operator is the period `.`, so to join 2 strings together, we'd use a `.` and no quotes.

	php > echo $firstName . $lastName;
	JohnDoe

That gets us closer, but still not what we wanted.  Whitespace characters are also stored in strings, as we've seen, so we can concatenate a blank character in between our 2 strings to get our desired results.

	php > echo $firstName . ' ' . $lastName;
	John Doe

We can even store the concatenated string in a new variable.

	php > $fullName = $firstName . ' ' . $lastName;
	php > echo $fullName;
	John Doe

Combining strings is nice, but there is one caveat with single quotes we need to think about.  What happens when we have a string with a single quote in it?

	php > $firstName = 'd'anne';
	php '

To get our shell back to working, we have to enter another single quote and a semicolon `';`.  Why?  Because PHP thinks we have 2 strings, `'d'` and `';` that is not closed.  Since we can have statements spanning multiple lines, it just assumed we were still typing.

So how do we solve this?

### Escape characters

We can escape the standard string parsing by using a backslash character `\`.  By adding this character, we are telling PHP that the next character(s) have special meaning, it needs to do something special. In this case, we are telling PHP to ignore the `'` single quote, by _literally_ passing a single quote to the value.

	php > $firstName = 'd\'anne';
	php > echo $firstName;
	d'anne

We'll get more in depth with escaped characters shortly, however, we still have one last problem: what happens when we want to use a backslash in our string?  We can escape that also:

	php > echo 'this is a single backslash \\';
	this is a single backslash \


## Exercises

Let's create some strings!

In the PHP interactive shell, `echo` the following as single-quoted strings:

	In windows, the main drive is usually C:\

and

	I can do back slashes \, and double back slashes \\, and the amazing triple back-slash \\\!

Concatenate some variables

~~~php
$name = 'John Doe';
$address = '123 Any Street';
~~~

Output the following using `echo` statements:

	John Doe, 123 Any Street

and

	John Doe \ 123 Any Street
