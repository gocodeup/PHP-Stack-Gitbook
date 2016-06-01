# Static Methods and Properties

All the methods and properties we have made so far required us to create an instance of the class before we could use them. Sometimes though we need a property or method that does not fit in with an instance of a class. For example, what if we needed a variable to track the population of people in the world. A variable like that would fit naturally in our `Person` class. But does it make sense as a property of each *instance?* In other words, would something like the following make sense?

```php
$john = new Person();
$john->worldPopulation = 7241000000;
```

Storing this value as a property of each individual `Person` object seems somewhat silly, and would mean we would need a new instance of our class to access a value that is more connected to the class itself. This is where static properties come in.

## Static Properties

A static property is a variable that belongs to the class itself, and not to any particular instance of the class. We declare a property as static by adding the keyword `static` between the property's visibility and its name, like the following:

```php
class Person
{
    public $firstName;
    public $lastName;

    public static $population = 7241000000;
}
```

If a property is declared as static, we should no longer read or write it using an instance of the class. Instead, we must refer to the class itself and the property within:

```php
echo "The world's population is: " . Person::$population . PHP_EOL;
```

There are a few key difference between how we have accessed properties in the past and how we are working with static properties. As said, we must call the property from the class itself (`Person`) and not from an instance of the class. Further, rather than using the arrow (`->`) to access the property, we use a double colon (`::`), formally called the "scope resolution operator". Finally, unlike instance properties, we must include the `$` in the property name itself, after the double colon.

Even though they are defined side by side, you **must** keep static and non-static properties distinct in your mind and in your code. Although they have similar appearance and definition, their syntaxes are distinct and they each have their own uses. The following are examples that will either give errors or behave in unexpected ways:

```php
$john = new Person();

// Do NOT do any of these
echo $john->population;
echo $john::$population;
echo Person::$firstName;
echo Person->firstName;
```

Finally, there is one significant advantage to static properties. Remember that classes are defined globally, meaning you can access a class by its name anywhere within your code, even from within a function. Because of this, static properties can *also* be accessed anywhere, in essence creating variables that can be accessed from any scope. Although this can be a valuable asset, it can also be easily abused. Use your static properties wisely, and not *just* skirt issues of scope.

## Static Methods

Just as we can make a property static by adding the `static` keyword to it, so too can we make methods static. For example:

```php
class Person
{
    public $firstName;
    public $lastName;

    public static $population = 7200000000;

    public static function getScientificName()
    {
        return 'Homo sapien';
    }
}
```

Calling a static method also uses the class name along with the scope resolution operator:

```php
echo Person::getScientificName() . PHP_EOL;
```

### The self Keyword

When we wrote class methods before, we were able to interact with other methods and properties of the class by using the magic variable `$this`. Remember, `$this` refers to whichever instance of the class the method was called from. When we are working with a static method however, there is not any instance, therefore we are unable to use `$this`. Instead, if we have a static method that must interact with other static properties or methods we use `self`.

```php
class Person
{
    public $firstName;
    public $lastName;

    public static $population = 7200000000;

    public static function birth()
    {
        self::$population += 1;
    }
}

```

_**Note:** You may find sample code that uses `static::` instead of `self::`. The difference between these two techniques deal with what is called [late static binding](http://php.net/manual/en/language.oop5.late-static-bindings.php). Both choices will behave exactly the same until we learn about extending classes._

## Exercises

We are going to take our input functions from the [include and require exercise](../include-and-require.html#exercises) and wrap them in a class. This is a perfect opportunity to use static methods.

1. Download [Input.php](../../examples/php/Input.php) and save it under `~/vagrant-lamp/sites/codeup.dev`. Do *not* put it in the public directory! Our users should not be able to interact with `Input.php` directly.
1. Fill in the functions `has()` and `get()`.
1. Use `require_once` to include your `Input` class in your `ping.php` and `pong.php` scripts. Replace your calls to `inputHas()` and `inputGet()` with your new static methods: `Input::has()` and `Input::get()`.
1. Add and commit your changes with git and push them all out to GitHub.
