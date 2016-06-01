# Constructors and Destructors

As you learn more and more about programming you should be noticing some larger trends and patterns emerging. For example, almost all control structures are declared with a keyword, a set of parenthesis, and then curly braces. When you see a some other kind of name followed by opening and closing parenthesis and a semicolon&mdash;like `new Person();`&mdash;what does that make you think of? Does it look kind of like a function call? We have created a *class* called `Person`, but did we create a function to go along with it? It turns out actually, there is a function that is called when creating a new object. That function is called a [constructor](http://php.net/manual/en/language.oop5.decon.php#language.oop5.decon).

## Constructors

If we wanted to add some behavior when our class is initiated, we need to define a constructor for it. Let's go back to our `Person` class from the previous lesson and add a constructor.

```php
class Person
{
    public $firstName;
    public $lastName;

    public function __construct()
    {
        echo 'New Person was constructed!';
    }
}
```

Notice the naming of our function, `__construct()`, this is **mandatory**. All constructors in PHP **must** be named `__construct()`; it is how PHP knows what method to call when instantiating the object. Now, when we call `new Person()` we would expect to see "New Person was constructed!" echo'd out to the screen.

Why might we use a class constructor? A constructor's primary purpose is to setup mandatory and/or default values and properties for our objects. For example, in our `Person` class it would be reasonable to say that all instances of `Person` should have a `$firstName` and `$lastName`. We can ensure that by adding those values as parameters to our constructor and assigning them to properties like so:

```php
class Person
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }
}
```

We can create an instance of our updated class like so:

```php
$john = new Person('Johnny', 'Appleseed');

echo "I am {$john->firstName} {$john->lastName}!\n";
// Output: I am Johnny Appleseed!
```

We pass parameters to the constructor just like other functions. Our constructor takes the two values in and assigns them to their appropriate class properties. Now, we can be confident that `$john` has its `$firstName` and `$lastName` properties assigned.

## Destructors

Just as we have a method that is called when a class is created, we also have one that will be called when it is destroyed. This method is called a *destructor*. We define a class destructor in the same manner as a constructor:

```php
class Person
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    public function __destruct()
    {
        echo "{$this->firstName} {$this->lastName}'s time of death: " . time() . PHP_EOL;
    }
}
```

A destructor is called whenever an object is passed to `unset()` or whenever the script finishes executing. Announcing an object's time of death is a silly, if somewhat morbid, example. In practice, destructors are typically used to "clean up" after an object. If you have an object that connects to a database or opens one or more files, a destructor might close those connections and file pointers. If an object creates temporary files on the computer, the destructor could clean them up.

You will write many more constructors for your objects in the future. Destructors are typically far less common, but as a concept they are important to know about and nicely parallel constructors.

## Magic Methods

Hopefully you have noticed something unique about the function names for constructors and destructors: they both start with `__`. This is the convention for [magic methods](http://www.php.net/manual/en/language.oop5.magic.php) in PHP. Magic methods are functions of objects that are called automatically on your behalf. You should **never** call a constructor directly (i.e. by `$obj->__construct()`). Instead, a constructor or destructor is called *magically* for you when you instantiate or destroy an object. There are over a dozen magic methods available in PHP, and we will be learning about some of the other key magic methods later in this course.

## Exercises

We are going to update our `Log` class to take advantage of `__construct()` and `__destruct()`. Remember to commit your changes after you complete each step and then to push your changes to GitHub when you complete the exercise.

1. Open your `Log.php` in Sublime. Add a new property to the class called `$handle`.
1. Add a constructor to your `Log` class. Your constructor should:
    - Take in a parameter called `$prefix`. If nothing is passed to the constructor, the `$prefix` should default to `'log'`.
    - Set the `$filename` property of the class to `$prefix-YYYY-MM-DD.log`.
    - Open the `$filename` for appending and assign the file pointer to the property `$handle`.
1. Add a destructor to close `$handle` when the class is destroyed.
1. Update `logMessage()`; it should no longer need to open and close its own file handle, instead use the `$handle` property.
1. Update `log_test.php`; pass the prefix `'cli'` to the class and do not manually set the `$filename` property. Test from the command line.
1. For future thought: `$handle` and `$filename` are both exposed to anybody using our class. What do you think would happen if somebody closed `$handle` before we were finished with it? Or assigned an array to `$filename`? How do you think we will be able to address this in the future?
