# Late Static Binding

Just like the `$this` keyword allows us to access properties inside of an object instance, the `self` keyword allows us to access static properties and methods. This is quite convenient, however, now that we have learned about object inheritance things may not quite work as we expect.

~~~php
class Father
{
    protected static $name = 'Darth Vader';

    public static function getName() 
    {
        return self::$name;
    }
}
~~~

This works just as we'd expect, executing `echo Father::getName()` returns:

    Darth Vader

Extending this class, we can create a Son class that inherits the `getName()` method, but overrides the static property `$name`.

~~~php
class Son extends Father
{
    protected static $name = 'Luke Skywalker';
}
~~~

Now when we execute `echo Son::getName()` we get back:

    Darth Vader

Nooooooooooooooo!

Why did PHP give us this, when we clearly overrode the `$name` property? The answer is in a feature called _late static binding_.

In simple terms, PHP uses the `self` keyword to literally look inside the class it is in. Unlike `$this`, it will not bind data from child classes, therefore it will not know that the `$name` property changed in this instance.

In the case that we want to allow classes to override our static properties or methods, then we will need to use the `static` keyword in place of `self`.

~~~php
class Father
{
    protected static $name = 'Darth Vader';

    public static function getName() 
    {
        return static::$name;
    }
}

class Son extends Father
{
    protected static $name = 'Luke Skywalker';
}
~~~

Now everything will work as we expected.

~~~php
echo Father::getName();
echo Son::getName();
~~~

Now returns the proper names.

    Darth Vader
    Luke Skywalker

## Exercises

1. Open your Model class from the previous lesson. Add a new protected static property named `$table`. This table property will be used to let our model know which database table we will be representing.

1. In the Model class, add a static method named `getTableName()` that returns the value of the static property `$table`.

1. Create a new file name `User.php`.

1. In this new file, create a `User` class that extends `Model`. This class will be very simple, and will only contain the overridden `$table` property, set to `users`.

1. Test your User class by calling `User::getTableName()`. Did it return the string `users`? In your parent Model class, did you use `self::` or `static::`? Does switching them change the result?
