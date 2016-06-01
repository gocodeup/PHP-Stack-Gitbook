# ID Selector

> Calling jQuery() (or $()) with an id selector as its argument will return a jQuery object containing a collection of either zero or one DOM element. Each id value must be used only once within a document. If more than one element has been assigned the same ID, queries that use that ID will only select the first matched element in the DOM.
[http://api.jquery.com/id-selector/](http://api.jquery.com/id-selector/)

The syntax for selecting an element by `id` is:

~~~js
$('#id');
~~~

We can start with a basic page:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
</head>
<body>
    <h1 id="codeup">Hello Codeup</h1>
</body>
</html>
~~~

Adding some JavaScript to use jQuery will allow us to change the text in the `h1` element.

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            var contents = $('#codeup').html();
            alert(contents);
        });
    </script>
</head>
<body>
    <h1 id="codeup">Hello Codeup</h1>
</body>
</html>
~~~

First, we added the _document ready_ code to make sure the DOM was ready for manipulation:

~~~js
$(document).ready(function() {
    // ...
});
~~~

Next, we used the jQuery alias `$` and an id selector to match the id `codeup`.  We then chained the `html()` method to get the contents of the HTML element and assigned the results to the variable `content`.  We will learn more about the `html()` function later.

~~~js
$(document).ready(function() {
    var contents = $('#codeup').html();
    alert(contents);
});
~~~

Alerting the `contents` variable shows us the text inside the heading element with the `id` of `codeup`.

# Method chaining

Most of the jQuery methods return a jQuery object.  This means that we can continue to add, or _chain_, methods together to manipulate a set of elements.

We can select an element and return it as a jQuery object:

~~~js
var contents = $('#codeup');
~~~

As we saw in the previous example, we could _chain_ the `html()` method on the selector.

~~~js
$(document).ready(function() {
    var contents = $('#codeup').html();
    alert(contents);
});
~~~

This could have been written using the `contents` variable:

~~~js
$(document).ready(function() {
    var contents = $('#codeup');
    alert(contents.html());
});
~~~

## Exercises

Use the file `jquery_exercises.html` for these exercises.  Commit your changes to GitHub.

1. Create content in your HTML file using at least the following elements: `h1`, `p`, `ul`, `li`, `div`.

1. Add several attributes to your elements; you will need both `id` and `class` attributes.

1. Use jQuery to select an element by the `id`.  Alert the contents of the element.

1. Update the jQuery code to select and alert a different `id`.

1. Use the same `id` on 2 elements. How does this change the jQuery selection?

1. Remove the duplicate `id`.  Each `id` should be unique on that page.
