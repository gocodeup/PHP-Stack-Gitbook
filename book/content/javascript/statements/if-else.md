# If/Else Statements

## If
An `if` statement allows you to execute code based on certain conditions. JavaScript `if` statements will be familiar if you have worked with PHP since the syntax is the same.

```js
// if example
if (condition) {
    // code here gets executed if condition evaluates to true
}
```

## If/Else
Following an `if` statement, you can have an `else` statement. The code in the `else` statement will get executed when the condition in the `if` statement evaluates to false.

```js
// if/else example
if (condition) {
    // code here gets executed if condition evaluates to true
} else {
    // code here gets executed if condition evaluates to false
}
```

## If/Else If/Else
You can also chain multiple else conditions by using `else if` as follows:

```js
// if/else if/else example
if (condition1) {
    // code here gets executed if condition1 evaluates to true
} else if (condition2) {
    // code here gets executed if condition2 evaluates to true
} else {
    // code here gets executed if neither condition1 nor condition2 evaluate to true
}

// note: you can leave off the trailing else if it isn't needed
```

## Comparison Operators

When building conditional statements, you can use the JavaScript comparison operators.

Operator | Description
--- | ---
`==`  | equal to (value)
`===` | equal to (type and value)
`!=`  | not equal to (value)
`!==` | not equal to (type and value)
`>`   | greater than
`<`   | less than
`>=`  | greater than or equal to
`<=`  | less than or equal to

## Ternary Operator (Shorthand If/Else)

A shorthand version of an if/else statement is available when a single assignment is being made based on the provided condition. Let's look at an example.

```js
'use strict';

var message;

if (success) {
    message = "Operation was successful.";
} else {
    message = "Oops, something went wrong.";
}

// the above if/else can be re-written as:
var message = (success) ? "Operation was successful." : "Oops, something went wrong.";
```

Note: The ternary operator should be used sparingly, primarily for the purpose of increasing code readability. If used improperly, it will have the opposite effect, producing difficult to read code.

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Download [`if-else.js`](../../examples/javascript/if-else.js) and save it to the `js` folder within your `Codeup` folder.
1. Create an HTML file named `if-else-js.html` within the `Codeup` folder on your Desktop.
1. Add a `<script>` tag to your HTML to link up `if-else.js` to your file.
1. Open `if-else.js` in Sublime and follow the instructions marked `TODO:`.
1. Remember to save your work!

{% else %}

1. Create an HTML file named `if-else-js.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Add a `<script>` tag to your HTML to link up `if-else.js` to your file.
1. Write the JS code for the following problems
   * Knowing that a student's grades are 70, 80, 95. Write a JS program, using
     conditionals that logs to the console "You're awesome" if the average of
     her grades is greater than 80, otherwise the message should be "You need to
     practice more".
   * HEB has an offer for the clients that buy products amounting more than $200
     Write a JS program, using conditionals, that logs to the browser, how much
     does Ryan, Cameron and George need to pay. We know that Cameron bought
     $180, Ryan $250 and George $320. Your program will have to display a line
     with the name of the person, the amount before the discount, if any, and
     the amount after the discount.
   * Suppose your friend Isaac cannot decide between two options. He doesn't
     know if he should buy a car or a new house. Help him decide! Write a small
     JS program.
     The following line generates either a 0 or a 1 randomly.
     ```js
     var flipACoin = Math.floor(Math.random()* 2)
     ```
     Add an if statement to log a "Buy a car" to the console if the result is
     `0` and "Buy a house" if the result is `1`.
     Could this program be written using a ternary operator?
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
