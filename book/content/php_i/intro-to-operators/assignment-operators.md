# Assignment Operators

We use assignment operators to set the value of variables and keys in PHP.

### Basic Assignment Operators

The `=` is the basic assignment operator.  It does not mean _is equal to_, rather, it means _gets set to_, or set the thing on the left to the thing on the right.

```php
$num = 5;
```

Here we are assigning the integer `5` to the variable `$num` using basic assignment.

#### Array key assignment

The basic assignment operator for arrays is `=>`.

```php
$arr = array('key' => 'value');
```

### Combined Operators

Combined operators allow us to use the value of a variable in an expression.

To increase the value of a variable, we can use the `+=` operator.

```php
$num = 42;
$num += 1;
```

The variable `$num` is now `43`, as this was the same as writing `$num = $num + 1`.

Let's take a look at this in the interactive shell.

    php > $num = 5;
    php > $num += 2;
    php > echo $num;
    7


We can also subtract using the `-=` operator.

    php > $num = 5;
    php > $num -= 2;
    php > echo $num;
    3

Division `/=`, multiplication `*=`, and modulus `%=` all work the same way.

### Assignment by Reference

The final assignment method is to assign by reference. Since PHP 5.0 introduced automatic reference passing for the `new` operator (which we'll cover with objects), assigning by reference has become less prolific in PHP code.  It is still important to understand and recognize this assignment type, and know what it means.

When we assign a variable as a _reference_ to another variable, they both _point at_, or share, the same value.

To understand this, let's first review some basic assignment.

    php > $someNumber = 5;
    php > $anotherNumber = $someNumber;
    php > echo $anotherNumber;
    5

Here we set `$someNumber` with the value of `5`.  We then set `$anotherNumber` to the value of `$someNumber`, which we know to be `5`.  When we `echo` the value of `$anotherNumber`, we see it is indeed set to the integer `5`.

    php > $someNumber = 10;
    php > echo $anotherNumber;
    5

Here we reassigned the value of `$someNumber` to `10`.  This does not change the value of `$anotherNumber`, which still has a value of `5`.

This is to be expected, and `$anotherNumber` is essentially just a copy of `$someNumber` at the time is was created.  They each have their own values.

When we assign by reference, we do not set the value of a variable, rather we set it to _share_ or _refer to_ the same value as another variable.

Let's take the same example, but assign by reference.

    php > $someNumber = 5;
    php > $anotherNumber = &$someNumber;
    php > echo $anotherNumber;
    5

Everything here is the same, but there is now an `&` on the assignment line:

```php
$anotherNumber = &$someNumber;
```

This tells PHP that `$anotherNumber` is set to reference `$someNumber`.  If we change `$someNumber` then `$anotherNumber` will also change.

    php > $someNumber = 10;
    php > echo $anotherNumber;
    10

Here we see the reference in action.  By changing the value of `$someNumber`, the output of `$anotherNumber` confirms the reference is working.

## Exercises

1. Create variable `$number` set it equal to `10`.

1. Multiply this number by `3` using a combined operator.

1. Create variable `$item1` set it to `5`. Echo `$item1`.

1. Create variable `$item2` set equal to `$item1`. Echo `$item2`.

1. Do the same thing assigning by reference.
