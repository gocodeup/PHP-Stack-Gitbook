# Strings

The String data type represents a sequence of characters. Strings can be declared with either single or double quotes as follows:

```js
var singleQuoted = 'hello';
var doubleQuoted = "world";
```

One important note is that both single and double quoted strings are handled the same by JavaScript, unlike PHP, which handles them differently.

## Multi-Line Strings

If you have a string that you want to span multiple line in your code, you can use a `\` (backward slash) as follows:

```js
var multiLine = "Hello \
World!";
```

## String Concatenation

The joining multiple strings together into a single string is called concatenation. Concatenation in JavaScript uses the `+` (addition) operator. In contrast, PHP has a unique/different operator for concatenation and addition.

```js
// the statement below produces a value of "Hello World" in the variable sayHello
var sayHello = "Hello " + "World";
```

## Special Characters and Escaping

There are times when you want to insert a line break, tab, or other special character into a string. Here are some special characters and their meanings:

Character | Meaning
--- | ---
`\n`  | New line
`\t`  | Tab
`\\`  | Backslash
`\'`  | Apostrophe or single quote
`\"`  | Double quote

The above chart is not an exhaustive list, but just contains the most commonly used special characters. Let's see some examples:

```js
// This string:
var newLine = "This string has\na line break.";

// Would appear as:
// This string has
// a line break.

// This string:
var knockKnock = 'Who\'s there?';

// Would appear as:
// Who's there?
// Note: We could have surrounded the string in double quotes to avoid the need to escape the apostrophe.
```

## Parsing a String into a Number

Sometimes you have a string that represents a numeric value and you'd like to use it as a number. There are a couple handy functions just for this.

- `parseInt()` : takes a string as a parameter and returns a number in integer form.
- `parseFloat()` : takes a string as a parameter and returns a number in float/decimal form.

## Adding Strings and Numbers

Since the `+` operator is used for both addition and string concatenation in JavaScript, you need to be careful when combining strings and numbers.

```js
1 + 2;   // yields number 3
"1" + 2; // yields string "12"
```

Therefore, when you are combining strings and numbers, make sure you get the desired result by using the number parsing functions when a numeric result is desired.

```js
parseInt("1") + 2; // yields number 3
```

## Functions and Properties

Here are some useful functions to use when working with Strings in JavaScript:

- `.length` : property that describes the number of characters in the string.
- `.indexOf(char)` : returns the index of the specified character in the string.
- `.replace(find, replace)` : returns a copy of the string after performing a substitution.
- `.substring(fromIndex, toIndex)` : returns a subset of the original string based on the provided indices.
- `.toUpperCase()` : returns a copy of the string in all upper case.
- `.toLowerCase()` : returns a copy of the string in all lower case.
- `.trim()` : returns a copy of the string with whitespace at the beginning and end removed.
- `String.fromCharCode(code)` : returns a string based on the provided ASCII code.

## Exercises

```js
// execute the following statement, then perform the exercises below:
var sample = "Hello Codeup";

/*
 * 1) Use .length to calculate the number of characters in the string.
 * 2) Try to make the sample string all upper or all lower case.
 * 3) Update the variable sample via concatenation
 *    so that is contains "Hello Codeup Students".
 * 4) Now, replace "Students" with "Class".
 * 5) Find the index of "c" using .indexOf(), what do you observe?
 * 6) Find the index of "C" using .indexOf().
 * 7) Retrieve a substring that contains only the word "Codeup"
 *    by using indexOf() and substring().
 */
```

```js
// try parsing strings to numbers by executing the following:

parseInt("abcd1234");

parseInt("1234abcd");

parseInt("1,000");

parseInt("2.12");

parseInt("0");

parseInt("");

parseFloat("3.14");
```
