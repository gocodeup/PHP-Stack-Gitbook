# Intro to Magic Methods

Magic methods are provided by PHP to allow more flexibility in our programs. These functions are referred to as _magical_ as the developer does not call these methods directly. Magic methods are called automatically for us under specific circumstances (e.g. your `__construct()` and `__destruct()` methods)

All magic methods in PHP start with `__`. This was a common way to indicate that a method was not intended to be called by other code. The available magic methods are:

> `__construct()`, `__destruct()`, `__call()`, `__callStatic()`, `__get()`, `__set()`, `__isset()`, `__unset()`, `__sleep()`, `__wakeup()`, `__toString()`, `__invoke()`, `__set_state()`, `__clone()`, and `__debugInfo()`

These methods can be added to our classes to define specific behavior. We have already looked at `__construct()` and `__destruct()`. We know that `__construct()` is executed when our class creates a new object, and `__destruct()` is called when our object has no more references to it. What these methods actually do however, is up to us. That is what makes them _magic_.

## Using \__get() and \__set()

While we will not be covering all of the magic methods, we will be looking at the two most commonly used of the magical options: `__get()` and `__set()`.

### \__set()

The PHP documentation states that "`__set()` is run when writing data to inaccessible properties." This means we can use this method to _magically_ set the values of properties that are not otherwise accessible through our objects.

The syntax for the `__set()` method are simple.

```php
public void __set(string $name , mixed $value)
```

The method accepts two arguments: a _string_ `$name` and a _mixed_ `$value`. This easily maps to a key/value structure, exactly like an associative array.

Using a simple class, we can immediately see how `__set()` works with an object.

~~~php
class Datastore
{
    // Array to store our key/value data
    private $data = [];

    // Magic setter to populate $data array
    public function __set($name, $value)
    {
        // Set the $name key to hold $value in $data
        $this->data[$name] = $value;
    }
}
~~~

We can now add key/value pairs to our `Datastore` without having to declare each property.

~~~php
$ds = new Datastore();
$ds->name = 'Arthur Dent'
$ds->group = 'Codeup';
$ds->age = 42
~~~

We can set these properties dynamically, however we have no way to access them as the `$data` property is private. We can remedy this using a magic *getter*.

### \__get()

The syntax for `__get()` is much like `__set()`:

```php
public mixed __get(string $name)
```

This method accepts a string and we can easily have it return a value from our `$data` array.

~~~php
// Magic getter to retrieve values from $data
public function __get($name)
{
    return $this->data[$name]
}
~~~

Like our other getters and setters, we can execute custom code if we desire. We should check to make sure the array key exists prior to attempting to return a value. We can use the `array_key_exists` function for this.

~~~php
public function __get($name)
{
    if (array_key_exists($name, $this->data)) {
        return $this->data[$name];
    }

    return null;
}
~~~

Now we will get `null` if the key does not exist, and the value if it does.

Here is our class in its entirety.

~~~php
class Datastore
{
    // Array to store our key/value data
    private $data = [];

    // Magic setter to populate $data array
    public function __set($name, $value)
    {
        // Set the $name key to hold $value in $data
        $this->data[$name] = $value;
    }

    // Magic getter to retrieve values from $data
    public function __get($name)
    {
        // Check for existence of array key $name
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }
}
~~~

## Exercises

We are going to begin to build out a Model class that we will eventually use to connect to a database and store data. Models are the "M" in MVC, a popular design pattern for structuring data-driven web applications.

The main thing to know about models for the time being is that they are objects that "model" data. That is, they create a programmatic representation of data structures, like database tables, allowing us to interact with them in the same way as standard PHP objects.

In these exercises, we will be laying the foundation for what will eventually become a functioning model object.

1. Create new file named `Model.php`.

1. In this new file, create a `Model` class with
 - An `attributes` property (array) that is not visible outside of the class
 - A magic setter to create key/value pairs in the attributes array.
 - A magic getter to retrieve values from the attributes array based on the key name, provided the key exists.

1. Test your new Model class by adding key/value pairs and retrieving them.
