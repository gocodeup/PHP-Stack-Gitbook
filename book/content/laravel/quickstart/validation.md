# Validation

So far, we are able to create blog posts but we do not have any validation to make sure that the fields are actually getting filled in properly. Once again, Laravel provides some built-in features to make our job easier.

## Rules

Validation in Laravel works based on rules. You should have a rule per attribute per model. These rules should ensure that the data is valid based on the type and size specifications of the database. Here is a set of rules for a post:

~~~php
public static $rules = array(
    'title'      => 'required|max:100',
    'body'       => 'required|max:10000'
);
~~~

Here, we create an array named `$rules`. Notice that the $rules array is declared with public visibility in order to access it from other classes in our application. Also, note that $rules array is specified to be a static on the Post model. This is so that we can access this $rules property without instantiating a new Post object. We have keys in the array for each attribute of a post. The values are pipe (`|`) delimited lists of validation rules. The rules are pretty descriptive in this case, but you should always check the Laravel documentation to make sure the rules will work as you expect. Here we want to make sure that both `title` and `body` are present and make sure that they do not exceed a specified length.

These rules will be used during validation in the `store` and `update` methods of the `PostsController` however, it would be better to make them part of the `Post` model. To do that, they can be specified as a `public static` attribute of the `Post` model. That way they can be accessed from inside the `PostsController` by using `Post::$rules`. This will keep your code cleaner and make it easier to maintain.

Please see the additional information links towards the bottom of this lesson for many more validation rules that Laravel provides.

## Validating

Before we store a post, we need to make sure it passes the validation rules that we just created. We can do that as follows:

~~~php
public function store()
{
    // create the validator
    $validator = Validator::make(Input::all(), Post::$rules);

    // attempt validation
    if ($validator->fails()) {
        // validation failed, redirect to the post create page with validation errors and old inputs
    } else {
        // validation succeeded, create and save the post
    }
}
~~~

Here we are looking at the `store()` method on the `PostsController`. To validate a set of inputs against a set of rules, we use the `Validator::make()` function. Just pass the inputs and the rules and a validator will be returned. You can then call `fails()` or `passes()` on the validator to see if the inputs meet the rule requirements.

## Handling Errors

When validation errors occur, we need a way to get them back to the view so the user can see them. In order to make the errors available to the view, we simply chain the `->withErrors($validator)` method as follows:

~~~php
public function store()
{
    // create the validator
    $validator = Validator::make(Input::all(), Post::$rules);

    // attempt validation
    if ($validator->fails()) {
        // validation failed, redirect to the post create page with validation errors and old inputs
        return Redirect::back()->withInput()->withErrors($validator);
    } else {
        // validation succeeded, create and save the post
    }
}
~~~

In the updated example above, you can see that we are redirecting back with input and with errors. The `$validator` variable that produced the errors is passed to the `withErrors()` method. This will make a variable, `$errors`, available in the view for accessing validation errors.

The `$errors` variable passed back to the view (the create view in this case) can be accessed as follows:

~~~php
// check if a field has an error
$errors->has('title')

// get an error by field name
$errors->first('title')

// get an error by field name formatted within html
$errors->first('title', '<span class="help-block">:message</span>')
~~~

Inside of a view, this will look like:

~~~php
// echo the first error found for 'title'
{{ $errors->first('title', '<span class="help-block">:message</span>') }}
~~~

As you can see, we can check based on input name if there is an error and then show the error. By default, Laravel has built in error messages that get used based on the validation rules that failed. These can be fully customized, but for this example the default messages will be just fine.

## Additional Information

For additional information on validation, see the links below:

- https://laravel.com/docs/4.2/validation
- http://daylerees.com/codebright/validation

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Update the `store` action on the `PostsController` to validate the inputs before creating the new post.
1. Upon validation failure, redirect back to the `create` action with the validation errors. Update the `create` view so that all the validation errors are shown to the user.
