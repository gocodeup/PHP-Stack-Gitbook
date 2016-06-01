# Inheritance

Classes are a wonderful way to group functionality for reuse and organization, but they are not always one-size-fits-all. Sometimes they need to be customized for some use cases, and some classes are designed to give some core functionality&mdash;expecting the end user (the developer) to use it as a base for more specific purposes.

Inheritance is one of the core feature of _object oriented programming_, and it simply means that a class can extend another class and _inherit_ the properties and methods of the parent class.

## Using Inheritance

PHP uses the `extend` keyword to allow a sub-class to inherit from a parent class. Let's go back to our basic `Person` class:

~~~php
class Person
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
~~~

This works great if everyone only worked the same way, but we all know there are special people in the world commonly referred to as _Superheroes_. These "supers" are just ordinary folks with special powers. They can do all the things a human can do, but they also do things normal people cannot do. We can _extend_ `Person` to _inherit_ all the properties and methods of that class and create our `Superhero` class:

~~~php
class Superhero extends Person
{
    public $pseudonym;
    public $capeColor;

    public function alterEgo()
    {
        return 'Top Secret Alternate Ego: ' . $this->fullName();
    }

    public function hasCape()
    {
        return !empty($this->capeColor);
    }
}
~~~

Every superhero must have a name, while their real person name is their secret identity. We refer to our superheroes by their known alias (`$pseudonym`), but we all know they have a mild-mannered alter-ego (`$firstName` and `$lastName`).

In addition, many superheroes prefer to wear capes, despite Edna E. Mode's warnings. Our `Superhero` class stores the color of the cape, if one exists.

By extending our `Person` class, we took advantage of one of the key principles of object oriented programming: inheritance. Our new `Superhero` class _inherits_ all the properties and methods from its base class, `Parent` and is able to create additional properties and methods.

We can see in the `alterEgo()` method that we still can use `$this` to reference properties on the parent class, and in the `hasCape()` method we can see `$this` also works for properties in our child class.

Lets look at how this works with instantiated objects.

~~~php
$person = new Person('John', 'Doe');
echo $person->fullName(); // "John Doe"
~~~

So far, our `Person` is working fine. Let's try to access a method from the child class, `Superhero`.

~~~php
$person->alterEgo();
~~~

This line of code will fail, giving us `Fatal error: Call to undefined method Person::alterEgo()`. A person does not need an alter-ego, so that method is unknown to our person object.

Now lets create a Superhero, and see if they get all the Person's attributes.

~~~php
$superman = new Superhero('Clark', 'Kent');
$superman->pseudonym = 'Superman';
$superman->capeColor = 'red';

echo $superman->alterEgo();
~~~

This yields the desired result:

    Top Secret Alternate Ego: Clark Kent

Let us revisit the code that is making this happen:

~~~php
class Superhero extends Person
{
    // ...

    public function alterEgo()
    {
        return 'Top Secret Alternate Ego: ' . $this->fullName();
    }

    // ...
}
~~~

The `Superhero` class does not have a `fullName()` method, but we can still use `$this` to access any property or method in our parent class.

Moreover, we did not define a constructor, but when we created a new instance of our Superhero, we passed in two strings representing the first and last name of our hero. The Person's `__construct()` method was also inherited by the Superhero object.

We can also access properties in our current class, as seen in the `hasCape()` method:

~~~php
public function hasCape()
{
    return !empty($this->capeColor);
}
~~~

We can try out this method, also:

~~~php
var_dump($superman->hasCape());
~~~

This returns `true`: Superman does indeed have a cape.

### More on Inheritance

This is a major part of inheritance: if the parent method is ever updated, our sub-classes will all inherit (and hopefully benefit from) the changes. We also inherit the base class's constructors, destructors, and any other magic methods. PHP's object model allows a class to _extend_ exactly one class at a time. However, we have no limit on how deep of a hierarchy we want to build: we can have as many grand-parents, great-grand-parents, great-great-grand-parents, etc as we need. We can also create as many child classes as we need. If we wanted, we could create `SuperVillain` and `MadScientist` classes as well, both of which would also extend `Person`.

## Exercises

1. In your `exercises` directory, create a new file named `Rectangle.php`. We are going to be using this file to calculate the area of a rectangle. Remember, the area of a rectangle is calculated by multiplying the width by the height.

1. In this new file, create a class named `Rectangle` that contains
 - the properties `$height` and `$width`
 - a constructor to set the height and width on instantiation
 - a method named `area()` that returns the area based on the height and width.

1. Create a `shapes_test.php` file next to `Rectangle.php`. In `shapes_test.php` make sure to `require_once` `Rectangle.php`.

1. Test your new class by creating an instance of Rectangle with various heights and widths. Calling the area method should correctly display the product of height and width.

1. Create a new file named `Square.php`

1. In this file create a class named `Square` that extends `Rectangle`

1. In the new Square class, create a method called perimeter that returns the perimeter of the square.

1. Test your new Square class by creating an instance of Square with various matching height and width. Calling the `area()` method should correctly display the product of height and width. Invoking the new method `perimeter()` should display the perimeter of the square.

1. What could we do to ensure the square class was actually computing values for a square? What prevents the height and width from being different? Would it be more beneficial if we could have a different constructor for our Square class?
