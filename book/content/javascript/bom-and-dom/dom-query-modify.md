# Document Object Model (DOM)

The [Document Object Model (DOM)](https://developer.mozilla.org/en-US/docs/DOM) represents a tree-like hierarchy of nodes in an HTML document and it allows querying and modification of individual parts of the document.

## Locating Elements

There are a variety of ways to query the DOM for elements. We will cover methods for retrieving elements by their id, class, or tag name. We will also cover the direct access of form inputs.

### Retrieve Element by Id

When you want to retrieve an individual HTML element, it is very easy to do so by accessing it by its `id` with the `document.getElementById()` method. Let's see an example:

~~~html
<button id="btnToClick">Click Me</button>
<script>
    "use strict";
    (function() {
        var btnToClick = document.getElementById('btnToClick');

        console.log(btnToClick); // prints <button id="btnToClick">Click Me</button>
    })();
</script>
~~~

In the example above, the id `btnToClick` is on a button element. When we call `document.getElementById()` with that id, we get back the button element. Later in the lesson, we will see some things we can do with an element once we have a reference to it. If an element with the specified `id` is not found, `null` will be returned by the `document.getElementById()` method.

### Retrieve Element List by Class or Tag Name

Besides locating elements by `id`, elements are also often located by `class` or tag name. In this case, `class` refers to the css classes assigned to an element within the `class` attribute. Tag name refers to the actual name of the HTML tag.

To access HTML elements by class, use the `document.getElementsByClassName()` method. Note `Elements` in the method name. Unlike `document.getElementById()`, which returns a single HTML element, `document.getElementsByClassName()` returns an HTML element collection (NodeList).

Similarly, to access HTML elements by tag name, use the `document.getElementsByTagName()` method.

Let's see an example of each:

~~~html
<h1>List One</h1>
<ul>
    <li class="odd list-one-item">List 1, Item 1</li>
    <li class="even list-one-item">List 1, Item 2</li>
</ul>
<h1>List Two</h1>
<ul>
    <li class="odd list-two-item">List 2, Item 1</li>
    <li class="even list-two-item">List 2, Item 2</li>
</ul>

<script>
    "use strict";
    (function() {
        // Get all elements with class 'even'
        var evenElements = document.getElementsByClassName('even');

        // Print the first element
        console.log(evenElements[0]); // Prints li.even.list-one-item

        // Print all elements
        for (var i = 0; i < evenElements.length; i++) {
            console.log(evenElements[i]);
        }

        // Prints:
        // li.even.list-one-item
        // li.even.list-two-item

        var listItems = document.getElementsByTagName('li');

        // Print the first list item
        console.log(listItems[0]); // Prints li.odd.list-one-item

        // Print all the list items
        for (var i = 0; i < listItems.length; i++) {
            console.log(listItems[i]);
        }

        // Prints
        // li.odd.list-one-item
        // li.even.list-one-item
        // li.odd.list-two-item
        // li.even.list-two-item
    })();
</script>
~~~

As you can see, elements returned by `document.getElementsByClassName()` or `document.getElementsByTagName()` must be accessed by as an array.

### Direct Access to Form Inputs

Some elements, like form inputs, can be accessed directly by name through special properties on the `document` object. Let's see an example:

~~~html
<form name="login">
    <div>
        <label for="username">Username</label>
        <input id="username" name="username" type="text">
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" name="password" type="password">
    </div>
    <div>
        <input type="submit">
    </div>
</form>
<script>
    "use strict";
    (function() {
        // get the "username" input
        var usernameInput = document.forms.login.username;

        // log the value of the "username" input
        console.log(usernameInput.value);
    })();
</script>
~~~

In the example above, we can see that the `document` object has a collection named `forms`. Forms in the document are accessible by name via the forms collection, and then form inputs are accessible by name within a specified form. We also see that you can get a value for a form input by using the `value` property.

There are other collections available within the `document` object, like `anchors` and `images`, but we will not be using them in this course.

## Accessing or Modifying Element Properties

Once you have retrieved an element or list of elements, you can make modifications if desired. We will be covering accessing or modification of the inner html of the element, an attribute of the element, and the style of an element.

### Accessing or Modifying Inner HTML and Text

[Inner HTML](https://developer.mozilla.org/en-US/docs/Web/API/Element.innerHTML) is the content within the open and close tag of an HTML element. This can be retrieved or updated via the `innerHTML` property on the element you are working with. Let's see an example:

~~~html
<h1 id="main-heading">Hello World!</h1>
<div id="main-section">
    <p>Paragraph 1</p>
    <p>Paragraph 2</p>
</div>
<script>
    "use strict";
    (function() {
        // Get the main heading h1 by id
        var mainHeading = document.getElementById('main-heading');

        console.log(mainHeading.innerHTML); // Prints Hello World!

        // Assign a new value to the inner HTML of the main heading
        mainHeading.innerHTML = "Hello Codeup!";

        console.log(mainHeading.innerHTML); // Prints Hello Codeup!

        // Get the main section div by id
        var mainSection = document.getElementById('main-section');

        console.log(mainSection.innerHTML);
        // Prints
        // <p>Paragraph 1</p>
        // <p>Paragraph 2</p>
    })();
</script>
~~~

In the example above, you can see how the `innerHTML` property can be used to retrieve or update the inner HTML of an element.

The property `innerText` behaves in a similar manner, but it ignores any HTML tags. This can be useful if are just concerned with the text a user sees, or if we do not want to allow them to inject HTML tags in our page.

### Accessing or Modifying Attributes

In addition to retrieving or updating an element's inner HTML, the element's attributes can also be accessed and updated. We can do this using a handful of methods.

~~~html
<a href="http://www.yahoo.com" id="search-link">Web Search</a>
<script>
    "use strict";
    (function() {
        // Get the search link anchor by id
        var searchLink = document.getElementById("search-link");

        // Does an element have an attribute?
        console.log(searchLink.hasAttribute("href")); // Prints true
        console.log(searchLink.hasAttribute("class")); // Prints false

        // Get an attribute value
        console.log(searchLink.getAttribute("href")); // Prints "http://www.yahoo.com"

        // Add or modify an attribute
        searchLink.setAttribute("class", "btn btn-default");
        // Adds the attribute class and sets it to "btn btn-default"

        searchLink.setAttribute("href", "http://google.com");
        // Changes the href attribute to "http://google.com"

        // Remove an attribute
        searchLink.removeAttribute("class"); // Remove the class attribute
    })();
</script>
~~~

In the example above, the `href` attribute of the anchor element is accessed and updated. If you were to click on the link in the page after the page was loaded, the link would direct you to Google.

It should be noted that in HTML 5, `data-*` attributes can be added to HTML elements to provide metadata for an element. The `*` portion of the name must be at least one character long and should be all lower case. Using custom data attributes coupled with access via JavaScript can be very useful. Let's see an example:

~~~html
<ul>
    <li data-dbid="123">Item one</li>
    <li data-dbid="234">Item two</li>
</ul>
<script>
    "use strict";
    (function() {
        // Get the main heading h1 by id
        var listItems = document.getElementsByTagName('li');

        for (var i = 0; i < listItems.length; i++) {
            var dbId = listItems[i].getAttribute("data-dbid");
            console.log(dbId);
        }
        // Prints
        // 123
        // 234
    })();
</script>
~~~

As you can see in the example above, adding and accessing custom data attributes is easy, and doing so can help provide organized access to element metadata via JavaScript.

### Accessing or Modifying Styles

Very similar to accessing and updating attributes on an element, the styles of an element can be changed via the `style` property on an element. Let's see an example:

~~~html
<!DOCTYPE html>
<html>
<head>
    <title>Sample Page</title>
</head>
<body>
    <script>
        "use strict";
        (function() {
            // Get the body element (notice we need to use index 0 of the array!)
            var bodyElement = document.getElementsByTagName('body')[0];

            // Change the body font color
            bodyElement.style.color = '#444'; // Dark grey

            bodyElement.style['background-color'] = "#fefefe"; // Very light grey
            // We had to use [] syntax since the property name has a dash

            bodyElement.style.fontFamily = "Helvetica, Verdana, Sans-Serif";
            // Replace dashes with camelCaps to use standard . syntax
        })();
    </script>
</body>
</html>
~~~

## Adding and Removing Elements

Elements can also be added and removed to/from the DOM via JavaScript. We will not be covering the details in the class, but the methods below are provided for your edification.

- [`createElement()`](https://developer.mozilla.org/en-US/docs/Web/API/document.createElement)
- [`removeChild()`](https://developer.mozilla.org/en-US/docs/Web/API/Node.removeChild)
- [`appendChild()`](https://developer.mozilla.org/en-US/docs/Web/API/Node.appendChild)
- [`replaceChild()`](https://developer.mozilla.org/en-US/docs/Web/API/Node.replaceChild)

## Exercises

Please follow the instructions below.

1. Download [`dom-query-js.html`](../../examples/javascript/dom-query-js.html) and save it to the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac.
1. Follow the instructions in the script tags and complete each TODO item.
1. View the results in your browser to test for the expected output.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.
