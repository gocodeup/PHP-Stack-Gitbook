## Strings

In PHP, and most other programming languages, text is represented by the [string](http://www.php.net/manual/en/language.types.string.php) data-type.

A computer does not know what text is, but it knows characters via different [character encoding](http://en.wikipedia.org/wiki/Character_encoding) types.  When you put these characters in a row, or "string" them together, they form sequences that make sense to humans.

### Hello World

Almost every programming book starts off with a "Hello World" program, and although we've skipped that part up until now, we've not forgotten.

Remember that `echo` outputs a string, all we need to know is how to make a string in PHP.

There are several ways to accomplish making a string, the simplest being to place characters between single `'` or double `"` quotes.

To make the words _Hello World_ a string, we can simply do:

	'Hello World'

If we try to put this in our shell, it does nothing.

	php > 'Hello World';
	php >

This is because PHP does not know what to do with this string.  To output it, we must use `echo`

	php > echo 'Hello World';
	Hello World

You may have noticed every line of PHP ends with a semicolon `;`.  This is like a period in English; it tells PHP that your statement has come to an end.

### What's my name?

Remembering to use `echo`, quotes, and a semicolon, output your name using PHP's interactive shell.