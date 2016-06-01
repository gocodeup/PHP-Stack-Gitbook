# Working with Dates

We learned earlier that Laravel does a lot of work for us when it comes to managing dates for creation or update of records in the database. Laravel also provides some nice ways for us to access those dates so that we can use or display them in our application.

Laravel includes a library called `Carbon` makes working with dates easy. You can find more information by visiting the documentation on Github. See the additional info section for links.

## Working with Carbon Dates

Every time you access any Laravel managed date fields (like `created_at` or `updated_at`) you will get back an instance of Carbon. This means that any of the fancy methods that Carbon provides. For our purposes, all we need to do is format a date nicely like this:

~~~php
$post = Post::find(1);
echo $post->created_at->format('l, F jS Y @ h:i:s A');

// outputs:
// Tuesday, March 11th 2014 @ 02:09:36 AM
~~~

For additional formatting options, see here: http://php.net/manual/en/function.date.php

If you find yourself using a date format in several places in your application, it may be worth adding it as a config item or making a `const` model attribute.

## Timezones

By default, Laravel is configured to use UTC time. You can re-configure this by changing the `timezone` in `app/config/app.php`. Here is a list of American timezones: http://us2.php.net/manual/en/timezones.america.php

It should be noted that it is generally a good practice to store times in UTC. That way, if you have users in different timezones, you present the times in their local timezone with some easy conversions.

If you would like to convert between UTC and another timezone, you can do it like this:

~~~php
$post = Post::find(1);
echo  $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A');

// outputs:
// Monday, March 10th 2014 @ 09:09:36 PM
~~~

Here, the UTC `created_at` date/time is being converted to the `America/Chicago` timezone and then it is being formatted as we showed earlier.

## Additional Information

Learn more about Carbon here: https://github.com/briannesbitt/Carbon

## Exercises

Please follow the instructions below, and as always commit your work to git and push to GitHub.

1. Use what you learned in this lesson to format date/times for posts and ensure that they are in the correct timezone (use `America/Chicago`).
