# Ajax Request

Ajax is a way to communicate with a server, sending or retrieving data, without refreshing the current webpage. Once the request is done we can alter the DOM with the requested information or result. The quintessential example of this is [Google Maps](https://www.google.com/maps). Each time you drag the map or press a button, the map information is changed without refreshing the entire view. This can provide a very rich user experience.

## Basic Request

The syntax to perform an ajax request in plain JavaScript can be rather challenging. To save ourselves from that complexity, we will be using jQuery issue ajax requests. The simplest way to issue an ajax request is the following:

```js
$.ajax("/some-url.json");
```

This will issue a `GET` request to your server, asking for the file stored at `/some-url.json`. What if we needed to use a `POST` request instead? Or if we wanted to pass some additional data with the request? For these purposes, and others, `$.ajax()` accepts a JavaScript object of additional options as a second argument.

## Ajax Options

The easiest way to manipulate the ajax options is to pass a JSON object like the following:

```js
$.ajax("/some-script.php", {
    type: "POST",
    data: {
        name:     "John",
        location: "Boston"
    }
});
```

In this example, we are instructing jQuery to send a `POST` request rather than `GET` and to pass some additional information to the server with the request (`name: John, location: Boston`). The ajax options object has numerous parameters and values it can use. You can see more information about those options on [jQuery's documentation](http://api.jquery.com/jQuery.ajax/#jQuery-ajax-settings), however some of the most common are:

- `type` &mdash; The type of HTTP request to send to the server. Can be `"GET"`, `"POST"`, `"PUT"`, or `"DELETE"`. The default is `"GET"`.
- `data` &mdash; Data to be included with the request. Typically this will be a JSON object. If the request type is `GET` the data will be encoded into the URL being requested. Otherwise, it is included with the request behind the scenes.
- `dataType` &mdash; The type of data we expect the server to send back from our request. Common options are `"json"`, `"xml"`, `"html"`, or `"text"`. By default, jQuery will try to guess this value based on the response content.
- `url` &mdash; Rather than passing the request URL as a string to `$.ajax()` you can just pass a JSON object on its own and include the `url` option to specify where to send the request. We will see an example of this further on.
- `username` & `password` &mdash; If a server requires a username and password (e.g. this Codeup curriculum app) you  can specify it using these parameters.

## Get & Post Shorthand

jQuery includes a couple of shortcuts for relatively simple requests. Often, we simply want to send either a `GET` or `POST` request with some simple parameters. If, for example, you wanted to send a `GET` request to `/users` with the parameters `limit: 10` and `offset: 20` you can use the [`$.get()` function](http://api.jquery.com/jQuery.get/) like the following:

```js
$.get("/users", {
    limit:  10,
    offset: 20
});
```

The first argument is the URL we are requesting, like before. The second argument is whatever data we want to send. The above example would be the same as:

```js
$.ajax({
    url: "/users",
    type: "GET",
    data: {
        limit:  10,
        offset: 20
    }
});
```

Both examples are identical, it is just a matter of which syntax you find most comfortable. The same is true of [`$.post()`](http://api.jquery.com/jQuery.post/). If we wanted to send a `POST` request to `/address/save` with `first_name: George`, `last_name: Weathers`, `city: Denver`, `state: CO` we could do:

```js
$.post("/address/save", {
    first_name: "George",
    last_name:  "Weathers",
    city:       "Denver",
    state:      "CO"
});
```

## Asynchronous Callbacks

Now that we can send requests to the server, how do handle the data that comes back? It is important to be aware that ajax requests are done *asynchronously*. That means that even though the request is fired off when we call `$.ajax()`, JavaScript does not sit and wait for the response to come back. The server could reply in a fraction of a second, or it could half a minute!

It is tempting to think we could write something along the lines of:

```js
// Send ajax request
$.ajax("/some-url.php");

// Handle data from ajax request
doSomething(ajaxData);
```

But just because an ajax request has been sent is no guarantee that it has come back from the server by the time the next line of JavaScript is executed. In our example above, odds are `doSomething()` will be called before JavaScript has even finished sending the request to the server! Instead, we must explicitly specify a function to be called once the request has finished. A function like this, that we create to be called when some process completes, is called a *callback*. The primary way to attach a callback to your ajax request is to tack `.done()` to the end of your request and pass your callback to it, like the following:

```js
$.ajax("/some-url.php").done(function(data) {
    alert("AJAX call completed successfully!");
    console.log("Data returned from server:");
    console.log(data);
});
```

By passing an anonymous function to `.done()` we instruct jQuery to call that function once the ajax request has come back successfully. Whatever data or information the server sent is passed as the first argument to our callback. jQuery tries to guess at the data type sent by the server; if jQuery thinks the server returned a JSON object, the argument will be an object. If jQuery thinks it was text, the argument will be a string. You can force a particular data type with the `dataType` option.

There are three different callbacks you can specify for an ajax request. They are:

- `.done()` &mdash; Called when the request completes *successfully*.
- `.fail()` &mdash; Called when a request completed with an *error* (e.g. the server sent back a 404).
- `.always()` &mdash; Called for both failed and successful requests.

An example combining all three callback types might look like:

```js
$.ajax("example.php").done(function() {
    alert("Everything went great!");
}).fail(function() {
    alert("There was an error!");
}).always(function() {
    alert("And we're finished!");
});
```

Notice that only two of those callbacks will ever be called; `.done()` and `.fail()` are mutually exclusive, so there should never be a case where **both** are called; `.always()` is always called.

If for whatever reason you need to break your callbacks apart, or if the syntax is feeling too dense, you can assign your ajax request to a variable and then attach callbacks to that variable. Our above example could be rewritten as:

```js
// Assign to variable
var jqxhr = $.ajax("example.php");

// Attach callback functions individually
jqxhr.done(function() {
    alert("Everything went great!");
});

jqxhr.fail(function() {
    alert("There was an error!");
});

jqxhr.always(function() {
    alert("And we're done!");
});
```

## Exercises

### Ajax Store

1. Download and save [ajax-store.html](../../examples/javascript/ajax-store.html) to your `codeup.dev` public directory.
1. Create a `data` directory under public and download [inventory.json](../../examples/javascript/inventory.json) to that folder.
1. Your online tool store should load data from the JSON file using a get request and append the data to the table. You will need to use either `$.ajax()` or `$.get()`, and a `.done()` callback.
1. Add some new entries to inventory.json and see how the data on the page gets updated.
1. Add a "Refresh" button that will load inventory.json for you without having to refresh the entire page.
1. Add Twitter Bootstrap to your online store with some custom CSS to make the style your own.

### Ajax Blog

1. Create a new html file under `codeup.dev/public` called "ajax_blog.html".
1. At minimum, your ajax blog will need an empty `<div>` with `id="posts"`.
1. Add your own Bootstrap theme to this file as well. Feel free to use the same one as your store or choose a different one.
1. Download [blog.json](../../examples/javascript/blog.json) to your `data` directory from before.
1. Use ajax to load the contents of blog.json and add the data from it to your `#posts` div.
1. Add additional entries to blog.json and make sure your changes are reflected on the page.
