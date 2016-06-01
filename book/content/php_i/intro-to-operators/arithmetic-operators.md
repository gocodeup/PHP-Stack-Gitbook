# Arithmetic Operators

We've been using arithmetic operators from the very beginning, to add, subtract, multiply, and divide numbers via the interactive shell.

Example | Name | Result
--- | --- | ---
`-$a`	| Negation | Opposite of `$a`.
`$a + $b`	| Addition | Sum of `$a` and `$b`.
`$a - $b`	| Subtraction | Difference of `$a` and `$b`.
`$a * $b`	| Multiplication | Product of `$a` and `$b`.
`$a / $b`	| Division | Quotient of `$a` and `$b`.
`$a % $b`	| Modulus | Remainder of `$a` divided by `$b`.

In this table from the [PHP docs](http://www.php.net/manual/en/), we see each of the arithmetic operators explained.

The first 5 should be very familiar to each of us; these are the basic math functions we use in our daily lives, and each can be practiced in the interactive shell.

The _modulus_ operator may seem a bit strange at first glance.  This operator returns the remainder of a number divided by another number.  This is very useful for determining if a number is even or odd, for example.

## Using Arithmetic Operators

Let's take a quick look at using each of the arithmetic operators.

#### Negation

Numbers less than zero need to be noted as such, and for PHP the negation operator is the minus sign `-`.

Prepending the negation operator to a number (integer or float) will set it as negative.

```php
$num = -42;
```

#### Addition

Add numbers by using the addition operator `+`.

    php > echo 5 + 4;
    9
    
#### Subtraction

Subtract numbers by using the subtraction operator `-`. 

    php > echo 5 - 4;
    1

#### Multiplication

Multiply numbers by using the multiplication operator `*`.

    php > echo 5 * 4;
    20

#### Division    

Divide numbers by using the division operator `/`.

    php > echo 5 / 4;
    1.25

#### Modulus

Find the remainder of a number divided by another number using the modulus operator `%`.

    php > echo 5 % 4;
    1

### Operator Precedence and Grouping

The order of our operations determines the outcome.  

    php > echo 2 + 3 / 2;
    3.5

Because PHP evaluates division before addition, `3 / 2` is computed first resulting in `1.5`.  `1.5` is added to `2`, resulting in `3.5`.

If we wanted to evaluate the `2 + 3` first, we can _group_ them using parenthesis.


    php > echo (2 + 3) / 2;
    2.5

[PHP's operator precedence documentation](http://us3.php.net/manual/en/language.operators.precedence.php) outlines the order of precedence for all the PHP operators.

## Exercises

Using the interactive shell:

1. Add the numbers `-20` and `-22`
1. Subtract `16` from `42`
1. Multiply `6` and `4`
1. Find the remainder of `3` divided by `2` using modulus
