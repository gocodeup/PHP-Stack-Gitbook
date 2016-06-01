# Attribute Methods

jQuery gives us many methods that act as getters and setters for the attribues of DOM elements.

## Using Attribute Methods

The jQuery documentation has a [full list of the attribue methods](http://api.jquery.com/category/attributes/); we will be covering the most commonly used methods.

Attribute methods covered in this unit:
- `.html()` &mdash; Get the HTML contents of the first element in the set of matched elements or set the HTML contents of every matched element.
- `.css()` &mdash; Get the value of a style property for the first element in the set of matched elements or set one or more CSS properties for every matched element.
- `.addClass()` &mdash; Adds the specified class(es) to each of the set of matched elements.
- `.removeClass()` &mdash; Remove a single class, multiple classes, or all classes from each element in the set of matched elements.
- `.toggleClass()` &mdash; Add or remove one or more classes from each element in the set of matched elements, depending on either the class’ presence or the value of the switch argument.

### .html()

> Get the HTML contents of the first element in the set of matched elements or set the HTML contents of every matched element.
[http://api.jquery.com/html/](http://api.jquery.com/html/)

Like several of the methods found in jQuery, `.html()` can be both a _getter_ and a _setter_.

When no arguments are passed to `.html()`, it will retrieve the HTML contents of a selected element.

Using our previous example HTML:

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

We could retrieve the contents of the `h1` element using this bit of jQuery:

~~~js
$('#codeup').html();
~~~

It would be easy to assign the contents of the `h1` to a variable an alert it:

~~~js
var h1 = $('#codeup').html();
alert(h1);
~~~

Wrapping this in a `click` event would give us some control over when the alert fired:

~~~js
$('#codeup').click(function() {
    var h1 = $('#codeup').html();
    alert(h1);
});
~~~

Using `$(this)` would keep jQuery from looking up the `h1` element twice:

~~~js
$('#codeup').click(function() {
    var h1 = $(this).html();
    alert(h1);
});
~~~

Refactoring further, we could eliminate the temporary variable `var h1`:

~~~js
$('#codeup').click(function() {
    alert($(this).html());
});
~~~

We can test this code below:

[Example](http://jsbin.com/suveni/1/edit?output)

The `.html()` method can also be used to set the HTML inside of a selected element.  Instead of displaying the contents, we could have the contents change on click using this code:

~~~js
$('#codeup').click(function() {
    $(this).html('Codeup Rocks!');
});
~~~

Now we are using `.html()` to set the contents instead of retrieving them. Test the functionality in the example below:

[Example](http://jsbin.com/wetav/1/edit?output)

### .css()

> Get the value of a style property for the first element in the set of matched elements or set one or more CSS properties for every matched element.
[http://api.jquery.com/css/](http://api.jquery.com/css/)

### .addClass()

> Adds the specified class(es) to each of the set of matched elements.
[http://api.jquery.com/addClass/](http://api.jquery.com/addClass/)

Adding classes dynamically to elements is a great way to control the styling of a page and use event handlers to add functionality.

The syntax for `.addClass()` is:

~~~js
.addClass( className )
~~~

Earlier we highlighted text on the page; now, we can do so using a predefined class with styling.

Consider the follow page:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <style>
        .centered {
            text-align: center;
        }
        .highlighted {
            background-color: #FF0;
        }
    </style>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#highlight-important').click(function(event) {
                event.preventDefault();
                $('.important').addClass('highlighted');
            });
        });
    </script>
</head>
<body>
    <h1>Example Page</h1>
    <div class="centered important">
        <h3>NOTICE</h3>
        <p>This is an important message!</p>
    </div>
    <div class="not-important">
        <h2>Lorem Ipsum</h2>
        <p>Lorem ipsum dolor sit amet, incididunt ut <span class="important">labore et dolore magna aliqua.</span>, quis ut aliquip ex ea commodo.</p>
    </div>
    <p class="centered important">This is also very important.</p>
    <a href="#" id="highlight-important">Click to highlight important text.</a>
</body>
</html>
~~~

We first notice the custom CSS:

~~~css
.centered {
    text-align: center;
}
.highlighted {
    background-color: #FF0;
}
~~~

This tells us any element with class `.centered` will have center aligned text, and any element that uses class `.highlighted` will have a background color of yellow.

Next, we notice the jQuery:

~~~js
$(document).ready(function() {
    $('#highlight-important').click(function(event) {
        event.preventDefault();
        $('.important').addClass('highlighted');
    });
});
~~~

This is adding a click event to the `a` element with the id `highlight-important`.  When the event handler is triggered, the first thing it runs is `event.preventDefault()`, which will stop the default behavior of the anchor element from firing.

After the event is updated, we then see the `.addClass()` method being used to add the `highlighted` class to the elements selected by `$('.important')`.

Clicking on the `highlight-important` link should add the `highlighted` class to all elements with a class of `important`, thereby making them have a yellow background color.

We can test this code below:

[Example](http://jsbin.com/wimara/1/edit?output)

### .removeClass()

> Remove a single class, multiple classes, or all classes from each element in the set of matched elements.
[http://api.jquery.com/removeClass/](http://api.jquery.com/removeClass/)

Above, we learned how to add a class to elements using `.addClass()`; here, we will learn how to remove classes from elements using `.removeClass()`.

The syntax for `.removeClass()` is the same as above:

~~~js
.removeClass( className )
~~~

Using the example from above, we could start with the `highlighted` class on by default and have the link remove the styling:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <style>
        .centered {
            text-align: center;
        }
        .highlighted {
            background-color: #FF0;
        }
    </style>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#highlight-important').click(function(event) {
                event.preventDefault();
                $('.important').removeClass('highlighted');
            });
        });
    </script>
</head>
<body>
    <h1>Example Page</h1>
    <div class="centered important highlighted">
        <h3>NOTICE</h3>
        <p>This is an important message!</p>
    </div>
    <div class="not-important">
        <h2>Lorem Ipsum</h2>
        <p>Lorem ipsum dolor sit amet, incididunt ut <span class="important highlighted">labore et dolore magna aliqua.</span>, quis ut aliquip ex ea commodo.</p>
    </div>
    <p class="centered important highlighted">This is also very important.</p>
    <a href="#" id="highlight-important">Click to remove highlight from important text.</a>
</body>
</html>
~~~

We can see this example below:

[Example](http://jsbin.com/xidiya/1/edit?output)

### .toggleClass()

> Add or remove one or more classes from each element in the set of matched elements, depending on either the class’ presence or the value of the switch argument.
[http://api.jquery.com/toggleClass/](http://api.jquery.com/toggleClass/)

The syntax for `.toggleClass()` is:

~~~js
.toggleClass( className )
~~~

If the class name is present, `.toggleClass()` will remove it, else the new class name will be added.

We can update our example to have the link add or remove highlighting on each click:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Example jQuery Page</title>
    <style>
        .centered {
            text-align: center;
        }
        .highlighted {
            background-color: #FF0;
        }
    </style>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#highlight-important').click(function(event) {
                event.preventDefault();
                $('.important').toggleClass('highlighted');
            });
        });
    </script>
</head>
<body>
    <h1>Example Page</h1>
    <div class="centered important highlighted">
        <h3>NOTICE</h3>
        <p>This is an important message!</p>
    </div>
    <div class="not-important">
        <h2>Lorem Ipsum</h2>
        <p>Lorem ipsum dolor sit amet, incididunt ut <span class="important highlighted">labore et dolore magna aliqua.</span>, quis ut aliquip ex ea commodo.</p>
    </div>
    <p class="centered important highlighted">This is also very important.</p>
    <a href="#" id="highlight-important">Click to toggle the highlighting of important text.</a>
</body>
</html>
~~~

As we see below, the link will now add or remove highlighting based on the present state. Viewing the element inspector in a browser will show the `highlighted` class being added and removed from the elements.

[Example](http://jsbin.com/cufuy/1/edit?output)

**Note:** There are more advanced ways to use `.toggleClass()` available in the [documentation](http://api.jquery.com/toggleClass/).

## Exercises

1. Create a new file named `jquery_faq.html`.  Commit all changes to GitHub.

1. In a HTML structure, create a definition list containing 10 FAQs about national parks.

1. Add a class to all `dd` elements named `invisible`.

1. Create CSS that sets elements with the `invisible` class to `display: none`.

1. Update the page with jQuery to add a link that toggles the class `invisible` on and off for all `dd` elements.
