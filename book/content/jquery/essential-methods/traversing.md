# Traversing Methods

jQuery gives us a suite of methods to get and set CSS properties.

## Using Traversing Methods

The jQuery documentation has a [full list of the traversing methods](http://api.jquery.com/category/traversing/); we will be covering the most commonly used methods.

The traversing methods covered in this unit:
- `.each()` &mdash; Iterate over a jQuery object, executing a function for each matched element.
- `.first()` &mdash; Reduce the set of matched elements to the first in the set.
- `.last()` &mdash; Reduce the set of matched elements to the final one in the set.
- `.parent()` &mdash; Get the parent of each element in the current set of matched elements, optionally filtered by a selector.
- `.children()` &mdash; Get the children of each element in the set of matched elements, optionally filtered by a selector.

### .each()

> Iterate over a jQuery object, executing a function for each matched element.
[http://api.jquery.com/each/](http://api.jquery.com/each/)

A selection may return more than one element, and jQuery makes it easy to traverse, or loop through, the elements.  On each iteration, the `.each()` method returns an index (0 based) and the element.

The syntax for `.each()` is:

~~~js
.each( function(index, Element) )
~~~

As we see, it passes the index and the element to the callback function at the beginning of each pass.

If we had an unordered list like this one:

~~~html
<ul>
    <li>Linux</li>
    <li>Apache</li>
    <li>MySQL</li>
    <li>PHP</li>
    <li>JavaScript</li>
</ul>
~~~

We could use jQuery to highlight every other `li` element using the `.each()` method:

~~~js
$('li').each(function(index) {
    if (index % 2 !== 0) {
        $(this).css('background-color', '#FF0');
    }
});
~~~

The first `li` element will have an index of `0`, so to highlight _even_ rows, we need to add a yellow background to _odd_ indexes.

The element is passed as `this`, so we can use `$(this)` to make it a jQuery object.

We can see this code example below:

[Example](http://jsbin.com/woyuma/1/edit?output)

### .first()

> Reduce the set of matched elements to the first in the set.
[http://api.jquery.com/first/](http://api.jquery.com/first/)

The syntax for first is simply `.first()`.

Using the example list from above, we could highlight the first list item using this code:

~~~js
$('li').first().css('background-color', '#FF0');
~~~

We can see this in the example below:

[Example](http://jsbin.com/dulegu/1/edit?output)

### .last()

> Reduce the set of matched elements to the final one in the set.
[http://api.jquery.com/last/](http://api.jquery.com/last/)

The opposite of `.first()`, `.last()` matches the last element in a collection.

To highlight the last list item in our example list, we could use `.last()`:

~~~js
$('li').last().css('background-color', '#FF0');
~~~

We can see this in the example below:

[Example](http://jsbin.com/zowur/1/edit?output)

### .children()

> Get the children of each element in the set of matched elements, optionally filtered by a selector.
[http://api.jquery.com/children/](http://api.jquery.com/children/)

To get all the _child elements_ of a selected element, we can use the `.childern()` method. This will return all the child elements or all elements selected by the optional selector arguments.

The syntax for `.children()` is:

~~~js
.children( [selector ] )
~~~

We can use the following structure as an example:

~~~html
<h3>National Parks</h3>
<ul id="national-parks">
    <li>Arches</li>
    <li>Badlands</li>
    <li>Carlsbad Caverns</li>
    <li>Denali</li>
    <li>Everglades</li>
</ul>
<h3>State Parks of Texas</h3>
<ul id="state-parks-texas">
    <li>Abilene</li>
    <li>Big Bend</li>
    <li>Choke Canyon</li>
    <li>Davis Mountains</li>
    <li>Enchanted Rock</li>
</ul>
~~~

We could make all the `li` elements bold using this bit of jQuery:

~~~js
$('li').css('font-weight', 'bold');
~~~

If we only wanted to manipulate the children of the `ul` with a class `national-parks` we could use the `.children()` method:

~~~js
$('#national-parks').children().css('font-weight', 'bold');
~~~

The complete code would look like this:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Parks List</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#national-parks').children().css('font-weight', 'bold');
        });
    </script>
</head>
<body>
    <h1>Parks List</h1>
    <h3>National Parks</h3>
    <ul id="national-parks">
        <li>Arches</li>
        <li>Badlands</li>
        <li>Carlsbad Caverns</li>
        <li>Denali</li>
        <li>Everglades</li>
    </ul>
    <h3>State Parks of Texas</h3>
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

The output can be seen here:

[Example](http://jsbin.com/cuqiz/1/edit?output)

### .parent()

> Get the parent of each element in the current set of matched elements, optionally filtered by a selector.
[http://api.jquery.com/parent/](http://api.jquery.com/parent/)

**Note:** There is also a method called `.parents()`:

> The .parents() and .parent() methods are similar, except that the latter only travels a single level up the DOM tree. Also, $( "html" ).parent() method returns a set containing document whereas $( "html" ).parents() returns an empty set.
[http://api.jquery.com/parent/](http://api.jquery.com/parent/)

The syntax for `.parent()` and `.parents()` is:

~~~js
.parent( [selector ] )
.parents( [selector ] )
~~~

The `.parent()` method will return only elements one set up the DOM, where `.parents()` will travel completely up the DOM tree. Both methods allow an option argument with a _selector_ to only retrieve matching elements.

Using our parks listing as an example, we can color the background of all `li` elements yellow and the background of their parent `ul` elements green using this code:

~~~js
$('li').css('background-color', '#FF0');
$('li').parent().css('background-color', '#0F0');
~~~

The entire page would look like this:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Parks List</title>
    <script src="/js/jquery.js"></script>
    <script>
        "use strict";

        $(document).ready(function() {
            $('li').css('background-color', '#FF0');
            $('li').parent().css('background-color', '#0F0');
        });
    </script>
</head>
<body>
    <h1>Parks List</h1>
    <h3>National Parks</h3>
    <ul id="national-parks">
        <li>Arches</li>
        <li>Badlands</li>
        <li>Carlsbad Caverns</li>
        <li>Denali</li>
        <li>Everglades</li>
    </ul>
    <h3>State Parks of Texas</h3>
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

The output can be seen here:

[Example](http://jsbin.com/pasusa/1/edit?output)

## Exercises

1. Open the file named `jquery_faq.html` for editing.  Commit all changes to GitHub.

1. Under the FAQ, add 3 unordered lists like above.  Each list should contain a national park name in an `h3` element, and a `ul` of 4 facts about the park.

1. Create jQuery code that makes the first `li` element in each `ul` have `font-weight: bold`.

1. Create jQuery code that adds the `invisible` class on the parent `ul` of any `li` that is clicked.
