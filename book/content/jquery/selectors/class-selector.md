# Class Selector

Classes, unlike ids, can be used multiple times within a document. Selecting elements by class is a simple way to manipulate multiple DOM elements at one time.

## Using the Class Selector

The syntax for using a class selector is:

~~~js
$('.class')
~~~

This is the same as:

~~~js
jQuery('.class')
~~~

Consider using the following document with several elements with the same class name.

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <style>
        .important {
            text-align: center;
        }
    </style>
    <script src="/js/jquery.js"></script>
</head>
<body>
    <h1>Example Page</h1>
    <div class="important">
        <h3>NOTICE</h3>
        <p>This is an important message!</p>
    </div>
    <div class="not-important">
        <h2>Lorem Ipsum</h2>
        <p>Lorem ipsum dolor sit amet, incididunt ut <span class="important">labore et dolore magna aliqua.</span>, quis ut aliquip ex ea commodo.</p>
    </div>
    <p class="important">This is also very important.</p>
</body>
</html>
~~~

We could add some jQuery to easily select all the elements with a class of `important` and change the background color to yellow.

Using the `css()` method to change a property takes two arguments: the first for the property name and the second for the value:

~~~js
$(_selected_element_).css(propertyName, value);
~~~

We can use this to change our elements with the class name of `important`:

~~~js
$(document).ready(function() {
    $('.important').css('background-color', '#FF0');
});
~~~

All together the document will now look like this:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <style>
        .important {
            text-align: center;
        }
    </style>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('.important').css('background-color', '#FF0');
        });
    </script>
</head>
<body>
    <h1>Example Page</h1>
    <div class="important">
        <h3>NOTICE</h3>
        <p>This is an important message!</p>
    </div>
    <div class="not-important">
        <h2>Lorem Ipsum</h2>
        <p>Lorem ipsum dolor sit amet, incididunt ut <span class="important">labore et dolore magna aliqua.</span>, quis ut aliquip ex ea commodo.</p>
    </div>
    <p class="important">This is also very important.</p>
</body>
</html>
~~~

We can see the output below:

[Example](http://jsbin.com/topupe/1/edit?output)

## Exercises

Use the file `jquery_exercises.html` for these exercises.  Commit your changes to GitHub.

1. Remove your custom jQuery code from previous exercises.

1. Update your code so that at least 3 different elements have the same class named `codeup`.

1. Using jQuery, create a border around all elements with the class `codeup` that is 1 pixel wide and red.

1. Remove the class from one of the elements. Refresh and test that the border has been removed.

1. Give another element an `id` of `codeup`.  Does this element get a border now?
