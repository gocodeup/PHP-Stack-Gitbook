# Intro to JavaScript Functions

{% video %}https://vimeo.com/155164208{% endvideo %}
[JavaScript Functions](https://vimeo.com/155164208/b833910c1a)

A function is a reusable block of code that performs a specified task, possibly calculating a value to return.

## Defining a Function

Here is an example of a function definition:

```js
'use strict';

function doSomething() {
    // code goes here
}
```

Notice that functions start with the `function` keyword. Next, comes the name of the function. In the above example, the function name is `doSomething`. Next come an open and closing parenthesis. The parenthesis are followed by an open and closing curly brace. The code for the function goes between the curly braces.

The first example just performs a task, but doesn't return a value. Sometimes you want a function that will calculate something and return the result. Here is an example:

```js
'use strict';

function doSomething() {
    var result;
    // calculate result
    return result;
}
```

This example looks much like the first, but you can see the last line within the curly braces starts with the `return` keyword. JavaScript, and other languages like PHP, use the `return` keyword to allow you to return a value from a function.

## Calling a Function

To run the code defined within a function, we call the function by its name, fallowed by a set of parenthesis.

```js
doSomething(); // call the function doSomething()
```

If our function returns a value, we can assign that value to a variable or pass the result straight to another function:

```js
'use strict';

var result = doSomething(); // Result now holds the value of what doSomething() returns

console.log(doSomething()); // The value doSomething() returns is passed to console.log()
```

The parenthesis are what tell JavaScript we with to run the function. If we forget them, JavaScript will assign the function itself to our variable. In essence, this creates an alias to our function:

```js
'use strict';

var doAnotherThing = doSomething; // No parenthesis!

doAnotherThing(); // Calls the code defined in doSomething()
```

## Arguments / Parameters

Besides returning values, sometimes a function needs to take one or more inputs. Inputs to a function are called arguments or parameters.

```js
'use strict';

function isEven(input) {
    var remainder = input % 2;
    if (remainder === 0) {
        return true;
    } else {
        return false;
    }
}

function sum(a, b) {
    return a + b;
}
```

In the examples above, you can see that the function `isEven` takes an argument called `input`. Within the curly braces of the function (also referred to as the function's scope), `input` is available as a local variable. Scope will be discussed in detail later in this sub-module.

Something else to notice about the `isEven` function is that there are multiple lines that use the `return` keyword. The first `return` that is encountered will end the execution of any subsequent lines of the function.

The `sum` function above needs to take more than one argument. Notice that the arguments are separated by a comma. You can pass as many arguments into a function as you'd like.

## First Class Functions

In JavaScript, functions are treated as first-class citizens. This simply means that functions can be assigned to a variable, passed as an argument to a function, or returned as a value from a function. We will be using some of these features in later lessons.

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Download [`functions.js`](../../examples/javascript/functions.js) and save it to the `js` folder within your `Codeup` folder.
1. Create an HTML file named `functions_js.html` within the `Codeup` folder on your Desktop.
1. Add a `<script>` tag to your HTML to link up `functions.js` to your file.
1. Open `functions.js` in Sublime and follow the instructions marked `TODO:`.
1. Remember to save your work!

{% else %}

1. Download [`functions.js`](../../examples/javascript/functions.js) and save it to the `js` folder within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Create an HTML file named `functions_js.html` in your `public` directoryc.
1. Add a `<script>` tag to your HTML to link up `functions.js` to your file.
1. Open `functions.js` in Sublime and follow the instructions marked `TODO:`.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
