# Sessions

Laravel provides a wrapper around PHP session variables that lets you access them in a manner consistent with other parts of the Laravel framework. If you have need to add or manipulate session variables, you should certainly take advantage of this feature.

## Adding, Accessing, and Removing Session Vars

Manipulating session data is quite easy. See below for example on how to set, retrieve, or remote session variables.

~~~php
// set a value in the session
Session::put('key', 'value');

// retrieve a value from the session
$value = Session::get('key');

// check if a value exists in the session
if (Session::has('key')) {
    // do something here
}

// remove a value from the session
Session::forget('key');

// clear all session variables
Session::flush();
~~~

## Using Flash Data

Flash data is a special type of session data that is only available on the next request. This is great for things like showing messages to the user. Settings and using flash data is very similar to regular session data. Here is an example:

~~~php
// set flash data
Session::flash('key', 'value');

// retrieve flash data (same as any other session variable)
$value = Session::get('key');
~~~

To use this for user messaging, you could place some code in your `master.blade.php` file that looks like this:

~~~html
@if (Session::has('successMessage'))
    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
@endif
@if (Session::has('errorMessage'))
    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
@endif
~~~

Then, whenever you want to show a message, all you would have to do is flash either a `successMessage` or an `errorMessage` and then it will be automatically shown with the next request.

## Additional Information

Read more about sessions here: https://laravel.com/docs/4.2/session

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Add the ability to show success and error messages into your master layout.
1. Add code to the appropriate `PostsController` actions so that users will see messages to describe whether their post creations, updates, and deletes happened successfully (or not).
