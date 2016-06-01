# Objects (and Other Types)

There are a few more data types available to us, most notably the `object` type.  As we begin to push deeper into the language, and start to use object-oriented methodologies, we'll explore these types in more detail.

It is important to know the object type exists, and before long, we'll be using it in most of the code we write.  For now, let's be sure we understand the data types we've learned about so far.

## Review of Data Types

Quickly, let's review what we've learned in this unit.

### Variables

Variables begin with a `$`, start with a letter or underscore, and can be followed by other letters, numbers, and underscores.

These variables hold values that we can use during the execution of our programs.

Assigning a value to a variable is done via the `=` equal sign.

### Constants

Constant names begin with a letter or underscore, can be followed by other letters, numbers, and underscores, and by convention are in all caps.

Constants can contain any primitive data type but once they are set they cannot be changed.

We define constants using the `define()` function.

### Data Types

We learned about several different data types in PHP.

#### Boolean

Boolean types are purely logical and can only be `true` or `false`.

#### Integers and Floats

Numbers in PHP fall into these two categories.  _Counting numbers_, or whole numbers, are of the type `integer` and _real numbers_ are `float` (floating point) numbers.

Integers can be decimal, hexadecimal, binary, and other base systems.

#### Strings

Strings are sets of characters _strung_ together.  These represent text in most cases.

Strings can be created several ways, using single and double quotes, heredoc, an nowdoc.

Concatenation is the joining of strings.  The concatenation operator in PHP is the period `.`.

Interpolation allows strings to be parsed inside of other strings.  String parsing is only available in double-quoted or heredoc strings.  Using curly braces `{}` allows complex strings or string placement to be parsed properly.

#### Arrays

Arrays are collections of data from various data types.

Arrays are declared using the `array()` method.

Arrays can have numeric keys or string keys.

Arrays containing other arrays are called _multidimensional arrays_.

Starting with PHP 5.4, arrays can be created with square brackets `[]`.