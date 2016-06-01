# Numbers

The number type in JavaScript will allow you to store whole numbers or decimals. Other languages, like PHP, have different types for whole numbers and decimals, but JavaScript does not. All numbers in JavaScript are 64bit (8 bytes) floating point numbers.

## Arithmetic Operators

Consider the operators listed below, along with the examples. With an initial value of x = 2, the examples will yield the results shown in the table.

Operator | Name | Operation | Result
--- | --- | --- | ---
`+`  | Addition       | `x + 1` | `3`
`-`  | Subtraction    | `x - 1` | `1`
`*`  | Multiplication | `x * 2` | `4`
`/`  | Division       | `x / 2` | `1`
`%`  | Modulus        | `x % 2` | `0`

Operator precedence and the grouping operator also come into play when using arithmetic operators. See the example below as a reminder of why it is important to use parenthesis.

```js
// what do you expect from the statement below?

2 + 3 * 4

// hint, it isn't 20 because the multiplication operator has higher precedence than the addition operator.

// the above statement is actually evaluated as follows:

2 + (3 * 4)

// this yields a result of 14. remember, use parenthesis and get the result you expect and make it clear to others.
```

The modulus operator is an interesting one. It will calculate the remainder of a division operation using the provided inputs. Highlighting every other row in a data table is easily achieved with the modulus operator, in conjunction with a loop counter. When you perform `x % 2`, the result will be `0` if `x` is even, or `1` if `x` is odd.

The assignment operator ,`=`, can be combined with certain arithmetic operators to create shorthand assignments.

Operator | Shorthand Example | Equivalent To
--- | --- | ---
`+=` | `x += 2;` | `x = x + 2;`
`-=` | `x -= 2;` | `x = x - 2;`
`*=` | `x *= 2;` | `x = x * 2;`
`/=` | `x /= 2;` | `x = x / 2;`
`%=` | `x %= 2;` | `x = x % 2;`

## Unary Operators

Unary operators operate on a single value and are the simplest type of operator. With an initial value of x = 1 and y = 2, the examples will yield the final X and Y values shown in the table.

Operator | Name
--- | ---
`++` | Increment
`--` | Decrement
`+`  | Plus
`-`  | Minus

The increment and decrement operators can be placed before or after the variable that is being incremented. If you put the operators before the operand (variable being operated on), then you are performing a pre-increment or pre-decrement. If you put the operators after the operand, then you are performing a post-increment or post-decrement. Let's look at the difference:

```js
var x = 1;

// pre-increment

++x;
// console prints out 2

x;
// console prints out 2

// put x back to where we started
x = 1;

// post-increment
x++;
// console prints out 1

x;
// console prints out 2
```

## Functions

Here are some useful functions to use when working with a number in JavaScript:

### isNaN()

The isNaN() function determines if the passed in parameter is a number or can be converted to a number. It will return `true` or `false` based on the result. There is also a constant, `NaN`, that is returned when an undefined result is returned as the result of a numeric operation.

### .toFixed()

The `toFixed()` method allows you to specify the number of decimal places a number should be displayed with. A string is returned with either `0` padding to the specified number of decimal places, or a truncation to the specified number of decimal places.

```js
var price = 3.1;
price.toFixed(2); // yields 3.10
```

## Constants

Here are some useful constants to use when working with a number in JavaScript:

### Number.MAX_VALUE

This constant will return the maximum possible value for a number.

### Number.MIN_VALUE

This constant will return the minimum possible value for a number.

### Infinity (Number.POSITIVE_INFINITY) and -Infinity (Number.NEGATIVE_INFINITY)

When a number goes outside the available range, it will become `Infinity` or `-Infinity` based on if the result was respectively above or below the max range.

## Usage

Numeric values are used in real world situations to represent units of measure
like: meters, dollars, seconds, years, etc. For instance:

```js
var areaInAcres = 12;
var age = 36;
var cost = 12.50;
var PI = 3.1416;
```

Numeric variables also hold the result of arithmetic operations using those
measures. For instance, the total payment for a customer based on the products
she buys, the average time of a runner in a specific competition.

```js
// These are the prices of some products in a store.
var tv = 120;
var blueRayPlayer = 60;
var laptop = 250;

// This is the total that a customer should pay
var total = tv + bluRayPlayer + laptop;
```

## Exercises

For this lesson, we will explore numbers.

In the Chrome JavaScript Console, work through the following examples:

```js
// what do you expect the result of the following statement to be?

5 + 10 * 20;

// add parenthesis to the above statement to get a result of 300.
```

```js
// execute the following statements:

var a = 1;
var b = a++;
var c = ++a;

// afterwards, what do you expect the values of a, b, and c to be?
// see if you were correct by typing the name of one of the variables and hitting enter.

// now try these. what do you expect to see?

var d = "hello";
var e = false;

d++;
e++;
```

```js
// execute the following statements, what do you expect?

var perplexed; // perplexed is undefined (no value is assigned)
perplexed + 2;
```

```js
// use the .toFixed() method display the price with 2 decimal places
var price = 2.7;
```

```js
// perform the following experiments with the isNaN() function and the NaN constant:

isNaN(0)

isNaN(1)

isNaN("")

isNaN("string")

isNaN("0")

isNaN("1")

isNaN("3.145")

isNaN(Number.MAX_VALUE)

isNaN(Infinity)

isNaN("true")

isNaN(true)

isNaN("false")

isNaN(false)

// to illustrate why the isNaN() function is needed:
NaN == NaN
```

Represent the following scenarios using numeric variables and arithmetic
operations in JS. Check the results in the console:

* You have rented some movies for your kids: The little mermaid (for 3 days),
  Brother Bear (for 5 days, they love it), and Hercules (1 day, you don't know
  yet if they're going to like it). If price for a movie per day is $3, how
  much will you have to pay?
* Suppose you're working as a contractor for 3 companies: Google, Amazon and
  Facebook, they pay you a different rate per hour. Google pays $400, Amazon
  $380, and Facebook $350. How much will you receive in payment for this week?
  You worked 10 hours for Facebook, 6 hours for Google and 4 hours for Amazon.
