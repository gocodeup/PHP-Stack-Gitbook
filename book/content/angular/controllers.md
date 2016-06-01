# Controllers

So far in our Angular journey we have learned how to display information to the user with expressions and directives, and how to take input and represent data with models. The last major component we need is to add interactivity and logic to our application; we do this using a *controller*. Controllers are JavaScript functions, and Angular allows us to attach those functions different elements in our page. These functions can then manipulate data, listen to events, or even send Ajax requests.

## Declaring a Controller

A controller is created by calling the `controller()` method from an Angular module. The method takes in two arguments: the name of the controller and a function implementing the controller. For example:

```js
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", function() {
        // Controller code goes in here
    });
})();
```

Controller names are typically named using StudlyCaps and usually end with `Controller`. Adding properties and methods to a controller can be done with the object `this`:

```js
"use strict";

(function() {
    var app = angular.module("moduleName", []);

    app.controller("ExampleController", function() {
        this.showElement = true;

        this.toggleElement = function() {
            this.showElement = !this.showElement;
        };
    });
})();
```

## Binding Controllers

To attach a controller to a block in our page we use the directive `ng-controller`, like so:

```html
<div ng-controller="ExampleController">

</div>
```

We can also use that directive to give our controller an alias that assigns our controller to a variable within the HTML element. To use our `ExampleController` in order to determine whether or not to show an element, we could do the following:

```html
<div ng-controller="ExampleController as ex">
    <div ng-show="ex.showElement">
        I may or may not be visible
    </div>
</div>
```

## Events

If we want to use the `toggleElement()` function from above, we need to assign it to an event, just like with vanilla JavaScript or jQuery. Angular provides several different event directives we can use. If we want to add a button to toggle our element, we could do the following:

```html
<div ng-controller="ExampleController as ex">
    <div ng-show="ex.showElement">
        I may or may not be visible
    </div>

    <button ng-click="ex.toggleElement()">Toggle Element</button>
</div>
```

Now, whenever we click the button, our `toggleElement()` method will be called, and our `div` will be hidden or shown! The event directives Angular supports are:

- `ng-click`
- `ng-dblclick`
- `ng-mousedown`
- `ng-mouseup`
- `ng-mouseenter`
- `ng-mouseleave`
- `ng-mousemove`
- `ng-mouseover`
- `ng-keydown`
- `ng-keyup`
- `ng-keypress`
- `ng-change`
- `ng-focus`
- `ng-blur`
- `ng-submit`

## Exercises

We are going to use Angular to build a simplified shopping cart.

1. Create the files `controller-test.html` and `controllerTest.js` in your `angular-test.dev` site.
1. Create a module called `controllerTest` and make sure it is properly bootstrapped.
1. In your module, add a controller called `CartController`.
1. Attach your controller to the page.
1. Your controller will need:
    - An array of `items`.
    - A `newItem` object with a default `quantity` of 1.
    - A function to add an item. This function should push `newItem` on to the `items` array and then reset `newItem` back to its initial state.
1. Your page will have two main portions:
    1. A form where the user can create a new item for their cart. It should include the item's name and its cost.
    1. A table displaying all the items in the user's cart. It should display:
        - The item's name
        - An input field where the user can modify the quantity of items
        - The price per item
        - The item's total (aka: item quantity &times; item price)
1. Use CSS to give validation hints to the user, like in the previous exercise.
1. When the form submits it should call the add item function and reset its values.

### Bonuses

1. Add functions to calculate:
    - The subtotal (sum of all the items' totals)
    - The tax (8.125% of the subtotal)
    - Shipping cost ($1.25 per individual item)
    - The total (sum of all of the above)

    Display these values at the end of the table.
1. Add a remove button for each item in the table. (_**Hint:** [`ng-repeat`](https://docs.angularjs.org/api/ng/directive/ngRepeat) creates a variable called `$index`. Your controller function will need to use this variable with [`splice()`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/splice)._)
1. Make sure the submit button is only enabled if the form is valid. (_**Hint:** You will need to give the form a name and then use either the property `$valid` or `$invalid` from the [form](https://docs.angularjs.org/api/ng/type/form.FormController)._)
1. When the form is submitted, reset its validation states. You will need to pass the form to your add item method and use some of its [methods](https://docs.angularjs.org/api/ng/type/form.FormController).
