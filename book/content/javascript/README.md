# JavaScript Intro

{% video %}https://vimeo.com/155164203{% endvideo %}
[JavaScript Introduction](https://vimeo.com/155164203/db07c04d21)

[JavaScript](http://en.wikipedia.org/wiki/JavaScript), abbreviated JS, is a high-level, interpreted computer programming language that can be executed within a web browser. For additional information you can read the [reference material on JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript).

## History

JavaScript was originally developed in 1995 by Brendan Eich of Netscape. In 1996, Microsoft began supporting JavaScript in Internet Explorer. In 1997, JavaScript 1.1 was submitted to the [Ecma](http://en.wikipedia.org/wiki/Ecma_International) for standardization. The JavaScript standard is called ECMAScript, and all modern browsers fully support [ECMAScript 5.1](http://es5.github.io/).

Initially, JavaScript was looked down on by professional programmers. The advent of [AJAX](http://en.wikipedia.org/wiki/Ajax_programming) caused a resurgence in the popularity of JavaScript. This resurgence brought attention from professional programmers, along with new frameworks and best practices. Today, nearly every web page you access runs some JavaScript and the web certainly wouldn't be the same without it.

## Data Types

There are 5 simple/primitive types in JavaScript:

Type | Example
--- | ---
`boolean`   | true/false
`number`    | 10, 3.14
`string`    | "Hello Codeup"
`undefined` | unassigned variables have this value and type
`null`      | special keyword denoting a null value

There is one complex type:

- object

Some special object types worth mentioning are:

- function
- array

To determine the type of a particular value, the `typeof` operator is used. A String representing the type name will be returned. Note: An operator is a symbol or keyword used within a programming language to perform a prescribed task/operation.

## Variables

JavaScript is a dynamically typed language, so type information is associated with a value and not the variable itself. This means that a variable will take on the type of the value assigned to it.

For example, to define a variable called `name` with a value of `"Codeup"`, we would write the following:


```js
var name = "Codeup";
```

As you can see, variables are declared using the `var` keyword, and assignment is accomplished with the `=` (equals) operator. Additionally, statements should end with a `;` (semicolon).

You can also declare multiple variables in a single statement by using the comma operator.

```js
var name = "Codeup", codename = "Arches";
```

Variable names should start with a letter, $, or _, followed by additional letters, dollar signs, underscores, or numbers. Variable names cannot be any of the [reserved words](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Reserved_Words). Although unicode characters can also be used, it is much safer to stick to the guidelines above.

If a variable is declared, but no value is assigned, then the variable will be of type `undefined` with value `undefined`.

```js
var novalue; // undefined

typeof novalue; // returns "undefined"

novalue == undefined; // returns true
```

## Constants

Read-only values can be created using the `const` keyword as follows:

```js
const pi = 3.145;
```

## Code Comments

Code comments allow you to add documentation to your code that does not take part in the code execution. Comments are essential to make your code readable. In JavaScript, code comments can be added using `// comments-here` for single-line comments and `/* comments-here */` for multi-line comments.

```js
// this is a single line comment

/*
This
is
a
multi-line
comment
*/
```

## Chrome JavaScript Console

The Google Chrome web browser has some built-in web developer tools, including a JavaScript console. JavaScript statements can be executed at the console and active web pages can be debugged there. The JavaScript Console is a great place to learn and play with JavaScript, just as the Interactive Shell is for PHP.

To access the JavaScript Console in Google Chrome, do one of the following:

- Press ⌥⌘J (OPTION+COMMAND+J)
- Right-Click a Web Page, Select Inspect Element, then click on the Console tab.
- On the View Menu, access Developer Tools => JavaScript Console

## Exercises

Open Google Chrome and then access the JavaScript Console. Next, execute the following statements:

```js
// declare a variable called test with a string value of "Hello Codeup"
var test = "Hello Codeup";

// print out variable values typing their name and hitting enter
test <enter>

// you should see the value of "Hello Codeup" displayed
```

```js
var name = "Codeup";
typeof name;

var almostPi = 3.14;
typeof almostPi;

var success = true;
typeof success;

var todoList = [];
typeof todoList;

var car = {};
typeof car;

var doSomething = function () {};
typeof doSomething;

var unassigned;
typeof unassigned;

var setToNull = null;
typeof setToNull;
```

Excellent work! You have now learned how to use the Chrome JavaScript Console.
