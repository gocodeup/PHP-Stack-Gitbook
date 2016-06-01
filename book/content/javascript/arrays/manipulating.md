# Manipulating Arrays

The JavaScript array object has a variety of methods that allow for manipulation of the array. We will cover some of the commonly used methods. You can also read more about [arrays](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array) and how to manipulate them.

## Adding Elements

The `push` and `unshift` methods can be used to add items to an array. The primary difference is that `push` adds an item to the end of an array, and `unshift` adds an item to the beginning of an array.

```js
'use strict';

var daysOfTheWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday'];

console.log(daysOfTheWeek);
// ['Monday', 'Tuesday', 'Wednesday', 'Thursday']

// let's add 'Friday' and 'Saturday' to the end of the week
daysOfTheWeek.push('Friday', 'Saturday');

console.log(daysOfTheWeek);
// ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

// let's add 'Sunday' to the beginning of the week
daysOfTheWeek.unshift('Sunday');

console.log(daysOfTheWeek);
// ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
```

Notice that you can `push` or `unshift` one or more items, separated by commas, onto an array.

## Removing Elements

The `pop` and `shift` methods can be used to remove items from an array.

```js
'use strict';

var todoList = ['Take out the trash', 'Clean the car', 'Pay the bills'];

console.log('My todo list:');

console.log(todoList);
// ['Take out the trash', 'Clean the car', 'Pay the bills']

console.log('Completing the last item: ' + todoList[todoList.length - 1]);

// let's remove the last item
var doneItem = todoList.pop();

// log what we did
console.log('Task complete: ' + doneItem);

console.log(todoList);
// ['Take out the trash', 'Clean the car']

console.log('Completing the first item: ' + todoList[0]);

// let's remove the first item
doneItem = todoList.shift();

// log what we did
console.log('Task complete: ' + doneItem);

console.log(todoList);
// ['Clean the car']
```

Notice how the item that is being removed from the array is returned as the result of the `pop` and `shift` methods.

## Locating Array Elements

Before an array is manipulated, it is sometime useful to find the index of a particular item. The `indexOf` and `lastIndexOf` array method provide this capability. The `indexOf` method starts searching from the beginning of an array and will return the first occurrence of what you are looking for. The `lastIndexOf` starts at the end of the array and works backwards.

```js
'use strict';

var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'red'];

var index = colors.indexOf('green');

console.log(index);
// 3

index = colors.indexOf('red');

console.log(index);
// 0

index = colors.lastIndexOf('red');

console.log(index);
// 7
```

## Splicing

We have seen how to add and remove elements from the beginning and end of arrays. However, sometimes you need to add or remove elements from somewhere in the middle of an array. Splicing is one of the most powerful array manipulation methods. It allows you to add or remove elements to/from any location in an array, or even replace elements of an array.

The `splice` method returns an array of the items that were removed or an empty array if no items were removed.

### Removing Elements with Splice

To remove one or more elements with the `splice` method, pass the start index of the modification, and then the number of elements to remove.

```js
arrayName.splice(startIndex, numberOfItemsToRemove);
```

Here is a more detailed example:

```js
'use strict';

var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

console.log(colors);

console.log('Removing the first two colors.');

var removed = colors.splice(0, 2);

console.log(removed);
// ['red', 'orange']

console.log(colors);
// ['yellow', 'green', 'blue', 'indigo', 'violet']

console.log('Removing green.');

removed = colors.splice(colors.indexOf('green'), 1);

console.log(removed);
// ['green']

console.log(colors);
// ['yellow', 'blue', 'indigo', 'violet']
```

### Adding Elements with Splice

To add one or more elements to an array using the `splice` method, pass the start index of the modification, followed by a `0`, followed by a comma separated list of items to add.

```js
arrayName.splice(startIndex, 0, 'firstItemToAdd', 'anotherItemToAdd');
```

Here is a more detailed example:

```js
'use strict';

var colors = ['red', 'orange', 'yellow', 'indigo', 'violet'];

console.log(colors);

console.log('Adding green and blue after yellow.');

colors.splice(colors.indexOf('yellow') + 1, 0, 'green', 'blue');

console.log(colors);
// ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet']
```

## Replacing Elements with Splice

Replacing elements with the `splice` method works almost the same way as adding elements. The only difference is that instead of passing a `0` as the second parameter, you pass the number of items you'd like to remove.

```js
'use strict';

var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

console.log(colors);

console.log('Replacing indigo and violet with purple.');

colors.splice(colors.indexOf('indigo'), 2, 'purple');

console.log(colors);
// ['red', 'orange', 'yellow', 'green', 'blue', 'purple']
```

## Reversing

An array can be reversed by calling the `reverse` method.

```js
'use strict';

var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

console.log(colors);
// ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet']

console.log('Reversing the colors array.');

colors.reverse();

console.log(colors);
// ['violet', 'indigo', 'blue', 'green', 'yellow', 'orange', 'red']
```

## Sorting

An array can be sorted by calling the `sort` method. The `sort` method, by default, will convert items in the array to their string equivalent and order them based on that value. A comparator function can be passed to the `sort` method, but we will not be covering that.

```js
'use strict';

var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

console.log(colors);
// ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet']

console.log('Sorting the colors array.');

colors.sort();

console.log(colors);
// ['blue', 'green', 'indigo', 'orange', 'red', 'violet', 'yellow']
```

## Exercises

Please follow the instructions below.

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Download and save [`planets-array.js`](../../examples/javascript/planets-array.js) to the `js` directory in your `Codeup` folder on the Desktop.
1. Create an HTML file named `planets-js.html` within the `Codeup` folder on your Desktop.
1. Add a `<script>` tag to `planets-js.html` to include `planets-array.js`.
1. Open `planets-array.js` in Sublime Text and follow the `TODO` items listed there.
1. View the results in your browser to test for the expected output.
1. Stop. Drop. Save your work.

{% else %}

1. Download and save [`planets-array.js`](../../examples/javascript/planets-array.js) to the `js` directory in your `~/vagrant-lamp/sites/codeup.dev/public` folder.
1. Create an HTML file named `planets-js.html` within the `public` folder.
1. Add a `<script>` tag to `planets-js.html` to include `planets-array.js`.
1. Open `planets-array.js` in Sublime Text and follow the `TODO` items listed there.
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
