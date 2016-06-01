# Document Object Model (DOM) Events

The DOM provides an Event Model that allows you to write code that responds to events that happen within the web browser. There are many types of events related to different types of input. For example, there is an event that occurs when a user clicks with their mouse, an another event that occurs when a user presses a key on the keyboard. As you can imaging, responding to such events will allow you to provide an interactive user experience.

The process of detecting and responding to events involves registering an event listener. This means that specific code is tied to a specific event, on a specified target. There are several different ways to register an event listener, but we are only going to discuss the preferred method. For alternatives, along with descriptions of their shortcomings, see the link below.

[https://developer.mozilla.org/en-US/docs/Web/API/Event](https://developer.mozilla.org/en-US/docs/Web/API/Event)

## Register an Event Listener

Events can be registered on the `window`, `document`, or on an element. The object that an event listener is registered on is called the target. To register an event listener on a target, the `addEventListener` method can be used.

[https://developer.mozilla.org/en-US/docs/Web/API/EventTarget.addEventListener](https://developer.mozilla.org/en-US/docs/Web/API/EventTarget.addEventListener)

Let's look at the `addEventListener` method signature:

~~~js
target.addEventListener(type, listener[, useCapture]);
~~~

The `target` is the object the event listener is registered on. The `type` is the type of event that is being listened for. The `listener` is the function that is called when an event of `type` occurs on the `target`. Finally, `userCapture` is a boolean that decides if event-capturing or event-bubbling order is used for event triggering. For our examples, we will just pass `false` for this value.

For more details on useCapture, read this: [http://www.quirksmode.org/js/events_order.html](http://www.quirksmode.org/js/events_order.html)

We have talked a little about event targets, now let's talk about event types. There are tons of options available. Here are a few common events:

- keyup (key is released)
- click (mouse is clicked)
- change (input loses focus after it has been modified)
- submit (form is submitted)

A complete event reference can be found here:

[https://developer.mozilla.org/en-US/docs/Web/Reference/Events](https://developer.mozilla.org/en-US/docs/Web/Reference/Events)

Let's see an example in action:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <button id="btn1">Click Me!</button>
    <script>
        'use strict';

        // create a handler function
        var listener = function (event) {
            alert('You clicked the button!');
        }

        // register the listener to handle clicks on btn1
        document.getElementById('btn1').addEventListener('click', listener, false);

    </script>
</body>
</html>
~~~

In the example above, the function `listener` will be called any time the button with id `btn1` is clicked with the mouse.

## Remove an Event Listener

To remove an event listener, you just call `removeEventListener`, on the same `target` and with the same parameters you used to initially add the event listener. Let's look at an example:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <button id="btn1">Click Me!</button>
    <button id="btn2">Remove Event Listener</button>
    <script>
        'use strict';

        var listener = function (event) {
            alert('You clicked the button!');
        }

        // add event listener to btn1
        var btn1 = document.getElementById('btn1');
        btn1.addEventListener('click', listener, false);

        var remover = function (event) {
            // remove event listener from btn1
            btn1.removeEventListener('click', listener, false);
            console.log('Event listener removed.');
        }

        // add event listener to btn2
        var btn2 = document.getElementById('btn2');
        btn2.addEventListener('click', remover, false);

    </script>
</body>
</html>
~~~

In the example above, the 'Click Me!' button will show an alert until the click event listener is unregistered via the 'Remove Event Listener' button.

## Exercises

Please follow the instructions below.

1. Open the HTML file named `dom_query_js.html` that you created in the last lesson.
1. Add 4 buttons to the page. Attach click event listeners to each of the buttons and have the handers perform the modifications that were automatically taking place. For example, the first button should set inner html of mainHeader to "JavaScript is Cool".
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.
