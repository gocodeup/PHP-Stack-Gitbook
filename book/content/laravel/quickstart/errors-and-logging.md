# Errors and Logging

Sometimes, your application will encounter error conditions and it is important that you know how to handle them. One thing you do not want is for the user to see the raw PHP exception. However, you do want to be able to see that an error occurred so that you can take action to fix the issue.

## Error Handlers

First, you should know that in the `app/start/global.php` file there is an error handler that will handle any exceptions that are not caught by your application. The error handler looks like this:

~~~php
App::error(function(Exception $exception, $code)
{
    Log::error($exception);
});
~~~

This can be customized to return a particular view when an unhandled exception occurs, just as if it were a route. You can also add additional error handlers that will listen for specific types of exceptions. By default, the exception is logged (we are about to discuss logging) and the default error page is show.

### Debug Setting

In the `app/config/app.php` file, you will find a setting for `debug` that defaults to `true`. This is what causes the detailed error info screen when an application error occurs. This should be set to `false` in a production environment. We will discuss environments and how to configure them later.

## Aborting an Action

When processing an action you sometimes encounter a circumstance where you would like to send the user an error page or perhaps a page-not-found. One such instance would be if they look up a post that does not exist. You can abort processing within a controller action or route by using `App::abort()` as follows:

~~~php
App::abort(404);
~~~

Just call `App::abort()` with the HTTP error code you would like to use. Here are some common ones:

- 403 - Access Denied
- 404 - Page Not Found
- 500 - Server Error

Notice that you do not need to use `return`. Just call `App::abort()`.

## Custom 404 - Page Not Found

Laravel allows you to define a custom handler for 404 errors. To define the 404 handler, just add the following code to `app/start/global.php`:

~~~php
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});
~~~

Any action you would like to take should be added to the callback function. In the above example, a custom view is rendered.

## How to Log

Logging is important for any web application. You are not sitting over the shoulder of your users so you need some way to get feedback on how your app is running. Logging is a big part of this feedback. You can log in Laravel as follows:

~~~php
Log::info('This is some useful information.');

Log::warning('Something could be going wrong.');

Log::error('Something is really going wrong.');
~~~

The above sample is straight from the Laravel docs. Notice how there are different log methods based on the type of log you want to write. When you log a message, make sure you use the appropriate method for the message you are logging.

The log messages will be saved to `app/storage/logs/laravel.log` by default.

## Additional Information

For additional information on errors and logging, see the link below:

- https://laravel.com/docs/4.2/errors

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Add a `Log::info()` to the `PostsController@store` action that logs all of the inputs that are passed before redirecting back to the post create form.
1. Add a custom view for 404 - Page Not Found errors. Have Laravel use your view by adding the `App::missing()` handler in the appropriate location. Test an invalid route to see your error page.
