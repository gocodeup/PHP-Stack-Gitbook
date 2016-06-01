# Objects

An object is a grouping of data and functionality. Data items contained in an object are referred to as properties, and functions on an object are referred to as methods.

## Custom Objects

JavaScript does not have a concept of classes. Instead, JavaScript uses something called prototypes. Prototypes allow existing objects to be used as templates to create new objects. Let's look at the base object, `Object`, which is the starting point for developers to make their own custom objects.

### New Object Instance

The code sample below creates a custom object named `car`.

~~~js
'use strict';

var car = new Object();

console.log(typeof car);
// "object"
~~~

The use of `new Object()` calls the `Object` constructor to build a new instance of `Object`.

### Object Literal Notation

An Object instance can also be created by using object literal notation (using curly braces). JavaScript will treat this just as if you had used `new Object()`.

~~~js
'use strict';

var car = {};

console.log(typeof car);
// "object"
~~~

## Setting Properties on a Custom Object

Once you have created an object, you can assign properties to it. As mentioned earlier, properties are pieces of data that are relevant to the object.

Properties are assigned to JavaScript objects by either dot notation or array notation.

~~~js
'use strict';

var car = {};

// use dot notation to assign a "make" property
car.make = "Toyota";

// use array notation to assign a "model" property
car['model'] = "Camry";
~~~

## Accessing Properties on an Object

Object properties are accessed in the same way they are set, either via dot notation or array notation.

~~~js
'use strict';

var car = {};
car.make = "Toyota";
car.model = "Camry";

// use array notation to access "make" property
console.log('The car make is: ' + car['make']);

// use dot notation to access "model" property
console.log('The car model is: ' + car.model);
~~~

## Assigning Functionality to an Object

Besides having data properties, an object can also have functions, known as object methods. Creating a method on an object is much like creating a property, except the property value is a function.

~~~js
'use strict';

var car = {};
car.make = "Toyota";
car.model = "Camry";

// create a honk method on the car object
car.honk = function () {
    alert('Honk! Honk!');
};

// honk the horn
car.honk();
~~~

## The `this` Keyword

The `this` keyword in JavaScript is a bit more complicated than in other languages. In other languages like PHP, `this` is simply a reference to the current object. In JavaScript, `this` can refer to a different object based on how a function is called. However, the intricacies of `this` are a more advanced topic. For our exercises, you will be able to use `this` as you would in PHP.

If you would like more in depth information on how `this` works, you can read about it on the [MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/this).

Example of using `this`:

~~~js
'use strict';

var car = {};
car.make = "Toyota";
car.model = "Camry";

// create a logMakeModel method on the car object
car.logMakeModel = function () {
    console.log('Car make/model is: ' + this.make + ' ' + this.model);
};

// log the make/model
car.logMakeModel();
~~~

## Exercises

Please follow the instructions below.

1. Download [`objects.js`](../../examples/javascript/objects.js) and save it to the `js` folder for `codeup.dev`.
1. Create an HTML file named `objects-intro-js.html` within your `~/vagrant-lamp/sites/codeup.dev/public` folder.
1. Make sure `objects-intro-js.html` has a `<script>` tag for `objects.js`.
1. Open `objects.js` in Sublime Text and complete the `TODO` items in the code.
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.
