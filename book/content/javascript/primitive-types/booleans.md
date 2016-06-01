# Booleans

A boolean can either be `true` or `false` and they are used for making decisions in computer programming. Note that `true` and `false` are not surrounded by any quotes. Booleans in JavaScript work like they do in other programming languages, however, it is important to understand how other types translate to true or false values.

In JavaScript, the following values will evaluate to `false`.

- `false`
- `null`
- `undefined`
- `0`
- `""` or `''` (empty string)
- `NaN` (special constant for not-a-number)

Any other values will evaluate to `true`.

## Logical Operators

There are some special operators that are used for boolean operations. These operators allow basic `AND`, `OR`, and `NOT`, logical operations. You will notice that JavaScript shares these operators with other languages such as PHP and C.

<table>
    <tr><th>Operator</th><th>Description</th></tr>
    <tr>
        <td><code>&&</code></td>
        <td>Logical AND</td>
    </tr>
    <tr>
        <td><code>||</code></td>
        <td>Logical OR</td>
    </tr>
    <tr>
        <td><code>!</code></td>
        <td>Logical NOT</td>
    </tr>
</table>

Basic logical operations work the same regardless of the language you are using. Here is an overview of what to expect when you use the `AND`, `OR`, and `NOT` operators.

|    AND Operation | Result  |
| ---------------- | ------  |
| `false && false` | `false` |
| `false && true`  | `false` |
| `true && false`  | `false` |
| `true && true`   | `true`  |

*Any `false` causes the result to be `false`*

<table>
    <tr><th>OR Operation</th><th>Result</th></tr>
    <tr>
        <td><code>false || false</code></td>
        <td><code>false</code></td>
    </tr>
    <tr>
        <td><code>true || false</code></td>
        <td><code>true</code></td>
    </tr>
    <tr>
        <td><code>false || true</code></td>
        <td><code>true</code></td>
    </tr>
    <tr>
        <td><code>true || true</code></td>
        <td><code>true</code></td>
    </tr>
</table>

*Any `true` causes the result to be `true`*

| NOT Operator | Result  |
| ------------ | ------  |
| `!false`     | `true`  |
| `!true`      | `false` |

*Result is opposite of input*

As mentioned above, JavaScript will attempt to convert types other than booleans to a `true` or `false` value when those types are used in a logical operation. There is a neat trick involving the `NOT` operator that makes this conversion more apparent.

Since we know that we can use the `NOT` operator to invert a boolean value, we can simply use another `NOT` to re-invert back to the original value. This would look like:

```js
!!true // this is still true
```

We can use the double `NOT` in the JavaScript Console to easily test what values will produce `true` or `false` when they are converted to booleans.

## Logical Operation Order and Grouping

Logical operations will be evaluated from left to right, however, [operator precedence](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Operator_Precedence) must be considered. Operator precedence is a term that means that some operators get higher priority than others. The higher priority operations are evaluated first, followed by the next in priority, until all operations are complete.

In JavaScript, the basic logical operators ordered from HIGH to LOW precedence are as follows:

- NOT is evaluated before
- AND, which is evaluated before
- OR

To overcome ambiguity and enforced desired order, operations can be grouped by using parenthesis `()`. Parenthesis are actually just another operator themselves, but they have higher precedence than all the other operators. Therefore, the result of the operation inside the parenthesis will be evaluated, and that result will be used to continue the logical operations. Parenthesis can also be nested. Note that grouping of operations using parenthesis is not limited to just the logical operators.

Take the following example:

```js
'use strict';

// the statement below will evaluate to true
false && false || true

// due to order of operations, the statement will be evaluated like this:
(false && false) || true
     false       || true
                true

// see how the parenthesis make it more clear what order things will be evaluated in?
// when multiple logical operators are using together, use parenthesis to make things clear.

// looking at a real-world scenario:

var isLoggedIn = true;
var isAdmin = false;
var isOwner = true;

// the following statement would be true
isLoggedIn && isAdmin || isOwner;

// however, it would be evaluated like this:
(isLoggedIn && isAdmin) || isOwner;

// when what we really want is this:
isLoggedIn && (isAdmin || isOwner);

```

The main takeaway here is that order of operations is important, but grouping operations is the right way to make sure that things are clearly executed in the order you desire.

Boolean values and its operations are mostly used to represent **real world
conditions in code**. Think of a credit card operation. A person can only
withdraw from her account if she has a positive balance and the amount to
withdraw is not greater than the balance. This could be expressed in code as
follows:

```js
var accountHasPositiveBalance = true; // Let's say it's $2, 000.00
var accountWouldBeOverdrawn = true;   // Let's say we want to withdraw $2, 300.00

var canWithdraw = accountHasPositiveBalance && !accountWouldBeOverdrawn
// The value of the variable canWithdraw would not allows to perform this transaction
```

## Exercises

For this lesson, we will explore what values translate to `true` or `false`.

In the Chrome JavaScript Console, execute the following statements:

```js
!true

!false

!!true

!!false

!!0

!!-0

!!1

!!-1

!!0.1

!!"hello"

!!""

!!''

!!"false"

!!"0"
```

Now, work through the following logical operator combination examples:

```js
/*
 * Perform the following steps for the statements below.
 *
 * 1) determine what you expect the answer to be.
 * 2) calculate the actual answer.
 * 3) add parenthesis to show expected order of operation.
 * 4) change parenthesis to cause result to be opposite of what it would normally be.
 */

false && false || true

true || !true && true && false
```

The following JS code is an extract of an application that makes a discount on a
product only for premium users. Add the JS code that would describe that
condition. And test it with different values. **Please use the credit card
example as a guide** for this and the following exercises.

```js
var isPremiumUser = true;
var productHasOffer = false;
```

Write the JS code, variables and boolean expressions, to describe the following
scenarios. Do not worry about the real operations to get the values, the goal of
this exercise is to understand how real world conditions can be represented as
boolean operations in code.

* A student can be enrolled to a class only if the class is not full and the
  class schedule does not conflict with her current schedule.
* A product offer can be applied only if people buys more than 2 items, and the
  offer has not expired. Premium members do not need to buy a specific amount of
  products.
* A person receives a movie recommendation only if she has seen at least one
  movie of the same actor or three movies of the same category. The movie is
  also recommended if the person has qualified at least one movie of the same
  category as very good.
