# Multiple Selector

Sometimes we want to select multiple different elements using different selectors.  While we could create a different selector for each, jQuery allows us to use multiple selectors at one time to get a single result.

## Using the Multiple Selector

We can use the multiple selector by separating our selectors by commas:

```js
$("selector1, selector2, ...")
```

If we wanted to get all the elements with a class of `important` and all paragraph elements, we could use this selector:

```js
var selected = $('.important, p');
```

Going back to our example HTML page, we could select all elements with a class of `important` _and_ all paragraph elements and make their background color yellow:

```html
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
            $('.important, p').css('background-color', '#FF0');
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
```

[Example](http://jsbin.com/qejeli/1/edit?output)

### Using the All (*) Selector

If we want to select all the elements on a page, we can  use the _all selector_:

```js
$('*')
```

> Find every element (including head, body, etc) in the document. Note that if your browser has an extension/add-on enabled that inserts a &lt;script&gt; or &lt;link&gt; element into the DOM, that element will be counted as well.
[http://api.jquery.com/all-selector/](http://api.jquery.com/all-selector/)

A common use is to put a border around every element to help see the layout of a page.  We could create a thin red line around all of our elements using the _all_ selector and some CSS:

```html
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
            $('*').css('border', '1px solid #F00');
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
```

This will yield the following page:

[Example](http://jsbin.com/fivucu/1/edit?output)

## Exercises

Use the file `jquery_exercises.html` for these exercises.  Commit your changes to GitHub.

1. Combine your selectors that highlight all the `h1`, `p`, and `li` elements.

1. Remove your custom jQuery code from previous exercises.
