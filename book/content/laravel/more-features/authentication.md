# Authentication

Right now, you have basic authentication implemented in your blog application for simplicity. Regular authentication through Laravel requires a bit more work, but it makes for a much more robust application.

## Logging a User In

First, you will need to create a basic login format that allows for a user to enter their username and password. When the form is submitted, you can attempt to authenticate the user as follows:

~~~php
if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    return Redirect::intended('/');
} else {
    // login failed, go back to the login screen
}
~~~

For our application, we are using `email` in place of a username. You can see that the `Auth::attempt()` method takes an array of key-value pairs. The `password` is a required key-value pair. The other provided key-value should represent whatever you are using to log someone in. Since we are using `email`, we specified `email` as the key.

Notice the `Redirect::intended()` being called when the authentication attempt was successful. This is a special redirect just for authentication. It will redirect the user to wherever they were trying to go before they were brought to the login screen. If they were just accessing the login screen itself, they will be taken to the route path passed as a parameter (in this case `/`).

## Checking Auth Status

To check and see if a user is logged in, you can use the `Auth::check()` method as follows:

~~~php
if (Auth::check()) {
    // user is logged in
} else {
    // user not NOT logged in
}
~~~

## Retrieving the Logged in User

Laravel provides a nice feature that allows you to retrieve the logged in user. This makes it easy to do something like display the logged in user's username. You can retrieve the logged in user as follows:

~~~php
$loggedInUser = Auth::user();
~~~

## Logging a User Out

To log out a user simply call the `Auth::logout()` method.

## Modify Post Auth Filter

In your `PostsController`, you should have a `beforeFilter` that is protecting all of the controller actions except `index` and `show`. This filter should now be changed from `auth.basic` to `auth` to use regular authentication.

## Additional Information

Read more about authentication in [Laravel's docs](http://laravel.com/docs/4.2/security#authenticating-users)

## Exercise

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Using the information in this lesson along with the Laravel docs to implement regular authentication in your blog application.
1. Add a menu that appears when a user is logged in that allows the logged in user to create a new post.
1. Add a logout button that appears when a user is logged in that will log them out.
