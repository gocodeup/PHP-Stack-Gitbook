# View / Controller Separation

Remember MVC and how we discussed the importance of keeping your HTML separate from your PHP code is so important for creating clean and maintainable code? So far, we have been doing a pretty good job of keeping things separate by keeping our PHP code above our HTML and then using echo, conditionals, and loops embedded in our HTML. In this lesson, we are going to take it one step further.

Introducing the view-controller separation template:

```html
<?php

// Require or include statements are allowed here. All other code goes in the pageController function.

/**
 * The pageController function handles all processing for this page.
 * @return array An associative array of data to be used in rendering the html view.
 */
function pageController()
{
    // Initialize an empty data array.
    $data = array();

    // Add data to be used in the html view.
    $data['message'] = 'Hello Codeup!';

    // Return the completed data array.
    return $data;
}

// Call the pageController function and extract all the returned array as local variables.
extract(pageController());

// Only use echo, conditionals, and loops anywhere within the HTML.
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP + HTML</title>
    </head>
    <body>
        <?php echo $message; ?>
    </body>
</html>
```

Take a look at the template above and let us examine why using this template will force us to have good habits in keeping our PHP code separate from our HTML. This will also be a quick refresher on scope.

If we declare a variable inside a function in PHP, is that variable visible outside the function? Due to the way scope works, it is not. This means that if we put all our PHP code inside the `pageController()` function, then any variable declarations inside that function will not be available outside the function.

Now look at the line below the `pageController()` function that says `extract(pageController());`. The `extract()` function will take an associative array and create local variables with names and values coming from the key-value pairs in the array.

Finally, look back at the `pageController()` function. Notice that it starts out by creating an empty array called `$data`. During its work, it adds values to the `$data` array and then finally returns the `$data` array. The `extract()` function will retrieve the data results from the `pageController()` function and make all the values available as local variables. In this case, that means that `$message` will be accessible so that we can echo it out within the HTML below.

Right now, this may seem a bit complicated, and that is okay. Our future lessons build upon this and the good habits you create here will pay off heavily in future lessons.

## Exercises

Once again, open up the exercises from the previous lessons. You will now need to convert them so that they use the above view-controller separation template. This should be really easy since you have been following the best practices we discussed, right? :)
