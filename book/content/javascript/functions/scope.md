# Variable Scope

Scope is a term that describes where a variable can be accessed. If a variable is in-scope, that means that it can be accessed from that location in the code. Conversely, if a variable is out-of-scope, that means it is not accessible. The types of scoping used by JavaScript is function-level scoping. This means that each function creates its own scope. Any variables declared in that scope are accessible by that scope and any sub-scopes. The examples that follow will clarify exactly how this works.

## Global Variables

Variables declared outside of a function are referred to as global variables and are in the global scope. Global variables can be accessed by any scripts or functions contained on the web page.

Global variables will remain present until the execution of the script ends. When running JavaScript in a web browser, this means the user has left the page or closed their browser.

Let's see an example:

```js
'use strict';

// declare a global variable
var globalVar = "Look, I'm Global!";

// call the say hello function
sayHello();

// define the sayHello function
function sayHello() {
    // globalVar is accessible here since the sayHello function scope is a sub-scope of the global scope
    alert(globalVar);
}
```

## Local Variables

Variables declared within a function are referred to as Local variables. Local variables can be accessed within the scope they are declared in, or in any nested function scopes.

Local variables have a lifetime related to that of the scope they are contained in. Once execution leaves the scope the local variable was declared in, the variable will be deleted.

Let's see an example:

```js
'use strict';

// declare a global variable
var globalVar = "Look, I'm Global!";

// call the say hello function
sayHello();

// define the sayHello function
function sayHello() {
    // declare a local variable
    var localVar = "Look, I'm Local!";

    // localVar is accessible here
    alert(localVar);

    // globalVar is accessible here
    alert(globalVar);
}

// localVar is NOT accessible here (out-of-scope) and this will produce an error
alert(localVar);
```

As you can see, accessibility trickles down into sub-scopes, but variables declared in a sub-scope are not accessible to a higher level scope.

## Hoisting

There is another scope concept in JavaScript called hoisting. Let's look at the following example to see what hoisting is all about.

```js
'use strict';

// declare a global variable
var globalVar = "Look, I'm Global!";

// call the say hello function
sayHello();

// define the sayHello function
function sayHello() {
    // globalVar is undefined
    alert(globalVar);

    // override globalVar with a local version
    var globalVar = "Look, I'm Local globalVar!";

    // show the overridden message
    alert(globalVar);
}
```

At first glance it seems odd that `globalVar` would be `undefined` at the beginning of the `sayHello` method. Hoisting is the culprit. Hoisting means that any variables declared within a function's scope will get declarations that are moved to the beginning of the function. So, JavaScript actually interprets the code above like this;

```js
'use strict';

// declare a global variable
var globalVar = "Look, I'm Global!";

// call the say hello function
sayHello();

// define the sayHello function
function sayHello() {
    // override globalVar with a local version
    var globalVar;

    // globalVar is undefined
    alert(globalVar);

    // assign local globalVar a value
    var globalVar = "Look, I'm Local globalVar!";

    // show the overridden message
    alert(globalVar);
}
```

When you look at it this way, it is easier to see why the first `alert` in the `sayHello` method returns an `undefined` value for `globalVar`. Due to the way hoisting works, it is best practice to put variable declarations at the beginning of a function and not spread them throughout so it is easier to see how things are working.

Hoisting also affects the accessibility of functions. Let's see an example:

```js
'use strict';

sayHello1(); // Greetings from sayHello1.
sayHello2(); // Uncaught TypeError: Property 'sayHello2' of object [object Object] is not a function

// declare a function in the global scope
function sayHello1 () {
  alert('Greetings from sayHello1.');
}

// assign a function to a variable named sayHello2
var sayHello2 = function () {
  alert('Greetings from sayHello2.');
};
```

As you can see, even though the `sayHello1` function is called before the declaration, the declaration is hoisted to the top and is therefore accessible. However, in the case of `sayHello2`, where a function is assigned to a variable, the function will not be available until after the declaration.

## Immediately-Invoked Function Expression (IIFE)

Due to the way scoping works in JavaScript, it is considered best practice to expose only what is necessary to the global scope. As we saw in the examples above, global variables trickle down into the scope of other functions and could contaminate variables causing other scripts not to function properly.

The use of an Immediately-Invoked Function Expression (IIFE) is one tool that can help us solve this problem.

```js
'use strict';

// declare a function that will be invoked immediately
// notice the parens surrounding the function. these are necessary
(function () {
    // variables and functions in here are only accessible inside this function's scope
    var iffeVar = "I'm local to the IIFE.";
})();
// also notice the double parenthesis after the closing curly brace. these invoke the function.

alert(iffeVar); // undefined
```

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Create copies of `functions.js` and `functions_js.html`. Name them `scope.js` and `scope_js.html`.
1. Update the `<script>` tag in `scope_js.html` to refer to your new JavaScript file.
1. Refactor the code using an IFFE so that there are no variables or functions in the global scope.
1. Save your work and head on over to the next Lesson.

{% else %}

1. Create copies of `functions.js` and `functions_js.html`. Name them `scope.js` and `scope_js.html`.
1. Update the `<script>` tag in `scope_js.html` to refer to your new JavaScript file.
1. Refactor the code using an IFFE so that there are no variables or functions in the global scope.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
