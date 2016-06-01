# Type Juggling

In some languages, once a variable is set to a specific type, it will only hold that type forever. The value can be changed but only to values of that same type.

Other languages, like PHP, perform "type juggling" &mdash; allowing a variable to change both in value and in data type. The data type of a variable is dependent upon the value that it holds. When a new value is assigned to a variable, the variable takes on the type of that value.

A variable holding a string, can be replaced with a variable holding an integer. For example:

    php> $someString = “Hello!”;

    php > var_dump($someString);
    string(6) "Hello!"

    php > $someString = false;
    php > var_dump($someString);
    bool(false)

Here, we see that we not only replaced the value of `$someString`, we also changed its type.

We can cast, or alter, the type of a variable, and PHP will try to convert the contents from one type to another.

One of the ways we can do this is to pass the type in parentheses before the variable.  In the case of booleans, we know PHP refers to them as `bool` .

    php > $someVar = 1;
    php > var_dump($someVar);
    int(1)

We now have a variable, `$someVar`, that has a value `1` with type of `int` (for integer).

To make this `int` turn into a  `bool`, we will need to cast it like this `(bool) $someVar`.

Let us dump the results of the cast to see what we get.

    php > var_dump((bool) $someVar);
    bool(true)

By adding `(bool)` before the variable name, we _cast_, or altered, the data type from `int` to `bool`.  PHP then decided that the value `1` should be represented as `true` when cast to boolean.

The other thing we notice here is the ability for us to _nest_ arguments in a function.  PHP reads code from the inside out, meaning the code inside parentheses is evaluated prior to code outside.  In this case, `(bool) $someVar` was calculated to `true`, and then, `var_dump()` read the value and dumped its type and value, `bool(true)`.

## Exercises

What happens when we cast different types to `bool`?

So far, we have learned about `bool` and have seen `string` and `int` data types, so let us do some variable dumping and learn how PHP converts different types when cast to `bool`.

Convert the following types to boolean and dump the results.

1. The string `"Hello Codeup"`
1. The int `42`
1. an empty string `''`
1. The int `-8`
1. The string `'true'`
1. The float `1.618`
1. The string `"false"`
1. The int `0`
