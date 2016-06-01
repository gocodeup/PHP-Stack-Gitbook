# Numbers in PHP

Numbers in PHP consist of 2 basic types: `integers` and `floats`.

## Integers

Integers consist of _whole numbers_, positive and negative, in several _bases_.

For most programming you'll likely encounter, integers will be "counting numbers" like `1, 42, -12, 16, …`.

	php > $number = 42;
	php > var_dump($number);
	int(42)

Integers default to base10, as we learned in the prework, which is commonly referred to as _decimal_.

Computers also think in other bases, like hexadecimal and binary.  Integers can also be represented in those formats.

	php > $number = 0x2A;
	php > var_dump($number);
	int(42)

The hexadecimal number `0x2A` is `42` in decimal, and while PHP allows us to store this integer in the hex format, `var_dump()` still outputs it for us in decimal.

## Floats

Floats, also known as _doubles_, are floating point numbers.  This simply means that they have a decimal point somewhere in the number. The following numbers would be represented by the `float` data type.

	42.0
	3.14
	1.618
	3e-12

Let's dump some floats and see what they look like.

	php > $number = -6.5;
	php > var_dump($number);
	float(-6.5)

We can also cast a `float` to an `int` and dump the result.

	php > $number = 3 - 6.5;
	php > var_dump($number);
	float(-3.5)
	php > var_dump((int) $number);
	int(-3)

## Exercises

More fun with casting!  Just like we could cast different types to `bool`, let's see what happens when we cast stuff to numbers.

1. Cast the string `"Hello"` to an `int` and dump.
1. Cast the same string to a `float`.  What is different?
1. Cast the float `3.14` to an `int`.  What happened?
1. Cast the float `3.999` to an `int`.  Was the result what you expected?
1. Cast the string `"4.95"` to an `int`.  Then a `float`.
1. Cast the bool `true` to `int` and `float`.  Do the same for `false`.

As you can see, type casting is sometimes unpredictable, but overall it is pretty intuitive.  We'll dive deeper into manipulating numbers, and when we do, you'll know how to create and use variables with `integer` and `float` numbers as values.
