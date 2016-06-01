# Switch Statement

The `switch` statement provides an alternative to a series of `if-else` statements. If you have a long series of `if-else` statements, the use of a `switch` statement can increase code readability. Always try to chose the language tools that will make your code as readable as possible.

Let's look at an example:

```js
'use strict';

var whatAmI = "I am a string.";

if (typeof whatAmI === "boolean") {
    console.log("You are a boolean.");
} else if (typeof whatAmI === "number") {
    console.log("You are a number.");
} else if (typeof whatAmI === "string") {
    console.log("You are a string.");
} else if (typeof whatAmI === "function" || typeof whatAmI === "object") {
    console.log("You are an object.");
} else if (typeof whatAmI === "undefined") {
    console.log("You are undefined.");
} else {
    console.log("I have no clue.");
}
```

Here is the same example, re-written using a `switch` statement:

```js
'use strict';

var whatAmI = "I am a string.";

switch (typeof whatAmI) {
    case "boolean":
        console.log("You are a boolean.");
        break;
    case "number":
        console.log("You are a number.");
        break;
    case "string":
        console.log("You are a string.");
        break;
    case "function":
    case "object":
        console.log("You are an object.");
        break;
    case "undefined":
        console.log("You are undefined.");
        break;
    default:
        console.log("I have no clue.");
}
```

Both code blocks accomplish the same goal, however, the `switch` statement produces a more readable result with less duplication.

The `switch` statement takes an expression, and then multiple `case` statements are used to try to match the expression. Since we provide the `switch` the expression only once, vs the `if-else` block where the expression is repeated throughout, the code has less duplication.

Notice that most, but not all, `case` statements in the example contain a `break` statement. The `break` statement prevents evaluation of any `case` statements after it. When a `break` statement is not provided in a `case`, evaluation of subsequent `case` statements will continue. In the example above, we used this to replace the `OR` operation when checking for `function` or `object`.

Finally, `switch` statements can provide a `default` case. This is equivalent to the final `else` in a series of `if-else` statements.

## Exercises

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}
We are going to re-build the last exercise using a switch instead of an `if-else` statement. Please follow the instructions below.

1. Download [`switch.js`](../../examples/javascript/switch.js) and save it to the `js` folder within your `Codeup` folder.
1. Create an HTML file named `switch_js.html` within the `Codeup` folder on your Desktop.
1. Add a `<script>` tag to your HTML to link up `switch.js` to your file.
1. Open `switch.js` in Sublime and follow the instructions marked `TODO:`.
1. Remember to save your work!

{% else %}

1. Create an HTML file named `switch_js.html` within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Add a `<script>` tag to your HTML to link up `switch.js` to your file.
1. The following line generates a random number between 0 and 5.
```javascript
var luckyNumber = Math.floor(Math.random()* 6)
```
   Now, suppose there's a promotion in Walmart, If your lucky number is 0 you
   have no discount, if your lucky number is 1 you'll get a 10% discount, if
   it's 2, discount is 25%, if it's 4, 50%, and if it's 5 you'll get all for
   free!. Write a JS program that logs to the console, how much you will have to
   pay if your receipt is for $60. Every time you reload your page you should
   see a different result. Use a `switch` statement for this exercise.
1. Suppose you have been assigned a task and you need to convert a number to the
   name of a month. 1 should be shown as January, 2 as February and so on. Using
   a `switch` statement write the JS code that shows the names of the months in
   the console.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
