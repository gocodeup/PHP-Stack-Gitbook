# Logical Operators

Logical operators allow us to use boolean logic in our programming.

The [PHP documentation](http://www.php.net/manual/en/language.operators.logical.php) gives us this table:

<table>
    <tr><th>Example</th><th>Name</th><th>Result</th></tr>
    <tr>
        <td><code>$a and $b</code></td>
        <td>And</td>
        <td><code>true</code> if both <code>$a</code> and <code>$b</code> are <code>true</code>.</td>
    </tr>
    <tr>
        <td><code>$a or $b</code></td>
        <td>Or</td>
        <td><code>true</code> if either <code>$a</code> or <code>$b</code> is <code>true</code>.</td>
    </tr>
    <tr>
        <td><code>$a xor $b<code></td>
        <td>Exclusive Or</td>
        <td><code>true</code> if either <code>$a</code> or <code>$b</code> is <code>true</code>, but not <strong>both</strong>.</td>
    </tr>
    <tr>
        <td><code>!$a</code></td>
        <td>Not</td>
        <td><code>true</code> if <code>$a</code> is not <code>true</code>.</td>
    </tr>
    <tr>
        <td><code>$a && $b</code></td>
        <td>And</td>
        <td><code>true</code> if both <code>$a</code> and <code>$b</code> are <code>true</code>.</td>
    </tr>
    <tr>
        <td><code>$a || $b</code></td>
        <td>Or</td>
        <td><code>true</code> if either <code>$a</code> or <code>$b</code> is <code>true</code>.</td>
    </tr>
</table>

## Using Logical Operators

We will cover logical operators more when we get into control structures, like `if` statements.

Logical operators are one of the most powerful tools in programming, and once we really begin to understand them, we'll be able to write much more functional code.

At the core, we use logical operators to determine if something is `true` or `false`, just like we did with comparison operators.  This allows us to make decisions in our programs and act accordingly.

### And and Or

In the prework, examples like this were given:

    If I win the lottery or it rains, then I will by a new car.

This says if either I win the lottery, _or_ it rains, do something.

    If I win the lottery and it rains, then I will by a new car.

Here, it says if I win the lottery _and_ it rains, do something.

These are 2 very different things.

The first expressions is true if either condition is met, the latter is only true if both conditions are met.

Using high-school algebra, let's consider this problem:

    x < y < z

There is not a way in PHP to express this directly:

    $x < $y < $z

However, if we read the statement aloud to form a sentence:

    $x is less than $y, and $y is less than $z

And then convert the sentence to PHP:

```php
$x < $y && $y < $z
```

Now that can be properly computed by PHP.

We use `&&` and `||` instead of `and` and `or` most of the time, and reason is order of precedence.  Most code bases prefer using the `&&` and `||` versions for consistency and to avoid confusion.

#### Operator Precedence

Logical operators are subject to operator precedence like all the other PHP operators.

```php
$x < 1 || $y < 1 && $z < 1
```

`&&` is evaluated before `||`, so this will be evaluated by PHP as:

```php
$x < 1 || ($y < 1 && $z < 1)
```

This example is not the same as this one:

```php
($x < 1 || $y < 1) && $z < 1
```

It is a good practice to group our logical expressions, not only to avoid unseen bugs, but also to make our code more readable.

### Not

Of the big 3 logical operators (AND, NOT, OR), we've covered 2 of them.  The last is _not_, expressed with an exclamation point `!`. We've used this with `!=` and `!==` (not equal and not identical); and now we are going to see we can use it in expressions also.

Adding `!` to an expression tells PHP that we want logically ask is something is _not true_.

    php > $x = true;
    php > var_dump($x);
    bool(true)
    php > var_dump(!$x);
    bool(false)

Here `$x` still has a value of `true`, we did not change its value, in the second `var_dump()` we asked PHP to give us result of `not the value of $x`, so when `$x` is `true`, asking if it is `not true` is going to be false.

We'll be able to use logical expressions with more concrete examples once we've covered control structures.  For now, we need to understand that computers make decisions by determining if statements are true or false, and using _and_, _not_, and _or_ help us form expressions that computers can understand.

## Exercises

1. Using the PHP interactive shell, set the following 3 variables.

    ```php
    $x = 0;
    $y = 5;
    $z = 10;
    ```

1. `var_dump()` the results of the expression `$x < $y < $z`.  The result should be `bool(true)`

1. `var_dump()` the results of the expression `$x > $y < $z`.  The result should be `bool(false)`

1. `var_dump()` the results of the expression `$x > $y || $y < $z`.  The result should be `bool(true)`.

1. `var_dump()` the results of the expression `$x > $y || !($y < $z)`.  The result should be `bool(false)`.

    This reads "\$x is greater than \$y or \$y is not less than \$z".
