# Browser Object Model (BOM)

The Browser Object Model (BOM) allows JavaScript to interact with the web browser.

## Window

The `window` object is the core of the Browser Object Model, and it represents an instance of the web browser. Through the `window` object, we can control the browsers size and position, open pop-up windows, display system dialogs, or run interval based processing. The `window` object represents the JavaScript Global object. This means that any variables or functions declared in the global scope become part of the `window` object.

[https://developer.mozilla.org/en-US/docs/Web/API/Window](https://developer.mozilla.org/en-US/docs/Web/API/Window)

### System Dialogs

In an earlier lesson, we covered `alert()`, `confirm()`, and `prompt()`. All of these dialogs are provided by the browser and are made available through the `window` object. Since the `window` object represents the Global JavaScript object, the methods can be called directly without mentioning the `window` object.

### Intervals and Timeouts

Sometimes, it is useful to execute code either at a set interval of time, or after a certain time interval has passed. The `window` object provides two methods for these purposes.

#### setInterval()

The `setInterval()` method allows code to be executed at a specified time interval. The specified code will continue executing at the given interval until the method `clearInterval()` is called.

Let's see an example:

~~~js
'use strict';

// this code will produce a console log every second
// when count >= max, the interval is cancelled, and the logging will stop

var count = 0;
var max = 10;
var interval = 1000; // interval time in milliseconds

var intervalId = setInterval(function () {
    if (count >= max) {
        clearInterval(intervalId);
        console.log('All done');
    } else {
        count++;
        console.log('Repeating this line ' + count);
    }
}, interval);
~~~

As you can see in the example above, the `setInterval()` function takes in a function and an interval as parameters and returns an interval id. The function will continue to be executed at the interval until `clearInterval()` is called with the correct interval id. Intervals should be specified in milliseconds.

#### setTimeout()

The `setTimeout()` method allows code to be executed after specified time interval has passed. The specified code will only be executed once. The timeout code execution can be cancelled via the `clearTimeout()` method.

Let's see an example:

~~~js
'use strict';

var delay = 5000; // delay time in milliseconds

var timeoutId = setTimeout(function () {
    alert('Here is a delayed hello!');
}, delay);

// to cancel the timeout, you can call
// clearTimeout(timeoutId);
// prior to the delay expiring
~~~

As you can see in the example above, the `setTimeout()` works much like `setInterval()`. It takes in a function and a delay, and the function will get executed one time at the end of the delay time. To cancel the function execution, `clearTimeout()` can be called passing the timeout id that was returned by the `setTimeout()` method.

# Location

The `location` object is a very useful feature of the BOM. It is accessible though both the `window` object, and also the `document` object which will be discussed in the lessons on the Document Object Model.

The `location` object is aware of the currently loaded document and provides detailed url information. The `location` object can also be used to redirect the browser to a new location.

[https://developer.mozilla.org/en-US/docs/Web/API/Window.location](https://developer.mozilla.org/en-US/docs/Web/API/Window.location)

## Redirect Browser

~~~js
// redirect browser to google.com

window.location = 'http://www.google.com';
~~~

## Reload Page

~~~js
location.reload(); // reload page, possibly from cache
location.reload(true); // reload page from server
~~~

## Navigator and History

The `navigator` and `history` objects of the BOM will not be used in this course, however, the links below are provided for your edification.

- [https://developer.mozilla.org/en-US/docs/Web/API/History](https://developer.mozilla.org/en-US/docs/Web/API/History)
- [https://developer.mozilla.org/en-US/docs/Web/API/Navigator](https://developer.mozilla.org/en-US/docs/Web/API/Navigator)

## Exercises

Please follow the instructions below.

1. Download and save [defuse-the-bom.html](../../examples/javascript/defuse-the-bom.html) inside `~/vagrant-lamp/sites/codeup.dev/public` on your Mac.
1. View the results in your [browser](http://codeup.dev/defuse-the-bom.html). It should not do much&hellip;at first.
1. Open the file in Sublime and follow the instructions marked "TODO". Test your code in the browser and make sure it behaves as expected.
1. Finally, commit the changes to your git repository, and push to GitHub.
