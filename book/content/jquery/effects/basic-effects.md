# Basic Effects

The web is full of places where parts of the page are hidden or shown based on our actions. Clicking FAQs to reveal their answers, hiding parts of long pages, and user experiences become richer because of basic effects.

## Using Basic Effects

jQuery offers these basic effects:
- `.hide()` &mdash; Hide the matched elements.
- `.show()` &mdash; Display the matched elements.
- `.toggle()` &mdash; Display or hide the matched elements.

While these effects do not offer animation, they can be useful for manipulating the visible elements on a page.

### .hide()

> Hide the matched elements.
[http://api.jquery.com/hide/](http://api.jquery.com/hide/)

In the most basic form, `.hide()` has a simple syntax:

~~~js
.hide()
~~~

To see all the possible uses for `.hide()`, please [see the documentation](http://api.jquery.com/hide/).

This method will hide the selected elements without any animation, showing the same results as using CSS with `display: none`.

We will be using our parks list with some updated `id` attributes:

~~~html
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
~~~

By adding some jQuery using the `.hide()` method, we can easily hide each list when the `h3` element is clicked:

~~~js
$('#national-parks-toggle').click(function() {
    $('#national-parks').hide();
});
$('#state-parks-texas-toggle').click(function() {
    $('#state-parks-texas').hide();
});
~~~

The first set of code adds a `click` event listener on the `h3` with an id of `national-parks-toggle`, attaching a function that uses `.hide()` to hide the contents of the `ul` with an id of `national-parks`. The next part of the code does the same thing for `state-parks-texas-toggle` and `state-parks-texas`, respectively.

The entire page:

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
                $('#national-parks').hide();
            });
            $('#state-parks-texas-toggle').click(function() {
                $('#state-parks-texas').hide();
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

We can see this code in action below:

[Example](http://jsbin.com/yepoco/1/edit?output)

### .show()

> Display the matched elements.
[http://api.jquery.com/show/](http://api.jquery.com/show/)

The `.show()` method does the opposite of `.hide()`; it acts the same as adding `display: block;` to the selected element.

`.show()` has a basic syntax:

~~~js
.show()
~~~

To see all the possible uses for `.show()`, please [see the documentation](http://api.jquery.com/show).

We could use our parks list HTML for this example:

~~~html
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
~~~

If we add some CSS, we can hide the lists of each park type:

~~~css
#national-parks, #state-parks-texas {
    display: none;
}
~~~

With some jQuery, we can use `.show()` to display the lists when the associated `h3` element is clicked:

~~~js
$(document).ready(function() {
    $('#national-parks-toggle').click(function() {
        $('#national-parks').show();
    });
    $('#state-parks-texas-toggle').click(function() {
        $('#state-parks-texas').show();
    });
});
~~~

The entire page will look like this:

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
                $('#national-parks').show();
            });
            $('#state-parks-texas-toggle').click(function() {
                $('#state-parks-texas').show();
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

[Example](http://jsbin.com/wixel/1/edit?output)

### .toggle()

> Display or hide the matched elements.
[http://api.jquery.com/toggle/](http://api.jquery.com/toggle/)

The syntax for `.toggle()` without any arguments is:

~~~js
.toggle();
~~~

There are more uses for `.toggle()` that can be used by passing arguments; for a full list of features, please [refer to the documentation](http://api.jquery.com/toggle/).

This method will _show_ or _hide_ the selected element(s) based on their current state. If the element is visible, `.toggle()` will hide it, else it will show it.

We can update our national parks list to show or hide the lists each time the corresponding `h3` element is clicked.

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
                $('#national-parks').toggle();
            });
            $('#state-parks-texas-toggle').click(function() {
                $('#state-parks-texas').toggle();
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

Now, when we click the `h3` for a given list, the list is either shown or hidden, based on the current state of the list.

We can see the `.toggle()` example below:

[Example](http://jsbin.com/gotaz/1/edit?output)

## Exercises

1. Open the file named `jquery_faq.html` for editing.  Commit all changes to GitHub.

1. Update the code that uses the `invisible` class to hide and show `dd` elements to instead use the `.toggle()` method.

1. Update the `li` clicks adding `invisible` to the parent `ul` to instead use `.hide()`.
