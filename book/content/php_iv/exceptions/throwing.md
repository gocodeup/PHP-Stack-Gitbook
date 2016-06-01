# Throwing Exceptions

Exception is a class in PHP, so we can instantiate it.

To throw an exception, we can use `throw`.

~~~php
throw new Exception('Some complaint here');
~~~

Looking at our `Person` example class, both of the setters assume that the name is a string. This can cause issues, especially if another developer is being careless and accidentally passes an array.

~~~php
protected function setFirstName($firstName)
{
    $this->firstName = trim($firstName);
}
~~~

If the value passed to our setter is not a string, we can have the function *throw* an *Exception* instead.

~~~php
protected function setFirstName($firstName)
{
    // Check if value is a string
    if (!is_string($firstName)) {
        throw new Exception('$firstName must be a string!');
    }

    $this->firstName = trim($firstName);
}

protected function setLastName($lastName)
{
    // Check if value is a string
    if (!is_string($lastName)) {
        throw new Exception('$lastName must be a string!');
    }

    $this->lastName = trim($lastName);
}
~~~

Now instead of just being ignored, we will get an exception if we try to make our Person's name an array or number.

~~~php
$arthur = new Person('Arthur', 42);
~~~

We will now get this error:

    Fatal error: Uncaught exception 'Exception' with message '$lastName must be a string!' in ...

The error will go on with the filename, location of the error, etc.

Throwing exceptions is a very powerful way to control the flow of your programs. When someone uses your code in an unintended way or a manner that will break functionality, it is better to throw an exception (with a good error message) than to ignore the input.

## Exercises

Push each update to GitHub.

1. Update your `Input` class with three new methods:

    - `public static function getString($key)`
    - `public static function getNumber($key)`

1. Each of these methods should use the `get()` method internally to retrieve the value from `$_POST` or `$_GET`. If the values does not exist, or match the expected type, throw an exception.

    _**Note:** Values coming from forms are (almost) always strings, so you will have to do something more advanced that just `is_string()` or `is_int()`. For `getNumber($key)`, make sure the returned value is cast to the appropriate data type._

1. Update your `national_parks.php` page to use your updated `Input` class and the appropriate method for the different form fields.

### Bonus

1. Add an additional method: `getDate($key)`. In addition to verifying that a value is a valid date, it should return a new instance of the [`DateTime` class](http://php.net/manual/en/class.datetime.php). Make sure to update the rest of your code to correctly handle `DateTime` objects (especially when inserting).

1. What do you think `getNumber()` should do if a negative value is passed in a request? What about if a string is longer than the specified database field? Should our `getDate()` method allow dates in the future? We will be considering these questions in a subsequent lesson.
