# Introduction to jQuery

## What is jQuery?

> jQuery is a cross-platform JavaScript library designed to simplify the client-side scripting of HTML. It was released in January 2006 at BarCamp NYC by John Resig.
[jQuery - Wikipedia, the free encyclopedia](http://en.wikipedia.org/wiki/JQuery)

jQuery is the most widely used JavaScript library on the internet today.

## Why use jQuery?

> Used by over 80% of the 10,000 most visited websites, jQuery is the most popular JavaScript library in use today.
[jQuery - Wikipedia, the free encyclopedia](http://en.wikipedia.org/wiki/JQuery)

jQuery has a simple syntax makes it easy to:
- navigate a document
- select DOM elements
- create animations
- handle events
- create Ajax applications
- add plugins

## Using jQuery

Before we can begin using jQuery in our applications, we need to include the jQuery source.  This can be done by either installing locally or linking to a public CDN.

### Installing jQuery

We can install jQuery locally, or using a content delivery network (CDN).

#### Downloading jQuery

We can download different packages for jQuery from the [official jQuery download page](http://jquery.com/download/).

There are 2 versions of jQuery available at this time:
- jQuery 1.x - The current recommended version
- jQuery 2.x - Newest version, has same API as 1.x, but no support for IE 6, 7, or 8

Each version has two different release types: compressed (production) and uncompressed (development).

We will be using the uncompressed copies for our applications and will switch them out for the compressed versions when we launch our product on a production server.

On the [official jQuery download page](http://jquery.com/download/), we can right-click the link to download the uncompressed jQuery 1.x, and choose _save link as_, browse to our desired location, and save the `.js` file.

To use in our application, we can now just copy the file to our `js` folder and reference it using a `<script>` element like this:

~~~html
<script src="/js/jquery.js"></script>
~~~

#### Using jQuery from a CDN

jQuery provides a CDN release for production.  It is available in the minified version and is easy to include using a `<script>` element.

~~~html
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
~~~

This line will retrieve the jQuery source code from the CDN provided by [MaxCDN](http://www.maxcdn.com/).

### The jQuery object

We will be using the `jQuery` object to find and create HTML elements from the DOM.

The jQuery object is [defined in the API documentation](http://api.jquery.com/jQuery/):
> Return a collection of matched elements either found in the DOM based on passed argument(s) or created by passing an HTML string.

In jQuery, we commonly use the dollar sign `$`, an alias of `jQuery` to reference the jQuery object, as we will see below.

### Document Ready

JavaScript provides the ability to natively determine if the window has finished loading using the `window.onload` event handler.

~~~js
window.onload = function() {
    alert( 'The page has finished loading!' );
}
~~~

While this is a good way to make sure the page is fully loaded and ready for DOM manipulation, it waits until all images have finished downloading.  We usually do not need the image files to be fully downloaded to begin manipulating DOM objects.

We can  use jQuery to select the `document` object and add an event listener called `ready`.  This event listener will fire as soon as the DOM is ready to be manipulated, _before_ all the images have completed downloading.

To use the _document ready_ event listener, we can select the `document` and chain the `ready()` method:

~~~js
$(document).ready();
~~~

Passing an anonymous function in `ready()` will execute our code when the document is ready for JavaScript manipulation:

~~~js
$(document).ready(function() {
    alert( 'The DOM has finished loading!' );
});
~~~

While using _document ready_ is very common, if we put our JavaScript at the bottom of our document, it will already be loaded by the time the JavaScript is loaded.  Using document ready will ensure the DOM is loaded before running.

## Exercises

Commit each step to GitHub.

1. Create a new file named `jquery_exercises.html` in your `codeup.dev` directory.

1. Add a basic HTML structure and included the downloaded version of jQuery in your `js` folder.

1. Add an alert to tell you the DOM has finished loading.  Check for expected results.
