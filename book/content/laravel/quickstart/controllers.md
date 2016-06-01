# Controllers

Now that we have learned about basic routing and views, it is time to learn about another piece of MVC… controllers. Although we can put all of our business logic in our routes, as the project gets bigger things will quickly become messy and unmanageable. Controllers will help us segregate our code so it is cleaner and easier to maintain.

## Your First Controller

Laravel is nice enough to provide a sample controller for you. It is named `HomeController.php` and you can find it in the `app/controllers` directory. It looks like this:

~~~php
<?php

class HomeController extends BaseController
{
    public function showWelcome()
    {
        return View::make('hello');
    }

}
~~~

First, notice that `HomeController` is a class. Also notice that it extends/inherits from `BaseController`. All of your controllers will be set up in a similar fashion. As you may recall, by inheriting from `BaseController`, `HomeController` can take advantage of any of the functionality that `BaseController` provides. This means that is you want to have functionality shared across controllers you would put that functionality in the `BaseController`.

Next, notice that there is a `public` function named `showWelcome()`. Right now, this isn't being used for anything but we are about to change that.

Open the `routes.php` file so we can edit the route that responds to the web root `'/'` path. Currently, the route looks like this:

~~~php
Route::get('/', function()
{
    return View::make('hello');
});
~~~

Now, instead of using a closure to provide the route functionality, we need to tie the route to the `HomeController` action named `showWelcome`. We do this as follows:

~~~php
Route::get('/', 'HomeController@showWelcome');
~~~

Not bad, right? Just use the 'ControllerClassName@methodName' syntax and pass that as a string as the second argument when you define a route.

If you update your route to the code shown above and browse to http://blog.dev you should still receive the "You have arrived" page as you did before. See how this can help us organize our code? Our routes file will be much easier to read too.

### Controller Guidelines

Before we move on, here are some general guidelines for creating Controllers.

- Controllers should be placed in the `app/controllers` directory.
- Controllers must be classes that are named _____Controller, where the blank is a descriptive word of what is being controlled.
- Generally, all controllers should extend from `BaseController`.
- The name of the file should be the same as the class name and end with `.php`.
- Any methods that you declare inside the controller for routing must be `public` or they will not be accessible.

## Passing Parameters to Controller Methods

Remember how we were able to pass parameters to route functions? Here is what we have learned so far about passing parameters:

~~~php
Route::get('/sayhello/{name}', function($name)
{
    $data = array('name' => $name);
    return View::make('my-first-view')->with($data);
});
~~~

First, we will take the functionality in the closure and move it to the `HomeController` by creating a new method that looks like this:

~~~php
public function sayHello($name)
{
    $data = array('name' => $name);
    return View::make('my-first-view')->with($data);
}
~~~

Notice how the method takes a parameter called `$name` just like the closure did? Next, we just have to update our route to use our new controller method like this:

~~~php
Route::get('/sayhello/{name}', 'HomeController@sayHello');
~~~

That is all there is to it. Notice that the string pointing to the controller method does not change based on whether or not a parameter is passed. You just need the curly braces in the route path and the parameter in the handler method.

## Redirecting to a Controller Action

When we first talked about routes, we learned that you can redirect to a different route by returning `Redirect::to('path/goes/here')`. If you think about this, this could get hard to manage when using controller methods. Essentially, if you wanted to know what was going on in a redirect, you would have to find the path in the routes file and then track down the controller and method that was being called. We can avoid some extra steps by redirecting to a controller action instead of a route path. Here is how it works:

~~~php
<?php

class HomeController extends BaseController
{
    public function showWelcome()
    {
        return Redirect::action('HomeController@sayHello', array('Bob'));
    }

    public function sayHello($name)
    {
        $data = array('name' => $name);
        return View::make('my-first-view')->with($data);
    }

}
~~~

In the above code, the `showWelcome` method has been updated to redirect to the `sayHello` method to say hello to 'Bob'. Notice that parameters are passed to the controller method by passing an array as the second argument to the `Redirect::action()` method. If there were no parameters to pass, the second argument would be excluded.

Now, if you try visiting http://blog.dev you should be redirected to http://blog.dev/sayhello/Bob. Notice how we were able to redirect without ever knowing the path that the controller method `sayHello` is tied to? This makes coding your app so much easier.

It should be noted that there are other ways to avoid having to lookup route paths. One other option is giving routes names and then using the names for redirecting. However, using controller action names as we have in the example above will prove to be the best solution for a consistent and easy to maintain application.

## Linking to a Controller Action from the View

Just as we can redirect to a controller action instead of a route path, we can also link to a controller action from a view instead of hard coding a route path. As long as your controller and method name stays the same your view will not need updating, even if you change the route path. To get the url for a particular controller action, do the following:

~~~php
action('HomeController@showWelcome');

// or

action('HomeController@sayHello', array('Bob'));
~~~

Above, you see an example of both an action with and without parameters. The `action()` method is a helper method that will convert a controller action to a URL. This can then be used in a link like this:

~~~html
<a href="{{{ action('HomeController@showWelcome') }}}">Home</a>
~~~

## Additional Information

For additional information on controllers, see the links below:

- https://laravel.com/docs/4.2/controllers
- http://daylerees.com/codebright/controllers

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Change your `portfolio` and `resume` routes to be controller actions within the `HomeController`.
1. Update any links in your views to use the `action()` method to reference the new controller methods you created.
