# Views

So far, we have set up a couple different routes that just return strings. If you access one of these routes and "View Source" in your browser, you will see that we are not providing any HTML and only the string we returned is getting rendered. This is not that great since we really want to be rendering HTML pages. This is where views come in.

As we discussed earlier, the views for our Laravel application can be found in the `app/views` directory. If you take a look in there right now, you will find a `hello.php` file. This is the view that was being accessed when the route mapped to the `'/'` path returns `View::make('hello')`.

Open the `hello.php` file in the `app/views` directory and you will see that it is just a static HTML page that Laravel uses to show that you have things up and running.

## Your First View

It is time to create your first view. Start by creating a new file in the `app/views` directory named `my-first-view.php`. Inside that file, paste the following contents:

~~~html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
    <h1>Hello, Codeup!</h1>
</body>
</html>
~~~

Now, go to your `routes.php` file and add the following:

~~~php
Route::get('/sayhello/{name}', function($name)
{
    return View::make('my-first-view');
});
~~~

Now, when we access http://blog.dev/sayhello our `my-first-view.php` file will be rendered. Notice how the `.php` portion of the name is not passed to the `View::make()` method. If we moved `my-first-view.php` into a directory named `temp` (inside `app/views`), the view would then be accessed by calling `View::make('temp.my-first-view')`. See how the `.` is used to access views in sub directories of the `app/views` directory?

## Passing Data to Views

When we learned about routing, we learned that you can pass variables as part of the route path. Now we will learn how to pass data into the view.

First, let us put back our `sayhello/{name}` route:

~~~php
Route::get('/sayhello/{name}', function($name)
{
    if ($name == "Chris") {
        return Redirect::to('/');
    } else {
        return View::make('my-first-view');
    }
});
~~~

The only difference with the code we had in the last lesson and the code above is that now the `else` is returning the view we created in this lesson. Now, we want to pass the `$name` variable into the view so that we can display it. First, let us go update our view to prepare for for displaying the 'name'.

~~~html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
    <h1>Hello, <?php echo $name; ?>!</h1>
</body>
</html>
~~~

As you can see, we have modified the `my-first-view.php` file so that it will echo the `$name` that is passed in. If we try to access http://blog.dev/sayhello/Bob right now, we will get an error that says: "Undefined variable: name".

There are a few different ways to pass data into views in Laravel. The following code shows the most consistent and reliable method:

~~~php
Route::get('/sayhello/{name}', function($name)
{
    if ($name == "Chris") {
        return Redirect::to('/');
    } else {
        $data = array('name' => $name);
        return View::make('my-first-view')->with($data);
    }
});
~~~

In the above code, you can see that an associative array named `$data` has been created. You can also see that `$data` is being passed to the view using `->with($data)`. Again notice the expressiveness of the syntax. You are telling Laravel to make the view `my-first-view` using the key value pairs found in the `$data` array.

The name of the array passed to the view is not relevant, but the key names are. It is the keys of the array passed to the view that will be used to access the data therein. Since the key is `name`, the $name variable from the route can be accessed in the view as `$name`. Since we already have this set up, accessing http://blog.dev/sayhello/Bob will now produce the expected result.

## Additional Information

For additional information on views and responses, see the links below:

- https://laravel.com/docs/4.2/responses
- http://daylerees.com/codebright/responses

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create a route that responds to a GET request on the path `/rolldice`.
1. Within the route, return a random number between 1 and 6.
1. Add a view named `roll-dice.php`. Instead of just returning the random number, show the view and have it display the random number.
1. Modify the route to take in a parameter named `guess`. Someone will access the route by visiting http://blog.dev/rolldice/1, where 1 is their guess.
1. Modify the route and view so that you can display the guess in addition to the roll and also tell if the guess matches the roll.
