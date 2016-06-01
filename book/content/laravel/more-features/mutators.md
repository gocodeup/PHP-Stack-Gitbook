# Accessors and Mutators

Laravel allows you to change how an attribute on a model is get or set via accessors and mutators. Let us take a look at exactly what this means and how we can use them:

## Accessors

An accessor will allow you to transform an attribute on a model automatically during attribute access. To enable this feature you need to create a specially named method on your model. The method name starts with `get`, followed by the attribute name, followed by `Attribute`. Here is an example:

~~~php
public function getCreatedAtAttribute($value)
{
    $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    return $utc->setTimezone('America/Chicago');
}
~~~

There are a few things to notice in the example above:

- The attribute name portion of the method name should start with an upper case letter. If the attribute name contains underscores, subsequent words should be appended with upper case letters. Therefore `created_at` becomes `CreatedAt`.
- The accessor method takes in a `$value`. This represents the raw attribute value before modification.
- The method should return the modified attribute value.

In the example above, we are performing an automatic timezone conversion any time the `created_at` attribute is accessed.

## Mutators

A mutator will allow you to transform a value before it is set into a model attribute. Once again, a special method will need to be created on your model class. Here is an example:

~~~php
public function setUsernameAttribute($value)
{
    $this->attributes['username'] = strtolower($value);
}
~~~

There are a few things to notice in the example above:

- The method naming convention works the same as it does for accessors.
- The mutator takes in a value. This is the value that is being set for the attribute. Ex: `$user->username = $value`.
- The method has no return value. Instead, it accesses the model attributes directly via the attributes array. The value is mutated as desired and then the proper attribute is updated.

In the above example, we are ensuring that any username that gets set will always be lower case.

## Benefits of Accessors and Mutators

Accessors and mutators are optional because whatever you can do within them can be done other places in your code. However, if you find yourself transforming a value in a certain way and it is accessed or set in several places in your project, then you probably have duplicate code. In this case, the best option is to remove the duplicate code and use an accessor or mutator instead.

Accessors and mutators can also help perform certain functions that otherwise might be forgotten. For example, if you wanted to make sure that whenever a password gets updated it is always hashed, you may write a mutator on your `User` model as follows:

~~~php
public function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::make($value);
}
~~~

The above code will ensure that user passwords always gets hashed.

## Additional Information

Read more about accessors and mutators in the [Laravel docs](http://laravel.com/docs/4.2/eloquent#accessors-and-mutators)

## Exercise

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Create a new class called `BaseModel` in the `app/models` directory that extends from `Eloquent`. Add `use Carbon\Carbon;` to the top of the file.
1. Create accessors for the `created_at` and `updated_at` attributes so that they will be converted from UTC to local time.
1. Modify your existing model classes to extend from `BaseModel` so they will get the new accessor functionality.
