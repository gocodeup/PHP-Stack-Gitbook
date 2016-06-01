# Authentication Class

We are going to create an `Auth` class and update our `login.php`, `authorized.php`, and `logout.php` to use it and our existing classes.

1. Create a file called `Auth.php` in your `~/vagrant-lamp/sites/codeup.dev` directory. In that file create a class called `Auth`. Your `Auth.php` file will need to `require_once` your `Log.php` file.
1. We will store the password as a static property of the `Auth` class. Storing the password as plain text however would be very dangerous. Instead, we will be *hashing* the password. Hashing is a process that takes a plain text value and converts it into a scrambled, predictable value, but which cannot be converted back to the original string. Add the following to your `Auth` class:
    ```php
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    ```
    This value is the string `'password'` but hashed!
1. Your auth class needs four static methods: `Auth::attempt($username, $password)`, `Auth::check()`, `Auth::user()`, and `Auth::logout()`.
    1. `Auth::attempt()` will take in a `$username` and `$password`. If the `$username` is `guest` and the `$password` matches the hashed password above then set the `LOGGED_IN_USER` session variable as before. Use the `Log` class to log an info message: `"User $username logged in."`. If either the username or password are incorrect then log an error: `"User $username failed to log in!"`. You will need to use the PHP method [`password_verify()`](http://php.net/manual/en/function.password-verify.php) to check the password hash.
    1. `Auth::check()` will return a boolean whether or not a user is logged in.
    1. `Auth::user()` will return the username of the currently logged in user.
    1. `Auth::logout()` will end the session, just like we did in the [sessions exercise](../php-with-html/sessions-with-php.html).
1. Update `login.php`, `authorized.php`, and `logout.php` to `require_once` the `Auth.php` and `Input.php` files.
1. Use `Input::get()` to retrieve the values submitted to your form and pass them on to your `Auth` methods. Test to make sure you can log in and log out as before, and that appropriate information is being logged.
1. As always, commit your changes to git and push to GitHub.
