# Visibility

Inheritance is very powerful, and while great power comes with great responsibility. We do not always want our methods or properties to be accessed or modified by sub-classes or outside instances.

PHP gives us control over what can be seen and manipulated inside our classes; this is referred to as _visibility_.

PHP provides us with the following types of visibility:

- `public` - accessible from everywhere.

- `protected` - accessible only within the defining class and by inherited classes.

- `private` - only accessible from within the class that defines the method or property.

## Using Visibility

So far, our properties and methods have all be defined as `public`. This is convenient, but it exposes our base classes to functionality that we may not want. For instance, our Person class has public `$firstName` and `$lastName` properties that can be set from anywhere, to anything. Most people do not change their name that often.

~~~php
$superman = new Superhero('Clark', 'Kent', 'Superman');
echo $superman->alterEgo();
~~~

This outputs `Clark Kent` as we have come to expect. However, we can override our hero's name without any problems.

~~~php
$superman->firstName = 'Lex';
$superman->lastName = 'Luthor';
echo $superman->alterEgo();
~~~

Now we are getting `Lex Luthor` for our output. This aggression will not stand. We can use visibility to limit access to these properties.

~~~php
class Person
{
    protected $firstName;
    protected $lastName;

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

We already are setting `$firstName` and `$lastName` in our constructor, so there is no need to allow external access to these properties.

~~~php
$person = new Person('John', 'Doe');
$person->firstName = 'Jane';
~~~

This throws an error.

    Fatal error: Cannot access protected property Person::$firstName

Voila! We have locked down our `$firstName` property. Let's test this on our favorite friendly neighborhood crime fighter:

~~~php
$superman = new Superhero('Clark', 'Kent', 'Superman');
echo $superman->alterEgo();
~~~

This still outputs `Clark Kent`, so our `protected` properties are indeed accessible from our child class.

~~~php
$superman->firstName = 'Lex';
~~~

This works as we would hope and throws the same error that we saw on `Person`:

    Fatal error: Cannot access protected property Superhero::$firstName

## Getters and Setters

If we change the visibility of a property from `public` to `private` or `protected`, we can lock-down the property, disallowing any direct access. We can then expose these properties using _getters_ and _setters_.

As we saw above, we can no longer directly access or manipulate properties that are not in the `public` scope. We can set and get the properties from internal methods. This means we can create custom methods to set and get our data, giving us complete control over the data coming in and going out.

In our above example we could pass erroneous data in for our first and last names. However, since we are limiting their visibility, we can use custom setters to clean our data on input.

For example, we would want to remove any whitespace a user may pass for their first or last names. If we did the following:

~~~php
$person = new Person('     Ilike    ', '   spaces      ');
echo $person->fullName();
~~~

We get a name with a lot of spaces:

         Ilike        spaces

While we did update our `$firstName` and `$lastName` visibility to `protected`&mdash;making them only visible to our class and its children&mdash;the constructor sets the properties directly. We need to add some additional logic around the process of *setting* our properties to solve this problem.

### Setters

Functions that set properties on a class are referred to as _setters_. We are also going to fix this whitespace issue by using some setters.

~~~php
class Person
{
    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function setFirstName($firstName)
    {
        $this->firstName = trim($firstName);
    }

    public function setLastName($lastName)
    {
        $this->lastName = trim($lastName);
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
~~~

Now using this test code:

~~~php
$person = new Person('     Ilike    ', '   spaces      ');
echo $person->fullName();
~~~

We get this output:

    Ilike spaces

As it stands now, we can set the name via the constructor, but attempts to set it directly cause fatal errors. What happens if we call `setFirstName()` from outside the class?

~~~php
$person = new Person('John', 'Doe');
$person->setFirstName('Jane');
echo $person->fullName();
~~~

Outputs

    Jane Doe

So we can access the setter from outside the class, because those methods are still public. We can fix this by setting our method's to visibility `protected` as well.

_**Note:** If you forget to specify a method's visibility it defaults to `public`. Omitting the visibility is considered bad practice however, and should never be done intentionally._

~~~php
class Person
{
    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    protected function setFirstName($firstName)
    {
        $this->firstName = trim($firstName);
    }

    protected function setLastName($lastName)
    {
        $this->lastName = trim($lastName);
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
~~~

Now, we have `public` constructor and `fullName()` methods, but our setters are `protected` as are our `$firstName` and `$lastName` properties.

Attempting this again:

~~~php
$person = new Person('John', 'Doe');
$person->setFirstName('Jane');
~~~

Gives us this error (as expected)

    Fatal error: Call to private method Person::setFirstName()

Now the only way to set `$firstName` and `$lastName` is via the constructor, and our setters will still act as filters for inputs.

### Getters

Getters are the opposite of setters; they are used to read data from outside the class. If we try to output the first name directly, we get another fatal error just like when we tried to assign it:

~~~php
$person = new Person('John', 'Doe');
echo $person->firstName;
~~~

Running this gives us

    Fatal error: Cannot access protected property Person::$firstName

If we want to allow access to the property, we can create a method to get it.

~~~php
public function getFirstName()
{
    return $this->firstName;
}
~~~

Sometimes we may need a first or last name, without getting a full name. Using a getter for each would allow these properties to be exposed. Now that we are adding getters, we can prevent our child classes from directly setting our `$firstName` and `$lastName` by changing them from `protected` to `private`.

~~~php
class Person
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    protected function setFirstName($firstName)
    {
        $this->firstName = trim($firstName);
    }

    protected function setLastName($lastName)
    {
        $this->lastName = trim($lastName);
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function fullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}
~~~

Now we can update our Superhero class to use the new getters.

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
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function hasCape()
    {
        return !empty($this->capeColor);
    }
}
~~~

This still allows our `Superhero` class to get the first and last names, but does not allow them to be set anywhere outside of the `Person` class.

## Overview

Defining the visibility for a class's properties and methods can help your programs operate as expected, and limit the exposure to technical debt in the form of unwanted behavior.

Getters and setters can be powerful tools that can act as filters for your data, as well as controls to work alongside visibility.

## Exercises

1. Update the `Rectangle` class from the previous lesson to contain `private` properties for height and width.

1. Before testing the `Rectangle` and `Square` classes, try to think of the outcomes before executing. Will the Rectangle class work as before? What about the Square class? Create objects from both classes and execute the `area()` method. Did the result meet your expected outcome?

1. Update the height and width properties of the `Rectangle` class to have a visibility of `protected`. Repeat the previous step. Did the result meet your expected outcome this time?

1. Change the visibility back to `private` for both properties. Create the necessary getters and setters for the Rectangle and Square classes to work as desired with only `private` properties.

1. Open your Log.php in Sublime. Refactor this class to:
 - limit the visibility of the `$handle` and `$filename` properties.
 - using setters, ensure that the filename is a string
 - ensure that users cannot manipulate `$handle` once the object is instantiated.
 - **Bonus:** In your setter for `$filename`, use a combination of [`touch()`](http://php.net/manual/en/function.touch.php) and [`is_writable()`](http://php.net/manual/en/function.is-writable.php) to ensure you can write to the specified location. What do you think you class should do if this fails?