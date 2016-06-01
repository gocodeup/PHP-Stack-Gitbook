# Mouse Events

jQuery makes working with different types of events across browsers very simple. We can act on events like a user clicking a mouse, hovering over an element, or bringing areas in and out of focus.

## Using Mouse Events

The jQuery documentation has a [full list of the mouse events](http://api.jquery.com/category/events/mouse-events/); we will be covering the most commonly used methods.

Mouse events we will cover in this unit:
- `.click()` &mdash; Bind an event handler to the "click" JavaScript event or trigger that event on an element.
- `.dblclick()` &mdash; Bind an event handler to the "dblclick" JavaScript event or trigger that event on an element.
- `.hover()` &mdash; Bind two handlers to the matched elements, to be executed when the mouse pointer enters and leaves the elements.

## .click()

> Bind an event handler to the "click" JavaScript event or trigger that event on an element.
[http://api.jquery.com/click/](http://api.jquery.com/click/)

The syntax for using `.click()` is:

~~~js
$( selector ).click( handler(eventObject) )
~~~

The `event` object is passed by default to our _handler_, so we could use methods like `preventDefault()` or `stopPropagation()` like other JavaScript events.

Using a basic example page:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {

        });
    </script>
</head>
<body>
    <h1 id="codeup">Hello Codeup</h1>
</body>
</html>
~~~

We could add a click event to alert us when the `h1` element with an `id` of `codeup` is clicked by adding this snippet of jQuery:

~~~js
$('#codeup').click(function() {
    alert('h1 with id "codeup" was clicked');
});
~~~

Our document will now look like this:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#codeup').click(function() {
                alert('h1 with id "codeup" was clicked');
            });
        });
    </script>
</head>
<body>
    <h1 id="codeup">Hello Codeup</h1>
</body>
</html>
~~~

Clicking on the `h1` will now show an alert box:

[Example](http://jsbin.com/tugibi/1/edit?output)

### .dblclick()

> Bind an event handler to the "dblclick" JavaScript event or trigger that event on an element.
[http://api.jquery.com/dblclick/](http://api.jquery.com/dblclick/)

The usage of `.dblclick()` is the same as `.click()`.

We could update our click example to use double clicks as follows:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#codeup').dblclick(function() {
                alert('h1 with id "codeup" was double clicked');
            });
        });
    </script>
</head>
<body>
    <h1 id="codeup">Hello Codeup</h1>
</body>
</html>
~~~

Clicking on the `h1` will now do nothing, but double clicking will show an alert box:

[Example](http://jsbin.com/kalotu/1/edit?output)

### .hover()

> Bind two handlers to the matched elements, to be executed when the mouse pointer enters and leaves the elements.
> The .hover() method binds handlers for both mouseenter and mouseleave events. You can use it to simply apply behavior to an element during the time the mouse is within the element.
[http://api.jquery.com/hover/](http://api.jquery.com/hover/)

The `.hover()` event handler combines two other event handlers: `mouseenter()` and `mouseleave()`.

The syntax for `.hover()` is:

~~~js
$( selector ).hover( handlerIn, handlerOut )
~~~

This is the same as:

~~~js
$( selector ).mouseenter( handlerIn ).mouseleave( handlerOut );
~~~

We could use the `.hover()` event handler to change the background color of our `h1` when the mouse is over it using this code:

~~~js
$(document).ready(function() {
    $('#codeup').hover(
        function() {
            $(this).css('background-color', '#FF0');
        },
        function() {
            $(this).css('background-color', '#FFF');
        }
    );
});
~~~

Here we are using `$(this)` to reference the selected DOM element inside our `.hover()` method.  When we are inside of a _callback function_ like the ones used in an event handler, `$(this)` will always refer to the selected DOM element.

Putting this all together looks like this:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#codeup').hover(
                function() {
                    $(this).css('background-color', '#FF0');
                },
                function() {
                    $(this).css('background-color', '#FFF');
                }
            );
        });
    </script>
</head>
<body>
    <h1 id="codeup">Hello Codeup</h1>
</body>
</html>
~~~

We can test the results below:

[Example](http://jsbin.com/yeger/1/edit?output)

## Exercises

Use the file `jquery_exercises.html` for these exercises.  Commit your changes to GitHub.

1. Remove your custom jQuery code from previous exercises.

1. Add jQuery code that will change the background color of a `h1` element when clicked.

1. Make all paragraphs have a font size of `18px` when they are double clicked.

1. Set all `li` text color to red when the mouse is hovering, reset to white when it is not.
