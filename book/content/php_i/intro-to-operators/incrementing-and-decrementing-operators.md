# Incrementing/Decrementing Operators

We use Incrementing/Decrementing operators to increase or decrease a value.

The [PHP documentation](http://www.php.net/manual/en/language.operators.increment.php) gives us this table:

Example | Name | Effect
--- | --- | ---
`++$a` | Pre-increment | Increments `$a` by one, then returns `$a`.
`$a++` | Post-increment | Returns `$a`, then increments `$a` by one.
`--$a` | Pre-decrement | Decrements `$a` by one, then returns `$a`.
`$a--` | Post-decrement | Returns `$a`, then decrements `$a` by one.

## Using Incrementing/Decrementing Operators

While programming, we find ourselves adding and subtracting `1` to items quite often.  Increasing a variable by 1 could be express like this:

```php
$a = 1;
```

This would set `$a` to `1`.

```php
$a = $a + 1;
```

This sets `$a` to `2`, as it reads "set $a to $a plus 1".

We could write this more succinctly by using an increment operator.

```php
$a = 1; // Set $a to the integer 1
$a++; // Increase the value of $a by 1
echo $a; // outputs: 2
```

In this example we see that `$a++` increases the value of `$a`.

There is another way to increase the value of `$a` by one: `++$a`.  So what's the difference?

```php
$a = 1;
$b = $a++;
echo '$a = ' . $a . ' and $b = ' . $b;
```

This outputs:

	$a = 2 and $b = 1

If we use `++$a` instead:

```php
$a = 1;
$b = ++$a;
echo '$a = ' . $a . ' and $b = ' . $b;
```

This now outputs:

	$a = 2 and $b = 2

As we can see, the _pre-increment_ operator `++$a` increases the value _before_ it returns the result.  The _post-increment_ operator returns the value of `$a`, and then it increases its value by one.

We can decrement the value the same way using the _decrement_ operators.

```php
$a = 1;
$b = $a--;
echo '$a = ' . $a . ' and $b = ' . $b;
```

Outputs:

	$a = 0 and $b = 1

Likewise, we can see the _pre-decrement_ operator act as expected:

```php
$a = 1;
$b = --$a;
echo '$a = ' . $a . ' and $b = ' . $b;
```

With output of:

	$a = 0 and $b = 0

## Exercises

In the php interactive shell write the following and see the output:

1. `$a = 10;`

1. `echo ++$a;`

1. `echo $a++;`

1. `echo $a;`

1. `$b = 20;`

1. `echo --$b;`

1. `echo $b--;`

1. `echo $b;`
