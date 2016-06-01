# Classes and Objects I

We have discussed objects as a general concept already back in [JavaScript](../../javascript/objects/index.html). Remember that objects are a combination of variables, functions, and other data structures such as arrays or even other objects. All these items are bundled up together in a single variable: an object. If we wanted to create an object in JavaScript, we could do so with the following syntax:

```js
var person = new Object();

person.firstName = 'Johnny';
person.lastName  = 'Appleseed';
person.fruit     = ['Granny Smith', 'McIntosh', 'Red Delicious'];
```

We can actually do almost exactly the same thing in PHP:

```php
$person = new stdClass();

$person->firstName = 'Johnny';
$person->lastName  = 'Appleseed';
$person->fruit     = array('Pink Lady', 'Gala', 'Fuji');
```

Instead of creating a new `Object`, we have created a new *instance* of the `stdClass`. We will learn more about classes, instances, and their relations to objects in a moment. Look also at the way we access the properties of each object. In JavaScript we used a period (`.`), while in PHP we use an "arrow" (`->`). Beyond these nuances though, our objects in PHP behave exactly as they did in JavaScript. We can assign new values to their properties, we can echo their values, we can pass them to functions, etc.

## Classes

When we created an object in JavaScript, whether using `new Object()` or JSON syntax, we were defining both the *structure* of the object as well as its *value*. In both our examples above we declared that our variable `person` has a property called `firstName` **and** that property has the value `'Johnny'`. Really though, these are two separate concerns. When we work with objects in PHP, we need to start thinking more about the overall organization of our data and how it is composed. This is because PHP gives a way to separate these two concepts: a *class* allows us to define the organization of an object independent of its values. Let's look at how we might define a class for our persons up above.

```php
class Person
{
    public $firstName;
    public $lastName;
    public $fruit = array();
}
```

With the above code, we have declared a class called `Person` and that class has three properties in it: `$firstName`, `$lastName`, and `$fruit`. In a lot of ways, a class in PHP might look like a JSON object, especially given that it is wrapped in curly braces (`{}`). Some key differences though, are that classes have a unique name and are not assigned to a variable. In this way, they are actually a lot like a function: both are *declared* using a keyword (`function` or `class`), and both have *globally unique names*.

Notice also that our class defines a default value for the `$fruit` property. By assigning `$fruit` the value of an empty array (`array()`) we have ensured that this property will still have *some* value, even if we forget to assign it anything. This can be a good safety net, depending on how we want to use our classes.

Once we have declared a class, how do we put it into action within our code? Before we created an instance of `stdClass`. Now we can do the same, but instead we will use the class's name.

```php
$john = new Person();

$john->firstName = 'Johnny';
$john->lastName  = 'Appleseed';
$john->fruit     = array('Braeburn', 'Golden Delicious', 'Honeycrisp');
```

### Naming Convention

You should notice something different about the way we named our class (`Person`) versus most other items in our code: our class began with a capital letter. This will be the standard for classes throughout the course: all your class names should [begin with an uppercase letter and be camel cased](../../appendix/code-standards.html#classes-and-file-names) (`stdClass` being a terrible, glaring exception). Remember also that your class names need to be unique throughout your applications. This can be mitigated by using [namespaces](http://php.net/manual/en/language.namespaces.rationale.php), but they are outside the scope of this curriculum.

### Functions

As we said, objects do not just contain static values&mdash;they also have functions. Unlike JavaScript however, we cannot just assign functions to object properties, functions **must** be declared within a class. If we wanted to put a function in our `Person` class, we would update the class definition in the following manner:

```php
class Person
{
    public $firstName;
    public $lastName;
    public $fruit = array();

    public function roamCountryside()
    {
        $distance = mt_rand(1, 10);

        return "Walking {$distance} miles west.";
    }
}
```

To call this function we use the instance variable created before and call the function by name using the arrow (`->`), just like with properties:

```php
// Same $john variable from above

echo $john->roamCountryside() . PHP_EOL; // Output: Walking 7 miles west.
```

Our class functions (or *methods*) work just like functions in the rest of PHP. We can pass values to them, they can contain whatever logic and loops we would like, and they can return data back. Something that makes methods unique however, is the way they can access properties of the object that contains them.

### $this

In our class above, we have three properties and one function defined. Those four items are defined as part of our class; they can only be accessed from within an instance of the class. So, if we wanted to access those properties from within our methods, we would need some sort of variable to represent our object. That is precisely what `$this` does. The variable `$this` is a magic variable that exists inside of any method that represents the current instance of the object. For example, let's update our `roamCountryside()` method a bit:

```php
class Person
{
    public $firstName;
    public $lastName;
    public $fruit = array();

    public function roamCountryside()
    {
        $distance = mt_rand(1, 10);

        return $this->firstName . " walks {$distance} miles west.";
    }
}
```

Now when we call `$john->roamCountryside()` it will return the `$firstName` property inside of the `$john` object along with the rest of the string. If we had a second instance of `Person`, such as `$jill`, it would return *that* object's `$firstName`.

You should see how incredibly powerful this becomes. Before when we talked about functions in PHP, we ran into issues where a function could not see any variables outside of itself. If we wanted to access any piece of data inside of a function, it had to be passed to it. Methods on the other hand, can not only work with data passed to them but **any** property that is defined in the class. Now our functions have a lot more information available to them, with a lot less code.

Let's consider another example:

```php
class Person
{
    public $firstName;
    public $lastName;
    public $fruit = array();

    public function roamCountryside()
    {
        $distance = mt_rand(1, 10);

        return $this->firstName . " walks {$distance} miles west.";
    }

    public function addFruit($fruit)
    {
        $this->fruit[] = $fruit;
    }
}
```

Again, we can call this method:

```php
// Same $john variable from above

$john->addFruit('Arctic');
```

Our new method, `addFruit()`, takes in a string and appends it to the end of our `$fruit` array, but pay attention to the naming of our variables. Within the method, `$fruit` is the parameter being passed to the function, while `$this->fruit` is the property of the class. You will see many functions follow this same pattern in the future and it is very important not to let variables and method parameters get confused with class properties.

### The Public Keyword

You may have noticed that all our functions and properties are defined with `public` in front of them. This keyword defines the items's visibility. We will discuss visibility more in a later lesson, for now just remember to always put `public` before any property or method you define.

## Conclusion

Since we have seen previously that we can create empty objects (`stdClass`) and assign properties to them as we please, you may be asking yourself why you would want to define a class at all. It could feel as though we are repeating ourselves by creating a class and then assigning its properties. There are actually several very good reasons for this.

The first, is so that we can define methods for our objects. In PHP, the only way to create a function for an object is in the class that defines it, and having functions wrapped up with our object gives us a lot of power and flexibility when dealing with our data.

Secondly, they allow us to predict what properties and options our objects will have. In our `Person` class, we are declaring an expectation that every object of type `Person` will have a `$firstName`, a `$lastName`, and a `$fruit` property. This makes code dealing with our objects easier and more reliable; we can be confident that any instance of our class will have those properties defined and available to us.

Finally, a class actually helps us minimize code duplication. By using a class, we can define a property or method **once**, and it will be available to us in every single instance of that class. As we learn more and more object oriented programming techniques, we will learn more and more ways to minimize duplicate and redundant code.

## Exercises

For our exercise, we will be taking the logger functions from the [previous exercise](../../php_ii/using-files/writing-to-files.html#exercises) and converting them to a class. As you complete each step, commit your changes with git. At the end of the exercise, be sure to push your changes to GitHub.

1. Create a file in your `exercises` directory called `Log.php`. The naming here is important; this file will contain a class called `Log` that will be the wrapper for your logger functions. Filenames for classes should match their class name.
1. In your `Log` class you will need:
    - A property called `$filename` where you store the name of the file for the log.
    - A method called `logMessage()` that will take in a log level and message as before. It will open the file stored in `$filename` for appending, output the message in the same format as before, and then close the handle.
    - Methods `info()` and `error()` that will take in a message and forward it on to `logMessage()` along with the relevant log level.
1. Create a `log_test.php` file in your `exercises` directory. At the top of `log_test.php`, be sure to `require_once 'Log.php';`. In your code, you will need to:
    - Create an instance of the `Log` class
    - Set the `$filename` property in the class; use the format `log-YYYY-MM-DD.log`.
    - Call the methods `logMessage()`, `info()`, and `error()` with to test the functionality of each.
1. Use `log_test.php` to test your class by calling it from the command line.
1. For future thought: Our test script had to manually generate and assign the filename property. Furthermore, `logMessage()` must repeatedly open and close the file handle each time it is called. If there was some what to initialize values when creating an object, how could we take advantage of that to solve these problems?
