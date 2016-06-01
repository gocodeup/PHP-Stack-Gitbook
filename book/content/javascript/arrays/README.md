# Arrays

{% video %}https://vimeo.com/155164207{% endvideo %}
[JavaScript Arrays](https://vimeo.com/155164207/b8c4706740)

An array is a data structure that holds an ordered list of items. Each slot in a JavaScript array can hold any type of data. In JavaScript, arrays are objects, and objects will be discussed in detail in the Objects and OOP module.

## Declaring an Array

There are a couple ways to declare an array in JavaScript. We will first demonstrate literal array notation, using square brackets, to define an array.

```js
'use strict';

// declare and initialize array
var shapes = ['square','rectangle','circle','triangle'];

// declare an empty array
var emptyArray = [];
```

In above example, a variable called shapes is declared and initialized. As you can see, the value assigned is surrounded by square brackets, telling JavaScript that we are defining an array. Inside the brackets is a comma separated list of values. The use of square brackets is the most common way to create an array in JavaScript.

We can also declare an array using the Array object constructor as follows:

```js
'use strict';

// declare and initialize array
var shapes = new Array('square', 'rectangle', 'circle', 'triangle');

// declare an empty array
var emptyArray = new Array();
```

The second example also creates an array of shapes, and an empty array.

## Counting Array Items

To find out how many items are in an array, you can use the `length` property. Here is an example:

```js
'use strict';

// declare and initialize array
var shapes = ['square', 'rectangle', 'circle', 'triangle'];

// log the number of items in the array
console.log(shapes.length); // 4
```

## Accessing Array Elements

Once you have an array of values, you will probably want to use the data inside the array for something. Arrays are zero-based, which means the first slot in an array is actually #0. Array slots are accessed using the array variable name followed by an open and closing square bracket with the slot number (index) inside the brackets. Here is an example:

```js
'use strict';

// declare and initialize array
var shapes = ['square', 'rectangle', 'circle', 'triangle'];

// There are 4 shapes in the array
console.log('There are ' + shapes.length + ' shapes in the array');

// The first shape is: square
console.log('The first shape is: ' + shapes[0]);

// The second shape is: rectangle
console.log('The second shape is: ' + shapes[1]);

// The third shape is: circle
console.log('The third shape is: ' + shapes[2]);

// The fourth shape is: triangle
console.log('The fourth shape is: ' + shapes[3]);

// The fifth shape is: undefined
console.log('The fifth shape is: ' + shapes[4]);
```

Notice that when we try to access an index in the array that does not exist, as in that of the fifth shape, we get a value of `undefined`.

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Download [`iterating.js`](../../examples/javascript/iterating.js) and save it to the `js` directory of your `Codeup` folder.
1. Create an HTML file named `iterating_arrays_js.html` within the `Codeup` folder.
1. Add a `<script>` tag to your HTML to include `iterating.js`.
1. Open `iterating.js` in Sublime Text and complete the `TODO` items there.
1. View the results in your browser to test for the expected output.
1. Remember to save your work and continue.

{% else %}

1. Download [`iterating.js`](../../examples/javascript/iterating.js) and save it to the `js` directory in `~/vagrant-lamp/sites/codeup.dev/public`.
1. Create an HTML file named `iterating_arrays_js.html` within the `public` folder.
1. Add a `<script>` tag to your HTML to include `iterating.js`.
1. Open `iterating.js` in Sublime Text and complete the `TODO` items there.
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
