# Request Data and Inputs

Now that we have set up our resource controller for posts, it is time to learn about how to handle form inputs. In PHP, you can access inputs using the `$_GET`, `$_POST`, and the `$_REQUEST` global arrays. Laravel provides some wrappers around those to make things a bit cleaner.

## Retrieving GET and POST Inputs

Laravel combines both the GET and POST inputs and makes them available through the `Input` facade. If you would like to get all the inputs and store them to a variable named `$inputs` you would do the following:

~~~php
$inputs = Input::all();
~~~

### Get Specific Input

You can also retrieve a specific input as follows:

~~~php
$name = Input::get('name');
~~~

If the input you try to retrieve does not exist, null will be returned. You do not have to worry about getting any errors regarding undefined array indexes as you would if you were accessing the PHP input arrays directly.

### Check if Input Exists

It is also easy to check to see if a particular input has a value.

~~~php
if (Input::has('name')) {
    // name is not empty
} else {
    // name is empty
}
~~~

### Providing a Default Value

Sometimes it is desirable to provide a default value if an input is not passed. That can be achieved as follows:

~~~php
$name = Input::get('name', 'Bob');

// would be equivalent to:

$name = 'Bob';
if (isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
}

// or:

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : 'Bob';
~~~

In the example above, the variable `$name` will get a default value of `Bob` if an input called `name` is not provided.

## Showing Old Input

When a form is submitted and validation fails, often times you want to show the form with the old input values so that the user can make the necessary changes and re-submit the form. In Laravel you can access old form inputs as follows:

~~~html
<input type="text" name="name" value="{{{ Input::old('name') }}}">
~~~

In the example code above, an input called `name` is shown as extracted from the view. As you can see, the value is being set to `Input::old('name')`. This means that the form input will have the value of whatever old input that the form was submitted with when it gets re-displayed.

### Redirecting Back with Old Input

When a form is submitted to create a new post, that action should be handled by the `PostsController@store` method. If things go awry, the user should then be returned to the `PostController@create` method so they can edit their inputs and re-submit the form. You can do that as follows:

~~~php
return Redirect::back()->withInput();

// or:

return Redirect::action('PostsController@create')->withInput();
~~~

Notice that we can redirect back, or to the action we want to return to. `Redirect::back()` will use the route history to figure out where the form submission came from. Either way, you will need to add `->withInput()` to the redirection so that old form input will be accessible as we showed above.

## Additional Information

For additional information on inputs, see the links below:

- https://laravel.com/docs/4.2/requests
- http://daylerees.com/codebright/request-data

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create a new directory in `app/views` named 'posts'.
1. Add a new view to the `posts` directory named `create.blade.php`.
1. Edit the post create view and make it extend from the master layout. Add a form to the post create view that will allow creation of a post. The form action should be {%raw%}`{{{ action('PostsController@store') }}}`.{%endraw%} The form should have inputs for a title and body.
1. Make sure the post create form can display old input.
1. Make the `PostsController@store` method returns `Redirect::back()->withInput()`. Test to see if when you submit the form that you get re-directed back with old input displayed.
