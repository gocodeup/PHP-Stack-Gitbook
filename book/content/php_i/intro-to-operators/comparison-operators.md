# Comparison Operators

We use comparison operators to compare values.

The [PHP documentation](http://www.php.net/manual/en/language.operators.comparison.php) gives us this table:

Example | Name | Result
--- | --- | ---
`$a == $b` | Equal | true if `$a` is equal to `$b` after type juggling.
<code  style="white-space:nowrap">$a === $b</code> | Identical | true if `$a` is equal to `$b`, and they are of the same type.
`$a != $b` | Not equal | true if `$a` is not equal to `$b` after type juggling.
`$a <> $b` | Not equal | true if `$a` is not equal to `$b` after type juggling.
<code style="white-space:nowrap">$a !== $b</code> | Not identical | true if `$a` is not equal to `$b`, or they are not of the same type.
`$a < $b` | Less than | true if `$a` is strictly less than `$b`.
`$a > $b` | Greater than | true if `$a` is strictly greater than `$b`.
`$a <= $b` | Less than or equal to | true if `$a` is less than or equal to `$b`.
`$a >= $b` | Greater than or equal to | true if `$a` is greater than or equal to `$b`.

## Using Comparison Operators

Comparing items is very important in any programming language.  We must make decisions, and comparing items allows us make intelligent choices.

#### Equal and Identical

We've already seen that values in PHP can be of different types.  Because PHP is a _dynamically typed_ language, the string `'1'` is _equal to_ (`==`) the integer `1`.  The _equal_ operator (`==`) checks to see if the values are the same, no matter the type.

~~~php
'1' == 1; // True statement
~~~

We say these are equal, because PHP automatically _casts_ the string `'1'` to an integer to make the comparison.  If we use the _identical_ operator ('==='), PHP will check if the values _and_ the types are the same.

~~~php
'1' === 1; // False statement
~~~

PHP also gives us the ability to check if things are _not equal_ or _not identical_.

The _not equal_ operator is `!=`.  While we can also use `<>` to express _no equal_, it is almost never used in real code.

~~~php
'1' != 1; // False statement.
~~~

This statement is false because 1 is equal to 1, when they are both cast to integers.

The _not identical_ operator is `!==`

~~~php
'1' !== 1; // True statement.
~~~

The string 1 is not identical to  the integer 1.

When we cover _control structures_ like `if`, comparison operators will be used more frequently.

#### Less than and Greater than

Comparing equality and identity are powerful, but sometimes we also need to determine if one item is greater than or less than an item.

In middle school math, we were asked to compare objects using the _greater than_ `>` and _less than_ `<` symbols.  PHP uses them the same way, we refer to them as operators.

~~~php
1 > 3; // False
3 > 1; // True
1 < 3; // True
3 < 1; // False
~~~

We can also check if an item is _greater than or equal to_ `>=` another item.

~~~php
$x = 3;
$y = 3;

$x > $y; // False
$x >= $y; // True
~~~

Likewise, we can check for _less than or equal to_ `<=`.

~~~php
$x = 3;
$y = 3;

$x < $y; // False
$x <= $y; // True
~~~

We often use these when programming things like "if the user input is less than the random number, tell them to guess _higher_'.

## Exercises

In PHP shell write the following and see the output

1. `var_dump('test' == 'test');`

1. `var_dump('test' == 'Test');`

1. `var_dump(100 > 5);`

1. `var_dump('25' === 25);`

1. `var_dump('25' !== 25);`
