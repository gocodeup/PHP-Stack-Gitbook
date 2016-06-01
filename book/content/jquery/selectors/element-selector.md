# Element Selector

Selecting elements by `id` and `class` is very convenient, but sometimes we need to get all the elements that are of the same type.  The [element selector](http://api.jquery.com/element-selector/) allows us to select elements based on their tag name.

## Using the Element Selector

Like the `id` and `class` selectors, we can use a simple CSS selector in our jQuery object's constructor:

```js
$("element_name")
```

For example, we could get all the paragraph elements like this:

```js
$("p")
```

Looking at our previous example HTML page:

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

We could make all of our paragraph fonts larger using jQuery.  Later, when we learn about events, we could create buttons to increase and decrease font size.

```js
$('p').css('font-size', '14px');
```

Adding this to our HTML page, inside of a _document ready_ will make all of our text larger:

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
            $('p').css('font-size', '32px');
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

This will create the following page:

[Example](http://jsbin.com/gayir/1/edit?output)

## Exercises

Use the file `jquery_exercises.html` for these exercises.  Commit your changes to GitHub.

1. Remove your custom jQuery code from previous exercises.

1. Using jQuery, set the font-size of all `li` elements to `20px`.

1. Craft selectors that highlight all the `h1`, `p`, and `li` elements.

1. Create a jQuery statement to alert the contents of your `h1` element(s).
