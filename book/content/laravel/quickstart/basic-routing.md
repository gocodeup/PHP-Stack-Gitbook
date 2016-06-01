# Basic Routing

There are several ways to route and handle requests in Laravel. We will start out by discussing the most basic form of routing.

Remember when we working with anonymous functions/closures in JavaScript? Laravel uses closures in basic routing as a way to provide functionality to a particular route. Start by opening the `apps/routes.php` file for your blog project and you will see this:

~~~php
Route::get('/', function()
{
    return View::make('hello');
});
~~~

Here you get your first look at the expressive syntax that Laravel uses. Without knowing much about how Laravel works, you could probably guess what is going on here.

First, notice `Route::`. All route definitions will start with this. Next, you see the `get()` method being called. As we know, GET is an HTTP verb that is used to retrieve a web page. This tells us that whatever route is being defined here will respond only to an HTTP GET. We can replace the `get` method call with `post`, `put`, or `delete` to respond to other HTTP verbs.

Next, notice the parameters that are passed to the `get()` method. First there is `'/'`. This is the path that the route will match, which in this case is the web root.

Next is an anonymous function/closure that provides functionality for the route. You can see that this function returns `View::make('hello')`. Although we will not get into the details yet, you can probably guess that a view named 'hello' is being built and returned.

## Your First Route

Back when we were working in PHP without a framework, if you wanted to create a new page you would need to create a new file even if you only wanted to do something small like say "Hello World". Laravel makes it much easier for us since we can just define a new route on whatever path we want.

Say we want to access http://blog.dev/sayhello and we simply want to show a page that says: "Hello, Codeup!". Well, just add the following to your `routes.php` file and try it out.

~~~php
Route::get('/sayhello', function()
{
    return "Hello, Codeup!";
});
~~~

Now when we access http://blog.dev/sayhello, we will see "Hello, Codeup!". Simple, right?

If we look at this route, we can see that it is very similar to the first one we looked at above. The main difference is that this one has a different path and also returns a string without making a view.

It should be noted that your routes should always return something, because if they do not return something then nothing will be shown by the web browser.

## Route Parameters

Not that we have gone through the basic "Hello World" example, let us take it a step further and say hello to someone by name. For this, we will need to learn how to pass parameters to a route.

We will start by examining the example below:

~~~php
Route::get('/sayhello/{name}', function($name)
{
    return "Hello, $name!";
});
~~~

Here, you can see we have modified the route path. It is now `'/sayhello/{name}'`. See how "name" is surrounded by curly braces? This tells Laravel that it is a dynamic route parameter and is not to be taken literally. Also, notice that the anonymous function now takes in a parameter called `$name`.

This means that if we access http://blog.dev/sayhello/Bob, we will get "Hello, Bob!";

## Redirecting to Another Route

Besides just returning a View or string from a route, Laravel also provides the ability to redirect to another route. Here is an example:

~~~php
Route::get('/sayhello/{name}', function($name)
{
    if ($name == "Chris") {
        return Redirect::to('/');
    } else {
        return "Hello, $name!";
    }
});
~~~

In this example, the `sayhello` route will work for everyone except "Chris". Chris will instead be redirected to the route matching the path `'/'`. We can look back to the first example to see that path is mapped to a function that returns `View::make('hello')`. This will render the default "You have arrived" installation success page.

## Additional Information

For additional information on routing, see the links below:

- https://laravel.com/docs/4.2/routing
- http://daylerees.com/codebright/basic-routing

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create a route for your resume page at the path '/resume' that returns 'This is my resume'.
1. Create a route for your portfolio page at the path '/portfolio' that returns 'This is my portfolio'.
