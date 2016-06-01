# Handling Exceptions

Just because a program throws an exception, it does not mean a human being needs to interact with it. We can use our program to deal with exceptions, and try to handle them inside our application before we allow them to stop our program with a fatal error.

## Using try/catch

PHP allows us to `try` a block of code and `catch` exceptions that may occur while that code is being executed. This allows our code to continue running and does not burden the user with confusing error messages. Let's look at an example with our `Person` class:

~~~php
try {
    // Create a person
    $arthur = new Person('Arthur', 42);
} catch (Exception $e) {
    // Report any errors
    echo "An unknown error occurred!\n";
}

echo "I am still run no matter what.\n";
~~~

Our test will output:

    An unknown error occurred!
    I am still run no matter what.

### Displaying Messages

In clinical trials, the phrase "an unknown error" has been shown to cause hives in 4 out of 5 users, so it would be better to give some specific information about what happened. Remember when we threw our `Exception` we passed it a message explaining the error. Our exception is an object&mdash;just like any other in PHP&mdash;and when we handle it, the `Exception` instance is assigned to the variable specified in `catch`. The `Exception` class comes with several [builtin methods](http://php.net/manual/en/class.exception.php), including a getter called `getMessage()`. We can use this to make our `catch` block much more user friendly.

~~~php
try {
    // Create a person
    $arthur = new Person('Arthur', 42);
} catch (Exception $e) {
    // Report any errors
    echo 'An error occurred: ' . $e->getMessage() . PHP_EOL;
}

echo "I am still run no matter what.\n";
~~~

Our test now outputs:

    An error occurred: $lastName must be a string!
    I am still run no matter what.

Much better, now our user knows what went wrong!

## Exercises

Push each update to GitHub.

1. Update your `national_parks.php` page. Rather than halting execution when the user passes an incorrect value, use `try` and `catch` to grab the error message and cache it, so that the rest of the page can continue as normal. (_**Hint:** An array called `$errors` could be useful for this._)

1. Make sure any errors are displayed to the user in the `body` of your page.

1. If an error occurred, previous form values should be redisplayed. If the park was inserted correctly, the form should be empty.
