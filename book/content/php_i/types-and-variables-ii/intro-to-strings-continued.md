# Strings (continued)

Most strings can be formed using the single quote method, and it is the fastest way to assign a string to a variable.  There are other ways to create strings, that are sometimes better suited to specific needs.

## Double Quotes

The next way we can create strings is to use double quotes `"`.  Unlike the single quote method, double quotes evaluate the strings and escaped characters in the value.

Along with escaping quotes and backslashes, the escape character can do many things, including adding new lines and tabs.

- The new line "character" is defined by the sequence `\n`
- The horizontal tab "character" is defined by the sequence `\t`

If we pass these escaped characters in a double quoted string, PHP will interpret them accordingly.

    php > echo "Joe Blow\n123 Cherry Tree Ln\nSomewhere, CA\t90210";
    Joe Blow
    123 Cherry Tree Ln
    Somewhere, CA	90210

There are several more escape characters we can use.  To view them, please refer to [the documentation](http://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.double).

### String interpolation

The next feature of double quoted strings is string interpolation, also referred to as [string parsing](http://www.php.net/manual/en/language.types.string.php#language.types.string.parsing).  This is a fancy way of saying that variables inside of the double quoted string are evaluated, and the value of the string is output in its place.

There are 2 ways to use string interpolation in PHP.

#### The Simple Syntax

Simply passing a variable into a double quoted string will output the value.

    php > $firstName = 'Joe';
    php > echo "The guy's first name is $firstName";
    The guy's first name is Joe

We should notice 2 things here: the variable `$firstName` was interpreted, and we did not have to escape our single quote.

We can also escape variables in double quoted strings.

    php > echo "The value of \$firstName is $firstName";
    The value of $firstName is Joe

We would need to escape any double-quotes.

    php > echo "The value of \$firstName is \"$firstName\"";
    The value of $firstName is "Joe"

#### The Complex Syntax

As we progress in our understanding of PHP, we'll learn there are some interesting ways to use variables, and not all will simply be `$name`.  As we begin to use arrays and objects, we'll end up doing some fun stuff with our variable names, and PHP needs a way to distinguish variables in strings for parsing.

To accomplish this, we can wrap more complex strings in curly braces `{}` that we want to evaluate.

A practical example of needing these braces, without exploring these other data types, would be variables that touch other parts of our strings.

Let take the following variables

    $firstName = 'Joe';
    $lastName = 'Blow';

and we want to display them like this:

    $firstName_$lastName

so it reads

    Joe_Blow

If we do not use curly braces

    php > echo "$firstName_$lastName";
    PHP Notice:  Undefined variable: firstName_ in php shell code on line 1
    PHP Stack trace:
    PHP   1. {main}() php shell code:0

we receive an error telling us that `$firstName_` is undefined.

If we use curly braces

    php > echo "{$firstName}_{$lastName}";
    Joe_Blow

we get our desired results.

**NOTE:** Many teams require all parsed strings to be placed in curly braces for readability and consistency.

### Heredoc and Nowdoc

Sometimes strings are large blocks of text, and converting all newlines, escaping all characters, etc. is painful.  Not as commonly used as single and double quotes, heredoc and now doc offer us a multi-line solution.

Heredoc is created by using `<<<` followed by a name in all caps, and ends with that name.

Let's make this limerick a string

    There was a young man of Japan
    Whose limericks never would scan.
    When asked why this was,
    He replied "It's because
    I always try to fit as many syllables into the last line as ever I possibly can.

We can do this by using a heredoc

    $limerick = <<<POEM
    There was a young man of Japan
    Whose limericks never would scan.
    When asked why this was,
    He replied "It's because
    I always try to fit as many syllables into the last line as ever I possibly can.
    POEM;

We can test in the shell

    php > $limerick = <<<POEM
    <<< > There was a young man of Japan
    <<< > Whose limericks never would scan.
    <<< > When asked why this was,
    <<< > He replied "It's because
    <<< > I always try to fit as many syllables into the last line as ever I possibly can.
    <<< > POEM;
    php > echo $limerick;
    There was a young man of Japan
    Whose limericks never would scan.
    When asked why this was,
    He replied "It's because
    I always try to fit as many syllables into the last line as ever I possibly can.

Heredoc is similar to double quotes in that is evaluates strings and escaped characters.  Nowdoc is like single quotes, and the only difference is the name following `<<<` is wrapped in single quotes like this `<<<'POEM'`.

Heredoc and nowdoc should only be used with large blocks of text, and are not commonly used for string creation in most applications.

To learn more, read the PHP [documentation on heredoc and nowdoc](http://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc).

## Exercises

Let's create some strings!

In the PHP interactive shell, `echo` the following as double-quoted strings:

These should all be single strings with double quotes:

    We don't need no education
    We don't need no thought control

and

    All the world's a stage,
    And all the men and women merely players:
    They have their exits and their entrances;


Using the following variables:

    $firstName = 'Joe';
    $lastName = 'Blow';
    $address = '123 Any Street';

Use double quotes to render the following results using string interpolation

    Blow, Joe, 123 Any Street

and

    JoeBlow123 Any Street

and

    Joe Blow
    123 Any Street
