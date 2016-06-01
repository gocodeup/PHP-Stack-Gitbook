# Fading Effects

The first set of animated effects we will be looking at add fading to elements as they are shown or hidden. Animation creates a more interesting user experience and can be used to illustrate what is being shown or hidden. Fading effects add or remove the opacity of a elements.

## Using Fading Effects

jQuery offers these fading effects:
- `.fadeIn()` &mdash; Display the matched elements by fading them to opaque.
- `.fadeOut()` &mdash; Hide the matched elements by fading them to transparent.
- `.fadeToggle()` &mdash; Display or hide the matched elements by animating their opacity.

The syntax for fading elements is identical to their basic counterparts; the only difference is the method name called.  Additional options allow for further customization; however, we will not be covering them in this course.

### .fadeIn()

> Display the matched elements by fading them to opaque.
[http://api.jquery.com/fadeIn/](http://api.jquery.com/fadeIn/)

The `.fadeIn()` method is almost identical to the `.show()` method; the only difference is `.fadeIn()` animates the element's contents by _fading_ them from transparent to opaque.

The syntax for `.fadeIn()` with no arguments is:

~~~js
.fadeIn()
~~~

We can set duration and other options by passing arguments to the method.  Please [refer to the documentation](http://api.jquery.com/fadeIn/) for more information.

We can update our national parks code to see the effects of `.fadeIn()`:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Parks List</title>
    <style type="text/css" media="screen">
        #national-parks, #state-parks-texas {
            display: none;
        }
    </style>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#national-parks-toggle').click(function() {
                $('#national-parks').fadeIn();
            });
            $('#state-parks-texas-toggle').click(function() {
                $('#state-parks-texas').fadeIn();
            });
        });
    </script>
</head>
<body>
    <h1>Parks List</h1>
    <h3 id="national-parks-toggle">National Parks</h3>
    <ul id="national-parks">
        <li>Arches</li>
        <li>Badlands</li>
        <li>Carlsbad Caverns</li>
        <li>Denali</li>
        <li>Everglades</li>
    </ul>
    <h3 id="state-parks-texas-toggle">State Parks of Texas</h3>
    <ul id="state-parks-texas">
        <li>Abilene</li>
        <li>Big Bend</li>
        <li>Choke Canyon</li>
        <li>Davis Mountains</li>
        <li>Enchanted Rock</li>
    </ul>
</body>
</html>
~~~

The live example can be seen below:

[Example](http://jsbin.com/geguv/1/edit?output)

### .fadeOut()

> Hide the matched elements by fading them to transparent.
[http://api.jquery.com/fadeOut/](http://api.jquery.com/fadeOut/)

`.fadeOut()` will hide an element with animation to fade it from opaque to transparent.

The basic syntax for `.fadeOut()` is:

~~~js
.fadeOut()
~~~

Like `.fadeIn()`, there are additional options available in [the documentation](http://api.jquery.com/fadeOut/) for this method.

Our code with `.fadeOut()` looks like this:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Parks List</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#national-parks-toggle').click(function() {
                $('#national-parks').fadeOut();
            });
            $('#state-parks-texas-toggle').click(function() {
                $('#state-parks-texas').fadeOut();
            });
        });
    </script>
</head>
<body>
    <h1>Parks List</h1>
    <h3 id="national-parks-toggle">National Parks</h3>
    <ul id="national-parks">
        <li>Arches</li>
        <li>Badlands</li>
        <li>Carlsbad Caverns</li>
        <li>Denali</li>
        <li>Everglades</li>
    </ul>
    <h3 id="state-parks-texas-toggle">State Parks of Texas</h3>
    <ul id="state-parks-texas">
        <li>Abilene</li>
        <li>Big Bend</li>
        <li>Choke Canyon</li>
        <li>Davis Mountains</li>
        <li>Enchanted Rock</li>
    </ul>
</body>
</html>
~~~

We can see the live example below:

[Example](http://jsbin.com/zizise/1/edit?output)

### .fadeToggle()

> Display or hide the matched elements by animating their opacity.
[http://api.jquery.com/fadeToggle/](http://api.jquery.com/fadeToggle/)

Toggling with fade is exactly what `.fadeToggle()` does.  When it activated, this method will either show or hide selected elements with fading animation.

Our updated code with `.fadeToggle()` allows lists to be toggled as hidden or shown, with nice animations:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Parks List</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#national-parks-toggle').click(function() {
                $('#national-parks').fadeToggle();
            });
            $('#state-parks-texas-toggle').click(function() {
                $('#state-parks-texas').fadeToggle();
            });
        });
    </script>
</head>
<body>
    <h1>Parks List</h1>
    <h3 id="national-parks-toggle">National Parks</h3>
    <ul id="national-parks">
        <li>Arches</li>
        <li>Badlands</li>
        <li>Carlsbad Caverns</li>
        <li>Denali</li>
        <li>Everglades</li>
    </ul>
    <h3 id="state-parks-texas-toggle">State Parks of Texas</h3>
    <ul id="state-parks-texas">
        <li>Abilene</li>
        <li>Big Bend</li>
        <li>Choke Canyon</li>
        <li>Davis Mountains</li>
        <li>Enchanted Rock</li>
    </ul>
</body>
</html>
~~~

The live example illustrates the fade toggling:

[Example](http://jsbin.com/wapay/1/edit?output)

## Exercises

1. Open the file named `jquery_faq.html` for editing.  Commit all changes to GitHub.

1. Update toggle code for `dd` elements to use fading effect.

1. Update the `h3` and `ul` lists to work like the example above.  Clicking the `h3` should show or hide the associated `ul` list items.  Use fading effects for hiding and showing the list items.  Discard code that hid list when `li` was clicked.
