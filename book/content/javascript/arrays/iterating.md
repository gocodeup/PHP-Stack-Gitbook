# Iterating Over Arrays

To iterate means to repeat a process to achieve a desired result. When you iterate over an array, it means that you cycle/traverse through the indices of the array. We can use the looping statements we learned earlier to iterate through arrays in JavaScript.

## For Loop Iteration

```js
'use strict';
// declare and initialize array
var shapes = ['square', 'rectangle', 'circle', 'triangle'];

// loop through the array and log the values
for (var i = 0; i < shapes.length; i++) {
    console.log('The shape at index ' + i + ' is: ' + shapes[i]);
}
```

## For-Each Loop Iteration

Although JavaScript does not have a native foreach loop, array objects have a `forEach` function. This feature is supported in Internet Explorer 9+, Firefox 2+, Safari 3+, Opera 9.5+, and Chrome.

```js
'use strict';
// declare and initialize array
var shapes = ['square', 'rectangle', 'circle', 'triangle'];

// loop through the array and log the values
shapes.forEach(function (element, index, array) {

    // element is the shape name
    // index is the iterator
    // array is the shapes array itself

    console.log('The shape at index ' + index + ' is: ' + element);
});
```

The `forEach` function on an array takes another function as a parameter and doesn't have a return value. The function passed to `forEach` takes in up to 3 parameters that will provide access to the array element, the corresponding index, and the array itself.

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Open the `iterating.js` file that you created in the last lesson.
1. Modify the code that logs the `names` array elements individually to instead use a `for` loop.
1. Below the `for` loop, use a `forEach` loop to print the names again.
1. View the results in your browser to test for the expected output.
1. Make sure to save your file before proceeding.

{% else %}

1. Open the `iterating.js` file that you created in the last lesson.
1. Modify the code that logs the `names` array elements individually to instead use a `for` loop.
1. Below the `for` loop, use a `forEach` loop to print the names again.
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
