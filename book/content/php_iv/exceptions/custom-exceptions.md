# Custom Exceptions

It is very nice to pass a string to PHP's `Exception` class and have that included in the method, however it would be nice to have our `try/catch` blocks be more intelligent. Wouldn't it be nice if they could handle some exceptions differently than others?

If we use custom exceptions, this is completely possible.

## Using Custom Exceptions

The `Exception` object is a class, much like `PDO`, `DateTime`, or any of the other various classes you have used and defined in this course. Because of that, we can extend `Exception` just like those others. When we extend `Exception`, we can then create specific `catch` blocks for those exceptions. Consider the following code:

```php
class InvalidNameException extends Exception { }
class EmptyNameException extends InvalidNameException { }

class Person
{
    // ...

    protected function setFirstName($firstName)
    {
        if (!is_string($firstName)) {
            throw new InvalidNameException('$firstName must be a string!');
        }

        $firstName = trim($firstName);

        if (empty($firstName)) {
            throw new EmptyNameException('$firstName was an empty string!');
        }

        $this->firstName = $firstName;
    }
}

try {
    $test = new Person(' ', 42);
} catch (EmptyNameException $e) {
    echo "The name was empty!\n";
} catch (InvalidNameException $e) {
    echo "An invalid type was assigned to the name!\n";
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage() . PHP_EOL;
}

echo "I am still always run\n";
```

We created two new custom exception classes at the top of our file, and then in our `setFirstName()` method we threw them in two different scenarios.

Notice the order we attempted to catch the exceptions as well. We started with the most specific exception type, `EmptyNameException`. When an exception is thrown, PHP checks each `catch` block in order, looking for an exception type that matches what was thrown. Because `EmptyNameException` extended `InvalidNameExtension` it came first, and because `InvalidNameException` extended `Exception` it came second.

Ultimately, we do not always have to catch and handle every type of exception; there may be cases when you *do* want your code to stop dead in its tracks. But, where ever you can handle a given exception, you should.

## SPL Exceptions

PHP actually comes with several additional types of exceptions already created for us, they are part of what is called the *Standard PHP Library (SPL)*. Often times, it is easier and more efficient to use one of the [predefined exceptions](http://php.net/manual/en/spl.exceptions.php) rather than trying to create our own.

## Exercises

Push all updates to GitHub.

1. We are going to take advantage of SPL Exceptions in our `Input` class.

1. Update your `getString()` and `getNumber()` methods to each take two **optional** parameters: `$min` and `$max`. Update your methods in the following manner:
    - If `$key` is not a string, or `$min` & `$max` are not numbers, throw an `InvalidArgumentException`.
    - If the requested key is missing from the input, throw an `OutOfRangeException`
    - If the value is the wrong type, throw a `DomainException`
    - If a string is shorter than `$min` or longer than `$max`, throw a `LengthException`
    - If a number is less than `$min` or larger than `$max`, throw a `RangeException`

1. Update `national_parks.php` to take advantage of your `$min` and `$max` values to validate user input.

1. Catch the correct exception types and push appropriate error messages onto your `$errors` array.

### Bonus

1. Create a custom `DateRangeException`.

1. Add `$min` and `$max` to the `getDate()` method; they should both be instances of `DateTime`. If the inputed date is outside of the specified range, throw your `DateRangeException`.
