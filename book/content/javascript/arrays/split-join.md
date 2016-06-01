# Splitting and Joining Arrays

Splitting and joining allow for the conversion between arrays and strings.

## Splitting

Splitting will take a string and turn it into an array. String splitting uses a delimiter to decide where the splitting should occur. To split a string, call the `split` method passing the delimiter as a parameter. For example:

```js
"use strict";

var namesString = "Joe,Bob,Sally";

console.log(namesString);
// Joe,Bob,Sally

var namesArray = namesString.split(',');

console.log(namesArray);
// ['Joe', 'Bob', 'Sally']
```

## Joining

Joining will take an array and convert it to a string with the delimiter of your choice. The `join` method is available on an array object and it takes a delimiter as a parameter. Let's look at the first example again, but in reverse.

```js
'use strict';

var namesArray = ['Joe', 'Bob', 'Sally'];

console.log(namesArray);
// ['Joe', 'Bob', 'Sally']

var namesString = namesArray.join(',');

console.log(namesString);
// Joe,Bob,Sally
```

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Download [`planets-string.js`](../../examples/javascript/planets-string.js) to the `js` folder in your `Codeup` folder.
1. Create an HTML file named `split-join.html` within the `Codeup` folder on your Desktop.
1. Just as before, add a `<script>` tag to link `planets-string.js` to `split-join.html`.
1. Follow the `TODO` items listed in `planets-string.js`, and view your results in the browser.
1. Save your file before moving on.

{% else %}

1. Download [`planets-string.js`](../../examples/javascript/planets-string.js) to the `js` folder in `~/vagrant-lamp/sites/codeup.dev/public`.
1. Create an HTML file named `split-join.html` within the `public` folder as well.
1. Just as before, add a `<script>` tag to link `planets-string.js` to `split-join.html`.
1. Follow the `TODO` items listed in `planets-string.js`, and view your results in the browser.
1. Save your file before moving on.

{% endif %}
