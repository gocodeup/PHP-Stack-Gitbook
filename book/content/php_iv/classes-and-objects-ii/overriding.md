# Inheritance and Overriding

We know inheritance allows us to add functionality to our parent classes. However, what happens if we need to change the way the parent class functions in our sub-class?

If we redefine a method or property from our parent class, the sub-class's version will be the one that is used. This is referred to as _overriding_ a method or property.

## Examples of Overriding

Our current `Person` class has a method to display a full name for a Person.

~~~php
class Person
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
~~~

Our superheroes would probably not like having their real name displayed using this method. To fix this, we can redefine a method or property to override the functionality inherited from the parent class.

~~~php
class Superhero extends Person
{
    public $pseudonym;
    public $capeColor;

    public function fullName()
    {
        return $this->pseudonym;
    }

    public function alterEgo()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function hasCape()
    {
        return !empty($this->capeColor);
    }
}
~~~

By redefining `fullName()` we are _overriding_ the default behavior. For a normal `Person` the `fullName()` method will return their first and last names, however, for a `Superhero` we will need to use the `alterEgo()` method to get that information, as `fullName()` will return their known pseudonym.

~~~php
$person = new Person('John', 'Doe');
echo $person->fullName(); // "John Doe"
~~~

A Person still works correctly.

~~~php
$superman = new Superhero('Clark', 'Kent');
$superman->pseudonym = 'Superman';

echo $superman->fullName();
~~~

This outputs `Superman`, so our overridden method is working as expected.

## Calling Parent Methods

What happens if we want to add to the functionality of a method in a parent class, but we do not want to just copy and paste the method just to add to it? In order to keep our code DRY and easy to maintain, we can leverage inheritance some more and call the parent method from inside our overriding function.

Consider if we want add to our `$pseudonym` attribute on instantiation of a `Superhero`, like we do with our first and last names for a `Person`. We would want to put this in the constructor, however our parent class already has a constructor to handle part this.

We can *override* our parent's constructor, while using `parent::` to keep the functionality from the parent class. Our new constructor will look like this:

~~~php
public function __construct($firstName, $lastName, $pseudonym)
{
    parent::__construct($firstName, $lastName);
    $this->pseudonym = $pseudonym;
}
~~~

All together, our class now looks like this:

~~~php
class Superhero extends Person
{
    public $pseudonym;
    public $capeColor;

    public function __construct($firstName, $lastName, $pseudonym)
    {
        parent::__construct($firstName, $lastName);
        $this->pseudonym = $pseudonym;
    }

    public function fullName()
    {
        return $this->pseudonym;
    }

    public function alterEgo()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function hasCape()
    {
        return !empty($this->capeColor);
    }
}
~~~

Using our same tests:

~~~php
$superman = new Superhero('Clark', 'Kent', 'Superman');
echo $superman->fullName();
echo $superman->alterEgo();
~~~

The output is as we would hope:

    Superman
    Clark Kent

By calling `parent::__construct($firstName, $lastName)` we are telling our object to invoke the method named `__construct()` in the parent class, passing it the arguments for `$firstName` and `$lastName`.  This meets the requirements of the parent class's `__construct()` method, and then the code continues to execute, so our `$pseudonym` is set, and the new `__construct()` method is still inheriting from the parent, but we are extending the functionality in our sub-class.

## Exercises

1. Open the file `Square.php` from the previous lesson in your Sublime Text editor.

1. Update the `Square` class to override the parent's constructor by only accepting one attribute (height) and using that to set both `$width` and `$height` in your class.

1. Update the constructor in `Square` to instead pass height on to the parent's constructor.

1. Add a `perimeter()` method to your `Rectangle` class, and an `area()` method to your `Square` class. Neither of these should call a `parent`. Which method is overriding? Which one is a base method?

1. Update your `shapes_test.php` to test the methods in both your `Square` class and your `Rectangle` class.
