# JavaScript with HTML

{% video %}https://vimeo.com/155164204{% endvideo %}
[JavaScript with HTML](https://vimeo.com/155164204/b8250334a6)

Thus far, we have been using the JavaScript Console to learn about JavaScript. It is now time to start working with JavaScript in HTML.

JavaScript can be added to a web page using the `script` tag. The `script` tag allows for both inline JavaScript, and also the referencing of a separate JavaScript file to be included.

The `script` tag can be added to the `head` or `body` of the HTML document. For performance reasons, JavaScript code is often moved to the bottom of the `body` tag so that it doesn't delay the loading of the web page.

## Inline JavaScript Example

```html
<!DOCTYPE html>
<html>
<head>
    <title>Inline JS</title>
</head>
<body>
    <script>
        // JavaScript code goes here
    </script>
</body>
</html>
```

Note: In the past, a `type` attribute was specified in the `script` tag. As of HTML 5, the `type` attribute is optional and the default type is `text/javascript`. Therefore, the omission of the `type` attribute is recommended.

## External JavaScript Example

When including external files, a `src` attribute is added to the `script` tag. In the example below, a JavaScript file named `external.js` located in a folder named `js` contained in the same directory as the HTML file itself will be loaded with the page.

```html
<!DOCTYPE html>
<html>
<head>
    <title>External JS</title>
</head>
<body>
    <script src="js/external.js"></script>
</body>
</html>
```

## Logging to the JavaScript Console

A very handy debugging feature is the ability to send messages to the Chrome JavaScript Console. Often times, a few lines of debug logging can be great time savers during the development process.

To write a message to the console, try the following:

```js
console.log('Hello from JavaScript!');
```

Note: Console logging should be removed from production code because it isn't supported by all browsers and can cause execution errors.

## Use Strict

> ECMAScript 5's strict mode is a way to opt in to a restricted variant of JavaScript. Strict mode isn't just a subset: it intentionally has different semantics from normal code.
> <footer><cite>[Mozilla Developer Network](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Strict_mode)

Use Strict allows JavaScript's silent errors to be shown. This makes for a more restrictive check against your code thus making the overall quality of your code better. Use strict is easy to add to any of your JavaScript code. See below for the code snippet.

```js
"use strict";

//... rest of javascript code
```

Just having that string at the top of your JavaScript file, or `<script>` block causes the browser to apply the stricter rules to your code. This will make your scripts more reliable and easier to debug.

### Use Strict example

If you have the following file loaded in your browser and you open the console everything seems fine under the hood. No errors to report.

```html
<!DOCTYPE html>
<html>
<head>
    <title>Use Strict</title>
</head>
<body>
    <script>
        myAge = 25;
    </script>
</body>
</html>
```

If you add the following to the above script you will now see an error thrown because you have not declared the `var myAge`

```js
"use strict";

// ... code

myAge = 25;

// .. rest of code
```

Of course to fix the error you would add `var` in front of the variable myAge. As you can see this will help the quality of our JavaScript down the road. __Be sure to use this at the top of your JavaScript code from now on.__

## Exercises

For this lesson, perform the following tasks:

{% if book.curriculumName == "prep1" or book.curriculumName == "prep2" %}

1. Within the `Codeup` folder on your Mac, create two HTML files. Name one `inline_js.html`, and the other `external_js.html`.
1. Create a folder named `js` in the same location as the html files you created.
1. Inside the `js` folder, create a file named `external.js`.
1. Use the sample code from this lesson to fill in the html files with the appropriate code.
1. Add a console.log message in `inline_js.html` that says "Hello from inline JavaScript".
1. Add a console.log message in `external.js` that says "Hello from external JavaScript".
1. Open the html files and view the JavaScript Console to make sure you see your messages.
1. Make sure to save your files regularly so that nothing gets unintentionally deleted!

{% else %}

1. Within the `~/vagrant-lamp/sites/codeup.dev/public` folder on your Mac, create two HTML files. Name one `inline_js.html`, and the other `external_js.html`.
1. Create a folder named `js` in the same location as the html files you created.
1. Inside the `js` folder, create a file named `external.js`.
1. Use the sample code from this lesson to fill in the html files with the appropriate code.
1. Add a console.log message in `inline_js.html` that says "Hello from inline JavaScript".
1. Add a console.log message in `external.js` that says "Hello from external JavaScript".
1. Open the html files and view the JavaScript Console to make sure you see your messages.
1. Finally, save your work, commit the changes to your git repository, and push to GitHub.

{% endif %}
Congrats! You now know how to embed JavaScript in a web page.
